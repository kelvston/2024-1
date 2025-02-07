<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/testing',function(){
    return ['message'=>'helloo'];
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/chatbot', function (Request $request) {
    $response = \Illuminate\Support\Facades\Http::post('http://127.0.0.1:5001/chat', [
        'message' => $request->input('message'),
    ]);
    return response()->json($response->json());
});

