<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php INCLUDE_PATH_PANEL ?>css/style.css">
    <title>Página de Login | Painel de Controle</title>
</head>
<body>
    <?php
        use Source\Config\MySql;

        if(isset($_POST['action-login'])) {
            $user = strip_tags($_POST['user']);
            $passwd = strip_tags($_POST['passwd']);

            $sql = MySql::connect()->prepare("SELECT * FROM `painel_login-users` WHERE user = ? AND passwd = ?");;
            $sql->execute(array($user, $passwd));

            if($sql->rowCount() == 1) {
                $_SESSION['login'] = true;

                header('Location: '.INCLUDE_PATH_PANEL);
                die();
            } else {
                $_SESSION['login'] = false;

                echo '<aside class="login-error">Usuário ou senha incorretos</aside>';
            }
        }
    ?>
    <div class="box-login">
        <main class="container-login">
            <h1 class="title-login">Login do Painel de Controle</h1><!--title-login-->
            <form class="form-login" method="post">
                <input placeholder="Nome do usuário" class="form-login__input" type="text" name="user" />
                <input placeholder="Senha..." class="form-login__input" type="password" name="passwd" />
    
                <button class="form-login__btn-sub" name="action-login" type="submit">Logar</button>
            </form><!--form-login-->
        </main><!--container-login-->
    </div><!--box-login-->
</body>
</html>