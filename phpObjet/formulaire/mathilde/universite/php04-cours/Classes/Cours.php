<?php

class Cours{
	//attribut
	private $_titre;
	private $_nbrHeure;
	private $_enseignant;
	private $_etudiant = array();
	//private static $_nbrCours = 0;

	//methode constructeur
	public function __construct($titre = 'sansTitre', $nbrHeure = '00', $enseignant = 'sansEnseignant', Etudiant $etudiant = null){
		$this->setTitre($titre);
		$this->setNbrHeure($nbrHeure);
		$this->setEnseignant($enseignant);
		$this->setEtudiant($etudiant);
		//self::$_nbrCours++;
	}
	//methode destructeur
	public function __destruct(){
		//self::$_nbrCours--;
	}

	//methode setter
	public function setTitre($titre){
		$this->_titre = $titre;
	}
	public function setNbrHeure($nbrHeure){
		$this->_nbrHeure = $nbrHeure;
	}
	public function setEnseignant($enseignant){
		$this->_enseignant = $enseignant;
	}
	public function setEtudiant($etudiant){
		$this->_etudiant = $etudiant;
	}

	//methode getter
	public function titre(){
		return $this->_titre;
	}
	public function nbrHeure(){
		return $this->_nbrHeure;
	}
	public function enseignant(){
		return $this->_enseignant;
	}
	public function etudiant(){
		return $this->_etudiant;
	}

	/*//metode static
	public static function nbrCours(){
		return self::$_nbrCours;
	}
	*/
	//methode
	public function decrireCours(){
		$descrireCours = $this->_titre . "<br />" . $this->_nbrHeure . "<br />". $this->_enseignant . "<br />". $this->_etudiant . "<br />";
		return $descrireCours;
	}

	public function change($titre, $nbrHeure, $enseignant, $etudiant){
		$this->setTitre($titre);
		$this->setNbrHeure($nbrHeure);
		$this->setEnseignant($enseignant);
		$this->setEtudiant($etudiant);
	}

} //fin classe Cours
?>