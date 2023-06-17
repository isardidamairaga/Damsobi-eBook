<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Admin\BookController;
use Illuminate\Support\Facades\Auth;
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

Route::as("dashboard.")
    ->prefix("dashboard")
    ->middleware(['auth', 'is.admin'])
    ->group(function () {
        Route::resource("books", BookController::class)->names("books");
    });

Auth::routes();

Route::prefix("testing")->group(function () {
    Route::get('/addbook', function () {
        return view('dashboard.admin.addbook');
    });
});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegistrationController::class, 'create'])->name('register');
    Route::post('register', [RegistrationController::class, 'store']);

    // Route::get('login', [LoginController::class, 'create'])->name('login');
    // Route::post('login', [LoginController::class, 'store']);
});