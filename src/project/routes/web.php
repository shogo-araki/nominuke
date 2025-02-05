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

Route::get('/', function () {
    return view('index');
});

Auth::routes();
Route::get('/', App\Http\Controllers\IndexController::class);
Route::get('/sound', [App\Http\Controllers\Sound\SoundController::class, 'index']);
Route::get('/sound/add', [App\Http\Controllers\Sound\SoundController::class, 'add']);
Route::post('/sound/add', [App\Http\Controllers\Sound\SoundController::class, 'store']);