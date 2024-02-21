<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Review.php';

SessionAuth::admin();

try {
    $title = 'Liste des Avis clients';

    $reviews = Review::getAll();

    // Valider un avis avant affichage site public
    // Récupération du paramètre d'URL correspondant à l'id
    $id_review = intval(filter_input(INPUT_GET, 'idreview', FILTER_SANITIZE_NUMBER_INT));

    if ($id_review) {
        // Valide/Ajoute une date à 'valid_at' l'insertion en BD
        $isValid = Review::valid($id_review);

        if($isValid){
            header('location: /controllers/dashboard/reviews/list-ctrl.php');
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
include __DIR__ . '/../../../views/dashboard/reviews/list.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';