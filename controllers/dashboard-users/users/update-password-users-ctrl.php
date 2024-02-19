<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/User.php';

try {

    $title = 'Modifier votre mot de passe';

    $id_user = $_SESSION['user']->id_user;
    $user = User::get($id_user);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $error = [];

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

        if (empty($error)) {
            $userObj = new User();
            $userObj->setIdUser($id_user);
            $userObj->setPassword($hashPassword);

            $result = $userObj->updatePassword();

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
include __DIR__.'/../../../views/dashboard-users/users/update-password.php';
include __DIR__.'/../../../views/templates/shop-hover.php';
include __DIR__.'/../../../views/templates/footer.php';

