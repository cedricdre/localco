<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/User.php';

SessionAuth::producer();

try {
    $title = 'Modifier ma fiche producteur';

    // Récupération du paramètre d'URL correspondant à l'id
    $id_producer = intval(filter_input(INPUT_GET, 'idproducer', FILTER_SANITIZE_NUMBER_INT));
    $producer = User::get($id_producer);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $error = [];

        // INPUT "Nom de l’entreprise" Nettoyage et validation
        $companyName = filter_input(INPUT_POST, 'companyName', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($companyName)) {
            $error['companyName'] = 'Votre nom d’entreprise n\'est pas renseigné !';
        } else {
            $isValid = filter_var($companyName, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
            if (!$isValid) {
                $error['companyName'] = 'Votre nom d’entreprise doit contenir que des caractères majuscules et/ou minuscules !';
            }
        }

        // INPUT "SIRET"
        if (!empty($_POST['siret'])) {
            $siret = filter_input(INPUT_POST, 'siret', FILTER_SANITIZE_NUMBER_INT);
            $isValid = filter_var($siret, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_SIRET . '/')));
            if (!$isValid) {
                $error['siret'] = 'Votre SIRET n\'est pas valide';
            }
        }

        // INPUT "firstname" Nettoyage et validation
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($firstname)) {
            $error['firstname'] = 'Votre nom n\'est pas renseigné !';
        } else {
            $isValid = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
            if (!$isValid) {
                $error['firstname'] = 'Votre nom doit contenir que des caractères majuscules et/ou minuscules';
            }
        }

        // INPUT "lastname" Nettoyage et validation
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($lastname)) {
            $error['lastname'] = 'Votre nom n\'est pas renseigné !';
        } else {
            $isValid = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
            if (!$isValid) {
                $error['lastname'] = 'Votre nom doit contenir que des caractères majuscules et/ou minuscules';
            }
        }

        // INPUT "Description du produit"
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($description)) {
            if (strlen($description) > 1000) {
                $error['description'] = 'Votre texte doit contenir moins de 1000 caractères';
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

        // INPUT "Téléphone"
        if (!empty($_POST['phone'])) {
            $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
            $isValid = filter_var($phone, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PHONE . '/')));
            if (!$isValid) {
                $error['phone'] = 'Votre N° de tél. n\'est pas valide';
            }
        }

        // INPUT "Adresse" Nettoyage et validation
        $adress = filter_input(INPUT_POST, 'adress', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($adress)) {
            $error['adress'] = 'Votre Adresse n\'est pas renseigné !';
        } else {
            $isValid = filter_var($adress, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_ADRESS . '/')));
            if (!$isValid) {
                $error['adress'] = 'Votre Adresse n\'est pas valide';
            }
        }

        // INPUT "CP" Nettoyage et validation
        $zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_NUMBER_INT);
        if (empty($zip)) {
            $error['zip'] = 'Votre Code Postal n\'est pas renseigné !';
        } else {
            $isValid = filter_var($zip, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_POSTAL_CODE . '/')));
            if (!$isValid) {
                $error['zip'] = 'Votre Code Postal n\'est pas valide';
            }
        }

        // INPUT "Ville" Nettoyage et validation
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($city)) {
            $error['city'] = 'Votre Ville n\'est pas renseigné !';
        } else {
            $isValid = filter_var($city, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_CITY . '/')));
            if (!$isValid) {
                $error['city'] = 'Votre Ville n\'est pas valide';
            }
        }

        if (empty($error)) {
            $producerObj = new User();

            $producerObj->setIdUser($id_producer);
            $producerObj->setFirstname($firstname);
            $producerObj->setLastname($lastname);
            $producerObj->setCompanyName($companyName);
            $producerObj->setDescription($description);
            $producerObj->setCompanyPicture($picture);
            $producerObj->setPhone($phone);
            $producerObj->setAdress($adress);
            $producerObj->setZip($zip);
            $producerObj->setCity($city);
            
            $result = $producerObj->updateProducer();

            // Si la méthode a retourné "true", alors on redirige vers la liste
            if ($result) {
                header('location: /controllers/dashboard-users/home-ctrl.php');
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
include __DIR__.'/../../../views/templates/header.php';
include __DIR__.'/../../../views/dashboard-users/producers-profiles/update.php';
include __DIR__.'/../../../views/templates/shop-hover.php';
include __DIR__.'/../../../views/templates/footer.php';