<?php
	SESSION_start();
	if (empty($_SESSION["pseudo"])){
		header("location:../index.php");
	}else{
		$data = $_COOKIE['toto'];
		$data = rtrim($data, ";");
		$data = explode(";", $data);
		if (count($data)<2) {
			setcookie("toto", $_GET["id"], time()-1,"/");
			header("location:../controller/caddy_controller.php");
		}else{
			print_r($data);
			print_r($_GET);
			$id=$_GET["id"];
			array_splice($data,$id,1);


			$data = array_values($data);
			$string ="";
			for ($i=0; $i <count($data) ; $i++) {
				$string = $string.";".$data[$i];
			}
			$string = ltrim($string, ";");
			setcookie("toto", $string, time()+3600,"/");
			header("location:../controller/caddy_controller.php");
		}
	}

	
?>
