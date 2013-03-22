<?php

class LogManager
{
    protected $bdd; 
    
    public function __construct($bdd) {
        $this->bdd = $bdd; 
    }
    
    public function insert(Log $log)
    {
        $q = $this->bdd->prepare("INSERT INTO logs(
            Type,
            Quand, 
            Qui,
            Quoi,
            Table,
            IDObjet)
            VALUES(
            :type,
            NOW(),
            :qui,
            :quoi,
            :table,
            :idObjet)");
        
        $q->bindValue(":type", $log->get("type"));
        $q->bindValue(":qui", $log->get("qui"));
        $q->bindValue(":quoi", $log->get("quoi"));
        $q->bindValue(":table", $log->get("table"));
        $q->bindValue(":idObjet", $log->get("idObjet"));
        
        $v = $q->execute();
        
        if($v && $q->rowCount() == 1)
        {
            return true; 
        }
        
        else
        {
            return false; 
        }
        
        
    }
}

?>
