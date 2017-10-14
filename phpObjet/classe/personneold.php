<?php

class personne {

    //attributs
    private $_nom;
    private $_age;

    
    //destructeur
    public  function __destruct(){
        unset($this);
        echo "l'objet n'existera plus désormais" ;
    }
    
    //getter
     public function age() {
        return $this->_age;
    }
    public function nom() {
        return $this->_nom;
    }

//setters
    public function setAge($age) {
        $this->_age = $age;
    }

    public function setNom($nom) {
        $this->_nom = $nom;
    }

//methodes

    public function decrirePersonne() {
        echo' nom' . $this->_nom . ' age ' . $this->_age.'<br>';
    }

}


?>