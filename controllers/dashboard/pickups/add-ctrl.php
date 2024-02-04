<?php
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Pickup.php';

try {
    $title = 'Ajouter un lieu de retrait';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $error = [];

        // Récupération et nettoyage des valeurs
        $pickup_name = filter_input(INPUT_POST, 'pickup_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
        $zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_SPECIAL_CHARS);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
        $opening_hours = filter_input(INPUT_POST, 'opening_hours', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($pickup_name)) {
            $error['pickup_name'] = 'Ce champ est obligatoire !';
        } else {
            $isValid = filter_var($pickup_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
            if (!$isValid) {
                $error['pickup_name'] = 'Le nom doit contenir que des caractères majuscules et/ou minuscules';
            }
        }

        if (empty($address)) {
            $error['address'] = 'Ce champ est obligatoire !';
        } else {
            $isValid = filter_var($address, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_ADRESS . '/')));
            if (!$isValid) {
                $error['address'] = 'L\'adresse doit être au format valide';
            }
        }

        if (empty($zip)) {
            $error['zip'] = 'Ce champ est obligatoire !';
        } else {
            $isValid = filter_var($zip, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_POSTAL_CODE . '/')));
            if (!$isValid) {
                $error['zip'] = 'Le code postal doit être au format valide';
            }
        }

        if (empty($city)) {
            $error['city'] = 'Ce champ est obligatoire !';
        } else {
            $isValid = filter_var($city, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_CITY . '/')));
            if (!$isValid) {
                $error['city'] = 'Le nom de la ville doit contenir que des caractères alphabétiques';
            }
        }

        if (empty($opening_hours)) {
            $error['opening_hours'] = 'Ce champ est obligatoire !';
        }

        if (Pickup::isExist($pickup_name)) {
            $error['pickup_name'] = 'Ce lieu de retrait existe déjà !';
        }
        if (empty($error)) {
            $pickup = new Pickup();
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
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}

include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/pickups/add.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
