<?php
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../config/constants.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $error = [];
    
}
// include VIEWS
include __DIR__.'/../../../views/templates/header.php';
include __DIR__.'/../../../views/dashboard-users/users/update-users.php';
include __DIR__.'/../../../views/templates/shop-hover.php';
include __DIR__.'/../../../views/templates/footer.php';