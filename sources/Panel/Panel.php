<?php

namespace Source\Panel;

class Panel {
    public static function logged() {
        return isset($_SESSION['login']) ? true : false;
    }
}