<?php
//cette classe sevira a traiter le nom et l'age des personnes, 
//elle sera étendue avec la classe etudiant et enseignants
class ClassPersonne {
    //attributs
    private $_nom;
    private $_age;
   
  // methode constructeur
    public function __construct($nom = 'sansnom', $age = 'sansage') {
        $this->_nom = $nom;
        $this->_age = $age;
    }

   //methode destructeur
  public function __destruct() {
     }
    
   
//methode  getter
       public function nom() {
        return $this->_nom;
    }
    public function age() {
        return $this->_age;
    }
   

//methode setters
       public function setNom($nom) {
        $this->_nom = $nom;
    }
    
    public function setAge($age) {
        $this->_age = $age;
    }
 
 
//methodes traitement
    //cette methode affiche le contenu de l'objet personne
    public function decrirePersonne() {
        echo' nom ' . $this->_nom . ' age ' . $this->_age . '<br>';
    }

//cree un fichier par etudiant ou par personne, le nom du fichier
// est le nom la personne.txt. 
//pour le moment non utilisée dans le projet
    public function Sauvegarde($valeur,$choix)
	{
		if($choix=="etudiant")
			$rep="fichiers/etudiants/";
		else
			$rep="fichiers/enseignants/";

		$contenu = $this->_nom.';'.$this->_age.';'.$valeur.';';
		
		file_put_contents($rep.$this->_nom.".txt", $contenu);
	}

}
?>

