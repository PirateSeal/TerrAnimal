<?php

SESSION_start();
if (empty($_SESSION["pseudo"])){
  header("location:../index.php");
}

?>