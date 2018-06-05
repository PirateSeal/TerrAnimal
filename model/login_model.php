<?php 
$req_login = "SELECT COUNT(*) FROM users WHERE pseudo='".$pseudo."' AND password='".$password."'"; 
$req_status = "SELECT * FROM users WHERE pseudo LIKE '".$pseudo."';";
?>
