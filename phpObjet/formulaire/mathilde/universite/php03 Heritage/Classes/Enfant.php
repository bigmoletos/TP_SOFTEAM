<?php

class Enfant extends Porent{
	//attribut
	private $_ecolier;
	//methode constructeur
	public function __construct($nom='sansNom', $prenom='sansPrenom', $ecolier='voir'){
		Porent::__construct($nom, $prenom);
		$this->setEcolier($ecolier);
	}

	//methode setter
	public function setEcolier($ecolier){
		$this->_ecolier = $ecolier;
	}
	//methode getter
	public function ecolier(){
		return $this->_ecolier;
	}
	//methode
	public function decrireEnfant(){
		$descrirePersonne = $this->_nom . "<br />" . $this->_prenom . "<br />" . $this->_ecolier . "<br />";
		return $descrirePersonne;
	}

	public function changeEnfant($nom, $prenom, $ecolier){
		parent::change($nom, $prenom);
		$this->setEcolier($ecolier);
	}

	public function nbrPersonneStatic() {
		return parent::nbrPersonne();
	}

} //fin classe Personne

?>