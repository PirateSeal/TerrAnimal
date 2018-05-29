<?php
$how_much = $db_connexion->query("SELECT COUNT(*) FROM users WHERE pseudo='".$pseudo."' ")->fetch();

$sql = "INSERT INTO users (id_user, pseudo, email, firstname, name, note, password)
VALUES (NULL, '".$pseudo."','".$email."','".$firstname."', '".$name."', '2.5', '".$password."')";

?>
