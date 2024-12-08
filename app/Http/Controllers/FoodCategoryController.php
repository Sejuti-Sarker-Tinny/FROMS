<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\FoodCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class FoodCategoryController extends Controller{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $all = FoodCategory::orderBy('food_categories_id', 'DESC')->get();
        return view('admin.food-category.all',compact('all'));
    }

    public function add(){


        return view('admin.food-category.add');

    }

    public function edit($slug){


        $data = FoodCategory::where('food_categories_slug', $slug)->first();
        return view('admin.food-category.edit',compact('data'));

    }


    public function submit(Request $request){


        $this->validate($request,[
            'name'=>'required|max:255|unique:food_categories,food_categories_name',
        ],[
            'name.required'=>'Food category name is required.',
            'name.max'=>'This food category name must not be greater than 255 characters.',
            'name.unique'=>'This food category name has already been taken.',
        ]);
        $slug = Str::slug($request->name, '-');

        $insert = FoodCategory::insert([
            'food_categories_name'=>$request->name,
            'food_categories_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);


        if($insert){

            
            Session::flash('success','Food category successfully added!');
            return redirect()->route('all_food_category');

        }else{
            Session::flash('error','Food category addtion process failed!');

            return redirect()->route('add_food_category');
        }

    }

    public function update(Request $request){

        $id = $request->id;
        $this->validate($request,[
            'name'=>'required|max:255|unique:food_categories,food_categories_name,'.$id.',food_categories_id',
        ],[
            'name.required'=>'Food category name is required.',
            'name.max'=>'This food category name must not be greater than 255 characters.',
            'name.unique'=>'This food category name has already been taken.',
        ]);
        $slug = Str::slug($request->name, '-');
        $update = FoodCategory::where('food_categories_id',$id)->update([
            'food_categories_name'=>$request->name,
            'food_categories_slug'=>$slug,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($update){
            Session::flash('success','Food category name successfully edited!');

            return redirect()->route('all_food_category');
        }else{
            Session::flash('error','Food category name edit process failed!');
            return redirect()->route('edit_food_category');
        }
    }
}

