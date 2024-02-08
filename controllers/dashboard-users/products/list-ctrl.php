<?php
require_once __DIR__ . '/../../../config/init.php';

SessionAuth::producer();

// include VIEWS
include __DIR__.'/../../../views/templates/header.php';
include __DIR__.'/../../../views/dashboard-users/products/list.php';
include __DIR__.'/../../../views/templates/shop-hover.php';
include __DIR__.'/../../../views/templates/footer.php';