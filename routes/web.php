<?php

use App\Http\Controllers\PagesController;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/admin/about', 'PagesController@about')->name('about');
Route::get('/admin/blog_details', 'PagesController@blog_details')->name('blog_details');
Route::get('/admin/blog', 'PagesController@blog')->name('blog');
Route::get('/admin/doctors', 'PagesController@doctors')->name('doctors');
Route::get('/admin/contact', 'PagesController@contact')->name('contact');
Route::get('/admin/index', 'PagesController@index')->name('index');

Route::get('googleAutocomplete', 'GoogleController@index');
// Route::get('products','ProductController@index');
// Route::get('/products/create','ProductController@create');
// Route::post('products/store', 'ProductController@store');
Route::resource('products', ProductController::class);
Route::resource('services', ServiceController::class);
Route::resource('patients', PatientController::class);
Route::resource('news', PatientController::class);
Route::resource('categories', CategoryController::class);
