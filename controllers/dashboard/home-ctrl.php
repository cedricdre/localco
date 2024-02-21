<?php
require_once __DIR__ . '/../../models/Pickup.php';
require_once __DIR__ . '/../../models/Type.php';
require_once __DIR__ . '/../../models/Product.php';
require_once __DIR__ . '/../../models/Order.php';
require_once __DIR__ . '/../../models/Review.php';
require_once __DIR__ . '/../../models/User.php';

SessionAuth::admin();

try {
    $title = 'Accueil';

    $pickups = Pickup::getAll();
    $types = Type::getAll();
    $ordersPrepare = Order::getAllProcessing($status = 1);
    $ordersReady = Order::getAllProcessing($status = 2);

    $products = Product::getAll(); 
    $nullCount = 0;
    foreach ($products as $product) {
        if ($product->valid_at === NULL) {
            $nullCount++;
        }
    }

    $onlineCount = 0;
    foreach ($products as $product) {
        if ($product->online === 1) {
            $onlineCount++;
        }
    }

    $reviews = Review::getAll(); 
    $nullCountReview = 0;
    foreach ($reviews as $review) {
        if ($review->valid_at === NULL) {
            $nullCountReview++;
        }
    }

    $producers = User::getAllbyProducer(); 


} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../views/dashboard/templates/footer-dashboard.php';
    die;
}

include __DIR__ . '/../../views/dashboard/templates/header-dashboard.php';
include __DIR__ . '/../../views/dashboard/home.php';
include __DIR__ . '/../../views/dashboard/templates/footer-dashboard.php';