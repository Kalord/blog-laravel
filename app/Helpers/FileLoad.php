<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class FileLoad
{
    public static function load(UploadedFile $file, $dir)
    {
        $fileName = $dir . Str::random(16) . '.' . $file->extension();
        $file->move(public_path($dir), $fileName);
        return $fileName;
    }
};
