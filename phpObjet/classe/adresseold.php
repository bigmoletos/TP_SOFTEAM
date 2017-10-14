<?php

class Adresse {

    //attributs
    private $_rue;
    private $_Cp;
    private $_ville;

     //destructeur
    public  function __destruct(){
        unset($this);
        echo "l'objet n'existera plus désormais" ;
    }
    
    
    //getter
     public function rue() {
        return $this->_rue;
    }
    public function Cp() {
        return $this->_Cp;
    }
  public function ville() {
        return $this->_ville;
    }

    
//setters
    public function setRue($rue) {
        $this->_rue = $rue;
    }

    public function setCp($cp) {
        $this->_Cp = $cp;
    }

    public function setVille($ville) {
        $this->_ville = $ville;
    }
//methodes

    public function donneradresse() {
        echo'rue:' . $this->_rue . ' code postal: ' . $this->_Cp.' ville: '.$this->_ville;
    }

}


$adresse = new Adresse();
$adresse->setCp('13006');
$adresse->setRue(' 12 rue paradis');
$adresse->setVille('marseille');

$adresse->donneradresse();
var_dump($adresse);
//$adresse->__destruct();

?>