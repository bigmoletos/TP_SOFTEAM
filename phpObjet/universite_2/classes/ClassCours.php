<?php
//cette classe comprend toute les données necessaires à un cours à savoir 
//le theme du cours la durée des cours, le nom de l'enseignant, la liste des 
//etudiants et le numero de la salle 
class   ClassCours
{
    //const EXT_FICHIER = '.cours';

    //attributs
    private $_theme;
    private $_nbheures;
    
    private $_enseignant;
    private $_etudiants;
    
    private $_salle;
     //**************************************// 
    //constructeur
    //Enseignant $enseignant fait appel à enseignant de la classeEnseignant
    public function __construct($theme, $nbheures, $enseignant,  $etudiants, $salle){
    $this->_theme=$theme;
    $this->_nbheures=$nbheures;
    $this->_enseignant=$enseignant;
    $this->_etudiants=$etudiants;
    $this->_salle=$salle;
    }         
    //destructeur
    
    public function __destruct(){
        
    }
  //**************************************//
    //methode getter
    public function Theme(){
        return $this->_theme;
    }
    
    public function Nbheures(){
        return $this->_nbheures;
    } 
    
    public function Enseignant(){
        return $this->_enseignant;
    } 
    
    public function Etudiants(){
        return $this->_etudiants;
    } 
    
     public function Salle(){
        return $this->_salle;
    }
    //**************************************//
    //methode setter
      public function setTheme($theme){
         $this->_theme=$theme;
    }
    
    public function setNbheures($nbheures){
         $this->_nbheures=$nbheures;
    } 
    
    public function setEnseignant($enseignant){
         $this->_enseignant=$enseignant;
    } 
    
    public function setEtudiants($etudiants){
         $this->_etudiants=$etudiants;
    } 
    
     public function setSalle($salle){
         $this->_salle=$salle;
    } 
    
      //**************************************//
    //autres methodes
    
    //methode permettant de decrire une salle
    public function decrireCours(){
        echo' theme ' . $this->_theme . ' durée en heures '. $this->_nbheures . 
                ' salle '. $this->_salle .' enseignant '. $this->_enseignant .
                ' listes des étudiants '. $this->_etudiants.'<br>';
        
    }    
     //methode permettant de sauver les cours dans un 
     //fichier ayant pour nom nomducours.txt   
    
//*****************  ancienne version *********************  
    public function ajoutCours(){
           date_default_timezone_set("Europe/Paris");
        //donne la date et l'heure d'enregistrement du fichier
        $date = date("d/m/Y à H:i:s");        
        //etudiants etant un eliste sous forme de tableau
        //on prepare le tableau pour l'inserer dans la chaine
                $listetudiants="";       
                $i=0;
                foreach ($this->_etudiants as $value) 
		{
			$listetudiants .= $value . ";";
			$i++;
		}
        
        $contenu=  $this->_theme.';'.$this->_nbheures.';'.$this->_enseignant.';'.$listetudiants.$this->_salle;
        
        file_put_contents('fichiers/cours/'.$this->_theme.'.txt', $contenu);
         echo "le fichier du cours: <strong> " . $this->_theme. "</strong> a bien été créé le <strong>" . $date. "</strong>";  
   
     // var_dump($contenu);    
     
    }
   
//    ******* nouvelle methode  avec serialization**********
    
        public function newAjoutCours(){
        
        //etudiants etant un eliste sous forme de tableau
        //on prepare le tableau pour l'inserer dans la chaine
                $listetudiants="";       
               
                foreach ($this->_etudiants as $value) 
		{
			$listetudiants .= $value . ";";
		$contenu=serialize($this);	
		}
           //serialisation de l'objet et affectation à une variable
           //puis creation des fichiers contenant les objets afin d'y 
           //acceder à partir des interfaces   
         
                
        file_put_contents('fichiers/cours/'.$this->_theme.'.txt',$contenu);
        
        
        //file_put_contents($contenu,'fichiers/cours/'.$this->_theme.'.txt');
        
        echo "le fichier du cours: <strong> " . $this->_theme. "</strong> a bien été créé ";  
   
     // var_dump($contenu);   
     }
    //
    //
    //
    //methode statique pour faire les modifs dans les fichiers
      //va comparer $nom avec la liste des fichiers du repertoire cours
     //puis s'il trouve le fichier du meme nom que cours
//     alors on unserialise le fichier
       
     
    
     public static function afficheCours($nom){
         //on initialise la variable
         $listeFichiers="";
         $listefichiers= glob("fichiers/cours/" . $nom . ".txt");
           //compte si le nombre de fichiers contenant $nom est superieur a 0 
         if (count($listeFichiers)>0){
                 //va chercher le contenu du fichier en indice 0 car ce fichier est unique
                 $contenu = file_get_contents($listefichiers[0]);
                //on deserialize $contenu de façon à reformer le contenu de l'objet
                 //et on l'assigne à l'objet $obj
                 $obj =unserialize($contenu);
                 return $obj; 
             }
     }        
        
        
        
        
        
         
         
    
    
}

