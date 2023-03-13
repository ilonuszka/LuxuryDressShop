<?php

declare(strict_types=1);

namespace App\Controllers;

class ExceptionController {
    public function displayOrderError(string $message): void{
        require __DIR__.'/../../views/errors/orderError.php';
    }
}