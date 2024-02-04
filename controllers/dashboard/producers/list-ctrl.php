<?php
// require_once __DIR__ . '/../../../models/Pickup.php';

try {
    $title = 'Les Producteurs';


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