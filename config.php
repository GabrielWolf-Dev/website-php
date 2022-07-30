<?php
    require_once('vendor/autoload.php');

    // Error Identify PHP
    ini_set('display_errors', 1);
    ini_set('display_startup_erros', 1);
    error_reporting(E_ALL);

    // Variable Enviroment Config:
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    // Constants
    define('MAIL', [
        "host" => 'smtp.gmail.com',
        "port" => 587,
        "from_email" => $_ENV['EMAIL'],
        "passwd" => $_ENV['PASS'],
        "from_name" => "User Name",
    ]);
    define('INCLUDE_PATH', 'http://localhost/website-php/');