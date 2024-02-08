<?php
require_once __DIR__ . '/../../models/User.php';

try {
    // Récupération du paramètre d'URL correspondant à l'id de la catégorie cliquée
    $email = intval(filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL));

    $isConfirm = User::confirmMail($email);

    // Si la méthode a retourné "true", alors on redirige vers le site home
    if ($isConfirm) {
        header('location: /controllers/home-ctrl.php');
        die;
    }



} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}