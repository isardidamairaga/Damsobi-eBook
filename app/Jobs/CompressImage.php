<?php

namespace App\Jobs;

use App\Models\Book;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CompressImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private string $absolutePath;
    private Book $book;
    /**
     * Create a new job instance.
     */
    public function __construct(mixed $book, string $absolutePath)
    {
        $this->book = $book;
        $this->absolutePath = $absolutePath;
        
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $quality = 10;
        $img = Image::make($this->absolutePath);
        $compressedFilePath = \storage_path('app/public/images/' . \uniqid("compressed_"));
        $img->save($compressedFilePath, $quality);
        $url = Storage::url($compressedFilePath);
        unlink($this->absolutePath);

        $this->book->fill([
            "book_url" => $url
        ])->saveOrFail();
    }
}
