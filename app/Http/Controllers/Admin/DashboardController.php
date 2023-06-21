<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Spatie\Activitylog\LogOptions;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalFiksi = Book::whereHas('category', function ($query) {
            $query->where('category', 'Fiksi');
        })->count();
        $totalNonFiksi = Book::whereHas('category', function ($query) {
            $query->where('category', 'Non Fiksi');
        })->count();

        return \view("dashboard.admin.dashboard", compact('totalBooks', 'totalFiksi', 'totalNonFiksi'));
    }
}
