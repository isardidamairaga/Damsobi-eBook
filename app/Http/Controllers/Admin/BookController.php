<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Category;
use Intervention\Image\Facades\Image;
use Ilovepdf\Ilovepdf;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    /**
     * Show all resources.
     */
    public function index()
    {
        $Book = Book::paginate(10);
        return \view("dashboard.admin.addbook", compact('Book'));
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
        // COMPRESS IMAGES FILES
        $x = 1;
        if ($request->hasFile('cover_url')) {
            $file = $request->file("cover_url");
            $file_name = $file->getClientOriginalName();
            $img = Image::make($file);
            $img->save(storage_path('app/public/images/' . $file_name), $x);
        }
        // COMPRESS PDF FILES
        $ilovepdf = new Ilovepdf('project_public_e59f032d21506888e88728f5e4779b86_l1mjT54cc0c1846605ba3c4267f771c217193', 'secret_key_886a13d92a554ea208991863325a36c6_ChLQG0061b50bc3e469dc370825627c102fa6');
        if ($request->hasFile('book_url')) {
            $file = $request->file('book_url');
            $upload = $file->store('book');
            $file_name = $file->getClientOriginalName();
            $task = $ilovepdf->newTask('compress');
            $task->setCompressionLevel('extreme');
            $task->addFile(storage_path('app/public/' . $upload));
            $task->setOutputFilename($file_name);
            $task->execute();
            $downloadPath = storage_path('app/public/book/');
            $task->download($downloadPath);
            unlink(storage_path('app/public/' . $upload));
        }
        $book = Book::create($payload);
        if (!$book) {
            return back()->with("error", "Internal Server Error");
        }

        // TODO: ganti redirect sesuai keinginan
        return \redirect("/dashboard/books")->with("status", "Book has been successfully created");
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
        $categories = Category::all(["id", "category"]);
        return view("dashboard.admin.book.update", ['book' => $book, "categories" => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->fill($request->validated());
        $isUpdated =  $book->save();
        if (!$isUpdated) {
            return back()->with("error", "Oops, Update book failed. :(");
        }

        return \redirect("dashboard/books")->with("status", "Book has been successfully updated.");
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
    public function compressPdf($inputPath, $outputPath)
    {
    }
}
