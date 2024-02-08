<?php
// REGEX Formulaire d'inscription
define('REGEX_NAME', "^[A-Za-z-éèêëàâäôöûüç' ]+$");
define('REGEX_PASSWORD', '^(?=.*[A-Z])(?=.*\d).{8,}$');
define('REGEX_POSTAL_CODE', '^[0-9]{5}$');
define('REGEX_SIRET', '^[0-9]{14}$');
define('REGEX_PHONE', '^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$');
define('REGEX_ADRESS', "^[0-9]+(?:[ \t]+[a-zA-ZÀ-ÿ0-9_'\-]+)+$");
define('REGEX_CITY', "^[A-Za-z-éèêëàâäôöûüç' ]+$");
define('REGEX_PRICE', "^\d{1,}(,\d{2})?$");
define('REGEX_WEIGHT', "^\d{1,}(,\d{1,3})?$");

?>