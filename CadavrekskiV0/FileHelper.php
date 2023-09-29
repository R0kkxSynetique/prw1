<?php

class FileHelper
{
    public function __construct()
    {
        if (!file_exists(getenv('STORAGE_FILE_PATH'))) {
            file_put_contents(getenv('STORAGE_FILE_PATH'), '');
        }
    }

    public function getVerses()
    {
        $lines = file(getenv('STORAGE_FILE_PATH'));
        return $lines;
    }

    public function addVerse($lines)
    {
        file_put_contents(getenv('STORAGE_FILE_PATH'), $lines."\n", FILE_APPEND);
    }
}
