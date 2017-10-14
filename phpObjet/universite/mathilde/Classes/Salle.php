<?php

class Salle {
	//attribut
	private $_numero;
	private $_capacite;
	private $_etatDispo = "oui"; /\non

	//construct
	public function __construct($numero='sansNumero', $capacite)
	{
		$this->setNumero($numero);
		$this->setCapacite($capacite);
	}
	// destruct
	public function __destruct(){}

	//setter
	public function setNumero($numero)
	{
		$this->_numero = $numero;
	}
		public function setCapacite($capacite)
	{
		$this->_capacite = $capacite;
	}
	public function setEtatDispo($etatDispo)
	{
		$this->_etatDispo = $etatDispo;
	}

	//getter
	public function numero()
	{	
		return $this->_numero;
	}
	public function capacite()
	{
		return $this->_capacite;
	}
	public function etatDispo()
	{
		return $this->_etatDispo;
	}

	//methode
	public function decrireSalle()
	{
		$descrireSalle = $this->_numero . "<br />" . $this->_capacite . "<br />" . $this->_etatDispo . "<br />";
		return $descrireSalle;
	}

	public function change($numero, $capacite, $etatDispo)
	{
		$this->setNumero($numero);
		$this->setCapacite($capacite);
		$this->setEtatDispo($etatDispo);
	}

	public function creerFichier()
	{
		$contenu = $this->_numero . "\n" . $this->_capacite . "\n" . $this->_etatDispo . "\n";
		$fichier = fopen("fiches/salle/" . $this->_numero . ".txt", "w+");
		fwrite($fichier, $contenu);
		fclose($fichier);
		return $messageConfirmation = "La salle " . $this->_numero ." a bien été ajouté.<br/>";
	}

	//modification de la disponibilité de la salle
	public function modifEtatDispo($etatDispo){

			//if ()
		//$etatDispo = "non";

			
	}

} //fin classe Salle
