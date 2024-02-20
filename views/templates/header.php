<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Localco - <?= $title ?? 'Abonnez-vous aux frais' ?></title>

    <link rel="icon" href="/favicon.png" type="image/png">
    <meta name="description" content="Abonnez-vous aux frais et explorez une nouvelle manière de consomer des produits frais de saison, tout en soutenant les producteurs locaux.">
    <meta name="author" content="Localco">
    <!-- Typo -->
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="/public/assets/css/aos.css" rel="stylesheet">
    <!-- Icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Styles css -->
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <!-- Meta reseaux sociaux -->
    <meta property="og:title" content="Localco - <?= $title ?? 'Abonnez-vous aux frais' ?>">
    <meta property="og:description" content="Abonnez-vous aux frais et explorez une nouvelle manière de consomer des produits frais de saison, tout en soutenant les producteurs locaux.">
</head>
<body>

<!-- header -->
<header>
    <!-- navbar -->
    <?php
    include __DIR__.'/navbar.php';
    ?>
</header><!-- FIN header -->
<div class="fixed top-50 start-50 translate-middle d-flex justify-content-center">
        <div class="bg-shape bg-yellow bg-opacity-50 bg-blur">333</div>
        <div class="bg-shape bg-red bg-opacity-50 bg-blur">test</div>
    </div>
<!-- main -->
<main class="margin-top-main">