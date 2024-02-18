<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Order.php';
require_once __DIR__ . '/../../../models/OrderLine.php';
require_once __DIR__ . '/../../../models/Product.php';

SessionAuth::admin();

try {
    $status = 1;
    $orders = Order::getAllProcessing($status);

    // Récupération du paramètre d'URL correspondant à l'id
    $id_order = intval(filter_input(INPUT_GET, 'idorder', FILTER_SANITIZE_NUMBER_INT));
    $ordersLines = OrderLine::getAll($id_order);

    $title = 'Commande N° '. $id_order;

    $total = 0;


} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}

include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/orders-line/list.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';