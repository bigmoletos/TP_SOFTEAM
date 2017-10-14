<?php

//cette classe étend la classe personne en rajoutant le salaire de l'enseignant

class ClassEnseignant extends ClassPersonne {

    //const EXT_FICHIER = '.enseignant';
    
//attribut
    private $_salaire;

//construct
    public function __construct($nom = 'sans', $age = 'sansage', $salaire = 'pasdesalaire') {
        //on appelle les attributs de la classe mere à savoir la classe personne 
        parent::__construct($nom, $age);
        $this->setSalaire($salaire);
    }

    //destructeur
    public function __destruct() {
        
    }

    //getter
    public function salaire() {
        return $this->_salaire;
    }

    //setter
    public function setSalaire($salaire) {
        $this->_salaire = $salaire;
        //return $this;
    }

//methode pour creer un fichier par enseignant contenant nom age et salaire
    public function ajoutEnseignant() {
        //on aurait pu utiliser aussi le code suivant :   $nom=$this->nom();

        $nom = parent::nom();
        $age=parent::age();
        $salaire=$this->_salaire;
        //donne la date et l'heure d'enregistrement du fichier
        date_default_timezone_set("Europe/Paris");
        $date=date("d/m/y à H:i:s");
        //creation du contenu du fichier à créer
        $chaine = $nom . ';' . $age . ';' . $salaire . ';';
        file_put_contents('fichiers/enseignants/' . $nom . '.txt', $chaine);
        echo "le fichier de l'enseignant :<strong>" . $nom . "</strong> "
                . "a bien été créé le <strong>" . $date. "</strong>";
      //  var_dump($chaine);
    }
    
    
////crhistohphe
    //pour le moment non utilisée dans le projet
    public function SauveEnseignant($enseignant)
	{
		parent::Sauvegarde($this->_salaire,$enseignant);
	}
    
}

//fin classe enseignant
