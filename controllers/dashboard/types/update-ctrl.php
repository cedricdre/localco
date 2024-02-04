<?php
require_once __DIR__ . '/../../../config/regex.php';
require_once __DIR__ . '/../../../models/Type.php';

try {
    $title = 'Modifier un type de produits';

    // Récupération du paramètre d'URL correspondant à l'id de la catégorie cliquée
    $id_type = intval(filter_input(INPUT_GET, 'idtype', FILTER_SANITIZE_NUMBER_INT));
    $type = Type::get($id_type);

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
        if (Type::isExist($type_name) && $type_name != $type->type_name) {
            $error['type_name'] = 'Ce type de produits existe déjà !';
        }
        if (empty($error)) {
            $typeObj = new Type();

            $typeObj->setIdType($id_type);
            $typeObj->setTypeName($type_name);
            
            $isOk = $typeObj->update();
            
            if($isOk){
                $message = 'Modifié avec succés !';
            }
        }
    }
    // Récupération de la catégorie selon son id
    $type = Type::get($id_type);

} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
    include __DIR__ . '/../../../views/dashboard/templates/error.php';
    include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';
    die;
}

include __DIR__ . '/../../../views/dashboard/templates/header-dashboard.php';
include __DIR__ . '/../../../views/dashboard/types/update.php';
include __DIR__ . '/../../../views/dashboard/templates/footer-dashboard.php';