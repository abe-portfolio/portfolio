<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SwipeController;
use App\Http\Controllers\MatchController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ChatController;



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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/myPage', [App\Http\Controllers\HomeController::class, 'index2']);

Route::get('/login-page', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login-page');

Route::group(['middleware' => 'auth'],function(){
    Route::get('',[UserController::class,'index']);

    Route::get('/users',[UserController::class,'index'])->name('users.index');

    Route::post('/swipes',[SwipeController::class,'store'])->name('swipes.store');

    Route::get('/matches',[MatchController::class,'index'])->name('matches.index');

    //退会処理と退会キャンセル処理
    Route::get('/withdrawal', [UserController::class,'delete'])->name('user.delete');
    Route::post('/withdrawal', [UserController::class,'destroy'])->name('user.destroy');
    Route::post('/withdrawal/cancel', [UserController::class,'destroy_cancel'])->name('user.destroy_cancel');

    //管理者ーユーザー一覧取得と削除
    Route::get('/users_for_admin',[UserController::class,'index_for_admin'])->name('users.for_admin');
    Route::delete('/users_for_admin/{id}', [UserController::class,'UserDestroy'])->name('users.destroy');

    //編集画面の表示とアップデート
    Route::get('/mypage/edit', [UserController::class, 'edit'])->name('mypage.edit');
    Route::put('/mypage/update', [UserController::class, 'update'])->name('mypage.update');
    Route::post('/mypage/update/cancel', [UserController::class, 'update_cancel'])->name('mypage.update_cancel');

    //お問い合わせ画面の表示と送信
    Route::get('/contact', [UserController::class, 'contact'])->name('contact.page');
    Route::post('/contact/complete', [UserController::class, 'contact_submit'])->name('contact.submit');
    Route::post('/contact/complete/return', [UserController::class, 'back_page'])->name('return.mypage');
    Route::post('/contact/cancel', [UserController::class, 'contact_cancel'])->name('contact.cancel');

    //(管理者用)お問い合わせ一覧表示
    Route::get('/contact/all', [UserController::class, 'contacts'])->name('contact.all');
    Route::post('/contact/detail', [UserController::class, 'contact_detail'])->name('contact.detail');
    Route::get('/contact/detail/return', [UserController::class, 'back_contacts'])->name('return.contacts');

    //chatifyへの遷移
    Route::get('/chat/{id}', [ChatController::class, 'index'])->name('chat.show');

    Route::get('/head-links', function () {
        $id = 1; // ユーザーIDを設定
        $dark_mode = 'dark'; // ダークモードの設定
        return view('vendor.Chatify.layouts.headLinks', compact('id', 'dark_mode'));
    });
});
?>