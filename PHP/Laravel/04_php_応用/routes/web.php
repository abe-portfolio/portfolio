<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CafeController;

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
//    return view('welcome');
//});

Route::get('/', [CafeController::class,'index']);
Route::get('/index', [CafeController::class,'index']);


// トップページ表示
Route::get('/', function () {
    return view('index');
});

//Route::get('/contact', 'CafeController@contact');
Route::get('/contact', [CafeController::class,'contact']);

//Route::post('/confirm', 'CafeController@confirm');
Route::post('/confirm', [CafeController::class,'confirm']);

//Route::post('/complete', 'CafeController@create');
Route::post('/complete', [CafeController::class,'create']);
Route::get('/complete', function(){
    return view('complete');
});

//Route::get('edit/{id}/', 'CafeController@edit_index');
//Route::patch('edit/{id}/','CafeController@edit_confirm');
//Route::post('edit/{id}/', 'CafeController@edit_finish');
Route::get('/update/{id}/', [CafeController::class,'update']);
Route::post('/updatecomp', [CafeController::class,'updatecomp']);
// Route::post('/update/{id}/', [CafeController::class,'updatecomp']);

/**
 * 削除
 */
//Route::post('delete/{id}/', 'CafeController@delete');
Route::post('/delete/{id}/', [CafeController::class,'delete']);
?>