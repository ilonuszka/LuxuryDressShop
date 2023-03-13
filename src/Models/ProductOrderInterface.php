<?php

declare(strict_types=1);

namespace App\Models;

Interface ProductOrderInterface {
    public function getProductName (): string;
    public function getProductPrice (): string;
    public function getProductSize (): string;
    public function getProductQuantity (): string;

    public function getClientFName (): string;
    public function getClientLName (): string;
    public function getClientPhone (): string;
    public function getClientEmail (): string;
    public function getDeliveryPostBox (): string;
    public function getPaymentType (): string;
}