<?php
require_once __DIR__ . '/../../../models/Pickup.php';

try {
    $title = 'Lieux de retrait';

    $pickups = Pickup::getAll();

} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}

include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/pickups/list.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';