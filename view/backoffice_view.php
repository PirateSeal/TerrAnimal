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
    // BAN A MEMBER
        if (isset($srv_user)) {
            echo 'Ban a member : <br><form action="../controller/backoffice_controller.php" method="get"><select name="ban">';
            $alert_user = "return confirm('Are you sure you want to ban this user ?')";
            for ($i=0; $i<count($srv_user) ; $i++) { 
                if ($srv_user[$i]['pseudo']!== $_SESSION['pseudo'] || $srv_user[$i]['status'] !== 'admin') {
                    echo '<option value="'.$srv_user[$i]['id_user']. '">'.$srv_user[$i]['pseudo'].'</option>';
                }
            }
            echo '</select> 
                <input type="submit" value="Ban"'.$alert.'/>
            </form>
            <br><br>';
        }

    // RM SPECIE
        $srv_specie = array('felines','canides','poissons','humains','insectes','noirs','esclaves','8','9','10','11','12','13','14','15');

        echo '<table class="table" border="1" cellpadding="5" cellspacing="0.5" width="18%">
            <tr class="row"><td class="col" colspan="10" align="center">Specie</td></tr><tr class="row">';
        for ($i=0; $i<count($srv_specie); $i++) {
            for ($j=0; $j<10 ; $j++) {
                echo '<td class="col" align="center">'.$srv_specie[$i].'</td>';
            }
            echo '</tr>';
        }
        echo '</table><br><br>';

    // RM ARTICLE
        if (isset($srv_art)) {
            $alert_art = "return confirm('Are you sure you want to remove this article ?')";
            for ($i=0; $i<count($srv_art) ; $i++) { 
                echo '<table class="table" border = "1" cellpadding = "5" cellspacing = "0.5" width="18%">
                    <tr class="row">
                        <td class="col" colspan="3" align = "center"><img src="'.$srv_art[$i]['photo_path'].'" height="50%" width="50%"></td>
                    </tr>
                    <tr class="row">
                        <td class="col" align = "center">Specie : <br>'.$srv_art[$i]['specie'].'</td>
                        <td class="col" align = "center">Name : <br>'.$srv_art[$i]['name'].'</td>
                        <td class="col" align = "center">Unit price : <br>'.$srv_art[$i]['unit_price'].'$</td>
                    </tr>
                    <tr class="row">
                        <td class="col" colspan="3" align = "center">'.
                            $srv_art[$i]['pseudo'].
                        '</td>
                    </tr>
                    <tr>
                        <td class="col" colspan="3" align = "center">
                            <a href="../controller/backoffice_controller.php?remove_article='.$srv_art[$i]['id_article'].'">
                                <button onclick="'.$alert_art.'">Remove article</button>
                            </a>
                        </td>
                    </tr>
                </table><br>';    
            }
        }        
    ?>

</body>
</html>