<?php
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../models/Product.php';

try {
    
    // Récupération du paramètre d'URL correspondant à l'id
    $id_product = intval(filter_input(INPUT_GET, 'idproduct', FILTER_SANITIZE_NUMBER_INT));
    $product = Product::get($id_product);
    
    $title = $product->product_name;

    $products = Product::getAllbyFour(valid: true, online: true);


} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__.'/../views/templates/header.php';
    include __DIR__.'/../views/dashboard/templates/error.php';
    include __DIR__.'/../views/templates/footer.php';
    die;
}

include __DIR__.'/../views/templates/header.php';
include __DIR__.'/../views/product-sheet.php';
include __DIR__.'/../views/templates/shop-hover.php';
include __DIR__.'/../views/templates/footer.php';