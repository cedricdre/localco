<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Review.php';

SessionAuth::admin();

try {
    // Récupération du paramètre d'URL correspondant à l'id de la catégorie cliquée
    $id_review = intval(filter_input(INPUT_GET, 'idreview', FILTER_SANITIZE_NUMBER_INT));

    // Appel de la méthode delete
    $isDelete = Review::delete($id_review);

    // Si la méthode a retourné "true", alors on redirige vers la liste
    if ($isDelete) {
        header('location: /controllers/dashboard/reviews/list-ctrl.php');
        die;
    }
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}

