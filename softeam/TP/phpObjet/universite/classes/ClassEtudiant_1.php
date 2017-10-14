<?php

class ClassEtudiant extends ClassPersonne {

   // const EXT_FICHIER = '.etudiant';

    private $_diplome;

//contructeur
    public function __construct($nom = 'sans', $age = 0, $diplome = 'sans') {
      //  parent::__construct($nom, $age);
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
        return $this;
    }

    //   autres methodes
    public function ajoutEtudiant() {
        //on aurait pu utiliser aussi le code suivant :   $nom=$this->nom();
        $nom = $this->nom();
        $chaine = $this->_nom . ';' . $this->_age . ';' . $this->_diplome . ';';
        file_put_contents('fichiers/etudiants/' . $nom . '.txt', $chaine);
        echo "le fichier " . $nom . " a bien été créé.";
        var_dump($chaine);
    }

}
