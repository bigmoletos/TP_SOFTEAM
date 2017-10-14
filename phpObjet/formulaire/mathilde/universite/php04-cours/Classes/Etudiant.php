<?php

class Etudiant extends Personne {
	//attribut
	private $_diplome;

	//methode constructeur
	public function __construct($nom='sansNom', $age='sansAge', $diplome = 'sansDiplome'){
		parent::__construct($nom, $age);
		$this->setDiplome($diplome);
	
	}
	//methode destructeur
	public function __destruct(){
		//self::$_nbrEtudiant--;
	}

	//methode setter
	public function setDiplome($diplome){
		$this->_diplome = $diplome;
	}
	
	//methode getter
	public function diplome(){
		return $this->_diplome;
	}

	/*//metode static
	public static function nbrEtudiant(){
		return self::$_nbrEtudiant;
	}
	*/
	//methode
	public function decrireEtudiant(){
		$descrireEtudiant = $this->decrirePersonne() . $this->_diplome . "<br />";
		return $descrireEtudiant;
	}

	public function changeEtudiant($nom, $age, $diplome){
		parent::change($nom, $age);
		$this->setDiplome($diplome);
	}

} //fin classe Etudiant
?>