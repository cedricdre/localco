<?php

class Image {

public static function resize(){

    if ($_FILES['picture']['error'] != 0) {
        throw new Exception("Erreur");
    }
    if (!in_array($_FILES['picture']['type'], TYPES_MIME)) {
        throw new Exception("Le format de l'image n'est pas autorisée");
    }
    if ($_FILES['picture']['size'] > MAX_SIZE) {
        throw new Exception("Le fichier est trop lourd");
    }
    $from = $_FILES['picture']['tmp_name'];
    $picturename = uniqid('img_');
    $extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
    $to = __DIR__ . '/../../../public/uploads/product-sheet/' .$picturename.'.'.$extension;
    $picture = $picturename. '.' . $extension;
    move_uploaded_file($from, $to);

    $image = imagecreatefromjpeg($to);
    $widthOrigninal = imagesx($image);
    $heightOrigninal = imagesy($image);
    $ratio = $heightOrigninal / $widthOrigninal;
    $width = 800;
    $height = $width * $ratio;
    $mode = IMG_BICUBIC;

    $resempledObject = imagescale($image,$width, $height, $mode);
    imagejpeg($resempledObject, $to, 80);
    
}

}


