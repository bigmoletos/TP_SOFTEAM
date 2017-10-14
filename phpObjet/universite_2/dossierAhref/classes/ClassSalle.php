<?php

class ClassSalle {

    private $_numeroSalle;
    private $_etat;
    private $_capacite;

// methode constructeur
    public function __construct($numeroSalle = '0', $capacite = '0',$etat = 'dispo') {
        $this->_numeroSalle = $numeroSalle;
        $this->_etat = $etat;
        $this->_capacite = $capacite;
    }

//methode destructeur
    public function __destrut() {
        unset($this);
    }

//methode getter
    public function numeroSalle() {
        return $this->_numeroSalle;
    }

    public function etat() {
        return $this->_etat;
    }

    public function capacite() {
        return $this->_capacite;
    }

//methode setter
    public function setNumeroSalle($numeroSalle) {
        $this->_numeroSalle = $numeroSalle;
    }

    public function setEtat($etat) {
        $this->_etat = $etat;
    }

    public function setCapacite($capacite) {
        $this->_capacite = $capacite;
    }

//methode traitement
//cette methode devra changer l'etat de la salle, 
//de dispo à non dispo si le nombre d'eleves depassent sa capacité
    
    public function testcapa($etat = 'dispo', $capacite = 0, $nbretudiant='????') {
//erreur confusion entre la methode literale et par objet
        //$nbetudiant est le nombre d'eleve inscrit à un cours, il se trouve donc dans la classe cours
($nbretudiant > $capacite) ? $etat = 'nondispo' : $etat = 'dispo';
        


        return $this;
    }


//methode permettant d'enregistrer une salle dans un fichiers 
//dont le nom est numeroSalle.txt
    public function ajoutSalle() 
    {
//            //définition de fuseau horaire
        date_default_timezone_set("Europe/Paris");
//        //donne la date et l'heure d'enregistrement du fichier
        $date = date("d/m/Y à H:i:s");
        
        $numeroSalle = $this->_numeroSalle;
        $capacite = $this->_capacite;
        $etat=  $this->_etat;
        
        $contenu = $numeroSalle . ';' . $capacite . ';'.$etat ;
      //  var_dump($contenu);
//
        file_put_contents('fichiers/salles/' . $numeroSalle . '.txt', $contenu);
       
       echo "le fichier de la salle: <strong>" . $numeroSalle ."</strong> a bien été créé le <strong>" . $date . "</strong>";
      // return $this;
    }

    
}
?>