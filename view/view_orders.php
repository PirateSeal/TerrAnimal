
    <h2><center>Your Commands</h2></center><div id="box">
    <?php
        if (isset($transactions)) {
            if (!empty($transactions)) {
                if (!isset($_POST['ID'])) {
                    for ($i=0; $i<count($transactions) ; $i++) {

                        echo '
                        <table style="font-size: 20px"  class="table" border="1" cellpadding="5" cellspacing="0.5" width="100%">
                            <tr align = "center">
                                <td>Order N°'.$transactions[$i]['id_transaction'].'</td>
                                <td>Date : '.$transactions[$i]['date_transaction'] .'</td>
                                <td>Seller : '.$transactions[$i]['seller'] .'</td>
                                <td>
                                    <form action="../controller/controller_orders.php" method="post">
                                        <input type="hidden" name="ID" value="'.$transactions[$i]['id_transaction'].'">
                                        <input type="hidden" name="tl" value="'.$transactions[$i]['id_transaction_line'].'">
                                        <button class="button1">Details</button>
                                    </form>
                                </td>
                            </tr>
                        </table>' ;
                    }
                } else if (isset($_POST['ID'])) {
                    for ($i=0; $i<count($transactions) ; $i++) {
                        if ($transactions[$i]['id_transaction_line'] == $_POST['tl']) {
                            echo '
                            <table style="font-size: 20px" border = 1  class="table" cellpadding="5" cellspacing="0.5" width="100%">
                                <tr align = "center">
                                    <td colspan = 3>Order N°'.$transactions[$i]['id_transaction'].'</td>
                                </tr>
                                <tr align = "center">
                                    <td>Date : '.$transactions[$i]['date_transaction'] .'</td>
                                    <td colspan = 2>Seller : '.$transactions[$i]['seller'] .'</td>
                                </tr>
                                <tr align = "center">
                                    <td>Article name : '.$transactions[$i]['description'] .'</td>
                                    <td>Amount : x'.$transactions[$i]['quantity'] .'</td>
                                    <td>Unit price : '.$transactions[$i]['unit_price'] .'</td>
                                </tr>
                                <tr>
                                    <td colspan = 2></td>
                                    <td align = "center">Total price : '.$transactions[$i]['prix_total'] .'</td>
                                </tr>';
                                if(isset($transactions[$i]['vote_token'])) {
                                    echo '
                                        <tr>
                                            <td align = "right" colspan = 4>
                                                <a href="../controller/user_account.php?id_transa='.$transactions[$i]['id_transaction_line'].'">NOTE YOUR ORDER</a>
                                            </td>
                                        </tr>';}
                                echo '</table>' ;
                        }
                    }
                }
            } else {
                echo "<center><h2>You have no orders</h2></center>";
            }
        }
    ?>
  </div>
</body>
</html>



<!-- echo '
            <table style="font-size: 20px"  class="table" border="1" cellpadding="5" cellspacing="0.5" width="25%">
                <tr>
                    <td colspan = 2>Bought to : </td>
                    <td>'.$transactions[$i]['seller'] .'</td>
                </tr>
                <tr>
                    <td colspan = 2>The : </td>
                    <td>'.$transactions[$i]['date_transction'].'</td>
                </tr>
                <tr>
                    <td colspan = 3>Order N°'.$transactions[$i]['id_transaction'].'</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </table>
            '; -->
