<?php

//cette classe etend la classe classPersonne.php en lui rajoutant le diplome de l'etudiant
class ClassEtudiant extends ClassPersonne {

    // const EXT_FICHIER = '.etudiant';

    private $_diplome;

    //contructeur
    public function __construct($nom = 'sans', $age = 0, $diplome = 'sans') {
        parent::__construct($nom, $age);
        $this->setDiplome($diplome);
    }

    //destructeur
    public function __destruct() {
        
    }

    //  public function __toString() {
    //     return '{nom=' . $this->nom() . ', age=' . $this->age() . ', diplome=' . $this->diplome() . '}';
    //  }
    //getter
    public function diplome() {
        return $this->_diplome;
    }

    //setter
    public function setDiplome($diplome) {
        $this->_diplome = $diplome;
        // return $this;
    }

    //   autres methodes
    //   
    //cette methode crée un fichier dans le repertoire fichiers/etudiants/
    //portant le nomde l'etudiant.txt, les données viennent du formulaire
    // généré en page ajoutPersonne.php
    public function ajoutEtudiant() {
        //on aurait pu utiliser aussi le code suivant :   $nom=$this->nom();
        //on fait appel la classe mere (classPersonne) pour le nom et l'age
        $nom = parent::nom();
        $age = parent::age();
        $diplome = $this->_diplome;
        // $nom = $this->_nom;
        // $age=$this->_age;
        // 
        //définition de fuseau horaire
        date_default_timezone_set("Europe/Paris");
        //donne la date et l'heure d'enregistrement du fichier
        $date = date("d/m/Y à H:i:s");
        //creation du contenu du fichier à crée
        $chaine = $nom . ';' . $age . ';' . $diplome ;
        //on aurait pu aussi ecrire:  
        //  $chaine = parent::nom(). ";" . parent::age(). ";" . $this->_diplome. ";";

        file_put_contents('fichiers/etudiants/' . $nom . '.txt', $chaine);
        echo "le fichier de l'étudiant: <strong> " . $nom . "</strong> a bien été créé le <strong>" . $date. "</strong>";
        // var_dump($chaine);
    }

   ////crhistohphe
    //pour le moment non utilisée dans le projet
    public function SauveEtudiant($etudiant)
	{
		parent::Sauvegarde($this->_diplome,$etudiant);
	}
    
}
 
    
    

