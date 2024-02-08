<?php
require_once __DIR__ . '/../../../config/init.php';
// require_once __DIR__ . '/../../../models/ .php';

SessionAuth::admin();

try {
    $title = 'Abonnements';


} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}

include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/subscriptions/list.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';