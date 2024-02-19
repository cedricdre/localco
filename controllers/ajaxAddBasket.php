<?php
require_once __DIR__ . '/../config/init.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $product = filter_input_array(INPUT_POST, [
        "productId" => FILTER_SANITIZE_NUMBER_INT,
        "quantity" => FILTER_SANITIZE_NUMBER_INT,
    ]);

    $product = (object) $product;


    if (isset($_COOKIE['basket'])) {

        $datas = json_decode($_COOKIE['basket']);

        $productIndex = -1; // point de départ, tableau commence à 0
        foreach ($datas as $index => $item) {
            if ($item->productId == $product->productId) {
                $productIndex = $index;
                break;
            }
        }

        if ($productIndex !== -1) {
            $datas[$productIndex]->quantity = $product->quantity;
        } else {
            $datas[] = $product;
        }
    } else {
        $datas = [$product];
    }

    // Sérialiser le tableau en JSON et définir le cookie
    setcookie('basket', json_encode($datas), time() + 86400, "/");

    echo json_encode(true);
}


