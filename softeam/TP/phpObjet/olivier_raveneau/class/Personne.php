<?php
require 'Adresse.php';

class Personne
{
	private $_nom;
	private $_age;
	private $_adresse;

	public function __construct($nom = 'Unknow', $age = 0, Adresse $adresse = null) {
		$this->setNom($nom);
		$this->setAge($age);
		if ($adresse)
			$this->setAdresse($adresse);
		else
			$this->setAdresse(new Adresse());
	}

	public function __destruct() {
	}

	public function __toString() {
		return '{nom='.$this->nom().', age='. $this->age().', adresse='. $this->adresse().'}';
	}

	public function nom() {
		return $this->_nom;
	}

	public function age() {
		return $this->_age;
	}

	public function adresse() {
		return $this->_adresse;
	}

	public function setNom($nom) {
		$this->_nom = $nom;
		return $this;
	}

	public function setAge($age) {
		$this->_age = $age;
		return $this;
	}

	public function setAdresse($adresse) {
		$this->_adresse = $adresse;
		return $this;
	}

	public function decrirePersonne() {
		echo 'nom='.$this->nom().', age='. $this->age().', adresse={';
		$this->adresse()->decrireAdresse();
		echo '}';
	}
}
