<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AppController;
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

Route::middleware(['role'])->group(function () {
    Route::get('/', [AppController::class, 'authors'])->name('home');
    Route::get('/author/{id}', [AppController::class, 'authors_detail']);
     
    Route::get('/book', [AppController::class, 'book'])->name('book');
    Route::post('/book', [AppController::class, 'create_book']);
    Route::get('/profile', [AppController::class, 'profile'])->name('profile');
    Route::get('/logout', function () {
        Auth::logout();
        session()->flush();
        return redirect('/login');
    })->name('logout');

});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');





