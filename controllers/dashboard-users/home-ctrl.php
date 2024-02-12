<?php
require_once __DIR__ . '/../../config/init.php';


if (empty($_SESSION['user'])) {
    header('location: /');
    die;
}


// include VIEWS
include __DIR__.'/../../views/templates/header.php';
include __DIR__.'/../../views/dashboard-users/home.php';
include __DIR__.'/../../views/templates/shop-hover.php';
include __DIR__.'/../../views/templates/footer.php';