<?php
class Enseignant extends Personne{

	private $_salaire;

	public function __construct($nom,$age,$salaire){
		parent::__construct($nom,$age);
		$this->_salaire=$salaire;

	}

	public function Salaire()
	{
	    return $this->_salaire;
	}
	 
	 
	public function setsalaire($salaire)
	{
	    $this->_salaire = $salaire;
	    return $this;
	}

	public function Save($enseignant)
	{
		parent::Sauvegarde($this->_salaire,$enseignant);
	}

}

?>
