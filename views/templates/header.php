<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Typo -->
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link href="/public/assets/css/aos.css" rel="stylesheet">

    <!-- Styles css Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <!-- Styles css -->
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <title>Localco - <?= $title ?></title>
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
<main>