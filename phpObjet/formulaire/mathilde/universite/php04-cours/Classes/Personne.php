<?php

class Personne{
	//attribut
	private $_nom;
	private $_age;
	//private static $_nbrPersonne = 0;

	//methode constructeur
	public function __construct($nom='sansNom', $age='00'){
		$this->setNom($nom);
		$this->setAge($age);
		//self::$_nbrPersonne++;
	}
	//methode destructeur
	public function __destruct(){
		//self::$_nbrPersonne--;
	}

	//methode setter
	public function setNom($nom){
		$this->_nom = $nom;
	}
	public function setAge($age){
		$this->_age = $age;
	}

	//methode getter
	public function nom(){
		return $this->_nom;
	}
	public function age(){
		return $this->_age;
	}

	/*//metode static
	public static function nbrPersonne(){
		return self::$_nbrPersonne;
	}
	*/
	//methode
	public function decrirePersonne(){
		$descrirePersonne = $this->_nom . "<br />" . $this->_age . "<br />";
		return $descrirePersonne;
	}

	public function change($nom, $age){
		$this->setNom($nom);
		$this->setAge($age);
	}

} //fin classe Personne
?>