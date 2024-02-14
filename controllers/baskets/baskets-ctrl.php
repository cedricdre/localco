<?php
require_once __DIR__ . '/../../config/init.php';
require_once __DIR__ . '/../../models/Basket.php';

try {
    $title = 'Panier';

    // $basketUser = Basket::getAllbyBasket();

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