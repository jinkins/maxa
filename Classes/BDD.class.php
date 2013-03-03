<?php
class BDD
{
    public function __construct($user, $mdp)
    {
        $user .= "xpqhepxe_".$user;
        parent::__construct("mysql:host=sid-sql;dbname=xpqhepxe_agency" , $user, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        
        // tester si la connexion est correcte avec cet identifiant et ce mot de passe. 
    }
    
    
}
?>
