<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Pickup.php';

SessionAuth::admin();

try {
    $title = 'Archives des lieux de retrait';

    $pickups = Pickup::getAll(archive: true);


    // Archive
    // Récupération du paramètre d'URL correspondant à l'id
    $id_pickup = intval(filter_input(INPUT_GET, 'idpickup', FILTER_SANITIZE_NUMBER_INT));

    if ($id_pickup) {
        // Archive/Ajoute une date à 'delete_at' l'insertion en BD
        $isArchive = Pickup::unarchive($id_pickup);

        if($isArchive){
            $message = 'La donnée a été désarchivé !';
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
include __DIR__ . '/../../../views/dashboard/pickups/archive.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';