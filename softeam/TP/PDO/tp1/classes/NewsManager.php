<?php

//classe repercutant les actions de la classse news dans la base de données
//on va faire une classe




class NewsManager {
   
    //attribut
    private $_db;
    
     //methode constructeur
    public function __construct($db) {
        $this->_db = $db;
    }  
    
    // methode getter
    public function Db() {
        return $this->_db;
    }
    
    //methode setter
    public function setDb($db) {
        $this->_db = $db;
        return $this;
    }
  
    
     //methode connexion
      function connexion($login) {
    $requete = 'SELECT * FROM personnes WHERE login = "'.$login.'"';
//    global $bd;
    $resultat = $bd->query($requete);
     
      }
  
    // méthode add() pour ajouter des enregistrements en base de données (insert)

    public function addNews() {
//     $select = $connexion->query("SELECT * FROM news");
//
//    //affichage des données de notre table
//    $select->setfetchMode(PDO::FETCH_OBJ);
//    var_dump($select);
//        
//        
//        
//        $this->database->query('INSERT INTO ...');
//    }
     try
{
$bd = new PDO(’mysql:host=localhost;dbname=connexion;
charset=utf8’,’root’,’’);
$nom = $_POST[’nom’];
$prenom = $_POST[’prenom’];
$bd->exec("INSERT INTO Personne (nom, prenom) VALUES(’$nom
’,’$prenom’)");
echo "tuple ajoute";
$bd=null;
}
catch (Exception $e)
{
die(’Erreur : ’ . $e->getMessage());
}
       
       
       
       
    }


    // méthode load() pour pouvoir charger un enregistrement specifique depuis la base de données
    //(select) à partir d'un id


    // méthode list() pour charger les N dernieres news les plus 
    // recentes (select) N est un parametre à passer à list ($n), mettre une limite

    
    
    // méthode update() pour pouvoir modifier des enregistrements en base de données
    //(update) à faire sur les 3 champs, inutile de verifier

    
    
    // méthode delete() pour pouvoir supprimer des enregistrements de la base de données
    //(delete)






    // méthode save() permettant de vérifier qu’une news isValid(), et si elle est isNew(),
    //l’ajouter, sinon la modifier
   
    
  
//  verif login
  
  
  $pseudo_Exist = $bd->prepare("SELECT pseudo FROM membre WHERE pseudo = :pseudo");
        //On recupère les pseudo de la base ou les pseudo sont egaux au pseudo passé par le formulaire
    $pseudo_Exist->bindValue('pseudo', $pseudo, PDO::PARAM_STR);
    $pseudo_Exist->execute();
    //on exécute la requête
 
    //$pseudoINbdd = $pseudo_Exist->rowCount(); //pb de portabilite avec row count
        $pseudoINbdd = $pseudo_Exist->Count(fetchColumn());


    //Rowcount permet de sortir le nombre de valeur que t'as requête renvoi, que l'on rentre dans la variable pseudoINbdd (ou autre )
 
    if($pseudoINbdd == 0){
        //Si la requête renvoi 0, le pseudo n'existe pas dans la base, sinon le pseudo existe.
    
}
