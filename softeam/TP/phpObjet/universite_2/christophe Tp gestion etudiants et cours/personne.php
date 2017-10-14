<?php

class Personne{

	private $_nom;
	private $_age;

	public function __construct($nom,$age){

		$this->_nom=$nom;
		$this->_age=$age;
	
	}

	public function Age()
	{
	    return $this->_age;
	}
	 
	public function setAge()
	{
	    $this->_age = $age;
	}

	public function Nom()
	{
	    return $this->_nom;
	}
	 
	public function setNom($nom)
	{
	    $this->_nom = $nom;
	}

	public function Sauvegarde($valeur,$var)
	{
		if($var=="etudiant")
			$racine="fiches/etudiant/";
		else
			$racine="fiches/enseignant/";

		$chaine = $this->_nom."\n".$this->_age."\n".$valeur."\n";
		
		file_put_contents($racine.$this->_nom.".txt", $chaine);
	}

}
?>
