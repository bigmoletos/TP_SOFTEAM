<?php

class Individu {

    private $_nom;
    private $_prenom;
    private $_age;

    //methode constructeur
    //on initialise les données par defaut directement dans construct pour eviter des erreurs
    public function __construct( $nom = 'sansnom',$prenom = 'sansprenom', $age = '00') {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_age = $age;
    }

//methode destructeur
    public function __destruct() {
        
    }

// methode getter
    public function nom() {
        return $this->_nom;
    }

    public function prenom() {
        return $this->_prenom;
    }

    public function age() {
        return $this->_age;
    }

// methode setters
    public function setNom($nom) {
        $this->_nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->_prenom = $prenom;
    }

    public function setAge($age) {
        $this->_age = $age;
    }

//methodes

    public function faire_tableau_php() {
        $faire_tableau_php = $this->_nom . ' ' . $this->_prenom . ' ' . $this->_age . '<br />';
        //echo($faire_tableau_php);
        // var_dump($faire_tableau_php);
        return $faire_tableau_php;
    }

}

// $individu = new individu('pagnol', 'marcel', '95');
//$individu->setNom('macron');
//$individu->setPrenom('manu');
//$individu->setAge('46');
//
//var_dump($individu);   
//    
?>