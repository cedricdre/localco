<?php
require_once __DIR__ . '/../config/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // $productId = filter_input(INPUT_POST, 'productId', FILTER_SANITIZE_NUMBER_INT);
    // $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT);


    $product = filter_input_array(INPUT_POST, [
        "productId" => FILTER_SANITIZE_NUMBER_INT,
        "quantity" =>FILTER_SANITIZE_NUMBER_INT,
    ]);

    $product = (object) $product;

    
    $datas[] = $product;
    
    setcookie('basket', json_encode($datas), time() + 86400, "/");

    echo json_encode(true);
}