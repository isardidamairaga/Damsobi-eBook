<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileUploadController extends Controller
{
    public function process(Request $request): string
    {
        // We don't know the name of the file input, so we need to grab
        // all the files from the request and grab the first file.
        /** @var UploadedFile[] $files */
        $files = $request->allFiles();

        if (empty($files)) {
            abort(422, 'No files were uploaded.');
        }

        if (count($files) > 1) {
            abort(422, 'Only 1 file can be uploaded at a time.');
        }

        // Now that we know there's only one key, we can grab it to get
        // the file from the request.
        $requestKey = array_key_first($files);

        $file = is_array($request->input($requestKey))
            ? $request->file($requestKey)[0]
            : $request->file($requestKey);

        // Store the file in a temporary location and return the location
        // for FilePond to use.
        $folder = 'tmp/' . now()->timestamp . '-' . Str::random(20);
        $fileName = \uniqid("pdf_") . '.pdf';
        $filePath = $file->storeAs($folder, $fileName);

        TemporaryFile::create([
            "file_path" => $filePath,
        ]);

        return $filePath;
    }

    public function revert(Request $request): bool
    {
        $fileId = $request->getContent();
        //use $fileId to delete file from filesystem 
        return Storage::delete($fileId);
    }
}
