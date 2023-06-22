<?php

namespace App\Jobs;

use App\Models\Book;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Ilovepdf\Ilovepdf;

class CompressPDF implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $absolutePath;
    private Ilovepdf $ilovepdf;
    private Book $book;
    /**
     * Create a new job inupstance.
     */
    public function __construct(mixed $book, string $absolutePath, Ilovepdf $ilovepdf)
    {
        // Cek apakah $book adalah instance dari model Book
        $this->book = $book;
        $this->absolutePath = $absolutePath;
        $this->ilovepdf = $ilovepdf;
    }
    /**
     * Get the middleware the job should pass through.
     *
     * @return array<int, object>
     */
    public function middleware(): array
    {
        return [new WithoutOverlapping($this->book->id)];
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $task = $this->ilovepdf->newTask('compress');
        $task->setCompressionLevel('extreme');
        $task->addFile($this->absolutePath);
        $task->setOutputFilename(uniqid("compressed_"));
        $task->execute();
        $downloadPath = storage_path('app/public/book/');
        $task->download($downloadPath);
        $url = Storage::url($downloadPath);
        unlink($this->absolutePath);

        $this->book->fill([
            "book_url" => $url
        ])->saveOrFail();
    }
}
