<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Backoffice_TerraBay</title>
    <link rel="stylesheet" href="../view/CSS/backoffice_css.css">
</head>
<body>
    <div class="header hide">
        <h1 align = center class = "title">Backoffice TerraBay</h1>
        <div>
            <img id="disconnect" class="logo" title='Disconnect' src="../view/images/disconnect2.svg">

            <img id="leave" class="logo" title='Leave Backoffice' src="../view/images/leave.svg">

            <img id="return" class="logo" title='Return to menu' src="../view/images/return.svg">
            <br> <br>
        </div>
    </div>

    <div class="container">
        <div id="left">
            <h1> Welcome on the backoffice</h1>
            <p>On this page, you can choose to ban a member, remove a specie or an article.</p>
        </div>
        <div id="right">
            <ul class="menu-ul">
                <li id="ban" class="menu-li">
                    <img src="../view/images/ban.svg" class="img-li">
                    <span>
                        <h2>Ban a member :</h2>
                        <p>Ban a member, remove everything that he owns and everything linked to this account.</p>
                    </span>
                </li>
                <li id="specie" class="menu-li">
                    <img src="../view/images/specie.svg" class="img-li">
                    <span>
                        <h2>Remove a specie :</h2>
                        <p>Remove a specie and every article under this specie.</p>
                    </span>
                </li>
                <li id="box" class="menu-li">
                    <img src="../view/images/box.svg" class="img-li">
                    <span>
                        <h2>Remove an article :</h2>
                        <p>Remove an article from TerraBay.</p>
                    </span>
                </li>
            </ul>
        </div>
    </div>
    
    <div id="ban_member" class = "table_ban hide">
        <h2>Ban a member : </h2>
        <?php // BAN A MEMBER
            if (isset($srv_user)) {
                echo '<table class="main" align="center"><tr>';
                $alert_user = "return confirm('Are you sure you want to ban this user ?')";
                for ($i=0; $i<count($srv_user) ; $i++) { 
                    if ($i%3==0) {
                        echo '</tr><tr>';
                    }
                    if ($srv_user[$i]['pseudo']!== $_SESSION['pseudo'] || $srv_user[$i]['status'] !== 'admin') {
                        echo '<td><table class="table" cellpadding="5" cellspacing="0.5" width="25%">
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
                                    <a href="../controller/backoffice_controller.php?ban='.$srv_user[$i]['id_user'].'"><img src="../view/images/ban.svg" class="ban"></a>
                                </td>
                            </tr>
                        </table></td>';
                    }
                }
                echo '</tr></table>';
            }
        ?>
    </div>
    
    <div id="Remove_specie" class = "table_specie hide">
        <?php
            // RM SPECIE
                if (isset($srv_specie)) {
                    echo '<table class="table" cellpadding="5" cellspacing="0.5" width="50%">
                        <tr><td colspan="10" align="center"><h2>Remove a specie : </h2></td></tr><tr>';
                    
                for ($k=0; $k<count($srv_specie) ; $k++) { 
                    if ($k % 6 == 0 && $k !== 0) {
                        echo '</tr>';
                    } else {
                        echo '
                            <td align="center">
                                '.$srv_specie[$k]['name'].'<br>
                                <a href="../controller/backoffice_controller.php?rm_specie='.$srv_specie[$k]['id_specie'].'">
                                    <button>Remove</button>
                                </a>
                            </td>';
                    }
                }
                echo '</table><br><br>';
            }
        ?>
    </div>

    <div id="Remove_article" class = "table_article hide">
        <h2>Remove an article : </h2>

        <?php
        // RM ARTICLE
            if (isset($srv_art)) {
                echo '<table class="main" align="center"><tr>';
                $alert_art = "return confirm('Are you sure you want to remove this article ?')";
                for ($i=0; $i<count($srv_art) ; $i++) { 
                   if ($i%3==0) {
                       echo '</tr><tr>';
                   }
                    echo '<td><table class="table" border = "1" cellpadding = "5" cellspacing = "0.5" width="18%">
                        <tr>
                            <td colspan="3" align = "center"><div class="portrait"><img src="'.$srv_art[$i]['photo_path'].'"></div></td>
                        </tr>
                        <tr>
                            <td align = "center">Specie : <br>'.$srv_art[$i]['specie'].'</td>
                            <td align = "center">Name : <br>'.$srv_art[$i]['name'].'</td>
                            <td align = "center">Unit price : <br>'.$srv_art[$i]['unit_price'].'$</td>
                        </tr>
                        <tr>
                            <td colspan="3" align = "center">'.
                                $srv_art[$i]['pseudo'].
                            '</td>
                        </tr>
                        <tr>
                            <td colspan="3" align = "center">
                                <a href="../controller/backoffice_controller.php?remove_article='.$srv_art[$i]['id_article'].'">
                                    <button onclick="'.$alert_art.'">Remove article</button>
                                </a>
                            </td>
                        </tr>
                    </table></td>';
                }
                echo '</tr></table>';
            }        
        ?>
    </div>
    <script src="https://unpkg.com/tippy.js@2.5.3/dist/tippy.all.min.js"></script>
    <script src="../view/CSS/bootstrap/jquery.js"></script>
    <script>

        $(document).ready(function(){
            // JQUERY **********
                const $ban = $('.table_ban');
                const $specie = $('.table_specie');
                const $article = $('.table_article');
                const $menu = $('.container');
                const $hide = $('.table_ban, .table_specie, .table_article, .header');
                
                $menu.show();
                $hide.hide();

                $('#return').click(function(){
                    $hide.fadeOut(400);
                    $menu.fadeIn(1000);
                }) ;

                $('#ban').click(function(){
                    $ban.fadeIn(1000);
                    $('.header').fadeIn(1000);
                    $menu.fadeOut(400);
                });
            
                $('#specie').click(function(){
                    $specie.fadeIn(1000);
                    $('.header').fadeIn(1000);
                    $menu.fadeOut(400);
                });

                $('#box').click(function(){
                    $article.fadeIn(1000);
                    $('.header').fadeIn(1000);
                    $menu.fadeOut(400);
                });
                
                $("#disconnect").click(function(){
                    $(location).attr("href", "../index.php");
                });

                $("#leave").click(function(){
                    $(location).attr("href", "../controller/home_controller.php");
                });

                tippy('.logo',{
                    delay: 400,
                    arrow: true,
                    duration: [400, 400],
                    animation: 'perspective',
                    inertia: true
                })

        });
    </script>

</body>
</html>