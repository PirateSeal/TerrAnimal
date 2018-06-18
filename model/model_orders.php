<?php

require("../controller/db_connexion.php");

$transactions = array();

$sql = "SELECT
    a.description,
    a.unit_price,

    t.id_transaction,
    t.id_buyer,
    t.id_seller,
    DATE_FORMAT(t.date, '%a %d %M %Y') AS date_transaction,

    tl.id_transaction_line,
    tl.id_article,
    tl.quantity,
    tl.quantity*a.unit_price AS prix_total,
    tl.vote_token,

    users.pseudo AS seller
FROM users
    JOIN articles AS a
    JOIN transactions_lines AS tl 
    JOIN transactions AS t
ON users.id_user = t.id_seller 
    AND tl.id_article = a.id_article 
    AND t.id_transaction = tl.id_transaction 
WHERE t.id_buyer = ".$_SESSION['ID']."
ORDER BY t.date DESC, tl.id_transaction_line ASC
;";

$req = $db_connexion->query($sql);
$i=0;
while ($row = $req->fetch(PDO::FETCH_ASSOC)){
    $transactions[$i]=$row;
    $i++;
}

?>