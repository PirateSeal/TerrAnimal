<?php
  $req_data = "SELECT * FROM users WHERE pseudo='".$_SESSION["pseudo"]."'";
  $req_how_much = "SELECT COUNT(*) FROM users WHERE pseudo='".$pseudo."' ";
  $req_pseudo = "UPDATE users SET pseudo = '".$pseudo."' WHERE id_user = '".$data['id_user']."'" ;
  $req_firstname = "UPDATE users SET firstname = '".$firstname."' WHERE id_user = '".$data['id_user']."'";
  $req_name = "UPDATE users SET email = '".$email."' WHERE id_user = '".$data['id_user']."'";
  $req_email = "UPDATE users SET name = '".$name."' WHERE id_user = '".$data['id_user']."'";
  $req_password = "UPDATE users SET password = '".$password."' WHERE id_user = '".$_SESSION['ID']."'";
  $req_delete_account = "DELETE FROM users WHERE id_user = '".$data['id_user']."'";
?>
