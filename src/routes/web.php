<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;

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
    Route::get('/purchase/{id}', [ItemController::class, 'purchase']);
    Route::post('/purchase/{id}', [ItemController::class, 'getItem']);
    Route::get('/sell', [ItemController::class, 'list']);
    Route::post('/sell/{id}', [ItemController::class, 'sell']);

    Route::post('/favorite_add/{id}', [FavoriteController::class, 'addFavorite']);
    Route::delete('/favorite_delete/{id}', [FavoriteController::class, 'deleteFavorite']);

    Route::get('/comment/{id}', [CommentController::class, 'comment']);
    Route::post('/comment/{id}', [CommentController::class, 'commentTo']);
    Route::delete('/comment/delete/{id}', [CommentController::class, 'deleteComment']);

    Route::get('/purchase/address/{id}', [ProfileController::class, 'address']);
    Route::post('/purchase/address/{id}', [ProfileController::class, 'createAddress']);
    Route::get('/mypage/profile/{id}', [ProfileController::class, 'editAddress']);
    Route::put('/mypage/profile/{id}', [ProfileController::class, 'postEditAddress']);
    Route::get('/mypage', [ProfileController::class, 'soldItem']);
    Route::get('/mypage/buy', [ProfileController::class, 'boughtItem']);

});

Route::get('/', [ItemController::class, 'index']);
Route::get('/item/{id}', [ItemController::class, 'detail']);
Route::post('/search', [ItemController::class, 'search']);

