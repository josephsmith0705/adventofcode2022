<?php

class FileReader
{
    public static function fetch(string $fileName) : array
    {
        $data = file_get_contents('../Data/' . $fileName . '.txt');
        return explode(PHP_EOL, $data);
    }
}