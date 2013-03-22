<?php
class Log
{
    protected
            $id,
            $type,
            $quoi,
            $qui,
            $quand,
            $table,
            $idObjet;
    
    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }
    
    public function hydrate($donnees)
    {
        foreach($donnees as $key => $value)
		{
			$method = 'set'.$key; 
			if(method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
    }
    
    
    public function setID($id)
    {
        $this->id = $id; 
    }
    
    public function setType($type)
    {
        $this->type = $type; 
    }
    
    
    public function setQuand($quand)
    {
        $this->quand = $quand; 
    }
    
    public function setQui($qui)
    {
        $this->qui = $qui; 
    }
    
    public function setQuoi($quoi)
    {
        $this->quoi = $quoi; 
    }
    
    public function get($champ)
    {
        return $this->$champ;
    }
}

?>
