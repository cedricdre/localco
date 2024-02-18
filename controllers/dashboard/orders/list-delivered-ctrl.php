<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Order.php';

SessionAuth::admin();

try {
    $title = 'Commandes traitées';

    $status = 3;

    $orders = Order::getAllProcessing($status);

} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}

include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/orders/list-delivered.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';