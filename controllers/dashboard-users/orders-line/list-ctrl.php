<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/User.php';
require_once __DIR__ . '/../../../models/Order.php';
require_once __DIR__ . '/../../../models/OrderLine.php';

if (empty($_SESSION['user'])) {
    header('location: /');
    die;
}

try {
    // Récupération du paramètre d'URL correspondant à l'id
    $id_order = intval(filter_input(INPUT_GET, 'idorder', FILTER_SANITIZE_NUMBER_INT));
    $ordersLines = OrderLine::getAll($id_order);

    $title = 'Commande N° '. $id_order;

    $id_user = $_SESSION['user']->id_user;
    $pickup = User::getUserPickup($id_user);

    $total = 0;


} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/templates/footer.php';
    die;
}

include __DIR__.'/../../../views/templates/header.php';
include __DIR__.'/../../../views/dashboard-users/orders-line/list.php';
include __DIR__.'/../../../views/templates/shop-hover.php';
include __DIR__.'/../../../views/templates/footer.php';