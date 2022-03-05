<?php include_once('config.php') ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>css/style.css">
    <title>Website PHP</title>
</head>
<body>
    <header class="header">
        <a class="header__logo" href="<?php echo INCLUDE_PATH ?>">Logo Marca</a>

        <nav class="header__menu-desktop">
            <ul>
                <li class="header__item-list"><a class="header__item-link" href="<?php echo INCLUDE_PATH ?>">Home</a></li>
                <li class="header__item-list"><a class="header__item-link" href="<?php echo INCLUDE_PATH ?>#Depoiments">Depoimentos</a></li>
                <li class="header__item-list"><a class="header__item-link" href="<?php echo INCLUDE_PATH ?>#Hab">Habilidades</a></li>
                <li class="header__item-list"><a class="header__item-link" href="<?php echo INCLUDE_PATH ?>contato">Contato</a></li>
            </ul>
        </nav>

        <nav class="header__menu-mobile">
            <button class="header__menu-mobile-btn">
                <i class="fa fa-bars header__menu-mobile-icon" aria-hidden="true"></i>
            </button><!--header__menu-mobile-btn-->

            <ul class="header__menu-mobile-menu-list">
                <li class="header__menu-mobile__item"><a class="header__menu-mobile__link" href="<?php echo INCLUDE_PATH ?>">Home</a></li>
                <li class="header__menu-mobile__item"><a class="header__menu-mobile__link" href="<?php echo INCLUDE_PATH ?>#Depoiments">Depoimentos</a></li>
                <li class="header__menu-mobile__item"><a class="header__menu-mobile__link" href="<?php echo INCLUDE_PATH ?>#Hab">Habilidades</a></li>
                <li class="header__menu-mobile__item"><a class="header__menu-mobile__link" href="<?php echo INCLUDE_PATH ?>contato">Contato</a></li>
            </ul><!--header__menu-mobile-menu-list-->
        </nav><!--header__menu-mobile-->
    </header><!--header-->

    <?php
        $isUrl = isset($_GET['url']) ? $_GET['url'] : 'home';
        $pathUrl = 'pages/'.$isUrl.'.php';

        if(file_exists($pathUrl)) {
            $page404 = false;
            include($pathUrl);
        } else {
            $page404 = true;
            include('pages/404.php');
        }
    ?>

    <footer
        class="<?php 
        if(isset($page404) && $page404 === true) echo 'footer--fixed';
        else echo 'footer' ?>"
    >
        <h4 class="footer__content">Todos os direitos reservados</h4>
    </footer>
    <script src="<?php echo INCLUDE_PATH ?>js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo INCLUDE_PATH ?>js/scripts.js"></script>
    <?php if($isUrl === 'home' || $isUrl === '') { ?>
        <script src="<?php echo INCLUDE_PATH ?>js/slider.js"></script>
    <?php } ?>
    <?php if($isUrl === 'contato') { ?>
        <script src="<?php echo INCLUDE_PATH ?>js/form.js"></script>
    <?php } ?>
</body>
</html>