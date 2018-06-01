<?php
  $req_login = "SELECT COUNT(*) FROM users WHERE pseudo='".$pseudo."' AND password='".$password."'";
  $req_data = "SELECT * FROM users WHERE pseudo='".$_SESSION["pseudo"]."'";
?>
