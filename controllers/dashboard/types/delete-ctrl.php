<?php
require_once __DIR__ . '/../../../models/Type.php';

try {
    // Récupération du paramètre d'URL correspondant à l'id de la catégorie cliquée
    $id_type = intval(filter_input(INPUT_GET, 'idtype', FILTER_SANITIZE_NUMBER_INT));

    $type = Type::get($id_type);

    // Appel de la méthode delete
    $isDelete = Type::delete($id_type);

    // Si la méthode a retourné "true", alors on redirige vers la liste
    if ($isDelete) {
        header('location: /controllers/dashboard/types/list-ctrl.php');
        die;
    }
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}

