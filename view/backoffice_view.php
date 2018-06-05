<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Backoffice_TerraBay</title>
</head>
<body>
    <h1 align = center>Backoffice TerraBay</h1>
    
    <a href="../controller/disconnect.php"><button>Disconnect</button></a> <br>
    <a href="../controller/home_controller.php"><button>Leave BO</button></a> <br> <br>  
    
    <?php
        echo 'Ban a member : <br><form action="../controller/backoffice_controller.php" method="get"><select name="ban">';
        for ($i=0; $i<count($srv_user) ; $i++) { 
            if ($srv_user[$i]['id_user']!== $_SESSION['pseudo']) {
                echo '<option value="'.$srv_user[$i]['id_user']. '">'.$srv_user[$i]['pseudo'].'</option>';
            }
        }
        echo '</select> <input type="submit" value="Ban">
            </form>'; 
    ?>
</body>
</html>