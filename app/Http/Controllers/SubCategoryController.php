<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class SubCategoryController extends Controller
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
        $sub_categories = SubCategory::orderBy('id', 'DESC')->get();
        return view('admin.sub_category.all', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = FoodCategory::all();
        return view('admin.sub_category.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  return $request->all();
        $this->validate($request, [
            'sub_cat_name' => 'required |max:30|unique:sub_categories,sub_cat_name',
            'category_id' => 'required',
        ]);
        $data = $request->all();
        $slug = Str::slug($request->sub_cat_name.'-'.time());
        $data['created_by'] = Auth::user()->name;
        $data['sub_cat_slug']=$slug;
        $subcategory = SubCategory::create($data);
        if ($subcategory) {
            return redirect()->route('sub_category.index')->with('success', 'Sub Category Added Successfully');
        } else {
            return back()->with('error', 'Something went Wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $categories = FoodCategory::all();
        $data = SubCategory::where('sub_cat_slug', $slug)->first();
        return view('admin.sub_category.edit',compact(['data','categories']));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $id = $request->id;
        $slug = Str::slug($request->sub_cat_name.'-'.time());
        $status = SubCategory::where('id',$id)->update([
            'sub_cat_name'=>$request->sub_cat_name,
            'sub_cat_slug'=>$slug,
            'category_id'=>$request->category_id,
            'updated_by'=>Auth::user()->name,
        ]);
        if($status){
            return redirect()->route('sub_category.index')->with('success', 'Sub Category Updated Successfully');
        }else{
            return back()->with('error', 'Something went Wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }

}
