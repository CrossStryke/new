<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;

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
Route::get('/hello', function () {
    return "Hello World!";
  });

Route::post('/reverse-me', function (Request $request) {
  $reversed = strrev($request->input('reverse_this'));
  return $reversed;
});

Route::resource('sales', 'SalesController');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
