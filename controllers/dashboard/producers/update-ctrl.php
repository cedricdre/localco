<?php
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../models/User.php';

SessionAuth::admin();

try {
    $title = 'Modifier un producteur';

    // Récupération du paramètre d'URL correspondant à l'id
    $id_user = intval(filter_input(INPUT_GET, 'iduser', FILTER_SANITIZE_NUMBER_INT));
    $producer = User::get($id_user);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $error = []; 
        // Récupération et nettoyage des valeurs





        if (Pickup::isExist($pickup_name) && $pickup_name != $pickup->pickup_name) {
            $error['pickup_name'] = 'Ce lieu de retrait existe déjà !';
        }

        if (empty($error)) {
            $producerObj = new User();

            $producerObj->setIdUser($id_user);

            
            $isOk = $producerObj->update();
            
            if($isOk){
                $message = 'Modifié avec succés !';
            }
        }
    }
    // Récupération de la catégorie selon son id
    $producer = Pickup::get($id_user);

} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}

include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/producers/update.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';