<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DocumentSealController;


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
Route::get('/edit_user', 'HomeController@editAccount')->name('edit_user');
Route::get('/admin/about', 'PagesController@about')->name('about');
Route::get('/admin/blog_details', 'PagesController@blog_details')->name('blog_details');
Route::get('/admin/blog', 'PagesController@blog')->name('blog');
Route::get('/admin/doctors', 'PagesController@doctors')->name('doctors');
Route::get('/admin/contact', 'PagesController@contact')->name('contact');
Route::get('/admin/index', 'PagesController@index')->name('index');
Route::get('/chat', [ChatController::class, 'index']);
Route::post('/chat/send', [ChatController::class, 'sendMessage']);
Route::post('/document/create', [DocumentSealController::class, 'create'])->name('document.create');
Route::get('/document/indexOath', [DocumentSealController::class, 'indexOath'])->name('document.indexOath');
Route::post('/document/post{id?}', [DocumentSealController::class, 'post'])->name('document.post');
Route::post('/document/preview{id?}', [DocumentSealController::class, 'preview'])->name('document.preview');
Route::get('/document/get_documents{id}', [DocumentSealController::class, 'previewDocument'])->name('document.get_documents');
Route::post('/document/update_download_time{documentId}', [DocumentSealController::class, 'uploadDownloadTime'])->name('document.update_download_time');
Route::get('/document/majina', [DocumentSealController::class, 'viapoMajina'])->name('document.majina');
Route::post('/document/save_names', [DocumentSealController::class, 'saveViapoMajina'])->name('document.save_names');
Route::get('googleAutocomplete', 'GoogleController@index');
// Route::get('products','ProductController@index');
// Route::get('/products/create','ProductController@create');
// Route::post('products/store', 'ProductController@store');
Route::resource('products', ProductController::class);
Route::resource('services', ServiceController::class);
Route::resource('patients', PatientController::class);
Route::resource('news', PatientController::class);
Route::resource('categories', CategoryController::class);
Route::post('/generate-pdf', [DocumentSealController::class, 'generatePDF'])->name('generate.pdf');

