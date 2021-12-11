<!DOCTYPE html>
<html>
  <head>
    <title>Quick and affordable  cars – YouBuyAnyCar</title>
    <link rel="stylesheet" href="./css/styles.css"/>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5f1e196da0.js" crossorigin="anonymous"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.6.1/mapbox-gl.css' rel='stylesheet' />
    <link rel="icon" href="./images/favicon.ico">
    
  </head>
  <body id="page-<?php echo $page; ?>">
    <header>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
    setTimeout(function() {
        $('.loggedInModal').fadeOut('slow');
    }, 5000);
    </script>
    <?php
    if ($_SESSION['show_login']) {
      echo '<div class="myModal loggedInModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Logged in successfully!</h5>
                        </div>
                    </div>
                </div>
            </div>
      ';
      $_SESSION['show_login'] = false;
    }
    ?>
      <div class="page-header-top text-center text-md-start container" aria-label="YouBuyAnyCar logo">
        <a href="index.php"><img src="images/logo.png" alt="YouBuyAnyCar logo"></a>
      </div>
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link<?php echo $page == "home" ? " active" : "" ?>" href="index.php?p=home">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link<?php echo $page == "faq" ? " active" : "" ?>" href="index.php?p=faq">FAQ</a>
            </li>

            <?php
            //is logged in
            if($_SESSION['is_loggedin']) { ?>
              <li class="nav-item">
              <a class="nav-link<?php echo $page == "account" ? " active" : "" ?>" href="index.php?p=account">My Account</a>
              </li>
              <li class="nav-item">
              <a class="nav-link<?php echo $page == "basket" ? " active" : "" ?>" href="index.php?p=basket">My Basket</a>
              </li>
              <?php
              // if Admin
              if ($_SESSION['user_data']['user_type'] == 'ADMIN' || $_SESSION['user_data']['user_type'] == 'SUPER') { ?>
                <li class="nav-item">
                <a class="nav-link<?php echo $page == "caradmin" ? " active" : "" ?>" href="index.php?p=caradmin">Car admin</a>
                </li>
              <?php
              // if SuperAdmin
              } if ($_SESSION['user_data']['user_type'] == 'SUPER') { ?>
                <li class="nav-item">
                <a class="nav-link<?php echo $page == "useradmin" ? " active" : "" ?>" href="index.php?p=useradmin">User admin</a>
                </li>
                
              <?php } ?>
              <li class="nav-item">
              <a class="nav-link<?php echo $page == "logout" ? " active" : "" ?>" href="index.php?p=logout">Logout</a>
              </li>
            <?php } else { ?>
              <li class="nav-item">
              <a class="nav-link<?php echo $page == "login" ? " active" : "" ?>" href="index.php?p=login">Login / Register</a>
              </li>
            <?php } ?>
            </ul>
            </div>
        </div>
      </nav>
    </header>
   