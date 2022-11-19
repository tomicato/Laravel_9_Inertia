<?php

use App\Http\Controllers\ArticlesMix;
use App\Http\Controllers\LoginMix;
use App\Http\Controllers\PortfolioController;
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
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::group(['middleware' => 'auth_mix'], function (){
    Route::resource('/portfolio', PortfolioController::class);
    Route::resource('/articles-mix', ArticlesMix::class);
    Route::post('logout-mix', [LoginMix::class, 'logout'])->name('logout.mix');
});

Route::inertia('test', 'Test')->name('test');
Route::post('login-mix', [LoginMix::class, 'login'])->name('login.mix'); // Form login
Route::inertia('login-mix', 'Auth/Login')->name('login.form');

