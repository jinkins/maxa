<?php

class BDD extends PDO
{

    public function __construct($user, $mdp)
    {
        try
        {
            $user = "xpqhepxe_" . $user;
            parent::__construct("mysql:host=sid-sql;dbname=xpqhepxe_agency", $user, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        }
        catch (PDOException $erreur)
        {
            if($erreur->getCode() == 1045)
            {
                return false; 
            }
        }
        
        if($this == null)
        {
            return false;
        }
    }

}

?>
