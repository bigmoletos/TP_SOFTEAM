<?php
spl_autoload_register(function ($class) {
		include $class.'.php';
	});

/**
 *
 */
class Etudiant extends Personne {
	static $_STORAGE_DIRECTORY = "fichiers/personnes/etudiants";
	// static $_STORAGE_OLD_DIRECTORY = "fichiers/personnes/old_etudiants";

	private $_diplome;

	/**
	 * Class ConstructorZ
	 * @param    $_diplome
	 */
	public function __construct() {
		$nbr  = func_num_args();
		$args = func_get_args();
		if ($nbr != 4) {
			throw new Exception("Un étudiant doit avoir un nom, un prénom, un âge et un diplôme");
		} else {
			parent::__construct($args[0], $args[1], $args[2]);
			$this->_diplome = $args[3];
		}
	}

	/**
	 * @return mixed
	 */
	public function diplome() {
		return $this->_diplome;
	}

	/**
	 * @param mixed $_diplome
	 *
	 * @return self
	 */
	public function setDiplome($_diplome) {
		$this->_diplome = $_diplome;

		return $this;
	}

	public function __toString() {
		return $this->nom()." ".$this->prenom()." ".$this->age()." ".$this->diplome()."\n";
	}

	public function sauver() {
		$fichier_nom     = "fichiers/personnes/".strtolower(get_class($this))."s/".$this->nom();
		$fichier_contenu = serialize($this);
		$fichier         = fopen($fichier_nom, 'w');
		fwrite($fichier, $fichier_contenu);
		fclose($fichier);
	}

	public static function lire($nomEtudiant, $nomClasse) {
		$fichier_nom        = "fichiers/personnes/".strtolower($nomClasse)."s/".$nomEtudiant;
		$personneSerialized = file_get_contents($fichier_nom);
		return unserialize($personneSerialized);
	}

	public static function lireTousEtudiants() {
		$tab                   = glob(self::$_STORAGE_DIRECTORY."/*");
		$etudiantsDeSerialises = array();
		$count                 = 0;
		foreach ($tab as $fichier_nom) {
			$etudiantsDeSerialises[$count] = unserialize(file_get_contents($fichier_nom));
			$count++;
		}
		return $etudiantsDeSerialises;
	}// fin fct

	public static function trouverEtudiantsAPartirTab($tabNomsPrenoms):array {
		$tabEtudiants = array();
		$j            = 0;
		foreach ($tabNomsPrenoms as $valNomPrenom) {
			$tabVal           = explode(" ", $valNomPrenom);
			$valNom           = $tabVal[0];
			$etudiant         = self::lire($valNom, "Etudiant");
			$tabEtudiants[$j] = $etudiant;
			$j++;
		}
		return $tabEtudiants;
	}

	public static function chercherEtudiantParNomPrenomInArrayEtudiants($etudiant, $etudiantsArray) {

		foreach ($etudiantsArray as $etudiantvalue) {
			if ($etudiant->nom() == $etudiantvalue->nom() and $etudiant->prenom() == $etudiantvalue->prenom()) {
				return 1;
			}
		}
		return 0;
	}

	public static function compareTab($tabNomPrenom, $tabEtudiants) {
		$tabEtudiantsIntersect = array();
		$count                 = 0;
		foreach ($tabEtudiants as $etudiant) {
			foreach ($tabNomPrenom as $myNomPrenom) {
				if (self::compare($myNomPrenom, $etudiant) == 1) {
					$tabEtudiantsIntersect[$count] = $etudiant;
				}
			}
		}
		return $tabEtudiantsIntersect;
	}

	public static function searchNomPrenomDsTabEtudiant($unNomPrenom, $tabEtudiants) {
		foreach ($tabEtudiants as $etudiant) {
			if (self::compare($unNomPrenom, $etudiant) == 1) {
				return 1;
			}
		}
		return 0;
	}

	/*public static function oldCharger() {
		$tab           = glob(self::$_STORAGE_OLD_DIRECTORY."/*.txt");
		$filesContents = array();
		$count         = 0;
		$parentDir     = '';
		foreach ($tab as $fichier_nom) {
			$monfichier            = fopen($fichier_nom, 'r+');
			$filesContents[$count] = fgets($monfichier);
			fclose($monfichier);
			$count++;
		}
		// creation du tab d'objets à retourner
		$tabEtudiants = array();
		$count        = 0;
		foreach ($filesContents as $value) {
			$eltsLigne = explode(";", $value);

			$etudiant             = new Etudiant($eltsLigne[0], $eltsLigne[1], $eltsLigne[2], $eltsLigne[3]);
			$tabEtudiants[$count] = $etudiant;
			$count++;
		}
		return $tabEtudiants;
	}*/

	// tests unitaires ///////////////////////////////////////////////////////
	public static function initTests() {
		// $listeEtudiants = self::oldCharger();
		// foreach ($listeEtudiants as $value) {
		// 	$value->setAge(22);
		// 	$value->sauver();
		// }
		
		// $listeEtdts2 = self::lireTousEtudiants();
		// foreach ($listeEtdts2 as $value) {
		// 	var_dump($value);
		// }
		$tab = array();
		$tab[0] = "carlier pierre";
		$etudiant = self::trouverEtudiantsAPartirTab($tab);
		var_dump($etudiant);
	}
}
// Etudiant::initTests();
?>