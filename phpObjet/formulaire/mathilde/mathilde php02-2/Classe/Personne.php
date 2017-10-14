<?php

class Personne{
	//attribut
	private $_nom;
	private $_prenom;
	private $_age;
	//methode constructeur
	public function __construct($nom='sansNom', $prenom='sansPrenom', $age='00'){
		$this->setNom($nom);
		$this->setPrenom($prenom);
		$this->setAge($age);
	}
	//methode destructeur
	public function __destruct(){}

	//methode setter
	public function setNom($nom){
		$this->_nom = $nom;
	}
	public function setPrenom($prenom){
		$this->_prenom = $prenom;
	}
	public function setAge($age){
		$this->_age = $age;
	}
	//methode getter
	public function nom(){
		return $this->_nom;
	}
	public function prenom(){
		return $this->_prenom;
	}
	public function age(){
		return $this->_age;
	}
	//methode
	public function decrirePersonne(){
		$descrirePersonne = $this->_nom . "<br />" . $this->_prenom . "<br />" . $this->_age . "<br />";
		return $descrirePersonne;
	}

	public function change($nom, $prenom, $age){
		$this->setNom($nom);
		$this->setPrenom($prenom);
		$this->setAge($age);
	}

} //fin classe Personne

?>