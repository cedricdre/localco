<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Product.php';

SessionAuth::producer();

try {
    // Récupération du paramètre d'URL correspondant à l'id du produit cliquée
    $id_product = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    $isDeleted = Product::deletePicture($id_product);

    if ($isDeleted) {
        header('location: /controllers/dashboard-users/products/update-ctrl.php?idproduct='.$id_product);
        die;
    }

} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}

