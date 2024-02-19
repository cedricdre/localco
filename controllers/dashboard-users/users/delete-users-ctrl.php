<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/User.php';

try {

    $title = 'Suppression du compte';

    $id_user = $_SESSION['user']->id_user;
    $user = User::get($id_user);

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {

        $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

        $passwordHash = $user->password;

        $isAuth = password_verify($password, $passwordHash);

        if ($isAuth) {
            $isDelete = User::delete($id_user);
            unset($_SESSION['user']);
            header('location: /');
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
include __DIR__.'/../../../views/templates/header.php';
include __DIR__.'/../../../views/dashboard-users/users/delete-users.php';
include __DIR__.'/../../../views/templates/shop-hover.php';
include __DIR__.'/../../../views/templates/footer.php';

