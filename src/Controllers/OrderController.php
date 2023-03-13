<?php

declare(strict_types=1);

namespace App\Controllers;

use \App\Models\DressOrder;

class OrderController {

    public function __construct(
        private \App\Repositories\DressOrderRepository $orderRepository,
        private \App\Repositories\ShopDataRepository $shopDataRepository
    ){}
    
    public function choseProduct(){
        require __DIR__.'/../../views/orders/newOrderStep1.php';
    }

    public function deliveryDetails(){
        $order = DressOrder::createFromPost($_POST);
        require __DIR__.'/../../views/orders/newOrderStep2.php';
    }

    public function editOrder(){
        $orderID= isset($_GET['id']) ? $_GET['id'] : '';
        $order = $this->orderRepository->getOrderByID($orderID);
        require __DIR__.'/../../views/orders/editOrder.php';
    }

    public function deleteOrder(){
        $orderID= isset($_POST['id']) ? $_POST['id'] : '';
        $order = $this->orderRepository->deleteOrderByID($orderID);
        $message = "Užsakymas sėkmingai ištrintas!";
        require __DIR__.'/../../views/orders/success.php';
    }

    public function submitOrder(){
        $order = DressOrder::createFromPost($_POST);
        $uniqueID = isset($_POST['id']) ? $_POST['id'] : uniqid();
        $this->orderRepository->storeOrderData($uniqueID, $order);
        $message = isset($_POST['id']) 
            ? "Užsakymo duomenys sėkmingai atnaujinti!"
            : "Mokėjimas sėkmingai apdorotas ir priimtas!";
        require __DIR__.'/../../views/orders/success.php';
    }

    public function downloadOrdersCSV(){
        if(isset($_REQUEST["file"])){
            $file = urldecode($_REQUEST["file"]);
            $filepath = __DIR__ . "/../../" . $file;
            $orders = $this->orderRepository->getAll();
            $csv='ID;ProductName;ProductPrice;ProductSize;ProductQuantity;ClientFName;ClientLName;ClientPhone;ClientEmail;DeliveryPostBox;PaymentType'.PHP_EOL;
            foreach ($orders as $key => $order) $csv.=
                $key.';'.
                $order['ProductName'].';'.
                $order['ProductPrice'].';'.
                $order['ProductSize'].';'.
                $order['ProductQuantity'].';'.
                $order['ClientFName'].';'.
                $order['ClientLName'].';'.
                $order['ClientPhone'].';'.
                $order['ClientEmail'].';'.
                $order['DeliveryPostBox'].';'.
                $order['PaymentType'].PHP_EOL;
            file_put_contents($filepath,$csv);
            if(preg_match('/^[^.][-a-z0-9_.]+[a-z]$/i', $file)){
                if(file_exists($filepath)) {
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($filepath));
                    flush();
                    readfile($filepath);
                    unlink($filepath);
                    die();
                } else {
                    http_response_code(404);
                    die();
                }
            } else {
                die("Invalid file name!");
            }
        }
    }

}