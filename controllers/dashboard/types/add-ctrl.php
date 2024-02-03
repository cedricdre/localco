<?php
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Type.php';

try {
    $title = 'Ajout type de produits';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $error = []; 
        // récupération valeurs + nettoyage
        $type_name = filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($type_name)) {
            $error['type_name'] = 'Ce champ est obligatoire !';
        } else {
            $isValid = filter_var($type_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NAME . '/')));
            if (!$isValid) {
                $error['type_name'] = 'Votre nom doit contenir que des caractères majuscules et/ou minuscules';
            }
        }
        if (Type::isExist($type_name)) {
            $error['type_name'] = 'Ce type de produits existe déjà !';
        }
        if (empty($error)) {
            $type = new Type();
            $type->setTypeName($type_name);

            $result = $type->insert();

            // Si la méthode a retourné "true", alors on redirige vers la liste
            if($result){
                header('location: /controllers/dashboard/types/list-ctrl.php');
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
include __DIR__ . '/../../../views/dashboard/types/add.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';