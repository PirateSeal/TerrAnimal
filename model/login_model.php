<?php $how_much = $db_connexion->query("SELECT COUNT(*) FROM users WHERE pseudo='".$pseudo."' AND password='".$password."'")->fetch(); ?>
