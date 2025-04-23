<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::post('user/login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout']);

Route::get('register', [RegisterController::class, 'register']);
Route::post('user/register', [RegisterController::class, 'store']);

Route::prefix('users/')->group(function(){

    Route::get('store', [UserController::class, 'store']);
    Route::get('list', [UserController::class, 'index']);
    Route::get('update/{id}', [UserController::class, 'update']);
    Route::get('delete/{id}', [UserController::class, 'delete']);
    Route::get('delete/{id}', [UserController::class, 'delete']);
    Route::get('{id}', [UserController::class, 'show']);
});

