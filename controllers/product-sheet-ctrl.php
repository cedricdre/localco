<?php
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Review.php';

try {
    
    // Récupération du paramètre d'URL correspondant à l'id
    $id_product = intval(filter_input(INPUT_GET, 'idproduct', FILTER_SANITIZE_NUMBER_INT));
    $product = Product::get($id_product);

    
    $title = $product->product_name;
    
    $products = Product::getAllbyFour(valid: true, online: true);
    
    if (!empty($_SESSION['user'])) {
        $id_user = $_SESSION['user']->id_user;
    }

    $reviews = Review::getAllByProduct($id_product);

    $ratings = Review::getbyAverageRating($id_product);

    // calcule moyenne notes
    if (isset($ratings[0])) {
        $average_rating = $ratings[0]->average_rating;

        if ($average_rating) {
            $ratingProduct = number_format($average_rating, 1, ',', ' ');
        }
    }

    $noComment = false;

    foreach ($reviews as $review) {
        if ($review->id_user == $id_user) {
            $noComment = true;
        }
    }

    // dd($noComment);



    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $error = [];

        // INPUT "score" Nettoyage et validation
        $score = filter_input(INPUT_POST, 'score', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($score)) {
            $error['score'] = 'Votre note n\'est pas renseigné !';
        } else {
            if (!in_array($score, NOTES)) {
                $error['score'] =  "La note sélectionnée n'est pas valide !";
            }
        }

        // INPUT "comment"
        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($comment)) {
            if (strlen($comment) > 1000) {
                $error['comment'] = 'Votre texte doit contenir moins de 1000 caractères';
            }
        }

        $id_user = $_SESSION['user']->id_user;

        if (empty($error)) {
            $review = new Review();
            $review->setComment($comment);
            $review->setRating($score);
            $review->setIdUser($id_user);
            $review->setIdProduct($id_product);

            $result = $review->insert();

            // Si la méthode a retourné "true", alors on redirige vers la liste
            if ($result) {
                header('location: /controllers/product-sheet-ctrl.php?idproduct='.$id_product);
                die;
            }
        }
    }


} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__.'/../views/templates/header.php';
    include __DIR__.'/../views/dashboard/templates/error.php';
    include __DIR__.'/../views/templates/footer.php';
    die;
}

include __DIR__.'/../views/templates/header.php';
include __DIR__.'/../views/product-sheet.php';
include __DIR__.'/../views/templates/shop-hover.php';
include __DIR__.'/../views/templates/footer.php';