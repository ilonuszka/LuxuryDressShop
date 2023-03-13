<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';
//SUKURIU KONTEINERI IR PERDUODU JI I ROUTERI PER DI.
$DIContainer = new \App\Framework\DIContainer();
$router = new \App\Framework\Router($DIContainer);//1.kuriam rauteri, kuriam per dependency in paduodam DI cont.
//2.kvieciam rauterio metoda registerRoute , 3. metode suregistruojam, koki kelia gavus koki kontroleri ir kuri jo metoda
//kviesti. kur yra localhost tenais uzdejus / download ir kita, meta i kontrolrio metoda
$router
    ->registerRoute('GET' ,'',\App\Controllers\HomeController::class, 'homeScreen')//pagrindinis langas
    ->registerRoute('POST','/order',\App\Controllers\OrderController::class, 'choseProduct')//naujas uzsakymas 1 zingsnus
    ->registerRoute('POST','/delivery',\App\Controllers\OrderController::class, 'deliveryDetails')//naujas uzsakymas 2 zingsns
    ->registerRoute('GET' ,'/edit',\App\Controllers\OrderController::class, 'editOrder')//edit mygtukas keisti
    ->registerRoute('POST','/submit',\App\Controllers\OrderController::class, 'submitOrder')//uzrasas jusu duomenys sekmingai priimti
    ->registerRoute('POST','/delete',\App\Controllers\OrderController::class, 'deleteOrder')//delete mygtukas
    ->registerRoute('GET','/download',\App\Controllers\OrderController::class, 'downloadOrdersCSV');
//toliau ikvieciu routerio metoda process,kuriam paduodu reguest url ir requesto metoda, ir jisai viduje
//atrinks kuri kontroleri sukkurti ir uri kontroleri iskviesti (frameworks folderis)
$router->process($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);