<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/admin', function () {
    return view('admin_layout');
});
Route::get('/admin_login', function () {
    return view('admin_login');
});
//backend
Route::post('/login','AdminController@login');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');	

//category
// Route::resource('category', CategoryController::class);
Route::get('/category','CategoryController@index');
Route::post('/category','CategoryController@store');
Route::get('/category/create','CategoryController@create');
Route::get('/category/{category}/edit','CategoryController@edit');	
Route::post('/category/{category}','CategoryController@update');
Route::get('/category/{category}','CategoryController@destroy');

//Brand
Route::get('/brand','BrandController@index');
Route::get('/brand/create','BrandController@create');
Route::post('/brand','BrandController@store');
Route::get('/brand/{brand}/edit','BrandController@edit');	
Route::post('/brand/{brand}','BrandController@update');
Route::get('/brand/{brand}','BrandController@destroy');
//product
Route::get('/product','ProductController@index');
Route::get('/product/create','ProductController@create');
Route::post('/product','ProductController@store');
Route::get('/product/{product}/edit','ProductController@edit');
Route::post('/product/{product}','ProductController@update');
Route::get('/product/{product}','ProductController@destroy');



//Category

// Route::get();


