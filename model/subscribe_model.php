<?php

$req_subscribe = "SELECT COUNT(*) FROM users WHERE pseudo='".$pseudo."'";

$sql = "INSERT INTO users (id_user, pseudo, email, firstname, name, note, password)
VALUES (NULL, '".$pseudo."','".$email."','".$firstname."', '".$name."', '2.5', '".$password."')";

?>
