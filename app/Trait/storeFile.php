<?php

namespace App\Trait;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

trait storeFile
{

    public function storeFile(UploadedFile $file, $folder = null): bool|string
    {
        $fileName = time() . '_' . $file->getClientOriginalName();

         $file->storeAs("public/{$folder}/{$fileName}");

        return $fileName;
    }

    public function deleteFile($filename, $folder): void
    {
       if(File::exists("storage/{$folder}/{$filename}")){
        File::delete("storage/{$folder}/{$filename}");
       }
    }



}