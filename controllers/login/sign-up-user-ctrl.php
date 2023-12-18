<?php
require_once __DIR__ . '/../../config/regex.php';
require_once __DIR__ . '/../../config/constants.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $error = [];

    // INPUT "email" Nettoyage et validation
    $emailGuest = filter_input(INPUT_POST, 'emailGuest', FILTER_SANITIZE_EMAIL);
    if (empty($emailGuest)) {
        $error['emailGuest'] = 'Votre email n\'est pas renseigné !';
    } else {
        $isValid = filter_var($emailGuest, FILTER_VALIDATE_EMAIL);
        if (!$isValid) {
            $error['emailGuest'] = 'Votre email n\'est pas valide !';
        }
    }

    // INPUT "password"
    $passwordNewAccountGuest = filter_input(INPUT_POST, 'passwordNewAccountGuest');
    $passwordConfirmNewAccountGuest = filter_input(INPUT_POST, 'passwordConfirmNewAccountGuest');

    if (empty($passwordNewAccountGuest)) {
        $error['passwordNewAccountGuest'] = 'Votre mot de passe n\'est pas renseigné';
    }
    if (empty($passwordConfirmNewAccountGuest)) {
        $error['passwordConfirmNewAccountGuest'] = 'Veuillez confirmer votre mot de passe';
    }

    if ($passwordNewAccountGuest !== $passwordConfirmNewAccountGuest) {
        $error['passwordNewAccountGuest'] = 'Les mots de passe ne correspondent pas';
        $error['passwordConfirmNewAccountGuest'] = 'Les mots de passe ne correspondent pas';
    }

    $isValidPassword = filter_var($passwordNewAccountGuest, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PASSWORD . '/')));
    if (!$isValidPassword) {
        $error['passwordNewAccountGuest'] = 'Votre mot de passe n\'est pas valide';
    } else {
        $hashPassword = password_hash($passwordNewAccountGuest, PASSWORD_DEFAULT);
    }

    // INPUT "firstname" Nettoyage et validation
    $firstnameNewAccountGuest = filter_input(INPUT_POST, 'firstnameNewAccountGuest', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($firstnameNewAccountGuest)) {
        $error['firstnameNewAccountGuest'] = 'Votre nom n\'est pas renseigné !';
    } else {
        $isValid = filter_var($firstnameNewAccountGuest, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
        if (!$isValid) {
            $error['firstnameNewAccountGuest'] = 'Votre nom doit contenir que des caractères majuscules et/ou minuscules';
        }
    }

    // INPUT "lastname" Nettoyage et validation
    $lastnameNewAccountGuest = filter_input(INPUT_POST, 'lastnameNewAccountGuest', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($lastnameNewAccountGuest)) {
        $error['lastnameNewAccountGuest'] = 'Votre nom n\'est pas renseigné !';
    } else {
        $isValid = filter_var($lastnameNewAccountGuest, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
        if (!$isValid) {
            $error['lastnameNewAccountGuest'] = 'Votre nom doit contenir que des caractères majuscules et/ou minuscules';
        }
    }

    // INPUT "Régime alimentaire" Nettoyage
    if (!empty($_POST['dietNewAccountGuest'])) {
        $dietNewAccountGuest = filter_input(INPUT_POST, 'dietNewAccountGuest', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!in_array($dietNewAccountGuest, DIETS)) {
            $error['dietNewAccountGuest'] =  "La valeur sélectionnée n'est pas valide.";
        }
    }

    // INPUT "privacyPolicy" Nettoyage et validation
    $privacyPolicy = filter_input(INPUT_POST, 'privacyPolicy', FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($privacyPolicy)) {
        $error['privacyPolicy'] = "Vous n'avez cocher la case !";
    }

}

// include VIEWS
include __DIR__.'/../../views/login/sign-up-user.php';