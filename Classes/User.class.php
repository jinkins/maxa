<?php

class User
{

    protected
            $id,
            $nom,
            $privilege,
            $email;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set' . $key;

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

// SETTERS 

    public function setID($id)
    {
        $this->id = (int) $id;
    }

    public function setUser($nom)
    {
        $this->nom = $nom;
    }

    public function setPrivilege($niveau)
    {
        $this->privilege = (int) $niveau;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    

    public function nom()
    {
        return $this->nom;
    }

    public function id()
    {
        return (int) $this->id;
    }
    
    public function email()
    {
        return $this->email;
    }
    
    public function toXML()
    {

        $texte = "<user id='".$this->id."'>";
        $texte .= '<id>' . $this->id . '</id>';
        $texte .= '<nom>' . $this->nom . '</nom>';
        $texte .= '<privilege>' . $this->privilege . '</privilege>';
        $texte .= '<email>' . $this->email . '</email>';
        $texte .= "</user>";
        
        return $texte;
    }

}

?>
