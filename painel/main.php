<?php
  use Source\Panel\Panel;

  if(isset($_GET['loggout'])) {
    Panel::loggout();
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php INCLUDE_PATH_PANEL ?>css/style.css">
    <title>Painel de controle</title>
</head>
  <body>
    <aside class="menu">
      <nav class="box-user">
        <?php if($_SESSION['img'] == '') { ?>
          <div class="avatar-user">
            <i class="fa fa-user"></i>
          </div>
        <?php } else { ?>
          <div class="img-user">
            <img 
              src="<?php echo INCLUDE_PATH_PANEL ?>uploads/<?php echo $_SESSION['img'] ?>" 
              alt="<?php echo $_SESSION['name'] ?>" 
            />
          </div>
        <?php } ?>
        <div class="name-user">
          <p><?php echo $_SESSION['name'] ?></p>
          <p><?php echo Panel::getPermission($_SESSION['permission']); ?></p>
        </div>
      </nav>
    </aside>

    <header class="header-panel">
      <div class="center">
        <div class="menu-btn">
          <i class="fa fa-bars"></i>
        </div>

        <nav class="loggout">
          <a href="<?php echo INCLUDE_PATH_PANEL ?>?loggout">
            <i class="fa fa-window-close"></i>
            <span>Sair</span>
          </a>
        </nav>
      </div>
    </header>

    <main class="panel">
      <div class="box-panel left w50"></div>

      <div class="box-panel right w50"></div>

      <div class="clear"></div>
    </main>

    <div class="clear"></div>

    <script src="<?php echo INCLUDE_PATH ?>js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo INCLUDE_PATH_PANEL ?>/js/menuMobile.js"></script>
  </body>
</html>