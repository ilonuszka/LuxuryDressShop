<?php

declare(strict_types=1);

namespace App\Services;

class JsonService 
{
    Public function JsonEncode(array $contentArray):string{
        return (string)json_encode($contentArray, JSON_PRETTY_PRINT);
    }
    
    Public function JsonDecode($content):array{
        return (array)json_decode($content, true);
    }
}