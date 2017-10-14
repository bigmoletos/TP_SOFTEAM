<?php
class Etudiant extends Personne{

	private $_diplome;

	public function __construct($nom,$age,$diplome){

		parent::__construct($nom,$age);
		$this->_diplome=$diplome;
	}

	public function Diplome()
	{
	    return $this->_diplome;
	}
	 
	 
	public function setDiplome($diplome)
	{
	    $this->_diplome = $diplome;
	}

	public function Save($etudiant)
	{
		parent::Sauvegarde($this->_diplome,$etudiant);
	}
}



?>