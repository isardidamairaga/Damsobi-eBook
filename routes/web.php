<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\User\LibraryController;
use App\Http\Controllers\User\SearchController;
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

Route::as("dashboard.")
    ->prefix("dashboard")
    ->middleware(['auth','web','activity'])
    ->group(function () {
        Route::get('/', function () {
            
            return view('dashboard.user.homepage');
        });
        Route::get('library', [LibraryController::class, 'index'])->name("library");
        Route::get('/search', [SearchController::class, 'index'])->name("search");
        Route::get('/filter', [SearchController::class, 'category'])->name('filter');
        Route::get('book/{book}', [LibraryController::class, 'show'])->name("bookpage");
        Route::get('read/{book}', [LibraryController::class, 'read'])->name("read");
    });


Auth::routes();



Route::as("admin.dashboard.")
    ->prefix("admin/dashboard")
    ->middleware(['auth', 'is.admin'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
        Route::resource("books", BookController::class)->names("books");
    });
    
Route::post('uploads/process', [FileUploadController::class, 'process'])->name('uploads.process');
Route::delete('uploads/revert', [FileUploadController::class, 'revert'])->name('uploads.revert');


Route::get('/', function () {
    return to_route('login');
});


Route::middleware('guest')->group(function () {
    Route::get('register', [RegistrationController::class, 'create'])->name('register');
    Route::post('register', [RegistrationController::class, 'store']);
    // Route::get('login', [LoginController::class, 'create'])->name('login');
    // Route::post('login', [LoginController::class, 'store']);
});

Route::middleware(['auth','web','activity'])->group(function () {
    Route::post('logout', LogoutController::class)->name('logout');
});
