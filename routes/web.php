<?php

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
    return view('registration');
})->name('register');
Route::get('/login', function () {
    return view('login');
    })->name('login');

    Route::post('/register', [UserController::class, 'registerUser'])->name('register');
    Route::post('/login', [UserController::class, 'loginUser'])->name('login');
    Route::view('/dashboard', 'dashboard');