<?php
define('DSN', 'mysql:dbname=localco;host=localhost');
define('USER', 'cedric_localco');
define('PASSWORD', 'rNHJCWWHqZ]bQj)]');

// CONSTANTS Formulaire d'inscription
// define('PRODUCT_TYPES', [
//     'Fruits et Légumes',
//     'Produits laitiers',
//     'Viande et Charcuterie',
//     'Poisson et Fruits de mer',
//     'Pain et Pâtisseries',
//     'Fromages locaux',
//     'Miel et Produits apicoles',
//     'Produits artisanaux',
//     'Épicerie locale',
//     'Boissons locales (vin, bière, etc.)',
//     'Plats préparés',
//     'Plantes et Fleurs',
//     'Produits de beauté et bien-être',
//     'Artisanat local',
//     'Textiles et Vêtements',
//     'Objets de décoration',
//     'Produits pour animaux',
//     'Autres produits locaux'
// ]);
define('CERTIFICATIONS', [
    'AOP',
    'AOC',
    'IGP',
    'Label Rouge'
]);
define('UNITS_MEASURE', [
    'g', 
    'kg',
    'cl', 
    'mL', 
    'L' 
]);
define('TVA', [
    '5.5', 
    '10', 
    '20'
]);
define('TYPES_MIME', ['image/jpeg','image/png']);
define('MAX_SIZE', ['2*1024*1024']);

define('ERROR', 0);
define('SUCCESS', 1);

define('NB_RESULTS_PAGE', 12);

?>
