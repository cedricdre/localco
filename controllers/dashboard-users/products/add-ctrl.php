<?php
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../config/constants.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $error = [];

    // INPUT "Nom du produit" Nettoyage et validation
    $productName = filter_input(INPUT_POST, 'productName', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($productName)) {
        $error['productName'] = 'Votre nom de produit n\'est pas renseigné !';
    } else {
        $isValid = filter_var($productName, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
        if (!$isValid) {
            $error['productName'] = 'Votre nom de produit n\'est pas valide';
        }
    }

    // INPUT "Description du produit"
    $productDescription = filter_input(INPUT_POST, 'productDescription', FILTER_SANITIZE_SPECIAL_CHARS);
    if (!empty($productDescription)) {
        if (strlen($productDescription) > 1000) {
            $error['productDescription'] = 'Votre texte doit contenir moins de 1000 caractères';
        }
    }

    // INPUT "Type de produit" Nettoyage et validation
    $productType = filter_input(INPUT_POST, 'productType', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($productType)) {
        $error['productType'] = 'Votre type de produit n\'est pas renseigné !';
    } else {
        if (!in_array($productType, PRODUCT_TYPES)) {
            $error['productType'] =  "La valeur sélectionnée n'est pas valide.";
        }
    }

    // INPUT "Production Bio"
    $productBio = intval(filter_input(INPUT_POST, 'productBio', FILTER_SANITIZE_NUMBER_INT));
    if (!empty($productBio)) {
        $isValid = filter_var($productBio, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 1 )));
        if (!$isValid) {
            $error['productBio'] = "La valeur sélectionnée n'est pas valide.";
        }
    }  
    
    // INPUT "Certification"
    if (!empty($_POST['productCertification'])) {
        $productCertification = filter_input(INPUT_POST, 'productCertification', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!in_array($productCertification, CERTIFICATIONS)) {
            $error['productCertification'] =  "La valeur sélectionnée n'est pas valide.";
        }
    }

    // INPUT "Prix" Nettoyage et validation
    $productPrice = filter_input(INPUT_POST, 'productPrice', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (empty($productPrice)) {
        $error['productPrice'] = 'Votre prix n\'est pas renseigné !';
    } else {
        $isValid = filter_var($productPrice, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PRICE . '/')));
        if (!$isValid) {
            $error['productPrice'] = "Votre prix n'est pas valide, seuls les chiffres et une virgule sont autorisés";
        }
    }
    // INPUT "Unités de mesure" Nettoyage et validation
    $tva = filter_input(INPUT_POST, 'tva', FILTER_SANITIZE_NUMBER_FLOAT);
    if (empty($tva)) {
        $error['tva'] = 'Votre tva n\'est pas renseigné !';
    } else {
        if (!in_array($tva, UNITS_MEASURE)) {
            $error['tva'] =  "La tva sélectionnée n'est pas valide !";
        }
    }

    // INPUT "Poids du poduit" Nettoyage et validation
    $productWeight = filter_input(INPUT_POST, 'productWeight', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (empty($productWeight)) {
        $error['productWeight'] = 'Votre poids n\'est pas renseigné !';
    } else {
        $isValid = filter_var($productWeight, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_WEIGHT . '/')));
        if (!$isValid) {
            $error['productWeight'] = "Votre poids n'est pas valide, seuls les chiffres et une virgule sont autorisés";
        }
    }
    // INPUT "Unités de mesure" Nettoyage et validation
    $productUnit = filter_input(INPUT_POST, 'productUnit', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($productUnit)) {
        $error['productUnit'] = 'Votre unité de mesure n\'est pas renseigné !';
    } else {
        if (!in_array($productUnit, UNITS_MEASURE)) {
            $error['productUnit'] =  "L'unité sélectionnée n'est pas valide !";
        }
    }

    // INPUT "Ajout photo" Nettoyage et validation
    try {
        if (empty($_FILES['productFile']['name'])) {
            throw new Exception("Ajoutez une photo");           
        }
        if (!empty($_FILES['productFile']['error'])) {
            throw new Exception("Erreur"); 
        }
        if (!in_array($_FILES['productFile']['type'], TYPES_MIME)) {
            throw new Exception("Le format de l'image n'est pas autorisée");           
        }
        if (!empty($_FILES['productFile']['size'] > MAX_SIZE)) {
            throw new Exception("Le fichier est trop lourd");           
        }

        // Upload de l'image sur le serveur dans le bon dossier
        $filename = uniqid("img_", true);
        $extension = pathinfo($_FILES['productFile']['name'], PATHINFO_EXTENSION);
        $from = $_FILES['productFile']['tmp_name'];
        $to = __DIR__.'/../../public/uploads/product-sheet/'. $filename. '.'. $extension;
        move_uploaded_file($from, $to);

    } catch (\Throwable $th) {
        $error['productFile'] = $th->getMessage();
    }

        // INPUT "Mettre ligne"
        $productLine = intval(filter_input(INPUT_POST, 'productLine', FILTER_SANITIZE_NUMBER_INT));
        if (!empty($productLine)) {
            $isValid = filter_var($productLine, FILTER_VALIDATE_INT, array("options" => array("min_range" => '0', "max_range" => '1' )));
            if (!$isValid) {
                $error['productLine'] = "La valeur sélectionnée n'est pas valide.";
            }
        }
}

// include VIEWS
include __DIR__.'/../../../views/templates/header.php';
include __DIR__.'/../../../views/dashboard-users/products/add.php';
include __DIR__.'/../../../views/templates/shop-hover.php';
include __DIR__.'/../../../views/templates/footer.php';