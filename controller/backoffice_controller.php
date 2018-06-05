<?php
session_start();
require_once("../controller/db_connexion.php");
$admin = 'SELECT id_user, pseudo, users.status FROM users WHERE pseudo LIKE "'.$_SESSION['pseudo'].'";';
$req = $db_connexion->query($admin);

$bo_user = $req->fetch();

if ($bo_user['status'] !== 'admin') {
    header("location:../index.php");
};

require('../model/backoffice_model.php');
require('../view/backoffice_view.php');

if (isset($_GET['ban'])) {
    $ban = 'DELETE FROM users WHERE id_user ='.$_GET['ban'].';';
    $db_connexion->exec($ban);    
    echo '<meta http-equiv="refresh" content="0.5;URL=../controller/backoffice_controller.php">'; 
}

?>