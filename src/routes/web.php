<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;

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
// ユーザー認証

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'postRegister']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin']);

Route::middleware('auth')->group(function (){
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/item/favorite', [ItemController::class, 'favorite']);
});

Route::get('/', [ItemController::class, 'index']);
Route::get('/item/{id}', [ItemController::class, 'detail']);

