<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistrationController;
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
    return view('dashboard.admin.dashboard');
});

Route::get('/library', function () {
    return view('dashboard.user.library');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', LogoutController::class)->name('logout');
});

Route::get('/bookpage', function () {
    return view('dashboard.user.bookpage');
});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegistrationControllertroller::class, 'create'])->name('register');
    Route::post('register', [RegistrationController::class, 'store']);

    Route::get('login', [LoginControllertroller::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});
