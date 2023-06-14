<?php

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

Route::get('register', [RegistrationController::class, 'create'])->name('register');
Route::post('register', [RegistrationController::class, 'store'])->name('register');


Route::get('/', function () {
    return view('dashboard.user.homepage');
});

Route::get('/library', function () {
    return view('dashboard.user.library');
});

Route::get('/login', function () {
    return view('auth.login');
});


Route::get('/bookpage', function () {
    return view('dashboard.user.bookpage');
});
