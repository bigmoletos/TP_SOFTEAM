<?php
spl_autoload_register(function ($class) {
		include $class.'.php';
	});
/**
 *
 */
class Personne {
	static $_STORAGE_DIRECTORY = "fichiers/personnes";

	private $_nom;
	private $_prenom;
	private $_age;

	/**
	 * Class Constructor
	 * @param  string  $_nom
	 * @param  string  $_prenom
	 * @param  int  $_age
	 */
	public function __construct() {
		$nbr  = func_num_args();
		$args = func_get_args();
		if ($nbr < 3) {
			throw new Exception("Une personne doit avoir un nom, un prénom et un âge");
		}
		if ($nbr == 3) {
			$this->_nom    = $args[0];
			$this->_prenom = $args[1];
			$this->_age    = (int)$args[2];
		}
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
	public function prenom():string {
		return $this->_prenom;
	}

	/**
	 * @param string $_prenom
	 *
	 * @return self
	 */
	public function setPrenom(string $_prenom) {
		$this->_prenom = $_prenom;

		return $this;
	}

	/**
	 * @return int
	 */
	public function age():int {
		return $this->_age;
	}

	/**
	 * @param int $_age
	 *
	 * @return self
	 */
	public function setAge(int $_age) {
		$this->_age = $_age;

		return $this;
	}

	public function __toString() {
		return $this->nom()." ".$this->prenom()." ".$this->age()."\n";
	}

	public function __destruct() {
		// Fatal error: Cannot unset $this in C:\wamp64\www\exercices\phpoo\projet_save_infos_in_file\Personne.php on line 85
		//unset($this);
	}

	public function sauver() {
		$fichier_nom     = "fichiers/".strtolower(get_class($this))."s/".$this->nom();
		$fichier_contenu = serialize($this);
		$fichier         = fopen($fichier_nom, 'w');
		fwrite($fichier, $fichier_contenu);
		fclose($fichier);
	}

	public static function lire($nomPersonne, $nomClasse) {
		$fichier_nom        = "fichiers/".strtolower($nomClasse)."s/".$nomPersonne;
		$personneSerialized = file_get_contents($fichier_nom);
		$unseiralized       = unserialize($personneSerialized);
		return unserialize($personneSerialized);
	}

	public static function console_log($data) {
		echo '<script>';
		echo 'console.log('.json_encode($data).')';
		echo '</script>'."\n";
	}

	/*public static function chargerOldListePersonnes() {
		$tab = glob(self::$_STORAGE_DIRECTORY."/*.txt");
		//print_r($tab);
		$filesContents = array();
		$count         = 0;
		$parentDir     = '';
		foreach ($tab as $fichier_nom) {
			//echo $fichier_nom;
			// Ouverture du fichier
			$monfichier = fopen($fichier_nom, 'r+');
			// 2 : on lit la première ligne du fichier
			$filesContents[$count] = fgets($monfichier);
			fclose($monfichier);
			$count++;
		}
		//print_r($filesContents);
		$tabPersonnes = array();
		$count        = 0;
		foreach ($filesContents as $value) {
			$eltsLigne = explode(";", $value);

			$personne             = new Personne($eltsLigne[0], $eltsLigne[1], $eltsLigne[2]);
			$tabPersonnes[$count] = $personne;

			$count++;
		}
		return $tabPersonnes;
	}*/

	/*public static function sauverOld($personne) {
		$fichier_nom     = self::$_STORAGE_DIRECTORY.$personne->getNom().".txt";
		$fichier_contenu = $personne->getNom().";".$personne->getPrenom().";".$personne->getAge()."\n";

		// Ouverture du fichier
		$fichier = fopen($fichier_nom, 'a');
		// Ecriture dans le fichier
		fwrite($fichier, $fichier_contenu);
		// Fermeture du fichier
		fclose($fichier);
	}*/

	// tests unitaires ///////////////////////////////////////////////////////
	public static function initTests() {
		// test constructeur multi-parametre
		// 1- test Exception erreur de paramètre
		// try {
		// 	$personne1 = new Personne("Poirot", "Hercule");
		// 	echo $personne1."\n";
		// }
		//  catch (Exception $e) {
		// 	echo $e->getMessage()."\n";
		// }
		// 2- test Exception erreur de paramètre
		try {
				$personne2 = new Personne("Poirot", "Hercule", 40);
				//self::console_log($personne2);
				$personne2->sauver();
				$personne3 = self::lire("Poirot", "Personne");
				if ($personne2 == $personne3) {
					echo "Serialisation / deserialisation reussie\n";
				} 
				else {
					echo "Serialisation / deserialisation ren echec\n";
				}
			}
		 catch (Exception $e) {
			echo $e->getMessage()."\n";
		}
		echo gettype($personne3->age()), "\n";
	}
}
//Personne::initTests();
?>
