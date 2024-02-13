<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/User.php';

SessionAuth::producer();

try {
    // Récupération du paramètre d'URL correspondant à l'id du produit cliquée
    $id_user = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    $isDeleted = User::deletePicture($id_user);

    if ($isDeleted) {
        header('location: /controllers/dashboard-users/producers-profiles/update-ctrl.php');
        die;
    }

} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}

