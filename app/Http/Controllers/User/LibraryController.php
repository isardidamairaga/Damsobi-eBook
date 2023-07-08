<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Laravisit\Traits\Visits;
use Laravisit\Facades\VisitCounter;
use Laravisit\Traits\Visitable;
use Illuminate\Http\Request;
use App\Models\Category;

class LibraryController extends Controller
{
    public function index()
    {
        $Category = Category::all();
        $Book = Book::paginate(20);
        foreach ($Book as $book) {
            $totaldibaca = $book->visits()->count();
            $book->totaldibaca = $totaldibaca;
        }
        return \view("dashboard.user.library",compact('Category','Book'));
    }

    public function show(Book $book)
    {
       $totaldibaca = $book->visits()->count();
       return \view('dashboard.user.bookpage',compact('book','totaldibaca'));
    }

    public function read (Book $book){
        $book->visit()->withIp();
        return \view('dashboard.user.readpage',compact('book'));
    }

}
