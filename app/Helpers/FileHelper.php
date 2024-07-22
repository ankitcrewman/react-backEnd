<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;

class FileHelper
{
    /**
     * Handle the file upload and storage.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @param  string  $directory
     * @return string
     */
    public static function uploadFile(UploadedFile $file, $directory)
    {
        return $file->store($directory, 'public');
    }
}
