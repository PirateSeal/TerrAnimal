<?php

$mbr = 'SELECT id_user, pseudo, users.status FROM users;';

$art = 'SELECT u.pseudo, a.id_article, a.photo_path, s.name AS specie, a.description AS name, a.unit_price FROM users AS u JOIN articles AS a JOIN species AS s ON u.id_user = a.id_user AND a.id_specie = s.id_specie;';

$req = $db_connexion->query($mbr);
$i=0;
while ($row = $req->fetch(PDO::FETCH_ASSOC)){
    $srv_user[$i]=$row;
    $i++;
}

$req = $db_connexion->query($art);
$i=0;
while ($row = $req->fetch(PDO::FETCH_ASSOC)){
    $srv_art[$i]=$row;
    $i++;
}

?>