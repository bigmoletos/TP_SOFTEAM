<?php

class Etudiant extends Personne 
{
	//attribut
	private $_diplome;

	//construct
	public function __construct($nom='sansNom', $age='sansAge', $diplome = 'sansDiplome')
	{
		parent::__construct($nom, $age);
		$this->setDiplome($diplome);
	}

	//destruct
	public function __destruct()
	{
	}

	//setter
	public function setDiplome($diplome)
	{
		$this->_diplome = $diplome;
	}
	
	//getter
	public function diplome()
	{
		return $this->_diplome;
	}

	//methode pour decrire un étudiant
	public function decrireEtudiant()
	{
		$descrireEtudiant = $this->decrirePersonne() . $this->_diplome . "<br />";
		return $descrireEtudiant;
	}

	public function changeEtudiant($nom, $age, $diplome)
	{
		parent::change($nom, $age);
		$this->setDiplome($diplome);
	}

	public function creerFichier()
	{
		$contenu = parent::nom() . "\n" . parent::age() . "\n" . $this->_diplome . "\n" ;
		$fichier = fopen("fiches/etudiant/" . parent::nom() . ".txt","w+");
		fwrite($fichier, $contenu);
		fclose($fichier);
		return $messageConfirmation = parent::nom() . " a bien été ajouté.<br/>";
	}
} //fin classe Etudiant