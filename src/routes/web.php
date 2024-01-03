<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;


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

Route::get('/', [ItemController::class, 'index']);
Route::get('/item/{id}', [ItemController::class, 'detail']);
Route::post('/search', [ItemController::class, 'search']);

// 利用者ログイン必須項目(購入、マイページ表示、出品、マイリスト登録、コメント)
Route::middleware('auth')->group(function (){
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('/item/favorite', [ItemController::class, 'favorite']);
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



// 一般利用者作成、一般利用者＆スタッフログイン機能
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'postRegister']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin']);

// 店舗代表者作成、ログイン機能　
Route::get('/register/manager', [AuthController::class, 'managerRegister']);
Route::post('/register/manager', [AuthController::class, 'postManagerRegister']);
Route::get('/login/manager', [AuthController::class, 'managerLogin']);
Route::post('/login/manager', [AuthController::class, 'postManagerLogin']);
Route::post('/logout/manager', [AuthController::class,'managerLogout']);

// 管理者作成・ログイン機能　
Route::get('/register/admin', [AuthController::class, 'adminRegister']);
Route::post('/register/admin', [AuthController::class, 'postAdminRegister']);
Route::get('/login/admin', [AuthController::class, 'adminLogin']);
Route::post('/login/admin', [AuthController::class, 'postAdminLogin']);
Route::post('/logout/admin', [AuthController::class,'adminLogout']);

// 管理者機能
Route::get('/menu/admin', [HomeController::class, 'adminMenu']);
Route::get('/delete/user', [HomeController::class, 'deleteUser']);
Route::delete('/delete/user/{id}', [HomeController::class, 'postDeleteUser']);
Route::get('/check/transaction', [HomeController::class, 'transaction']);
Route::get('/send_email', [MailController::class, 'email']);
Route::post('/send_email', [MailController::class, 'sendEmail']);

// 店舗代表者機能
Route::get('/menu/manager', [HomeController::class, 'managerMenu']);
Route::get('/register/staff', [AuthController::class, 'staffRegister']);
Route::post('/register/staff', [AuthController::class, 'postStaffRegister']);
Route::get('/delete/staff', [HomeController::class, 'deleteStaff']);
Route::delete('/delete/staff/{id}', [HomeController::class, 'postDeleteStaff']);

