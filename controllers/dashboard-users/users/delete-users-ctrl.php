<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/User.php';

try {

    $id_user = $_SESSION['user']->id_user;
    $user = User::get($id_user);

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {

        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $passwordHash = $user->password;

        $isAuth = password_verify($hashPassword, $passwordHash);

        if ($isAuth) {
            $isDelete = Product::delete($id_user);
            header('location: /controllers/home-ctrl.php');
            die;
        } else {
            $errors['password'] = 'Mot de passe incorrect. Veuillez réessayer.';
        }
    }


} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}

