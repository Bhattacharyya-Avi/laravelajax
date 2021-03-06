<?php

use App\Http\Controllers\AjaxController;
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
    return view('welcome');
});

Route::get('/ajax/r',[AjaxController::class,'ajaxr'])->name('ajax.c');
Route::get('/all/user',[AjaxController::class,'allUser'])->name('all.user');
Route::post('/user/store',[AjaxController::class,'userPost'])->name('user.post');
Route::get('/user/edit/{id}',[AjaxController::class,'userEdit'])->name('user.edit');
Route::post('/user/store/{id}',[AjaxController::class, 'userUpdate'])->name('user.update');
Route::get('/user/delete/{id}', [AjaxController::class, 'deleteUser'])->name('user.delete');