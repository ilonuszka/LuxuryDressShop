<?php

declare(strict_types=1);

namespace App\Models;
//IMPLEMENTINA INTERFACE
class DressOrder implements ProductOrderInterface
{
    // private string $ID = '';
    private string $ProductName = '';
    private string $ProductPrice = '';
    private string $ProductSize = '';
    private string $ProductQuantity = '';
    private string $ClientFName = '';
    private string $ClientLName = '';
    private string $ClientPhone = '';
    private string $ClientEmail = '';
    private string $DeliveryPostBox = '';
    private string $PaymentType = '';

    public function __construct(
        // string $ID,
        string $ProductName,
        string $ProductPrice,
        string $ProductSize,
        string $ProductQuantity,
        string $ClientFName,
        string $ClientLName,
        string $ClientPhone,
        string $ClientEmail,
        string $DeliveryPostBox,
        string $PaymentType)
    {
        // $this->ID = $ID;
        $this->ProductName = $ProductName;
        $this->ProductPrice = $ProductPrice;
        $this->ProductSize = $ProductSize;
        $this->ProductQuantity = $ProductQuantity;
        $this->ClientFName = $ClientFName;
        $this->ClientLName = $ClientLName;
        $this->ClientPhone = $ClientPhone;
        $this->ClientEmail = $ClientEmail;
        $this->DeliveryPostBox = $DeliveryPostBox;
        $this->PaymentType = $PaymentType;
    }

    public static function createFromPost(array $postArray): self {
        $ProductName = isset($postArray['dress_name']) ? explode(' / ',$postArray['dress_name'])[0] : '';
        $ProductPrice = isset($postArray['dress_name']) ? explode(' / ',$postArray['dress_name'])[1] : '';
        $ProductSize = isset($postArray['size']) ? $postArray['size'] : '';
        $ProductQuantity = isset($postArray['stock']) ? $postArray['stock'] : '';
        
        $ClientFName = isset($postArray['fname']) ? $postArray['fname'] : '';
        $ClientLName = isset($postArray['lname']) ? $postArray['lname'] : '';
        $ClientPhone = isset($postArray['phone']) ? $postArray['phone'] : '';

        $ClientEmail = isset($postArray['email']) ? $postArray['email'] : '';
        $DeliveryPostBox = isset($postArray['post_box']) ? $postArray['post_box'] : '';
        $PaymentType = isset($postArray['payment_type']) ? $postArray['payment_type'] : '';

        return new static(
            $ProductName,
            $ProductPrice,
            $ProductSize,
            $ProductQuantity,
            $ClientFName,
            $ClientLName,
            $ClientPhone,
            $ClientEmail,
            $DeliveryPostBox,
            $PaymentType);
    }

    public function getProductName (): string
    {
        return $this->ProductName;
    }
    public function getProductPrice (): string
    {
        return $this->ProductPrice;
    }
    public function getProductSize (): string
    {
        return $this->ProductSize;
    }
    public function getProductQuantity (): string
    {
        return $this->ProductQuantity;
    }

    public function getClientFName (): string
    {
        return $this->ClientFName;
    }
    public function getClientLName (): string
    {
        return $this->ClientLName;
    }
    public function getClientPhone (): string
    {
        return $this->ClientPhone;
    }
    public function getClientEmail (): string
    {
        return $this->ClientEmail;
    }
    public function getDeliveryPostBox (): string
    {
        return $this->DeliveryPostBox;
    }
    public function getPaymentType (): string
    {
        return $this->PaymentType;
    }
    public function getArray (): array
    {
        return $orderArray = [
            'ProductName' => $this->ProductName,
            'ProductPrice' => $this->ProductPrice,
            'ProductSize' => $this->ProductSize,
            'ProductQuantity' => $this->ProductQuantity,
            'ClientFName' => $this->ClientFName,
            'ClientLName' => $this->ClientLName,
            'ClientPhone' => $this->ClientPhone,
            'ClientEmail' => $this->ClientEmail,
            'DeliveryPostBox' => $this->DeliveryPostBox,
            'PaymentType' => $this->PaymentType
        ];
    }

}