<?php
	require_once("../controller/db_connexion.php");
	$sql = 'select users.id_user from users join transactions_lines join transactions on users.id_user = transactions.id_seller and transactions.id_transaction = transactions_lines.id_transaction where transactions_lines.id_transaction_line ='.$transa.';';
	$req = $db_connexion->query($sql);
	$data = $req -> fetch();
	$seller = $data[0];
?>