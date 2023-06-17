<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    /**
     * Show all resources.
     */
    public function index()
    {
        return \view("dashboard.admin.addbook");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(["id", "category"]);
        return \view("dashboard.admin.book.create", ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBookRequest $request): RedirectResponse
    {
        $payload = $request->validated();
        
        $book = Book::create($payload);
        if(!$book) {
            return back()->with("error", "Internal Server Error");
        }
        
        // TODO: ganti redirect sesuai keinginan
        return \redirect("dashboard.books.index")->with("status", "Book has been successfully created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
         return view("dashboard.admin.addbook", \compact($book));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->fill($request->validated());
        $isUpdated =  $book->save();
        if(!$isUpdated) {
            return back()->with("error", "Oops, Update book failed. :(");
        }
        
        return \redirect("books")->with("status", "Book has been successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        try {
            $book->deleteOrFail();
            
            return back()->with("status", "Book has been successfully deleted");
        } catch (\Throwable $th) {
            return back()->with("error", "Delete book failed: " . $th->getMessage());
        }
    }
}
