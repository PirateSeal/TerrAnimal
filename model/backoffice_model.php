<?php

$mbr = 'SELECT id_user, pseudo, users.status FROM users;';
$req = $db_connexion->query($mbr);

$i=0;
while ($row = $req->fetch()){
    $srv_user[$i]=$row;
    $i++;
}

?>