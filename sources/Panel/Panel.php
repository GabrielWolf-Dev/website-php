<?php

namespace Source\Panel;

class Panel {

    public static function logged() {
        return isset($_SESSION['login']) ? true : false;
    }

    public static function loggout() {
        session_destroy();
        header('Location: '.INCLUDE_PATH_PANEL);
    }

    public static function getPermission($type) {
        $permissions = [
            "0" => "Normal",
            "1" => "Sub Administrador",
            "2" => "Administrador"
        ];

        return $permissions[$type];
    }

}