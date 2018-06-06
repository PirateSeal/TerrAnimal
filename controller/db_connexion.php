<?php

  try{
    $db_connexion=new PDO("mysql:host=localhost;dbname=db_terrabay","guillaume","toor");
  } catch(PDOException $e){
    echo "Failed to connect to the database .";
  }

?>
