<?php
  if ( !empty( $_SESSION["pseudo"] )){
    header("location:../index.php");
  } else {
    header("location:../home.php");
  }
?>
