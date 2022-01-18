<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResAdminController;
use App\Http\Controllers\DevAdminController;
use App\Http\Controllers\RestaurantsController;
use App\Http\Controllers\FoodCatagoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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





Route::get('/',[FrontController::class,'login']);
Route::get('signup',[FrontController::class,'sign_up']);
Route::post('/auth',[FrontController::class,'user_auth'])->name('user_auth');
Route::post('/signup/user_signup',[CustomerController::class,'user_signup'])->name('u_signup');
Route::group(['middleware'=>'user_auth'],function(){

    Route::get('front',[FrontController::class,'index']);
    Route::get('front/trending',[FrontController::class,'trending']);
    Route::get('front/checkout',[FrontController::class,'checkout']);
    Route::get('front/success',[FrontController::class,'success']);
    Route::get('front/profile',[FrontController::class,'profile']);
    Route::get('front/profile/{id}',[FrontController::class,'profile']);
    Route::get('front/my_order',[FrontController::class,'my_order']);
    Route::get('front/order_status/{order_id}',[FrontController::class,'order_status']);
    Route::get('front/popular',[FrontController::class,'all_pop']);
    Route::get('front/restaurant/{res_id}',[FrontController::class,'res']);
    Route::get('front/food_catagory/{catagory_slug}',[FrontController::class,'catagory']);
    Route::post('front/restaurant/add',[CartController::class,'cart_process'])->name('add_cart');
    Route::post('front/checkout/add',[FrontController::class,'checkout_process'])->name('checkout_process');
    Route::get('front/restaurant/delete/{id}',[CartController::class,'delete_data']);
    Route::get('front/delete/{id}',[CartController::class,'delete']);
    Route::get('front/restaurant/emptycart/{id}',[CartController::class,'delete_all']);
    Route::post('/signup/user_update',[CustomerController::class,'update_process'])->name('update');
    Route::get('front/logout', function () {
    session()->forget('USER_LOGIN');
    session()->forget('USER_ID');
    session()->forget('USER_NAME');
    session()->flash('message','logout done');
    return redirect('/');
    });

});


Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('auth');
Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);

    Route::get('admin/restaurants',[RestaurantsController::class,'index']);
    Route::get('admin/restaurants',[RestaurantsController::class,'index']);
    Route::get('admin/restaurants/manage_res',[RestaurantsController::class,'manage_res']);
    Route::get('admin/restaurants/manage_res/{id}',[RestaurantsController::class,'manage_res']);
    Route::post('admin/restaurants/res_process',[RestaurantsController::class,'res_process'])->name('res_manage');
    Route::get('admin/restaurants/delete/{id}',[RestaurantsController::class,'delete_data']);
    Route::get('admin/restaurants/status/{type}/{id}',[RestaurantsController::class,'status']);



    Route::get('admin/food_catagory',[FoodCatagoryController::class,'index']);
    Route::get('admin/food_catagory/manage_catagory',[FoodCatagoryController::class,'manage_catagory']);
    Route::get('admin/food_catagory/manage_catagory/{id}',[FoodCatagoryController::class,'manage_catagory']);
    Route::post('admin/food_catagory/catagory_process',[FoodCatagoryController::class,'catagory_process'])->name('catagory_manage');
    Route::get('admin/food_catagory/delete/{id}',[FoodCatagoryController::class,'delete_data']);

    Route::get('admin/menus',[AdminController::class,'menu']);

    Route::get('admin/customers',[AdminController::class,'customer']);

    Route::get('admin/delivery',[OrderController::class,'index']);
    Route::get('admin/delivery/manage_delivery',[OrderController::class,'manage_delivery']);
    Route::get('admin/delivery/manage_delivery/{id}',[OrderController::class,'manage_delivery']);
    Route::post('admin/delivery/delivery_process',[OrderController::class,'delivery_signup'])->name('delivery_manage');

    Route::get('admin/assign/{id}',[AdminController::class,'assign']);
    Route::post('admin/assign_man',[AdminController::class,'assign_id'])->name('assign');

    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error','logout done');
        return redirect('admin');
    });

});

Route::get('res_admin',[ResAdminController::class,'index']);
Route::post('res_admin/auth',[ResAdminController::class,'res_auth'])->name('res_auth');

Route::group(['middleware'=>'res_auth'],function(){

    Route::get('res_admin/dashboard',[ResAdminController::class,'dashboard']);
    Route::get('res_admin/manage_order/{id}',[ResAdminController::class,'order_process']);
    Route::post('res_admin/status_order',[ResAdminController::class,'order_status'])->name('status');

    Route::get('res_admin/menus',[MenuController::class,'index']);
    Route::get('res_admin/menus/manage_menu',[MenuController::class,'manage_menu']);
    Route::get('res_admin/menus/manage_menu/{id}',[MenuController::class,'manage_menu']);
    Route::post('res_admin/menus/menu_process',[MenuController::class,'menu_process'])->name('menu_manage');
    Route::get('res_admin/menus/delete/{id}',[MenuController::class,'delete_data']);
    Route::get('res_admin/restaurant/{id}',[ResAdminController::class,'manage_res']);
    Route::post('res_admin/restaurant/update',[ResAdminController::class,'res_update'])->name('res_update');

    Route::get('res_admin/logout', function () {
        session()->forget('RES_LOGIN');
        session()->forget('RES_ID');
        session()->forget('RES_NAME');
        session()->flash('error','logout done');
        return redirect('res_admin');
    });
});



Route::get('dev_admin',[DevAdminController::class,'index']);
Route::post('dev_admin/auth',[DevAdminController::class,'dev_auth'])->name('dev_auth');

Route::group(['middleware'=>'dev_auth'],function(){
    Route::get('dev_admin/dashboard',[DevAdminController::class,'dashboard']);

    Route::get('dev_admin/delivery/{id}',[DevAdminController::class,'manage_delivery']);
    Route::post('res_admin/delivery/update',[DevAdminController::class,'delivery_update'])->name('dev_update');

    Route::get('dev_admin/complete/{id}',[DevAdminController::class,'complete']);
    Route::get('dev_admin/logout', function () {
        session()->forget('DELIVERY_LOGIN');
        session()->forget('DELIVERY_ID');
        session()->forget('DELIVERY_NAME');
        session()->flash('error','logout done');
        return redirect('dev_admin');
    });

});
