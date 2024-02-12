<?php
require_once __DIR__ . '/../../config/init.php';

require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../models/Pickup.php';

try {
    $title = 'Inscription utilisateur';
    $listPickups = Pickup::getAll();


    if ($_SERVER["REQUEST_METHOD"] == 'POST') {

        $datas = filter_input_array(INPUT_POST, [
            "email" => FILTER_VALIDATE_EMAIL,
            "password" => FILTER_DEFAULT,
        ]);

        $errors = CheckDatas::getErrors($datas);


        if (empty($error)) {

            $user = User::getByMail($datas["email"]);

            if (!$user) {
                $errors['email'] = 'Identifiant ou mot de passe incorrect. Veuillez réessayer.';
                $message = 'Identifiant ou mot de passe incorrect. Veuillez réessayer.';
            } else {

                $passwordHash = $user->password;
                $isAuth = password_verify($datas["password"], $passwordHash);

                if ($isAuth) {
                    unset($user->password);
                    $_SESSION['user'] = $user;
                    header('location: /controllers/dashboard-users/home-ctrl.php');
                    die;
                } else {
                    $errors['email'] = 'Identifiant ou mot de passe incorrect. Veuillez réessayer.';
                    $message = 'Identifiant ou mot de passe incorrect. Veuillez réessayer.';
                }
                
            }


            // Version à revoir avec le mail de confirme 

            // if (!$user) {
            //     FlashMessage::set("Identifiant ou mot de passe incorrect. Veuillez réessayer.", ERROR);
            //     $message = 'Identifiant ou mot de passe incorrect. Veuillez réessayer.';
            // } else {
            //     if (is_null($user->confirmed_at)) {
            //         # message erreur FlashMessage::set , ERROR vous n'avez pas confirmer le mail
            //     }
            //     $passwordHash = $user->password;
            //     $isAuth = password_verify($datas["password"], $passwordHash);
            //     if ($isAuth) {
            //         if (is_null($user->confirmed_at)) {
            //             # message erreur FlashMessage::set , ERROR vous n'avez pas confirmer le mail
            //         } else {
            //             unset($user->password);
            //             $_SESSION['user'] = $user;
            //         }
            //     } else {
            //         FlashMessage::set("Identifiant ou mot de passe incorrect. Veuillez réessayer.", ERROR);
            //         $message = 'Modifié avec succés !';
            //         # message erreur FlashMessage::set , ERROR mauvais mdp
            //     }
                
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
include __DIR__ . '/../../views/login/sign-in.php';
include __DIR__ . '/../../views/login/templates/footer-login.php';
