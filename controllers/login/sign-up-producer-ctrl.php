<?php
require_once __DIR__ . '/../../config/regex.php';
require_once __DIR__ . '/../../config/constants.php';
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../models/Pickup.php';

try {
    $title = 'Inscription utilisateur';
    $listPickups = Pickup::getAll();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $error = [];

        // INPUT "email" Nettoyage et validation
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        if (empty($email)) {
            $error['email'] = 'Votre email n\'est pas renseigné !';
        } else {
            $isValid = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$isValid) {
                $error['email'] = 'Votre email n\'est pas valide !';
            }
        }

        // INPUT "password"
        $password = filter_input(INPUT_POST, 'password');
        $passwordConfirm = filter_input(INPUT_POST, 'passwordConfirm');

        if (empty($password)) {
            $error['password'] = 'Votre mot de passe n\'est pas renseigné';
        }
        if (empty($passwordConfirm)) {
            $error['passwordConfirm'] = 'Veuillez confirmer votre mot de passe';
        }

        if ($password !== $passwordConfirm) {
            $error['password'] = 'Les mots de passe ne correspondent pas';
            $error['passwordConfirm'] = 'Les mots de passe ne correspondent pas';
        }

        $isValidPassword = filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PASSWORD . '/')));
        if (!$isValidPassword) {
            $error['password'] = 'Votre mot de passe n\'est pas valide';
        } else {
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        }

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

        // pickups
        $pickups = intval(filter_input(INPUT_POST, 'pickups', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($pickups)) {
            $error['pickups'] = 'Le point de retrait n\'est pas renseigné';
        } else {
            $listIdPickups = array_column($listPickups, 'id_pickup');
            if (!in_array($pickups, $listIdPickups)) {
                $error['pickups'] =  "Le point de retrait sélectionné n'est pas valide.";
            }
        }

        // // INPUT "producer" Nettoyage et validation
        // $producer = filter_input(INPUT_POST, 'producer', FILTER_SANITIZE_SPECIAL_CHARS);
        // if (empty($producer)) {
        //     $error['producer'] = "Vous n'avez cocher la case !";
        // }

        // INPUT "privacyPolicy" Nettoyage et validation
        $privacyPolicy = filter_input(INPUT_POST, 'privacyPolicy', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($privacyPolicy)) {
            $error['privacyPolicy'] = "Vous n'avez cocher la case !";
        }

        $producer = 1;

        if (User::isExist($email)) {
            $error['email'] = 'Cet email existe déjà !';
        }

        if (empty($error)) {
            $user = new User();
            $user->setFirstname($firstname);
            $user->setLastname($lastname);
            $user->setEmail($email);
            $user->setPassword($hashPassword);
            $user->setProducer($producer);
            $user->setCompanyName($companyName);
            $user->setSiret($siret);
            $user->setPhone($phone);
            $user->setAdress($adress);
            $user->setZip($zip);
            $user->setCity($city);
            $user->setIdPickup($pickups);

            $user->insert();

            // Si la méthode a retourné "true", alors on redirige vers la liste
            // if ($result) {
            //     header('location: /controllers/dashboard/list-ctrl.php');
            //     die;
            // }
        }

    }
} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../views/login/templates/header-login.php';
    include __DIR__ . '/../../views/login/templates/error.php';
    include __DIR__ . '/../../views/login/templates/footer-login.php';
    die;
}

include __DIR__ . '/../../views/login/templates/header-login.php';
include __DIR__ . '/../../views/login/sign-up-producer.php';
include __DIR__ . '/../../views/login/templates/footer-login.php';