<?php
session_start();

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

require_once __DIR__ . '/regex.php';
require_once __DIR__ . '/constants.php';
require_once __DIR__ . '/../helpers/FlashMessage.php';
require_once __DIR__ . '/../helpers/dd.php';
require_once __DIR__ . '/../helpers/CheckDatas.php';
require_once __DIR__ . '/../helpers/SessionAuth.php';
