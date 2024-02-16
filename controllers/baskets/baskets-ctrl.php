<?php
require_once __DIR__ . '/../../config/init.php';
require_once __DIR__ . '/../../models/Product.php';

try {
    $title = 'Panier';

    if (isset($_COOKIE['basket'])) {

        $datas = json_decode($_COOKIE['basket']);

        foreach ($datas as $item) {
            $id = $item->productId;
            $quantity = $item->quantity;
            $products = Product::getBasket($id);
            $productID[$id] = $products;
        }
    }
    

    // dd($productID);

} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__.'/../../views/templates/header.php';
    include __DIR__.'/../../views/dashboard/templates/error.php';
    include __DIR__.'/../../views/templates/footer.php';
    die;
}

include __DIR__.'/../../views/templates/header.php';
include __DIR__.'/../../views/baskets/baskets.php';
include __DIR__.'/../../views/templates/shop-hover.php';
include __DIR__.'/../../views/templates/footer.php';