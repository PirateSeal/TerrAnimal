<?php

if (isset($_POST["go"])){
  if ($_POST["go"] == "login"){
    include("../view/login.php");
  } elseif ($_POST["go"] == "subscribe"){
    include("../view/subscribe.php");
  }
}
?>
