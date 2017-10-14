<?php

class Porent{
	//attribut
	private $_prenom;
	private $_age;
	private static $_nbrPersonne = 0;

	//methode constructeur
	public function __construct($nom='sansNom', $prenom='sansPrenom'){
		$this->setNom($nom);
		$this->setPrenom($prenom);
		self::$_nbrPersonne++;
	}
	//methode destructeur
	public function __destruct(){
		self::$_nbrPersonne--;
	}

	//methode setter
	public function setNom($nom){
		$this->_nom = $nom;
	}
	public function setPrenom($prenom){
		$this->_prenom = $prenom;
	}

	//methode getter
	public function nom(){
		return $this->_nom;
	}
	public function prenom(){
		return $this->_prenom;
	}

	//metode static
	public static function nbrPersonne(){
		return self::$_nbrPersonne;
	}
	
	//methode
	public function decrirePersonne(){
		$descrirePersonne = $this->_nom . "<br />" . $this->_prenom . "<br />";
		return $descrirePersonne;
	}

	public function change($nom, $prenom){
		$this->setNom($nom);
		$this->setPrenom($prenom);
	}

} //fin classe Parent

?>