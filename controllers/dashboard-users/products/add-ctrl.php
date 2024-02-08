<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/Type.php';
require_once __DIR__ . '/../../../models/Product.php';

SessionAuth::producer();

try {
    $title = 'Ajouter un lieu de retrait';

    $listTypes = Type::getAll(); 

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
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($description)) {
            if (strlen($description) > 1000) {
                $error['description'] = 'Votre texte doit contenir moins de 1000 caractères';
            }
        }

        // INPUT "Type de produit" Nettoyage et validation
        // $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
        // if (empty($type)) {
        //     $error['type'] = 'Votre type de produit n\'est pas renseigné !';
        // } else {
        //     if (!in_array($type, PRODUCT_TYPES)) {
        //         $error['type'] =  "La valeur sélectionnée n'est pas valide.";
        //     }
        // }

        // INPUT "Production Bio"
        $bioProduction = intval(filter_input(INPUT_POST, 'bioProduction', FILTER_SANITIZE_NUMBER_INT));
        if (!empty($bioProduction)) {
            $isValid = filter_var($bioProduction, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 1 )));
            if (!$isValid) {
                $error['bioProduction'] = "La valeur sélectionnée n'est pas valide.";
            }
        }  
        
        // INPUT "Certification"
        if (!empty($_POST['certification'])) {
            $certification = filter_input(INPUT_POST, 'certification', FILTER_SANITIZE_SPECIAL_CHARS);
            if (!in_array($certification, CERTIFICATIONS)) {
                $error['certification'] =  "La valeur sélectionnée n'est pas valide.";
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
        $productTva = filter_input(INPUT_POST, 'productTva', FILTER_SANITIZE_NUMBER_FLOAT);
        if (empty($productTva)) {
            $error['productTva'] = 'Votre tva n\'est pas renseigné !';
        } else {
            if (!in_array($productTva, UNITS_MEASURE)) {
                $error['productTva'] =  "La tva sélectionnée n'est pas valide !";
            }
        }

        // INPUT "Poids du poduit" Nettoyage et validation
        $weight = filter_input(INPUT_POST, 'weight', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (empty($weight)) {
            $error['weight'] = 'Votre poids n\'est pas renseigné !';
        } else {
            $isValid = filter_var($weight, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_WEIGHT . '/')));
            if (!$isValid) {
                $error['weight'] = "Votre poids n'est pas valide, seuls les chiffres et une virgule sont autorisés";
            }
        }
        // INPUT "Unités de mesure" Nettoyage et validation
        $weightUnit = filter_input(INPUT_POST, 'weightUnit', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($weightUnit)) {
            $error['weightUnit'] = 'Votre unité de mesure n\'est pas renseigné !';
        } else {
            if (!in_array($weightUnit, UNITS_MEASURE)) {
                $error['weightUnit'] =  "L'unité sélectionnée n'est pas valide !";
            }
        }

        // INPUT "Ajout photo" Nettoyage et validation
        $picture = null;
        // INPUT "Picture"
        if (!empty($_FILES['picture']['name'])) {
            try {
                if ($_FILES['picture']['error'] != 0) {
                    throw new Exception("Erreur");
                }
                if (!in_array($_FILES['picture']['type'], TYPES_MIME)) {
                    throw new Exception("Le format de l'image n'est pas autorisée");
                }
                if ($_FILES['picture']['size'] > MAX_SIZE) {
                    throw new Exception("Le fichier est trop lourd");
                }
                $from = $_FILES['picture']['tmp_name'];
                $picturename = uniqid('img_');
                $extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
                $to = __DIR__ . '/../../../public/uploads/producers/' .$picturename.'.'.$extension;
                $picture = $picturename. '.' . $extension;
                move_uploaded_file($from, $to);
            } catch (\Throwable $th) {
                $error['picture'] = $th->getMessage();
            }
        }
        // INPUT "Mettre ligne"
        $online = intval(filter_input(INPUT_POST, 'online', FILTER_SANITIZE_NUMBER_INT));
        if (!empty($online)) {
            $isValid = filter_var($online, FILTER_VALIDATE_INT, array("options" => array("min_range" => '0', "max_range" => '1' )));
            if (!$isValid) {
                $error['online'] = "La valeur sélectionnée n'est pas valide.";
            }
        }

        if (empty($error)) {
            $pickup = new Product();
            $pickup->setPickupName($pickup_name);
            $pickup->setAdress($address);
            $pickup->setZip($zip);
            $pickup->setCity($city);
            $pickup->setOpeningHours($opening_hours);

            $result = $pickup->insert();

            // Si la méthode a retourné "true", alors on redirige vers la liste
            if ($result) {
                header('location: /controllers/dashboard/pickups/list-ctrl.php');
                die;
            }
        }
    }
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/templates/header.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/templates/footer.php';
    die;
}

include __DIR__ . '/../../../views/templates/header.php';
include __DIR__ . '/../../../views/dashboard-users/products/add.php';
include __DIR__ . '/../../../views/templates/shop-hover.php';
include __DIR__ . '/../../../views/templates/footer.php';