<?php

declare(strict_types=1);

namespace App\Services;

class FileService 
{
    private string $fileName = __DIR__.'/../../orders.json';

    public function read():string{
        if(file_exists($this->fileName))
            $content = file_get_contents($this->fileName);
        else $content = null;
        return $content?$content:'';
    }

    public function write(string $content):bool{
        return (bool)file_put_contents($this->fileName, $content);
    }
}