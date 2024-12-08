<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use App\Models\FoodItem;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Image;

class FoodItemController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fooditems = FoodItem::orderBy('id', 'DESC')->get();
        return view('admin.food_item.all', compact('fooditems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = FoodCategory::all();
        $subcategories = SubCategory::all();
        return view('admin.food_item.add', compact(['categories', 'subcategories']));
    }


    public function getSubcategory($id)
    {
        //return response($id);
        $subcategories = DB::table('sub_categories')->where('category_id', $id)->get();
        // dd($subcategories);
        return response()->json($subcategories);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'food_item_name' => 'required |max:30|unique:food_items,food_item_name',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'price' => 'numeric|required',
            'food_item_details' => 'required',
            'spice_level' => 'required',
            'sugar_level' => 'required',
        ],[
            'sugar_level.required'=>'Sugar is required.',
            'category_id.required'=>'Category is required.',
            'sub_category_id.required'=>'Sub category is required.',
        ]);

        $food_item = new FoodItem();
        $food_item->food_item_slug = $request->food_item_name . '-' . time();
        $food_item->category_id = $request->category_id;
        $food_item->sub_category_id = $request->sub_category_id;
        $food_item->food_item_name = $request->food_item_name;
        $food_item->food_item_details = $request->food_item_details;
        $food_item->price = $request->price;
        $food_item->spice_level = $request->spice_level;
        $food_item->sugar_level = $request->sugar_level;
        $food_item->created_by = Auth::user()->name;

        if ($request->hasFile('food_item_img')) {
            $file = $request->file('food_item_img');
            $ext = $file->getClientOriginalExtension();
            $filename = uniqid() . '.' . $ext;
            $file->move('uploads/food_item/', $filename);
            $food_item->food_item_img =  'uploads/food_item/' . $filename;
        }

        $food_item->save();
        return redirect()->route('food_item.index')->with('success', 'food item  Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function show(FoodItem $foodItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $categories = FoodCategory::all();
        $data = FoodItem::where('food_item_slug', $slug)->first();
        return view('admin.food_item.edit', compact(['data', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $this->validate($request, [
            'food_item_name' => 'required|max:255|unique:food_items,food_item_name,' . $id . ',id',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'price' => 'numeric|required',
            'food_item_details' => 'required',
            'spice_level' => 'required',
            'sugar_level' => 'required',
        ],[
            'sugar_level.required'=>'Sugar is required.',
            'category_id.required'=>'Category is required.',
            'sub_category_id.required'=>'Sub category is required.',
        ]);
        $food_item = FoodItem::where('id', $id)->first();
       // return $food_item;
        if ($food_item) {
            if ($food_item) {
                $food_item->food_item_slug = $request->food_item_name . '-' . time();
                $food_item->category_id = $request->category_id;
                $food_item->sub_category_id = $request->sub_category_id;
                $food_item->food_item_name = $request->food_item_name;
                $food_item->food_item_details = $request->food_item_details;
                $food_item->price = $request->price;
                $food_item->spice_level = $request->spice_level;
                $food_item->sugar_level = $request->sugar_level;
                $food_item->updated_by = Auth::user()->name;
                if ($request->hasFile('food_item_img')) {
                    $file = $request->file('food_item_img');
                    $ext = $file->getClientOriginalExtension();
                    $filename = uniqid() . '.' . $ext;
                    $file->move('uploads/food_item/', $filename);
                    $food_item->food_item_img =  'uploads/food_item/' . $filename;
                }
                $food_item->update();
                return redirect()->route('food_item.index')->with('success', 'food item  Updated Successfully');
            } else {
                return back()->with('error', 'Data Not Faound');
            }
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodItem  $foodItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = FoodItem::find($id);
        if($data){
           $status= $data->delete();
            if($status){
                return redirect()->route('food_item.index');
            }else{
                return back()->with('error','Please Try Again');
            }
        }else{
            return back()->with('error','Data Not Faound');
        }
    }







}
