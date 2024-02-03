<?php
require_once __DIR__ . '/../../../models/Type.php';

try {
    $title = 'Liste des types de produits';

    $types = Type::getAll();

} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}

include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/types/list.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';