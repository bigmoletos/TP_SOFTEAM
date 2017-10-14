<?php
spl_autoload_register(function ($class) {
		include $class.'.php';
	});

class Enseignant extends Personne {
	static $_STORAGE_DIRECTORY = "fichiers/personnes/enseignants";

	private $_salaire;
	private $_motDePasse;

	/**
	 * Class Constructor
	 * @param    $_diplome
	 */
	public function __construct(string $nom, string $prenom, int $age, float $salaire) {
		parent::__construct($nom, $prenom, $age);
		$this->_salaire = $salaire;
	}

	/**
	 * @return float
	 */
	public function salaire():float {
		return $this->_salaire;
	}

	/**
	 * @param float $salaire
	 *
	 * @return self
	 */
	public function setSalaire(float $salaire) {
		$this->_salaire = $salaire;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function motDePasse():string {
		return $this->_motDePasse;
	}

	/**
	 * @param mixed $motDePasse
	 *
	 * @return self
	 */
	public function setMotDePasse(string $motDePasse) {
		$this->_motDePasse = $motDePasse;
		return $this;
	}

	public function __destruct() {
		//Fatal error: Cannot unset $this in C:\wamp64\www\exercices\phpoo\projet_save_infos_in_file\Enseignant.php on line 37
		//unset($this);
	}

	public function __toString() {
		return $this->nom()." ".$this->prenom()." ".$this->age()." ".$this->salaire()." ".$this->motDePasse()."\n";
	}

	public function sauver() {
		$fichier_nom     = "fichiers/personnes/".strtolower(get_class($this))."s/".$this->nom();
		$fichier_contenu = serialize($this);
		$fichier         = fopen($fichier_nom, 'w');
		fwrite($fichier, $fichier_contenu);
		fclose($fichier);
	}

	public static function lire($nomEnseignant, $nomClasse):Enseignant {
		$fichier_nom        = "fichiers/personnes/".strtolower($nomClasse)."s/".$nomEnseignant;
		$personneSerialized = file_get_contents($fichier_nom);
		return unserialize($personneSerialized);
	}

	public static function lireAvecNomPrenom($nomPrenomEnseignant, $nomClasse):Enseignant {
		$tabNP = explode(" ", $nomPrenomEnseignant);
		return self::lire($tabNP[0], $nomClasse);
	}

	public static function lireTousEnseignants():array{
		$tab                     = glob(self::$_STORAGE_DIRECTORY."/*");
		$enseignantsDeSerialises = array();
		$count                   = 0;
		$parentDir               = '';
		foreach ($tab as $fichier_nom) {
			$enseignantsDeSerialises[$count] = unserialize(file_get_contents($fichier_nom));
			$count++;
		}
		return $enseignantsDeSerialises;
	}// fin fct

	/*public static function oldCharger() {
	$tab           = glob(self::$_STORAGE_DIRECTORY."/*.txt");
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
	$tabEnseignants = array();
	$count          = 0;
	foreach ($filesContents as $value) {
	$eltsLigne = explode(";", $value);

	$enseignant = new Enseignant($eltsLigne[0], $eltsLigne[1], $eltsLigne[2]);
	$enseignant->setSalaire($eltsLigne[3]);
	$tabEnseignants[$count] = $enseignant;
	$count++;
	}
	return $tabEnseignants;
	}*/

	/*public static function lireMotDePasseEnseignant($nomEnseignant):string {
	$monfichier = fopen(self::$_STORAGE_DIRECTORY."/" . $nomEnseignant . ".txt", 'r+');
	$ligne      = fgets($monfichier);
	fclose($monfichier);
	$eltsLigne = explode(";", $ligne);
	// le mot de passe est le edernier elt de $eltsLigne
	return $eltsLigne[count($eltsLigne)-1];
	}

	public static function trouverEnseignant($nomEnseignant):Enseignant {
	$monfichier = fopen(self::$_STORAGE_DIRECTORY."/".$nomEnseignant.".txt", 'r+');
	$ligne      = fgets($monfichier);
	fclose($monfichier);
	$eltsLigne  = explode(";", $ligne);
	$enseignant = new Enseignant($eltsLigne[0], $eltsLigne[1], $eltsLigne[2]);
	$enseignant->setSalaire($eltsLigne[3]);
	return $enseignant;
	}*/
	public static function initTests() {
		/*$listeEnseignants = self::oldCharger();
		foreach($listeEnseignants as $enseignant){
		$enseignant->sauver();
		}*/
		/*$liste2 = self::lireTousEnseignants();
		foreach($liste2 as $value){
		echo $value;
		}*/
		// $enseignant = self::lire("cordier", "Enseignant");
		// echo $enseignant;
		// echo gettype($enseignant->salaire()) . "\n";
		// // forcer age au type int pour les eutidants
		$liste1 = self::lireTousEnseignants();
		foreach ($liste1 as $value) {
			$value->setSalaire(26500);
			$value2 = new Enseignant($value->nom(),$value->prenom(),$value->age(),$value->salaire());
			$value2->setMotDePasse("1234");
			$value2->sauver();
		}
		$liste2 = self::lireTousEnseignants();
		foreach ($liste2 as $value) {
			var_dump($value);
		}
		// $ens = self::lire("antoine", "Enseignant");
		// var_dump($ens);
	}
}
//Enseignant::initTests();
?>
