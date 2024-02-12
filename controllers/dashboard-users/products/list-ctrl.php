<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Product.php';

SessionAuth::producer();

try {
    $title = 'Liste des produits';

    $id_producer = $_SESSION['user']->id_user;
    $products = Product::getAllProductsProducers($id_producer);

    // $products = Product::getAll(); 

} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/templates/footer.php';
    die;
}

include __DIR__ . '/../../../views/templates/header.php';
include __DIR__ . '/../../../views/dashboard-users/products/list.php';
include __DIR__ . '/../../../views/templates/shop-hover.php';
include __DIR__ . '/../../../views/templates/footer.php';