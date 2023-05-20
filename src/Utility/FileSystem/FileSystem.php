<?php


namespace App\Utility\FileSystem;

class FileSystem
{

    public static function readFile(string $filePath): string
    {

        $result = '';

        if (file_exists($filePath)) {
            $result = file_get_contents($filePath);
        }

        return $result;
    }
}
