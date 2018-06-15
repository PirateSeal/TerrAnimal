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
		
		for ($i=0; $i < count($recup); $i++) { 
			$sql = "insert into orders (id_order, id_buyer, id_seller) values (NULL,".$balance_buyer['id_user'].",".$recup[$i]['id_user']." )";
			$db_connexion->exec($sql);
			$sql="select max(id_order) as id_order from orders";
			$req = $db_connexion->query($sql);
			$orders = $req->fetch(PDO::FETCH_ASSOC);
			for ($i=0; $i < count($recup); $i++) { 
				foreach ($caddy as $key => $value) {
					if ($recup[$i]['id_article'] == $key) {
						$sql = "insert into orders_lines (id_order_line, id_order, id_article, quantity) values (NULL,".$orders['id_order'].",".$recup[$i]['id_article'].",".$value." )";
						$db_connexion->exec($sql);
					}
				}
			}

		}
		

		//on ajuste les quantité en stock, on supprime si jamais le stock est épuisé
		for ($i=0; $i < count($recup); $i++) { 
			foreach ($caddy as $key => $value) {
				if ($recup[$i]['id_article'] == $key) {
					if ($recup[$i]['stock']== $value) {
						$sql ="update articles set status='unavailable' where id_article='".$key."'";
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