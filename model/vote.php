<?php
	require_once("../controller/db_connexion.php");

		$sql0 = 'update transactions_lines set vote_token = 0 where id_transaction_line = '.$transa.';';
		$temp = $db_connexion->prepare($sql0);
		$temp->execute();

		$sql2 = 'select note, vote_nbr from users where id_user ='.$iduser.';';
		$req2 = $db_connexion->query($sql2);
		while ($row = $req2 -> fetch(PDO::FETCH_ASSOC)) {
			$vote=$row;
		}
		var_dump($vote['vote_nbr']);
		if (!isset($vote['vote_nbr'])) {
			$nb_vote = 2;
		} else {
			$nb_vote = $vote['vote_nbr']++;
		}

		$note = ($vote['note'] + $_POST['note'])/$nb_vote;

		$sql = 'update users set note ='.$note.', vote_nbr ='.$nb_vote.' where id_user='.$iduser.';';
		$temp = $db_connexion->prepare($sql);
		$temp->execute();

?>