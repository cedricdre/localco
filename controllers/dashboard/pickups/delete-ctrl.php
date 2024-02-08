<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Pickup.php';

SessionAuth::admin();

try {
    // Récupération du paramètre d'URL correspondant à l'id de la catégorie cliquée
    $id_pickup = intval(filter_input(INPUT_GET, 'idpickup', FILTER_SANITIZE_NUMBER_INT));

    $pickup = Pickup::get($id_pickup);

    // Appel de la méthode delete
    $isDelete = Pickup::delete($id_pickup);

    // Si la méthode a retourné "true", alors on redirige vers la liste
    if ($isDelete) {
        header('location: /controllers/dashboard/pickups/list-ctrl.php');
        die;
    }
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}

