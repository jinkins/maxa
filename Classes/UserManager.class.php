<?php

class UserManager
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function existence($user, $mdp)
    {
        $r = $this->db->query("SELECT COUNT(*) FROM utilisateurs WHERE User='" . $user . "' AND MDP='" . $mdp . "'")->fetch();
        if ($r[0] == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function connexion($id, $mdp)
    {
        if ($this->existence($id, $mdp))
        {

            $q = $this->db->prepare("SELECT * FROM utilisateurs WHERE User= :user AND MDP= :mdp");

            $q->bindValue(':user', $id, PDO::PARAM_STR);
            $q->bindValue(':mdp', $mdp, PDO::PARAM_STR);

            $q->execute();
            $user = new User($q->fetch(PDO::FETCH_ASSOC));

            $log = new Log(
                            array(
                                "Type" => "Normal",
                                "Qui"  => $user->nom(),
                                "Quoi" => "Connexion à la base de données",
                                "IDObjet" => $user->id(),
                                "Table" => "utilisateurs"
                    ));

            $logManager = new LogManager($this->db);
            $logManager->insert($log);

            return $user;
        }
        else
        {
            $log = new Log(
                            array(
                                "Type" => "BadUse",
                                "Qui"  => $id,
                                "Quoi" => "Tentative de connexion avec mauvais identifiant/mdp"
                    ));

            $logManager = new LogManager($this->db);
            $logManager->insert($log);

            return (bool) FALSE;
        }
    }

    public function selectByID($id)
    {
        $q = $this->db->prepare("SELECT * From utilisateurs WHERE ID = :id");
        $q->bindValue("id", $id);
        $q->execute();

        return new User($q->fetch());
    }

    public function liste()
    {
        $q     = $this->db->query("SELECT * From utilisateurs");
        while ($ligne = $q->fetch())
        {
            $liste[] = new User($ligne);
        }

        return $liste;
    }

}
