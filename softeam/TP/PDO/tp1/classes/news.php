<?php
//construction de la classe news
class   News
{
   

    //attributs
    protected $_id;
    protected $_auteur;
    
    protected $_titre;
    protected $_contenu;
    
    protected $_date_ajout;
    protected $_date_modif;
    
     //**************************************// 
    //constructeur
    public function __construct(array $tuple){
        if(count($tuple)){
        $this->hydrate($tuple);
        }
    }
    
    //constructeur methode sans l'hydratation
//    public function __construct($id, $auteur, $titre, $contenu, $date_ajout,$date_modif){
//    $this->_id=$id;
//    $this->_auteur=$auteur;
//    $this->_titre=$titre;
//    $this->_contenu=$contenu;
//    $this->_date_ajout=$date_ajout;
//    $this->_date_ajout=$date_modif;
//    }  
    
                  
    //destructeur
    
    public function __destruct(){
        
    }
  //**************************************//
    //methode getter
    public function Id(){
        return $this->_id;
    }
    
    public function Auteur(){
        return $this->_auteur;
    } 
    
    public function Titre(){
        return $this->_titre;
    } 
    
    public function Contenu(){
        return $this->_contenu;
    } 
    
     public function Date_ajout(){
        return $this->_date_ajout;
    }
    
     public function Date_modif(){
        return $this->_date_modif;
    }
    
    
    
    //**************************************//
    //methode setter
      public function setId($id){
         $this->_id=$id;
    }
    
    public function setAuteur($auteur){
         $this->_auteur=$auteur;
    } 
    
    public function setTitre($titre){
         $this->_titre=$titre;
    } 
    
    public function setContenu($contenu){
         $this->_contenu=$contenu;
    } 
    
     public function setdate_ajout($date_ajout){
         $this->_date_ajout=$date_ajout;
    } 
    
     public function setdate_modif($date_modif){
         $this->_date_ajout=$date_modif;
    } 
      //**************************************//
    //autres methodes
    
    //hydratation devient le construteur
            public function hydrate(array $tuple)
        {
        //construction dynamique du setter
            foreach ($tuple as $key => $value)
            {
                // ucfirst() : met tout en maj uscule sauf la premiere lettre
                //on concatene set et la cle avec le format PEAR, pour avoir setNom
                $method ='set'.ucfirst($key);
                        if (method_exists($this, $method))
                        {
                        $this->$method($value);
                        }
            }
        }
    
    
    //methode isvalid(), renvoie vrai si une news est valide, lors de la validation du formulaire
    // va prendre un objet news et va voir  s'il est valide'
    // verifie que la news à bien un auteur, un titre , un contenu
    //on instancie un  objet news        
        
       public function isValid(news $news) {
        if (!empty($news->Titre) and !empty($news->Auteur) and !empty($news->Contenu)) {
            
            echo "bravo la news est valide!";
            return true;
        }return false;
    }

    //methode isNews() qui renvoie vrai si une news est nouvelle (pour pouvoir l’enregistrer)
    //         si l'id de l'objet exist retourne faux, il faut verifier dans la base que l'id n'est pas deja dans la base'   
    //il faudra surement faire une boucle
    public function isNews(news $news) {
        if (exists($news->Id) ) {
             echo "bravo la news est nouvelle!";
            return true;
           
        }return false;
    }

    
    
    
    //methode permettant de decrire une news
    public function decrireNews(){
        echo' id ' . $this->_id .' titre '. $this->_titre . ' auteur: '. $this->_auteur 
                . ' contenu des news: '. $this->_contenu.'<br>'.
                ' date_ajout: '. $this->_date_ajout.  ' date_modif: '. $this->_date_modif
                ;
        
    } 
    
    
//    *******************************
    
    
    //methode permettant de sauver les news dans un 
    //fichier ayant pour nom nomdeesnews.txt   
        
    public function ajoutNews(){
           date_default_timezone_set("Europe/Paris");
    //        //donne la date et l'heure d'enregistrement du fichier
        $date = date("d/m/Y à H:i:s");
        
    //contenu etant un eliste sous forme de tableau
    //on prepare le tableau pour l'inserer dans la chaine
                $listcontenu="";       
                $i=0;
                foreach ($this->_contenu as $value) 
		{
			$listcontenu .= $value . ";";
			$i++;
		}
                
          
        
        $contenu=  $this->_id.';'.$this->_auteur.';'.$this->_titre.';'.$listcontenu.$this->_date_ajout;
        
        file_put_contents('fichiers/news/'.$this->_id.'.txt', $contenu);
         echo "le fichier news: <strong> " . $this->_id. "</strong> a bien été créé le <strong>" . $date. "</strong>";  
   
     // var_dump($contenu);    
         
    }
    
}

