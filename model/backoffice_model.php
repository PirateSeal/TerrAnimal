<?php

$mbr = 'SELECT id_user, pseudo, users.name, firstname, balance, users.status, email, note,  (SELECT COUNT(*) FROM articles WHERE articles.id_user = users.id_user) AS nbr_article FROM users ORDER BY pseudo;';

$art = 'SELECT u.pseudo, a.id_article, a.photo_path, s.name AS specie, a.description AS name, a.unit_price FROM users AS u JOIN articles AS a JOIN species AS s ON u.id_user = a.id_user AND a.id_specie = s.id_specie ORDER BY u.pseudo, name;';

$spe = 'SELECT * FROM species;';

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

$req = $db_connexion->query($spe);
$i=0;
while ($row = $req->fetch(PDO::FETCH_ASSOC)){
    $srv_specie[$i]=$row;
    $i++;
}

?>