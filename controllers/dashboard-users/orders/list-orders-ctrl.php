<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Order.php';

if (empty($_SESSION['user'])) {
    header('location: /');
    die;
}

try {
    $title = 'Mes commandes';

    $id_user = $_SESSION['user']->id_user;
    $orders = Order::getAll($id_userr);


} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/templates/footer.php';
    die;
}

include __DIR__.'/../../../views/templates/header.php';
include __DIR__.'/../../../views/dashboard-users/orders/list-orders.php';
include __DIR__.'/../../../views/templates/shop-hover.php';
include __DIR__.'/../../../views/templates/footer.php';