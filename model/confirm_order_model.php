<?php
	require_once("../controller/db_connexion.php");
	//on recup les informations du cookie
	$data = $_COOKIE['toto'];
	$data = explode(";", $data);
	//on compte le nbr d'occurence des indices
	$caddy = array_count_values($data);

	//on remonte le prix et l'id du vendeur correspondant aux ids article du cookie
	for ($i=0; $i < count($data); $i++) { 
		$sql = 'select unit_price, articles.id_user, balance, id_article, stock from articles inner join users on users.id_user=articles.id_user where id_article ='.$data[$i];
		$req = $db_connexion->query($sql);
		while($row = $req->fetch(PDO::FETCH_ASSOC)){
			$recup[$i] = $row;
		}
	}
	var_dump($recup);

	//on récupère l'argent que possède l'utilisateur 
	$sql ='select balance, id_user from users where pseudo = "'.$_SESSION['pseudo'].'"';
	$req = $db_connexion->query($sql);
	$balance_buyer = $req->fetch(PDO::FETCH_ASSOC);

	//on vérifie si l'acheteur à assez d'argent 
	$total_price =0;
	for ($i=0; $i < count($recup) ; $i++) { 
		$total_price = $total_price + $recup[$i]['unit_price'];
	}
	if ($total_price > $balance_buyer['balance']) {
		$enough_money = 0;
	//si il a assez d'argent
	}else{


		$balance=0;

		//on retire l'argent du compte de l'acheteur
		$balance = $balance_buyer['balance'] - $total_price;
		$sql ="update users set balance = '".$balance."' WHERE pseudo = '".$_SESSION['pseudo']."'";
		$db_connexion->exec($sql);

		//on ajoute l'argent aux comptes vendeurs
		for ($i=0; $i < count($recup) ; $i++) { 
			$balance = $recup[$i]['balance'];
			$balance = $balance + $recup[$i]['unit_price'];
			$sql ='update users set balance="'.$balance.'" WHERE id_user="'.$recup[$i]['id_user'].'"';
			$db_connexion->exec($sql);
		}

	
		//on enregistre la transaction dans order & order_line
		$j=0;
		$k=0;
		echo "<br>";
		echo "<br>";
		$a=0;
		for ($i=0; $i <count($recup) ; $i++) {
			$k=0;
			foreach ($caddy as $key => $value) {
				foreach ($caddy as $keybis => $valuebis) {
					
					////////////
					$verif =1;
					if ($j==$k) {
						if ($j!==0) {
							$l=0;
							foreach ($caddy as $a => $b) {
								if ($a == $key && $l<$j) {
									$verif=0;
								}
								$l++;
							}
						}
					}
					//////////////
					if ($j!==$k && $key==$keybis  || $k<$j || $verif==0 ||$a==1 && $j==0) {
						######
					}else{
						$a=1;
						$sql = "insert into transactions (id_transaction, id_buyer, id_seller, date) values (NULL,".$balance_buyer['id_user'].",".$recup[$i]['id_user'].", CURDATE() )";
						$db_connexion->exec($sql);
						$sql="select max(id_transaction) as id_transaction from transactions";
						$req = $db_connexion->query($sql);
						$orders = $req->fetch(PDO::FETCH_ASSOC);
						$sql = "insert into transactions_lines (id_transaction_line, id_transaction, id_article, quantity) values (NULL,".$orders['id_transaction'].",".$key.", ".$value.")";
						$db_connexion->exec($sql);

						echo "<br>";
					}
					$k++;
				}
				$j++;
			}
		}
			

		

		//on ajuste les quantité en stock, on supprime si jamais le stock est épuisé
		for ($i=0; $i < count($recup); $i++) { 
			foreach ($caddy as $key => $value) {
				if ($recup[$i]['id_article'] == $key) {
					if ($recup[$i]['stock']== $value) {
						$sql ="update articles set status='unavailable' where id_article='".$key."'";
						$db_connexion->exec($sql);
						$sql ="update articles set stock='0' where id_article='".$key."'";
						$db_connexion->exec($sql);
					}else{
						$stock = $recup[$i]['stock']-$value;
						$sql = "update articles set stock='".$stock."' where id_article='".$key."'";
						$db_connexion->exec($sql);
					}
				}
			}
		}
		
		

		//on supprime le cookie
		setcookie("toto", "0", time()-1,"/");
	}
?>