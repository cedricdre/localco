<?php
require_once __DIR__ . '/../../../models/Pickup.php';

try {
    $title = 'Lieux de retrait';

    $pickups = Pickup::getAll();


    // Archive
    // Récupération du paramètre d'URL correspondant à l'id
    $id_pickup = intval(filter_input(INPUT_GET, 'idpickup', FILTER_SANITIZE_NUMBER_INT));

    if ($id_pickup) {
        // Archive/Ajoute une date à 'delete_at' l'insertion en BD
        $isArchive = Pickup::archive($id_pickup);

        if($isArchive){
            $message = 'La donnée a été archivé !';
            header('location: /controllers/dashboard/pickups/list-ctrl.php');
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
include __DIR__ . '/../../../views/dashboard/pickups/list.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';