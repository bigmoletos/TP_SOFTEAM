<?php
//on fait appel à la classe adresse, oin aurait pu utiliser include
require_once 'adresse.php';

class Personne {

    private $_prenom;
    private $_age;
    private $_adresse;

    //constructeur
    public function __construct($prenom = 'sansprenom', $age = 'sansage', adresse $adresse = null) {
        $this->_prenom = $prenom;
        $this->_age = $age;
        $this->setadresse($adresse);
    }

//getter
    public function age() {
        return $this->_age;
    }

    public function prenom() {
        return $this->_prenom;
    }

    public function adresse(){
        return $this->_adresse;  
    }
    
    
//setters
    public function setAge($age) {
        $this->_age = $age;
    }

    public function setPrenom($prenom) {
        $this->_prenom = $prenom;
    }

    public function setAdresse($adresse) {
        $this->_adresse = $adresse;
    }
//methodes

    public function decrirePersonne() {
        echo' prenom ' . $this->_prenom . ' age ' . $this->_age.'<br>';
    }
    
}

//$adresse = new Adresse('13600', 'Paris', 'France');
//
////creation instance john
////declaration d'un objet personne
//$perso = new Personne('franck','25',$adresse);
//$perso->setPrenom('franck');
//$perso->setage('25');
//$perso-> decrirePersonne();  //affiche nom Jhon  age 18

//$adresse = new Adresse();
//$adresse->setCp('13006');
//$adresse->setRue('rue paradis');
//$adresse->setVille('marseille');


//$perso->__destruct(); //affiche l'objet n'existera plus desormais
//$adresse->__destruct();

///Declaration d'un objet Patrick
//$perso2 = new Personne('Patrick', '54', $adresse);
//$perso2->setPrenom('Jean');
//$perso2->setAge('54');
//$perso2->decrirePersonne();
//
//// declaration d'un objet Fafa
//$perso3 = new Personne('Fafa', 'Bla', $adresse);
//$perso3->decrirePersonne();


//
?>