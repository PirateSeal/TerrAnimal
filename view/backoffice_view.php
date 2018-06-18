<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Backoffice_TerraBay</title>
</head>
<body style="font-family: 'red rocket'">
    <h1 align = center style="font-family: 'tele-marines'">Backoffice TerraBay</h1>
    
    <a href="../controller/disconnect.php"><button>Disconnect</button></a> <br>
    <a href="../controller/home_controller.php"><button>Leave BO</button></a> <br> <br>

<?php
    // BAN A MEMBER
        if (isset($srv_user)) {
            echo '<div id="ban">Ban a member : <br><br>';
            $alert_user = "return confirm('Are you sure you want to ban this user ?')";
            for ($i=0; $i<count($srv_user) ; $i++) { 
                // if ($srv_user[$i]['pseudo']!== $_SESSION['pseudo'] || $srv_user[$i]['status'] !== 'admin') {
                    echo '<table style="font-size: 20px"  class="table" border="1" cellpadding="5" cellspacing="0.5" width="25%">
                    <tr>
                        <td colspan = 2 align = "center">'.$srv_user[$i]['pseudo'].'</td>
                    </tr>
                    <tr>
                        <td>ID : </td>
                        <td align = "center">'.$srv_user[$i]['id_user'].'</td>
                    </tr>
                    <tr>
                        <td>Name : </td>
                        <td align = "center">'.$srv_user[$i]['name'].'</td>
                    </tr>
                    <tr>
                        <td>Firstname : </td>
                        <td align = "center">'.$srv_user[$i]['firstname'].'</td>
                    </tr>
                    <tr>
                        <td>Email : </td>
                        <td align = "center">'.$srv_user[$i]['email'].'</td>
                    </tr>
                    <tr>
                        <td>Balance : </td>
                        <td align = "center">'.$srv_user[$i]['balance'].'</td>
                    </tr>
                    <tr>
                        <td>Number of articles : </td>
                        <td align = "center">'.$srv_user[$i]['nbr_article'].'</td>
                    </tr>
                    <tr>
                        <td>Note : </td>
                        <td align = "center">'.$srv_user[$i]['note'].' / 5</td>
                    </tr>
                    <tr>
                        <td>Ban a member : </td>
                        <td align = "center">
                            <a href="../controller/backoffice_controller.php?ban='.$srv_user[$i]['id_user'].'"><button>BAN</button></a>
                        </td>
                    </tr>
                </table><br>';
                // }
            }
            echo '</div>';
        }
        
    // RM SPECIE
        if (isset($srv_specie)) {
            echo '<table class="table" style="font-size: 20px" border="1" cellpadding="5" cellspacing="0.5" width="50%">
                <tr class="row"><td class="col" colspan="10" align="center">Remove a specie</td></tr><tr class="row">';
            
        for ($k=0; $k<count($srv_specie) ; $k++) { 
            if ($k % 6 == 0 && $k !== 0) {
                echo '</tr>';
            } else {
                echo '
                    <td class="col" align="center">
                        '.$srv_specie[$k]['name'].'<br>
                        <a href="../controller/backoffice_controller.php?rm_specie='.$srv_specie[$k]['id_specie'].'">
                            <button>Remove</button>
                        </a>
                    </td>';
            }
        }
        echo '</table><br><br>';
    }

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