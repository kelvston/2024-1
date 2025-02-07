<?php

use App\Http\Controllers\chatbotController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DocumentSealController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UshauriController;
use App\Http\Controllers\CaseCategoryController;
use App\Http\Controllers\CaseAssignmentController;


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

//Route::get('/', function () {
//    return view('template');
//});
Route::get('/', function () {
    return view('index');
});

Route::get('/sale', function () {
    return view('sale');
});

Route::get('/employment', function () {
    return view('employment');
});

Route::get('/token', [PaymentController::class, 'getToken']);
Route::post('/make-payment', [PaymentController::class, 'makePayment']);
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
Route::get('/document/kuzaliwa', [DocumentSealController::class, 'viapoKuzaliwa'])->name('document.kuzaliwa');
// Route::get('products','ProductController@index');
// Route::get('/products/create','ProductController@create');
// Route::post('products/store', 'ProductController@store');
Route::post('/document/save_kuzaliwa', [DocumentSealController::class, 'saveKuzaliwa'])->name('document.save_kuzaliwa');
Route::resource('products', ProductController::class);
Route::resource('services', ServiceController::class);
Route::resource('patients', PatientController::class);
Route::resource('news', PatientController::class);
Route::resource('categories', CategoryController::class);
Route::post('/generate-pdf', [DocumentSealController::class, 'generatePDF'])->name('generate.pdf');
Route::post('/generate_pdf_kuzaliwa', [DocumentSealController::class, 'generatePDFKuzaliwa'])->name('generate_pdf_kuzaliwa');


///ushauri wa kisheria//////////////
Route::get('/ushauri/ndoa', [UshauriController::class, 'ndoaCreate'])->name('ushauri.ndoa');
Route::get('/ushauri/watoto/create', [UshauriController::class, 'watotoCreate'])->name('ushauri.watoto.create');
Route::get('/ushauri/mirathi/create', [UshauriController::class, 'mirathiCreate'])->name('ushauri.mirathi.create');

Route::get('categories', [CaseCategoryController::class, 'index'])->name('categories.index');
Route::get('categories/create', [CaseCategoryController::class, 'create'])->name('categories.create');
Route::post('categories', [CaseCategoryController::class, 'store'])->name('categories.store');
Route::get('categories/{category}/edit', [CaseCategoryController::class, 'edit'])->name('categories.edit');
Route::put('categories/{category}', [CaseCategoryController::class, 'update'])->name('categories.update');
Route::delete('categories/{category}', [CaseCategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('case-assignments', [CaseAssignmentController::class, 'index'])->name('case-assignments.index');

// Show the form to assign a lawyer to a case
Route::get('case-assignments/create', [CaseAssignmentController::class, 'create'])->name('case-assignments.create');

// Store a newly created case assignment
Route::post('case-assignments', [CaseAssignmentController::class, 'store'])->name('case-assignments.store');

// Show the form to edit an existing case assignment
Route::get('case-assignments/{assignment}/edit', [CaseAssignmentController::class, 'edit'])->name('case-assignments.edit');

// Update the specified case assignment
Route::put('case-assignments/{assignment}', [CaseAssignmentController::class, 'update'])->name('case-assignments.update');
// Lawyer Performance Routes
//Route::get('admin/lawyers/performance', [LawyerController::class, 'performance'])->name('lawyers.performance');

Route::get('/chatbot', function () {
    return view('chatbot.chatbot');
})->name('chatbot.view');

Route::get('chatbot',[ChatBotController::class,'index'])->name('chatbot.index');
