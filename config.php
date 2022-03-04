<?php
    require_once('vendor/autoload.php');

    // Variable Enviroment Config:
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    // My Autoload:
    $autoload = function($class) {
        $classRefactBar = str_replace('\\', '/', $class); // Alterar o "\" do namespace para "/", pois Linux não entende.
        $path = 'sources/'.$classRefactBar.'.php';

        if(file_exists($path))
            include($path);
    };
    spl_autoload_register($autoload);

    // Constants
    define('MAIL', [
        "host" => 'localhost',
        "port" => $_ENV['PORT'],
        "user" => $_ENV['EMAIL'],
        "passwd" => $_ENV['PASS'],
        "from_name" => "User Mailer",
    ]);
    define('INCLUDE_PATH', 'http://localhost/website-php/');
?>