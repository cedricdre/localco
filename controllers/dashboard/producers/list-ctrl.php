<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/User.php';

SessionAuth::admin();

try {
    $title = 'Les Producteurs';

    $producers = User::getAll(order: true, producer: true);

    // Archive
    // Récupération du paramètre d'URL correspondant à l'id
    $id_producer = intval(filter_input(INPUT_GET, 'iduser', FILTER_SANITIZE_NUMBER_INT));

    if ($id_producer) {
        // Archive/Ajoute une date à 'delete_at' l'insertion en BD
        $isArchive = User::archive($id_producer);

        if($isArchive){
            $message = 'La donnée a été archivé !';
            header('location: /controllers/dashboard/producers/list-ctrl.php');
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
include __DIR__ . '/../../../views/dashboard/producers/list.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';