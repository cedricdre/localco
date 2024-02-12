<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Product.php';

SessionAuth::admin();

try {
    // Récupération du paramètre d'URL correspondant à l'id de la catégorie cliquée
    $id_product = intval(filter_input(INPUT_GET, 'idproduct', FILTER_SANITIZE_NUMBER_INT));

    $pickup = Product::get($id_product);

    // Appel de la méthode delete
    $isDelete = Product::delete($id_product);

    // Si la méthode a retourné "true", alors on redirige vers la liste
    if ($isDelete) {
        header('location: /controllers/dashboard/products/list-ctrl.php');
        die;
    }
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}

