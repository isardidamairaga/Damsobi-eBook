<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $books = Book::where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('author', 'LIKE', '%' . $query . '%')
            ->get();

        return view('dashboard.user.search', compact('books'));
    }

    public function category(Request $request)
    {
        $selectedCategory = $request->input('category');

        // Lakukan logika filter berdasarkan kategori yang dipilih
        if ($selectedCategory) {
            $books = Book::where('category_id', $selectedCategory)->get();
        } else {
            $books = Book::all();
        }
        return view('dashboard.user.category', compact('books'));
    }
}
