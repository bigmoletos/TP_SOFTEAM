<?php

class Enseignant extends Personne 
{
	//attribut
	private $_salaire;

	//construct
	public function __construct($nom='sansNom', $age='sansAge', $salaire = 'sansSalaire')
	{
		parent::__construct($nom, $age);
		$this->setSalaire($salaire);
	
	}
	//destruct
	public function __destruct()
	{
	}

	//setter
	public function setSalaire($salaire)
	{
		$this->_salaire = $salaire;
	}
	
	//getter
	public function salaire()
	{
		return $this->_salaire;
	}

	//methode pour decrire un enseignant
	public function decrireEnseignant()
	{
		$descrireEnseignant = $this->decrirePersonne() . $this->_salaire . "<br />";
		return $descrireEnseignant;
	}

	public function changeEnseignant($nom, $age, $salaire)
	{
		parent::change($nom, $age);
		$this->setSalaire($salaire);
	}

	public function creerFichier()
	{
		$contenu =  parent::nom() . "\n" . parent::age() . "\n" .$this->_salaire . "\n" ;
		$fichier = fopen("fiches/enseignant/" . parent::nom() . ".txt", "w+");
		fwrite($fichier, $contenu);
		fclose($fichier);
		return $messageConfirmation = parent::nom() . " a bien été ajouté.<br/>";
	}
} //fin classe Enseignant