<?php
    include_once('../config.php');
    use Source\Panel\Panel;
    
    if(Panel::logged() == false) {
        include_once('login.php');
    } else {
        include_once('main.php');
    }
?>