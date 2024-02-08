<?php

class SessionAuth{
    public static function admin() {
        if (empty($_SESSION['user']) || $_SESSION['user']->admin != 1) {
            header('location: /');
            die;
        }
    }

    public static function producer() {
        if (empty($_SESSION['user']) || $_SESSION['user']->producer != 1) {
            header('location: /');
            die;
        }
    }
    
}