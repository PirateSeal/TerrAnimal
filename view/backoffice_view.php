<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Backoffice_TerraBay</title>
</head>
<body>
    <h1 align = center>Backoffice TerraBay</h1>
    
    <?php
        
        echo 'Ban member : <br>
        <form action="../controller/backoffice_controller.php" method="post">
            <select name="ban">'
            for ($i=0; $i<count($srv_data) ; $i++) { 
                echo '<option value=""></option>';
            }
            '</select>
        </form>' 
    ?>
</body>
</html>