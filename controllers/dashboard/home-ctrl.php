<?php
require_once __DIR__ . '/../../models/Pickup.php';
require_once __DIR__ . '/../../models/Type.php';
require_once __DIR__ . '/../../models/Product.php';

SessionAuth::admin();

try {
    $title = 'Accueil';

    $pickups = Pickup::getAll();
    $types = Type::getAll();
    // $products = Product::getAll(); A revoir pour compter les produits à valider 

} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../views/dashboard/templates/footer-dashboard.php';
    die;
}

include __DIR__ . '/../../views/dashboard/templates/header-dashboard.php';
include __DIR__ . '/../../views/dashboard/home.php';
include __DIR__ . '/../../views/dashboard/templates/footer-dashboard.php';