<?php
 require_once("../controller/loged_or_not.php");
 require_once("../controller/db_connexion.php");
 include("../view/header.php");
echo "<center><h2>Adding credits</h2></center>";
 if (isset($_GET["add"])){
   if (is_numeric($_GET["add"])) {
    $add = $_GET["add"]+$_SESSION["monney"];
    $req_add_monney = "UPDATE users SET balance='".$add."' WHERE id_user='".$_SESSION['ID']."'";
    $req_monney = $db_connexion->prepare($req_add_monney);
    $req_monney->execute();
    $_SESSION["monney"] = $add;
    header("refresh:5 ; url=../controller/controller_monney.php");
    echo "<div id='box'><br>You account will be accredited to ".$_GET['add']." in 5 seconds.<br><br></div>";
  }else {
    header("location:../controller/controller_monney.php?error=number");
  }
}else {
  if (isset($_GET["error"])){
    echo "Please enter a number";
  }
  echo "<div id='box'><br>
        <form action='../controller/controller_monney.php' method='GET'>
        <input type='number' name='add' value=''>
        <button class='button1'>Add money</button>
        <br><br></div>";
 }
?>
