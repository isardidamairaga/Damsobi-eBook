<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    function __construct()
    {
        $this->middleware("is.admin");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view("dashboard.admin.addbook");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBookRequest $request): RedirectResponse
    {
        $payload = $request->validated();
        
        $book = Book::create($payload);
        if(!$book) {
            return back()->with("message", "Internal Server Error");
        }
        
        // TODO: ganti redirect sesuai keinginan
        return \redirect("/dashboard/books")->with("success", "Book has been successfully created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
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
            
            return redirect("books")->with("success", "Book has been successfully deleted");
        } catch (\Throwable $th) {
            return back()->with("error", "Delete book failed: " . $th->getMessage());
        }
    }
}
