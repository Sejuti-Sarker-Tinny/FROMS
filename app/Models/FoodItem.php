<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function category(){
        return $this->belongsTo(FoodCategory::class,'category_id','food_categories_id');
    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
   public function foodItem(){
    return $this->hasMany(SubCategory::class,'sub_category_id');
   }
}
