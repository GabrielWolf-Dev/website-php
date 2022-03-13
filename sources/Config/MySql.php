<?php

namespace Source\Config;

use Exception;
use PDO;

class MySql {
    private static $pdo;

    public static function connect() {
        if(self::$pdo == null){
            try {
                self::$pdo = self::$pdo = new PDO('mysql:host='.DB_LOGIN['host'].';dbname='.DB_LOGIN['db_name'], DB_LOGIN['user'], DB_LOGIN['password'], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(Exception $e) {
                echo 'Erro ao conectar no banco de dados!';
            }
        }

        return self::$pdo;
    } 
}