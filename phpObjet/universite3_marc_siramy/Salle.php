<?php
class Salle {
	static $_STORAGE_DIRECTORY = "fichiers/salles";

	private $_nom;
	private $_etat;
	private $_capacite;

	/**
	 * Class Constructor
	 */
	public function __construct($nom, $etat, $capacite) {
		$this->_nom      = $nom;
		$this->_etat     = $etat;
		$this->_capacite = $capacite;
	}

	/**
	 * @return string
	 */
	public function nom():string {
		return $this->_nom;
	}

	/**
	 * @param string $_nom
	 *
	 * @return self
	 */
	public function setNom(string $_nom) {
		$this->_nom = $_nom;

		return $this;
	}

	/**
	 * @return string
	 */
	public function etat():string {
		return $this->_etat;
	}

	public function isDiponible() {
		if ($this->etat() == "disponible") {
			return true;
		}
		return false;
	}

	/**
	 * @param string $_etat
	 *
	 * @return self
	 */
	public function setEtat(string $_etat) {
		$this->_etat = $_etat;

		return $this;
	}

	/**
	 * @return int
	 */
	public function capacite():int {
		return $this->_capacite;
	}

	/**
	 * @param int $_capacite
	 *
	 * @return self
	 */
	public function setCapacite(int $_capacite) {
		$this->_capacite = $_capacite;

		return $this;
	}

	public function __toString() {
		return $this->nom()." ".$this->etat()." ".$this->capacite()."\n";
	}

	public function sauver() {
		$fichier_nom     = "fichiers/".strtolower(get_class($this))."s/".$this->nom();
		$fichier_contenu = serialize($this);
		$fichier         = fopen($fichier_nom, 'w');
		fwrite($fichier, $fichier_contenu);
		fclose($fichier);
	}

	public static function charger(string $nomSalle):Salle {
		$fichier_nom   = "fichiers/salles/".$nomSalle;
		$objSerialized = file_get_contents($fichier_nom);
		return unserialize($objSerialized);
	}

	public static function lireToutesSalles() {
		$tab             = glob(self::$_STORAGE_DIRECTORY."/*");
		$objDeserialises = array();
		$count           = 0;
		foreach ($tab as $fichier_nom) {
			$objDeserialises[$count] = unserialize(file_get_contents($fichier_nom));
			$count++;
		}
		return $objDeserialises;
	}// fin fct

	public static function listeSallesDisponibles(int $effectifCours) {
		$sallesDeCours     = self::lireToutesSalles();
		$sallesDisponibles = array();
		$count             = 0;
		foreach ($sallesDeCours as $salle) {
			if ($salle->isDiponible() and $salle->capacite() >= $effectifCours) {
				$sallesDisponibles[$count] = $salle;
				$count++;
			}
		}
		return $sallesDisponibles;
	}

	public static function initTests() {
		// creer 6 salles (2 cours ne pourront avoir de salle affectee)
		$salle1 = new Salle("101", "disponible", 30);
		$salle1->sauver();
		// $salle2 = self::charger("101");
		// if ($salle2 == $salle1) {
		// 	echo 'sauver et charger ok';
		// }
		$salle1 = new Salle("101", "disponible", 30);
		$salle1->sauver();
		$salle2 = new Salle("102", "disponible", 30);
		$salle2->sauver();
		$salle3 = new Salle("103", "disponible", 30);
		$salle3->sauver();
		$salle4 = new Salle("104", "disponible", 30);
		$salle4->sauver();
		$salle5 = new Salle("105", "disponible", 30);
		$salle5->sauver();

		$sallesDispo = self::listeSallesDisponibles(30);
		var_dump($sallesDispo);
	}
}
Salle::initTests();
?>