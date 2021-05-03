<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/register', [\App\Http\Controllers\UserController::class, 'create']);
Route::post('/confirm', [\App\Http\Controllers\UserController::class, 'confirm']);
Route::get('/token', [\App\Http\Controllers\UserController::class, 'getToken']);
Route::get('/user', [\App\Http\Controllers\UserController::class, 'index']);

Route::post('/day', [\App\Http\Controllers\DayController::class, 'create']);
Route::get('/day/{date}', [\App\Http\Controllers\DayController::class, 'show']);
Route::post('/water', [\App\Http\Controllers\DayController::class, 'water']);
Route::post('/drug', [\App\Http\Controllers\DayController::class, 'drug']);
Route::post('/note', [\App\Http\Controllers\NoteController::class, 'create']);
Route::get('/food/{name}', [\App\Http\Controllers\FoodController::class, 'show']);

Route::get('/articles', [\App\Http\Controllers\ArticleController::class, 'index']);
Route::get('/stores', [\App\Http\Controllers\StoreController::class, 'index']);
