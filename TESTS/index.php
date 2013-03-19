<?php
    require_once("../Classes/appelClasse.php")
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Connexion</title>
    </head>
    <body>
        <?php

            $bdd = new BDD("nicolas", "TheG@nts10032002");
            
            $q = $bdd->query("SELECT User FROM utilisateurs");
            
            while ($ligne = $q->fetch())
            {
                echo $ligne[0];
            }
        
        ?>
    </body>
</html>