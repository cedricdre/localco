<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Order.php';

SessionAuth::admin();

try {
    $title = 'Commandes à retirer';

    $status = 2;

    $orders = Order::getAllProcessing($status);

    // Valider une commande préparé
    // Récupération du paramètre d'URL correspondant à l'id
    $id_order = intval(filter_input(INPUT_GET, 'idorder', FILTER_SANITIZE_NUMBER_INT));

    if ($id_order) {
        // Valide/Ajoute une date à 'valid_at' l'insertion en BD
        $isValid = Order::validReady($id_order);

        if($isValid){
            header('location: /controllers/dashboard/orders/list-ready-ctrl.php');
            die;
        }
    }


} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}

include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/orders/list-ready.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';