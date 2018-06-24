<!DOCTYPE html>
<html>
  <head>
    <script src="../view/bootstrap1.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"></script>
    <script src="../view/bootstrap2.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"></script>
    <script src="../view/bootstrap3.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" ></script>
    <link rel="stylesheet" href="../view/bootstrap.css" >
    <link rel="stylesheet" href="../view/style.css">
    <title>TerraBay</title>
    <meta charset="UTF-8">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

      <a class="navbar-brand" href="../controller/home_controller.php">
      <img src="../view/images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">TerraBay</a>
      <div class="collapse navbar-collapse row ml-3" id="navbarSupportedContent">



        <ul class="navbar-nav mr-auto col-lg-4 text-center">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="../controller/home_controller.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../controller/add_article_display.php">Add an article</a>
              <a class="dropdown-item" href="../controller/my_article.php">Modify your article</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../controller/account_controller.php">Settings</a>
            </div>
          </li>
          <li class="nav-item"><a class="nav-link" href="../controller/offer_of_the_hour_controller.php">Offer of the hour</a></li>
          <?php
            if (isset($_SESSION['admin'])) {
               echo "<li class='nav-item'><a class='nav-link' href='../controller/backoffice_controller.php'>BO</a></li>";
            }
          ?>
        </ul>



        <form class="form-inline col-lg-5 text-center" action="../controller/home_controller.php?go=search" method="post">
          <select class="form-control"><option>Species</option></select>
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
          <input type="image" src="../view/images/search.svg"  name="search" alt="Supprimer" width="30" height="30">
        </form>


        <div class="collapse navbar-collapse col-lg-3 mr-auto" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto float-right">
            <li class="nav-item"><a class="nav-link mr-4" href="#"> You got 5000<img src="../view/images/monney.svg" width="20" height="20" class="d-inline-block align-top" alt=""></a></li>
            <a class="navbar-brand" href="../controller/caddy_controller.php">
            <img src="../view/images/caddy.svg" width="30" height="30" class="d-inline-block align-top" alt=""></a>
            <a class="navbar-brand" href="../controller/disconnect.php">
            <img src="../view/images/disconnect.svg" width="30" height="30" class="d-inline-block align-top" alt=""></a>
          </ul>
        </div>
    </nav>
    <br>
