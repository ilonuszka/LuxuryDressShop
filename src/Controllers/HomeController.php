<?php

declare(strict_types=1);

namespace App\Controllers;

class HomeController {
//Vienintelis parametras yra per DI paduodamas dressorderrepository
    public function __construct(private \App\Repositories\DressOrderRepository $dressOrderRepository){}
    
    public function homeScreen(){
        $orders = $this->dressOrderRepository->getAll();//istraukia visus irasus ir priskiria kintamajam orders ir
        //requirine view kuriam bus pasiekiamas kintamasis orders
        require __DIR__.'/../../views/orders/homeScreen.php';
    }
}