<?php
spl_autoload_register(function ($class) {
		include $class.'.php';
	});

/**
 * @class Cours
 *
 */
class Cours {
	static $_STORAGE_DIRECTORY     = "fichiers/cours";
	static $_STORAGE_OLD_DIRECTORY = "fichiers/old_cours";

	private $_titre;
	private $_nbreHeures;
	private $_listeEtudiants;
	private $_enseignant;
	private $_salle;

	/**
	 * Class Constructor permet d'instancier un objet cours
	 * @param    string $_titre le titre du cours
	 * @param    float $_nbreHeures le nombre d'heure à affecter au cours
	 * @param    array $_listeEtudiants la liste d'étudiants à affecter au cours
	 * @param    Enseignant $_enseignant le nom de l'enseignant à affecter au cours
	 */
	public function __construct(string $_titre, float $_nbreHeures, array $_listeEtudiants, Enseignant $_enseignant) {
		$this->_titre          = $_titre;
		$this->_nbreHeures     = $_nbreHeures;
		$this->_listeEtudiants = $_listeEtudiants;
		$this->_enseignant     = $_enseignant;
	}

	/**
	 * @return string le titre du cours
	 */
	public function titre():string {
		return $this->_titre;
	}

	/**
	 * @param string $_titre le titre du cours
	 *
	 * @return self
	 */
	public function setTitre(string $_titre) {
		$this->_titre = $_titre;
		return $this;
	}

	/**
	 * @return float nombre d'heures affectées au cours
	 */
	public function nbreHeures():float {
		return $this->_nbreHeures;
	}

	/**
	 * @param float $_nbreHeures nombre d'heures affectées au cours
	 *
	 */
	public function setNbreHeures(float $_nbreHeures) {
		$this->_nbreHeures = $_nbreHeures;
		return $this;
	}

	/**
	 * @return array la liste (array) des étudiants
	 */
	public function listeEtudiants():array{
		return $this->_listeEtudiants;
	}

	/**
	 * @param array $_listeEtudiants la liste (array) des étudiants
	 */
	public function setListeEtudiants(array $_listeEtudiants) {
		$this->_listeEtudiants = $_listeEtudiants;
		return $this;
	}

	/**
	 * @return Enseignant le nom de l'enseignant affecté au cours
	 */
	public function enseignant():Enseignant {
		return $this->_enseignant;
	}

	/**
	 * @param Enseignant le nom de l'enseignant à affecter au cours
	 *
	 */
	public function setEnseignant(Enseignant $_enseignant) {
		echo $_enseignant;
		$this->_enseignant = $_enseignant;
		return $this;
	}

	/**
	 * @return Salle
	 */
	public function salle() {
		return $this->_salle;
	}

	/**
	 * @param Salle $_salle
	 *
	 * @return self
	 */
	public function setSalle(Salle $_salle) {
		$this->_salle = $_salle;
		return $this;
	}

	public function __toString() {
		return $this->titre()." ".$this->nbreHeures()." ".$this->enseignant()." ".$this->salle()."\n";
	}

	public function sauver() {
		$fichier_nom     = "fichiers/".strtolower(get_class($this))."/".$this->titre();
		$fichier_contenu = serialize($this);
		$fichier         = fopen($fichier_nom, 'w');
		fwrite($fichier, $fichier_contenu);
		fclose($fichier);
	}

	public static function lire($titreCours, $nomClasse) {
		$fichier_nom     = "fichiers/".strtolower($nomClasse)."/".$titreCours;
		$coursSerialized = file_get_contents($fichier_nom);
		return unserialize($coursSerialized);
	}

	public static function lireTousCours() {
		$tab               = glob(self::$_STORAGE_DIRECTORY."/*");
		$coursDeSerialises = array();
		$count             = 0;
		$parentDir         = '';
		foreach ($tab as $fichier_nom) {
			$coursDeSerialises[$count] = unserialize(file_get_contents($fichier_nom));
			$count++;
		}
		return $coursDeSerialises;
	}// fin fct

	/**
	 * @method charger charge la liste des cours à partir des fichiers définissants ceux-ci.
	 * @return un tableau représentant la liste des cours disponibles
	 */
	/*public static function oldCharger():array{
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
	$tabCours = array();
	$count    = 0;
	foreach ($filesContents as $value) {
	$eltsLigne = explode(";", $value);
	$etudiants = Etudiant::oldCharger();
	$enseignant       = Enseignant::lire($eltsLigne[2], "Enseignant");
	$cours            = new Cours($eltsLigne[0], $eltsLigne[1], $etudiants, $enseignant);
	$tabCours[$count] = $cours;
	$count++;
	}
	return $tabCours;
	}*/

	/**
	 * @method lireCours charge un cours depuis le fichier correspondant
	 * @param $fichier_nom le nom du fichier (= nom de la matiere enseignée + l'extension ".txt")
	 * @return Cours une instance de cours représentant le cours spécifié en paramètre
	 */
	/*public static function lireOldCours($fichier_nom):Cours {
	$filePath     = self::$_STORAGE_OLD_DIRECTORY."/".$fichier_nom;
	$monFichier   = fopen($filePath, 'r+');
	$ligneFichier = fgets($monFichier);
	fclose($monFichier);
	$eltsLigne  = explode(";", $ligneFichier);
	$etudiants  = array();
	$j          = 0;
	$enseignant = Enseignant::lire($eltsLigne[2], "Enseignant");
	for ($i = 3; $i < count($eltsLigne); $i++) {
	// eltsLigne[$i] est un nom prenom
	$eltsEtd = explode(" ", $eltsLigne[$i]);
	//$etudiant      = new Etudiant($eltsEtd[0], $eltsEtd[1], null);
	$etudiants[$j] = Etudiant::lire($eltsEtd[0], "Etudiant");
	$j++;
	}
	$monCours = new Cours($eltsLigne[0], $eltsLigne[1], $etudiants, $enseignant);
	return $monCours;
	}

	public static function oldSauver($cours) {
	$fichier_nom     = self::$_STORAGE_OLD_DIRECTORY . "/".$cours->titre().".txt";
	$fichier_contenu = $cours->titre().";".$cours->nbreHeures().";".$cours->enseignant();

	// liste de noms prenoms
	$stringEtudiants = implode(";", $cours->listeEtudiants());

	$fichier_contenu .= ";".$stringEtudiants;

	$fichier = fopen($fichier_nom, 'w');
	fwrite($fichier, $fichier_contenu);
	fclose($fichier);
	}*/

	// tests unitaires ///////////////////////////////////////////////////////
	public static function initTests() {
		// test serialisation de Cours
		/*$etudiant1 = new Etudiant("delaunay", "aurélie", 22, "master maths");
		$etudiant2 = new Etudiant("lamy", "philippe", 26, "master de russe");
		$etudiant3 = new Etudiant("pasquier", "nathalie", 22, "licence de littérature");
		$etudiant4 = new Etudiant("pichon", "virginie", 21, "licence de maths");
		$listeEtudiants = array($etudiant1, $etudiant2, $etudiant3, $etudiant4);
		$enseignant = new Enseignant("antoine", "inaya", 30);
		$enseignant->setSalaire(25000);
		$cours = new Cours("philosophie", 450,$listeEtudiants, $enseignant);
		$cours->sauver();

		// test deserialisation de Cours
		$cours2 = self::lire("philosophie", "Cours");
		echo $cours2;
		foreach($cours2->listeEtudiants() as $value){
		echo $value;
		}*/
		// $listeCours = self::oldCharger();
		// foreach ($listeCours as $cours) {
		//  	$cours->sauver();
		// }
		// $listeCours2 = self::lireTousCours();
		// foreach ($listeCours2 as $cours) {
		// 	// echo gettype($cours->$enseignant()->age()) . "\n";
		// 	// echo gettype($cours->$enseignant()->salaire()) . "\n";
		// 	var_dump($cours);
		// }
		$cours = self::lire("litterature", "Cours");
		var_dump($cours);
	}
}
// Cours::initTests();
?>