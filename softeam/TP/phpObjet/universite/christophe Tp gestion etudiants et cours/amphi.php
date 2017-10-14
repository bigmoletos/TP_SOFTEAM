<?php

class Amphi
{
	private $_nom;
	private $_etat;
	private $_place;

	public function __construct($nom,$etat,$place)
	{
		$this->_nom = $nom;
		$this->_etat = $etat;
		$this->_place = $place;
	}

	public function Nom()
	{
	    return $this->_nom;
	}
	 
	 
	public function setNom($nom)
	{
	    $this->_nom = $nom;
	}

	public function Etat()
	{
	    return $this->_etat;
	}
	 
	public function setEtat($etat)
	{
	    $this->_etat = $etat;
	}

	public function Place()
	{
	    return $this->_place;
	}
	 
	 
	public function setPlace($place)
	{
	    $this->_place = $place;
	}

	public function Sauvegarde($file)
	{
		$chaine=$this->nom()." ".$this->Etat()." ".$this->Place();
		file_put_contents("fiches/salle/".$file.".txt", $chaine);
	}
}
?>