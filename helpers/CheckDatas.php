<?php

class CheckDatas{
    public static function getErrors(array $datas): array{

        $errors = [];
        foreach ($datas as $input => $value) {
            if($value === false){
                $errors[$input] = 'Veuillez respecter le format attendu pour :' . $input;
            }
        }
        return $errors;
    }
}