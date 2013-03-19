<?php

require_once("Classes/appelClasse.php");
$bdd = new BDD($_POST["qui"], $_POST["mdp"]);

if ($bdd == null)
{
    header("Content-Type: text/xml ; charset=utf-8");
    $resultat = '<?xml version="1.0" encoding="utf-8"?>';
    $resultat.='<reponse>';
    $resultat ='<texte>Mot de passe incorrect</texte>';
    $resultat.= '<type>mdpError</type>';
    $resultat.='</reponse>';
    echo $resultat;
}
else
{
    header("Content-Type: text/xml ; charset=utf-8");
    $resultat = '<?xml version="1.0" encoding="utf-8"?>';
    $resultat.='<reponse>';
    $resultat ='<texte>Connexion en cours</texte>';
    $resultat.= '<type>OK</type>';
    $resultat.='</reponse>';
    echo $resultat;
}
?>
