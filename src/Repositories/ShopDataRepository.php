<?php

declare(strict_types=1);

namespace App\Repositories;

class ShopDataRepository {

    private array $availableDresses = [
        "Dior / 1200 Eur",
        "Chanel / 1000 Eur",
        "Ysl / 1300 Eur",
        "Bottega / 1100 Eur",
        "Venetta / 900 Eur",
    ];

    private array $availableSizes = [
        "XS",
        "S",
        "M",
        "L",
    ];

    private array $availablePostBoxes = [
        "Omniva - Didlaukio 1, Vilnius",
        "DPD - Didlaukio 7, Vilnius",
        "Venipak - Ateities 17, Vilnius"
    ];

    private array $availablePaymentTypes = [
        "Grynieji pinigai",
        "Pavedimas",
        "Banko kortelė"
    ];

    public function getAvailableDresses(): array{
        return $this->availableDresses;
    }
    public function getAvailableSizes(): array{
        return $this->availableSizes;
    }
    public function getAvailablePostBoxes(): array{
        return $this->availablePostBoxes;
    }
    public function getAvailablePaymentTypes(): array{
        return $this->availablePaymentTypes;
    }
}