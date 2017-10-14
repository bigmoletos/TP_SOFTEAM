<?php

class Personne {

//attributs
private $_nom;
private $_prenom;
private $_age;
private $_adresse;

//constructeur
//public function __construct($prenom,$age,$adresse){
//$this->_prenom = $prenom;
//$this->_age = $age;
//$this->_adresse = $adresse;}


//destructeur
public function __destruct(){
unset($this);
echo "l'objet n'existera plus désormais";
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

//metohodes

public function decrirePersonne() {
echo'nom' . $this->_nom . ' age ' . $this->_age;
}

}
//creation instance john
//declaration d'un objet personne
$perso = new Personne();
$perso->setNom('John');
$perso->setAge(18);
$perso->decrirePersonne();  //affiche nom Jhon  age 18

$perso->__destruct(); //affiche l'objet n'existera plus desormais
//construire une autre classe
//2éme constructeur
//
//
?>