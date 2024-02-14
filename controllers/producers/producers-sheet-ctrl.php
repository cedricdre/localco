<?php
require_once __DIR__ . '/../../config/init.php';
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../models/Product.php';

try {
    $id_producer = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $producer = User::get($id_producer);
    
    $title = $producer->company_name;

    $products = Product::getAllbyPublic(producer: $id_producer, valid: true, online: true);

} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__.'/../../views/templates/header.php';
    include __DIR__.'/../../views/dashboard/templates/error.php';
    include __DIR__.'/../../views/templates/footer.php';
    die;
}

include __DIR__.'/../../views/templates/header.php';
include __DIR__.'/../../views/producers/producers-sheet.php';
include __DIR__.'/../../views/templates/shop-hover.php';
include __DIR__.'/../../views/templates/footer.php';