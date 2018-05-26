<?php
	SESSION_start();
		if (empty($_SESSION["pseudo"])){
			header("location:index.php");
		}

	$data = $_COOKIE['toto'];
	$data = explode(";", $data);
	if (count($data)<2) {
		setcookie("toto", $_GET["id"], time()-1,"/");
		header("location:../caddy.php");
	}else{
		$id=$_GET["id"];
		array_splice($data,$id,1);
		$data = array_values($data);
		$string ="";
		for ($i=0; $i <count($data) ; $i++) {
			$string = $string.";".$data[$i];
		}
		$string = ltrim($string, ";");
		setcookie("toto", $string, time()+3600,"/");
		header("location:../caddy.php");
	}
?>
