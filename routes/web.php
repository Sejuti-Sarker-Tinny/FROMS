<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    //return view('welcome');

    return view('website.index');

})->name('website');


Route::get('/dashboard', function () {
    //return view('dashboard');

    return view('admin.dashboard');

})->middleware(['auth'])->name('dashboard');


// Customer

Route::get('dashboard/customer', [CustomerController::class, 'index'])->name('all_customer');
Route::get('dashboard/customer/edit/{slug}', [CustomerController::class, 'edit'])->name('edit_customer');
Route::post('dashboard/customer/update', [CustomerController::class, 'update'])->name('update_customer');

Route::post('dashboard/customer/delete', [CustomerController::class, 'delete'])->name('delete_customer');
Route::get('dashboard/customer/ban/{slug}', [CustomerController::class, 'ban'])->name('ban_customer');

Route::get('dashboard/customer/unban/{slug}', [CustomerController::class, 'unban'])->name('unban_customer');
Route::get('dashboard/customer/send/email/{slug}', [CustomerController::class, 'send_email'])->name('send_email_customer');

Route::post('dashboard/customer/send/email', [CustomerController::class, 'submit_send_email'])->name('submit_send_email');


// Food Category


Route::get('dashboard/food-category', [FoodCategoryController::class, 'index'])->name('all_food_category');
Route::get('dashboard/food-category/add', [FoodCategoryController::class, 'add'])->name('add_food_category');

Route::get('dashboard/food-category/edit/{slug}', [FoodCategoryController::class, 'edit'])->name('edit_food_category');
Route::post('dashboard/food-category/submit', [FoodCategoryController::class, 'submit'])->name('submit_food_category');
Route::post('dashboard/food-category/update', [FoodCategoryController::class, 'update'])->name('update_food_category');
// sub category
Route::get('dashboard/sub-category',[SubCategoryController::class,'index'])->name('sub_category.index');
Route::get('dashboard/sub-category-create',[SubCategoryController::class,'create'])->name('sub_category.create');
Route::post('dashboard/sub-category',[SubCategoryController::class,'store'])->name('sub_category.store');
Route::get('dashboard/sub-category/edit/{slug}',[SubCategoryController::class,'edit'])->name('sub_category_edit');
Route::post('dashboard/sub-category/update', [SubCategoryController::class, 'update'])->name('update_sub_category');
// food item
Route::get('dashboard/food-item',[FoodItemController::class,'index'])->name('food_item.index');
Route::get('dashboard/food-item-create',[FoodItemController::class,'create'])->name('food_item.create');
//ajax dependency
Route::get('dashboard/getSubcategory/{id}', [FoodItemController::class, 'getSubcategory'])->name('getSubcategory');
Route::post('dashboard/food-item-create',[FoodItemController::class,'store'])->name('food_item.store');
Route::get('dashboard/food-item/edit/{slug}',[FoodItemController::class,'edit'])->name('food_item_edit');
Route::post('dashboard/food-item/update', [FoodItemController::class, 'update'])->name('food_item.update');
Route::delete('dashboard/food-item/delete/{id}', [FoodItemController::class, 'destroy'])->name('food_item_delete');
// frontend

// sub category food item


Route::get('sub_category_food/{slug}',[HomeController::class,'subCategoryFoodItem'])->name('sub_category_food');
Route::get('single_food/{slug}',[HomeController::class,'singlesubCategoryFoodItem'])->name('single_food');
Route::post('filter-food-item',[HomeController::class,'filterFoodItem'])->name('filter-food-item');

//user profile
Route::get('/dashboard/profile',[UserController::class ,'userprofile']);
Route::get('/dashboard/edit-profile/{slug}',[UserController::class ,'editprofile']);
Route::get('/dashboard/edit-profile-photo/{slug}',[UserController::class ,'editprofilePhoto']);

Route::post('/dashboard/update_user_info',[UserController::class ,'updateUserInfo'])->name('update_user_info');
Route::post('/dashboard/update_user_photo',[UserController::class ,'updateUserPhoto'])->name('update_user_photo');
Route::get('/dashboard/editpassword/{slug}',[UserController::class ,'ChangePasswordform']);
Route::post('change-password/{id}', [UserController::class,'changePassword'])->name('change.password');

// Cart

Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');
Route::middleware(['auth', 'customer'])->group(function () {
    Route::post('place/order', [ProductController::class, 'place_order'])->name('place_order');
});



// Orders



Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('dashboard/orders', [ProductController::class, 'orders'])->name('orders');
    Route::get('dashboard/order/deliver/{id}', [ProductController::class, 'order_deliver'])->name('order_deliver');
    Route::get('dashboard/order/customer-profile/{id}', [ProductController::class, 'customer_profile'])->name('customer_profile');
});

// Review

Route::middleware(['auth', 'customer'])->group(function () {

    Route::get('dashboard/review', [HomeController::class, 'add_review'])->name('add_review');
    Route::post('dashboard/review', [HomeController::class, 'submit_review'])->name('submit_review');
});

Route::get('website/review', [HomeController::class, 'review'])->name('review');
Route::middleware(['auth', 'customer'])->group(function () {
    Route::post('rating/submit', [HomeController::class, 'rating_submit'])->name('submit_rating');
});


require __DIR__.'/auth.php';

