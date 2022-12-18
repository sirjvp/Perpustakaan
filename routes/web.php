<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserBookController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/catalog', [BookController::class, 'catalog'])->name('catalog');
Route::resource('userbook', UserBookController::class)->middleware(['auth', 'verified']);

Route::group(['middleware' => 'admin','prefix' => 'admin'], function () {
    Route::resource('book', BookController::class)->middleware(['auth', 'verified']);
    Route::get('/userbook', [UserBookController::class, 'admin'])->middleware(['auth', 'verified'])->name('userbook.admin');
});
