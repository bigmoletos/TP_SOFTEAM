<?php

class Cours
{
	//attribut
	private $_titre;
	private $_nbrHeure;
	private $_enseignant;
	private $_salle;
	private $_etudiant = array();

	//construct
	public function __construct($titre = 'sansTitre', $nbrHeure = '00', $enseignant = 'sansEnseignant', $salle = '00', $etudiant = null) 
	{
		$this->setTitre($titre);
		$this->setNbrHeure($nbrHeure);
		$this->setEnseignant($enseignant);
		$this->setSalle($salle);
		$this->setEtudiant($etudiant);
	}
	//destruct
	public function __destruct(){}

	//setter
	public function setTitre($titre)
	{
		$this->_titre = $titre;
	}
	public function setNbrHeure($nbrHeure)
	{
		$this->_nbrHeure = $nbrHeure;
	}
	public function setEnseignant($enseignant)
	{
		$this->_enseignant = $enseignant;
	}
	public function setSalle($salle)
	{
		$this->_salle = $salle;
	}
	public function setEtudiant($etudiant)
	{
		$this->_etudiant = $etudiant;
	}

	//getter
	public function titre()
	{
		return $this->_titre;
	}
	public function nbrHeure()
	{
		return $this->_nbrHeure;
	}
	public function enseignant()
	{
		return $this->_enseignant;
	}
	public function salle()
	{
		return $this->_salle;
	}
	public function etudiant()
	{
		return $this->_etudiant;
	}

	//methode
	public function decrireCours()
	{
		$descrireCours = $this->_titre . "<br />" . $this->_nbrHeure . "<br />". $this->_enseignant . "<br />". $this->_salle . "<br />" . $this->_etudiant . "<br />";
		return $descrireCours;
	}

	public function change($titre, $nbrHeure, $enseignant, $etudiant)
	{
		$this->setTitre($titre);
		$this->setNbrHeure($nbrHeure);
		$this->setEnseignant($enseignant);
		$this->setSalle($salle);
		$this->setEtudiant($etudiant);
	}

	public function creerFichier()
	{
		$listeEtudiant = "";
		$i=0;
		foreach ($this->_etudiant as $value) 
		{
			$listeEtudiant .= $value . "\n";
			$i++;
		}
		$contenu = $this->_titre ."\n" . $this->_nbrHeure ."\n" . $this->_enseignant ."\n" . $this->_salle ."\n" . $listeEtudiant;
		$fichier = fopen("fiches/cours/" . $this->_titre . ".txt", "w+");
		fwrite($fichier, $contenu);
		fclose($fichier);
		return $messageConfirmation = "Le cours " . $this->_titre . " a bien été ajouté.<br/>";
	}

} //fin classe Cours