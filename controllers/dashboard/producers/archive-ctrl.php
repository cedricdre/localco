<?php
require_once __DIR__ . '/../../../models/User.php';

try {
    // Récupération du paramètre d'URL correspondant à l'id de la catégorie cliquée
    $id_user = intval(filter_input(INPUT_GET, 'iduser', FILTER_SANITIZE_NUMBER_INT));

    $user = User::get($id_user);

    // Appel de la méthode delete
    $isDelete = User::delete($id_user);

    // Si la méthode a retourné "true", alors on redirige vers la liste
    if ($isDelete) {
        header('location: /controllers/dashboard/producers/list-ctrl.php');
        die;
    }

    //     // Archive
    // // Récupération du paramètre d'URL correspondant à l'id
    // $id_pickup = intval(filter_input(INPUT_GET, 'idpickup', FILTER_SANITIZE_NUMBER_INT));

    // if ($id_pickup) {
    //     // Archive/Ajoute une date à 'delete_at' l'insertion en BD
    //     $isArchive = Pickup::unarchive($id_pickup);

    //     if($isArchive){
    //         $message = 'La donnée a été désarchivé !';
    //         header('location: /controllers/dashboard/pickups/list-ctrl.php');
    //         die;
    //     }
    // }
    
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}

