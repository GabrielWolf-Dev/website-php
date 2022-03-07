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
    <div class="box-login">
        <main class="container-login">
            <h1 class="title-login">Login do Painel de Controle</h1><!--title-login-->
    
            <form class="form-login">
                <input placeholder="Nome do usuário" class="form-login__input" type="text" name="user" />
                <input placeholder="Senha..." class="form-login__input" type="password" name="pass" />
    
                <button class="form-login__btn-sub" name="action-login" type="submit">Logar</button>
            </form><!--form-login-->
        </main><!--container-login-->
    </div><!--box-login-->
</body>
</html>