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
    }

    //methode connexion
//      function connexion($login) {
//    $requete = 'SELECT * FROM personnes WHERE login = "'.$login.'"';
////    global $bd;
//    $resultat = $bd->query($requete);
//     
//      }
//      
//  *******************************************
    // méthode add() pour ajouter des enregistrements en base de données (insert)
    //fonction faisant appel à la classe News, avec un objet $news
    public function addNews(News $news) {
        try {
            //on fait le prepare et on l'affecte à la variable $req
            //on affecte à la variable $req la valeur de l'objet $news ($this->_db) puis on prepare les données        
//                $req =$this->_db->prepare('
//                    select * 
//                    from News 
//                    where 
//                    and titre = :titre 
//                    and auteur = :auteur 
//                    and contenu = :contenu 
//                    and date_ajout = :date_ajout');

            $req = $this->_db->prepare("INSERT INTO news (titre, auteur, contenu, date_ajout, date_modif )"
                    . " VALUES (:titre, :auteur, :contenu, Now(), Now())");

            //version binValue et non array car on melange des chaine de caracteres avec des entiers
            //   $req->binValue(':id', $_POST['id']);//inutile car est en auto-increment dans la base de donnée
            $req->binValue(':titre', $news->Titre());
            $req->binValue(':auteur', $news->Auteur());
            $req->binValue(':contenu', $news->Contenu());
            if ($req->exec()) {
                echo "requête correctement insérée";
            }

            //version xxxxxx   
            //puis on fait l'execute     
            //insertion des données dans la base     
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

//**************************************************
    // méthode load() pour pouvoir charger un enregistrement specifique depuis la base de données
    //(select) à partir d'un id
    public function Load() {
        
    }

//**************************************************
    // méthode liste() pour charger les N dernieres news les plus 
    // recentes (select) N est un parametre à passer à liste ($n), mettre une limite (SELECT * FROM ma_table LIMIT 100;)
    public function Liste() {
        
    }

    //**************************************************   
    // méthode update() pour pouvoir modifier des enregistrements en base de données
    //(update) à faire sur les 3 champs, inutile de verifier
    public function Update() {
        
    }

    //**************************************************   
    // méthode delete() pour pouvoir supprimer des enregistrements de la base de données
    //(delete)
    public function Delete() {
        
    }

//**************************************************
    // méthode save() permettant de vérifier qu’une news isValid(), et si elle est isNew(),
    //l’ajouter, sinon la modifier
    public function Save() {
        
    }

    //**************************************************   
//methode permetttant de verifier le login utilisateur à la bdr
//  verif login
//  
//    $pseudo_Exist = $bd->prepare("SELECT pseudo FROM news WHERE pseudo = :pseudo");
//        //On recupère les pseudo de la base ou les pseudo sont egaux au pseudo passé par le formulaire
//    $pseudo_Exist->bindValue('pseudo', $pseudo, PDO::PARAM_STR);
//    $pseudo_Exist->execute();
//    //on exécute la requête
// 
//    //$pseudoINbdd = $pseudo_Exist->rowCount(); //pb de portabilite avec row count
//        $pseudoINbdd = $pseudo_Exist->Count(fetchColumn());
//
//
//    //Rowcount permet de sortir le nombre de valeur que t'as requête renvoi, que l'on rentre dans la variable pseudoINbdd (ou autre )
// 
//    if($pseudoINbdd == 0){
//        //Si la requête renvoi 0, le pseudo n'existe pas dans la base, sinon le pseudo existe.
//    
//

    
    }

    