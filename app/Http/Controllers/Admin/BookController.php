<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Jobs\CompressPDF;
use App\Models\Book;
use App\Models\Category;
use Error;
use Intervention\Image\Facades\Image;
use Ilovepdf\Ilovepdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    private string $iLovePDFProjectId;
    private string $iLovePDFSecret;

    public function __construct()
    {
        $this->iLovePDFProjectId = env("ILOVEPDF_PROJECT_ID");
        $this->iLovePDFSecret = env("ILOVEPDF_SECRET_KEY");
        if (!$this->iLovePDFProjectId || !$this->iLovePDFSecret) {
            throw new Error("ILOVE PDF: project id and project secret required.");
        }
    }
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
        $this->createDirectoryIfNotExist();

        // COMPRESS IMAGES FILES
        $quality = 10;
        if ($request->hasFile('cover_image')) {
            $file = $request->file("cover_image");
            $file_name = $file->getClientOriginalName();
            $img = Image::make($file);
            $storagePath = 'app/public/images/' . $file_name;
            $publicPath = "storage/images/" . $file_name;
            $compressedFilePath = \storage_path($storagePath);
            $img->save($compressedFilePath, $quality);
            $url = asset($publicPath);
            $payload['cover_url'] = $url;
        }
        $payload["book_url"] = asset("storage/" . $payload['book_file']);
        $book = Book::create($payload);

        if (!$book) {
            return back()->with("error", "Internal Server Error");
        }
        // COMPRESS PDF FILES

        $ilovepdf = new Ilovepdf($this->iLovePDFProjectId, $this->iLovePDFSecret);

        $relativeFilePath = $request->book_file;
        $absolutePath = \storage_path("app/public/" . $relativeFilePath);

        // Run compress pdf Job
        dispatch(new CompressPDF($book, $absolutePath, $ilovepdf));

        // without asyncronus upload
        // if ($request->hasFile('book_file')) {
        // $relativeFilePath = $request->file('book_file')->store("book");
        // $absolutePath = \storage_path("app/public/" . $relativeFilePath);

        // // Run compress pdf Job
        // dispatch(new CompressPDF($book, $absolutePath, $ilovepdf));
        // }

        return \redirect()->route("admin.dashboard.books.index")->with("status", "Book has been successfully created");
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
        $payload = $request->validated();
        $payload['book_url'] = \asset("storage/" . $payload['book_file']);
        $book->fill($payload);

        // COMPRESS IMAGES FILES
        // TODO: Run the compression task into a Job (asyncronusly)
        $quality = 1;
        if ($request->hasFile('cover_image')) {
            $file = $request->file("cover_image");
            $file_name = $file->getClientOriginalName();
            $img = Image::make($file);
            $compressedFilePath = \storage_path('app/public/images/' . $file_name);
            $img->save($compressedFilePath, $quality);
            $url = Storage::url($compressedFilePath);
            $payload['cover_url'] = $url;
        }

        $isUpdated =  $book->save();
        if (!$isUpdated) {
            return back()->with("error", "Oops, Update book failed. :(");
        }

        // COMPRESS PDF FILES
        $ilovepdf = new Ilovepdf($this->iLovePDFProjectId, $this->iLovePDFSecret);

        $relativeFilePath = $request->book_file;
        $absolutePath = \storage_path("app/public/" . $relativeFilePath);

        // Run compress pdf Job
        dispatch(new CompressPDF($book, $absolutePath, $ilovepdf));

        return \redirect()->route('admin.dashboard.books.index')->with("status", "Book has been successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        try {
            // delete database record
            $book->deleteOrFail();

            // delete file
            $filePath = \str_replace(\asset("storage"), "", $book->book_url);
            $deleted = Storage::delete($filePath);
            if (!$deleted) {
                throw new Error("Cannot delete the file");
            }

            return back()->with("status", "Book has been successfully deleted");
        } catch (\Throwable $th) {
            return back()->with("error", "Delete book failed: " . $th->getMessage());
        }
    }

    private function createDirectoryIfNotExist()
    {
        $dir1 = \storage_path("app/public/images");
        $dir2 = \storage_path("app/public/book");
        if (!File::isDirectory($dir1)) {
            File::makeDirectory($dir1);
        }
        if (!File::isDirectory($dir2)) {
            File::makeDirectory($dir2);
        }
    }
}
