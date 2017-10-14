<?php

class Enseignant extends Personne {
	//attribut
	private $_salaire;

	//methode constructeur
	public function __construct($nom='sansNom', $age='sansAge', $salaire = 'sansSalaire'){
		parent::__construct($nom, $age);
		$this->setSalaire($salaire);
	
	}
	//methode destructeur
	public function __destruct(){
		//self::$_nbrEnseignant--;
	}

	//methode setter
	public function setSalaire($salaire){
		$this->_salaire = $salaire;
	}
	
	//methode getter
	public function salaire(){
		return $this->_salaire;
	}

	/*//metode static
	public static function nbrEnseignant(){
		return self::$_nbrEnseignant;
	}
	*/
	//methode
	public function decrireEnseignant(){
		$descrireEnseignant = $this->decrirePersonne() . $this->_salaire . "<br />";
		return $descrireEnseignant;
	}

	public function changeEnseignant($nom, $age, $salaire){
		parent::change($nom, $age);
		$this->setSalaire($salaire);
	}

} //fin classe Enseignant
?>