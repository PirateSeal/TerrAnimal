<?php

  try{
    $db_connexion=new PDO("mysql:host=localhost;dbname=bdd_terrabay","root","");
  } catch(PDOException $e){
    echo "Failed to connect to the database .";
  }

?>
