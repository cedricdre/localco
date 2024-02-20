<?php
require_once __DIR__ . '/../../config/init.php';

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
        // INPUT "privacyPolicy" Nettoyage et validation
        $privacyPolicy = filter_input(INPUT_POST, 'privacyPolicy', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($privacyPolicy)) {
            $error['privacyPolicy'] = "Vous n'avez cocher la case !";
        }

        $producer = 0;

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
            $user->setIdPickup($pickups);

            $user->insert();

            // $isInsert = $user->insert();
            // if ($isInsert) {
            //     $to = $email;
            //     $subject = 'Sujet';
            //     $message = 'le lien à cliquer';
            //     mail($to, $subject, $message);
            //     // message : de confirmation à mettre dans la vie
            //     // Dans le href à envoyer : SERVEUR[resquest_scheme // et http host]
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
include __DIR__ . '/../../views/login/sign-up-user.php';
include __DIR__ . '/../../views/login/templates/footer-login.php';