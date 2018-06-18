<?php
	require_once("../controller/db_connexion.php");
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{
/*		$sql = 'select vote_token from transactions_lines where id_transactions_lines = '.$transa.';';
		$req = $db_connexion->query($sql);
		$data = $req -> fetch();
		$id= $data[0];
		unset($data);
*/
		$sql0 = 'update transactions_lines set vote_token = 0 where id_transaction_line = '.$transa.';';
		$temp = $db_connexion->prepare($sql0);
		$temp->execute();

		$sql2 = 'select note, vote_nbr from users where id_user ='.$iduser.';';
		$req2 = $db_connexion->query($sql2);
		$i=0;
		while ($row = $req2 -> fetch(PDO::FETCH_ASSOC)) {
			$vote = $row;
		}

		$vote['vote_nbr']++;
		$note = ($vote['note'] + $_POST['note'])/$vote['vote_nbr'];

		$sql = 'update users set note ="'.$note.'", vote_nbr ="'.$vote.'";';
		$temp = $db_connexion->prepare($sql);
		$temp->execute();

	}
?>