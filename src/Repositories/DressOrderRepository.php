<?php

declare(strict_types=1);

namespace App\Repositories;

use \App\Models\DressOrder;

class DressOrderRepository {
    private array $orders = [];

    public function __construct(
        private \App\Services\JsonService $jsonService,
        private \App\Services\FileService $fileService)
    {
        $this->orders = $this->getAll();
    }

    public function getOrderByID(string $id): array{
        if (!isset($this->orders[$id])) 
            throw new \App\Exceptions\OrderException("Užsakymas ID=".$id." duomenų bazėje nerastas");
        return $this->orders[$id];
    }

    public function deleteOrderByID(string $id): void{
        if (!isset($this->orders[$id])) 
            throw new \App\Exceptions\OrderException("Užsakymas ID=".$id." duomenų bazėje nerastas");
        unset($this->orders[$id]);
        $this->writeAll();
    }

    public function storeOrderData(string $id, DressOrder $orderData){
        $this->orders[$id] = $orderData->getArray();
        $this->writeAll();
    }

    public function getAll(): array{
        $fileContent = $this->fileService->read();
        $decodedArray = $this->jsonService->JsonDecode($fileContent);
        return $decodedArray;
    }

    private function writeAll():void{
        $json = $this->jsonService->JsonEncode( $this->orders);
        $this->fileService->write($json);
    }
}