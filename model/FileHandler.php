<?php

class FileHandler
{

    public function create($content, $file = "bla.txt")
    {
        $handle = fopen($file, "w");
        fwrite($handle, $content);
        return $file;
    }

    public function read($file)
    {
        $handle = fopen($file, "r");
        return fread($handle, filesize($file) + 1);
    }

    public function update($content, $file)
    {
        $handle = fopen($file, "w+");
        return fwrite($handle, $content);
    }
    
    public function delete($file)
    {
        return unlink($file);
    }
}
