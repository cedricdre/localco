<?php
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Type.php';
require_once __DIR__ . '/../models/User.php';

try {
    $title = 'Catalogue des produits en ligne';

    $types = Type::getAll();
    $producers = User::getAllbyProducer();

    $selectedType = intval(filter_input(INPUT_GET, 'type', FILTER_SANITIZE_NUMBER_INT));
    $selectedCertif = filter_input(INPUT_GET, 'certification', FILTER_SANITIZE_SPECIAL_CHARS);
    $selectedProducer = intval(filter_input(INPUT_GET, 'producer', FILTER_SANITIZE_NUMBER_INT));
    $search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS);

    $currentPage = intval(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT));

    // Nombre de résultats en fonction de la recherche
    $nbProducts = Product::count($selectedType, $search, $selectedCertif, $selectedProducer);
    // Calcul du nombre de pages
    $nbPages = ceil($nbProducts / NB_RESULTS_PAGE);

    // Si $page vaut 0, alors, on l'initialise en première page.
    $currentPage = ($currentPage > $nbPages) ? $nbPages : $currentPage;
    $currentPage = ($currentPage <= 0) ? 1 : $currentPage;

    $products = Product::getAllbyPublic(id_type: $selectedType, certification: $selectedCertif, producer: $selectedProducer, search: $search, valid: true, online: true, page: $currentPage);



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productId = $_POST['id'];
        $productName = $_POST['nom'];
        $productPrice = $_POST['prix'];
        $quantity = $_POST['quantite'];

        // Ajouter le produit à la session panier
        $produit = array(
            'id' => $productId,
            'nom' => $productName,
            'prix' => $productPrice,
            'quantite' => $quantity
        );

        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
        }

        $_SESSION['panier'][] = $produit;
        header('location: /controllers/catalog-ctrl.php');
        die;
    }

    // d($_SESSION['panier']);

} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__.'/../views/templates/header.php';
    include __DIR__.'/../views/dashboard/templates/error.php';
    include __DIR__.'/../views/templates/footer.php';
    die;
}

include __DIR__.'/../views/templates/header.php';
include __DIR__.'/../views/catalog.php';
include __DIR__.'/../views/templates/shop-hover.php';
include __DIR__.'/../views/templates/footer.php';