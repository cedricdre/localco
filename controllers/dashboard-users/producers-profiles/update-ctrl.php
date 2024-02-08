<?php
require_once __DIR__ . '/../../../config/init.php';

SessionAuth::producer();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $error = [];

    // INPUT "Nom de l’entreprise" Nettoyage et validation
    $namebusinessProducer = filter_input(INPUT_POST, 'namebusinessProducer', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($namebusinessProducer)) {
        $error['namebusinessProducer'] = 'Votre nom d’entreprise n\'est pas renseigné !';
    } else {
        $isValid = filter_var($namebusinessProducer, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
        if (!$isValid) {
            $error['namebusinessProducer'] = 'Votre nom d’entreprise doit contenir que des caractères majuscules et/ou minuscules !';
        }
    }

    // INPUT "SIRET"
    if (!empty($_POST['siretProducer'])) {
        $siretProducer = filter_input(INPUT_POST, 'siretProducer', FILTER_SANITIZE_NUMBER_INT);
        $isValid = filter_var($siretProducer, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_SIRET . '/')));
        if (!$isValid) {
            $error['siretProducer'] = 'Votre SIRET n\'est pas valide';
        }
    }

    // INPUT "firstname" Nettoyage et validation
    $firstnameProducer = filter_input(INPUT_POST, 'firstnameProducer', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($firstnameProducer)) {
        $error['firstnameProducer'] = 'Votre nom n\'est pas renseigné !';
    } else {
        $isValid = filter_var($firstnameProducer, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
        if (!$isValid) {
            $error['firstnameProducer'] = 'Votre nom doit contenir que des caractères majuscules et/ou minuscules';
        }
    }

    // INPUT "lastname" Nettoyage et validation
    $lastnameProducer = filter_input(INPUT_POST, 'lastnameProducer', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($lastnameProducer)) {
        $error['lastnameProducer'] = 'Votre nom n\'est pas renseigné !';
    } else {
        $isValid = filter_var($lastnameProducer, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
        if (!$isValid) {
            $error['lastnameProducer'] = 'Votre nom doit contenir que des caractères majuscules et/ou minuscules';
        }
    }

    // INPUT "Téléphone"
    if (!empty($_POST['phoneProducer'])) {
        $phoneProducer = filter_input(INPUT_POST, 'phoneProducer', FILTER_SANITIZE_NUMBER_INT);
        $isValid = filter_var($phoneProducer, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PHONE . '/')));
        if (!$isValid) {
            $error['phoneProducer'] = 'Votre N° de tél. n\'est pas valide';
        }
    }

    // INPUT "Adresse" Nettoyage et validation
    $adressProducer = filter_input(INPUT_POST, 'adressProducer', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($adressProducer)) {
        $error['adressProducer'] = 'Votre Adresse n\'est pas renseigné !';
    } else {
        $isValid = filter_var($adressProducer, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_ADRESS . '/')));
        if (!$isValid) {
            $error['adressProducer'] = 'Votre Adresse n\'est pas valide';
        }
    }

    // INPUT "CP" Nettoyage et validation
    $zipProducer = filter_input(INPUT_POST, 'zipProducer', FILTER_SANITIZE_NUMBER_INT);
    if (empty($zipProducer)) {
        $error['zipProducer'] = 'Votre Code Postal n\'est pas renseigné !';
    } else {
        $isValid = filter_var($zipProducer, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_POSTAL_CODE . '/')));
        if (!$isValid) {
            $error['zipProducer'] = 'Votre Code Postal n\'est pas valide';
        }
    }

    // INPUT "Ville" Nettoyage et validation
    $cityProducer = filter_input(INPUT_POST, 'cityProducer', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($cityProducer)) {
        $error['cityProducer'] = 'Votre Ville n\'est pas renseigné !';
    } else {
        $isValid = filter_var($cityProducer, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_CITY . '/')));
        if (!$isValid) {
            $error['cityProducer'] = 'Votre Ville n\'est pas valide';
        }
    }
    
}
// include VIEWS
include __DIR__.'/../../../views/templates/header.php';
include __DIR__.'/../../../views/dashboard-users/producers-profiles/update.php';
include __DIR__.'/../../../views/templates/shop-hover.php';
include __DIR__.'/../../../views/templates/footer.php';