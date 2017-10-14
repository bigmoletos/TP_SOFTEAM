<?php
require('chargeurClass.php');
require('connexionBDR.php');
$db = connexionDB();
$manager = new NewsManager($db);
//var_dump($manager);
$change='lire';
$id=1;



//fonction qui se charge d'afficher toutes les news de la bdr en version courte
    function afficheNewsCourte($manager){
        //la variable tableau stocke la liste des données passées par la fonction liste du manager
         $listeNews=$manager->getList();
         // $id=$_GET['id'];
        //     echo ' <table>';    
          
         foreach ($listeNews as  $value) {
             //conversion des dates  au format europeen
           $dateA = new DateTime($value->getDate_Ajout());
           $dateM= new DateTime($value->getDate_modif());
           echo' 
                <tr><td>'.$value->getId().'</td>
                <td><a href="http://localhost:8888/TP_SOFTEAM/softeam/TP/PDO/tp1/index.php?id='.$value->getId().'&change=lire">'.$value->getTitre().'</a></td>
                <td>'.$value->getAuteur().'</td>
                <td>'.substr($value->getContenu(), 0 , 50 ).'.....</td>
                <td>'. $dateA->format('d-M-Y à H\hi').'</td>
                <td>'.$dateM->format('d-M-Y à H\hi').'</td>
                <td><a href="http://localhost:8888/TP_SOFTEAM/softeam/TP/PDO/tp1/admin.php?id='.$value->getId().'&change=modifier">modifier</a></td>
                <td><a href="http://localhost:8888/TP_SOFTEAM/softeam/TP/PDO/tp1/admin.php?id='.$value->getId().'&change=supprimer">supprimer</a></td>
                </tr>';
                   }
       }
       
 
             
 //fonction pour afficher       
    
//fonction pour supprimer une news
function afficheNewsDel(){
}

//fonction pour modifer une news, l'ajoute (INSERT TO)
// avec save() ou la modifie (UPDATE) avec update()
function afficheNewsModif($manager){
 //!isset($_GET['id']) ? $id=1 :  $id=$_GET['id'];// ternaire
   $news=$manager->Save(News $news); 
    
}
//fonction pour afficher une news en version courte

//fonction pour afficher l'auteur
  function auteur($manager){
         !isset($_GET['id']) ? $id=1 :  $id=$_GET['id'];// ternaire
          $news=$manager->Load($id);
          $auteur= $news->getAuteur();
          //  var_dump($auteur);
          // echo $auteur;
          return $auteur;
 }
 //fonction pour afficher le titre
  function titre($manager){
         !isset($_GET['id']) ? $id=1 :  $id=$_GET['id'];// ternaire
          $news=$manager->Load($id);
          $titre= $news->getTitre();
          //  var_dump($auteur);
          // echo $auteur;
          return $titre;
 }
  //fonction pour afficher le contenu
  function contenu($manager){
         !isset($_GET['id']) ? $id=1 :  $id=$_GET['id'];// ternaire
          $news=$manager->Load($id);
          $contenu= $news->getContenu();
          //  var_dump($auteur);
          // echo $auteur;
          return $contenu;
 }
 echo '<br />'.auteur($manager);
//var_dump($auteur);
//var_dump($id);

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>page administrateur</title>
    </head>
    <body>
        
   <?php // echo "<a href=\"http://localhost:8888/TP_SOFTEAM/softeam/TP/PDO/tp1/admin.php?id=1&change=lire\"></a>" ; ?>    
         
<!--        
        affiche un tableau avec la liste des news avec la possibilite de les modifier, 
        afficher et supprimer ou d'ajouter une nouvelle news
lors  dela modification il faudra pre-remplir le formulaire avec les données
correspondant à l'id de la news selectionnée par le bouton modifier-->

<h1>liste des news</h1>  
<form method="post" action="admin.php" name="formAdministrateur">
    <table border="6">
        <tr><th>id</th><th>titre</th><th>auteur</th><th>contenu</th><th>date_ajout</th><th>date_modif</th><th>modifier</th><th>supprimer </th>
            
        </tr>
        
        <?php  //$change= htmlspecialchars($_GET['change']);
//        if ($change='modifier'){
//        echo afficheNewsModif($manager);
//        }
//        if ($change='supprimer'){
//        echo afficheNewsDel($manager);
//        }
        echo afficheNewsCourte($manager);
        ?>
        
    </table>


<label for="titre">votre titre</label>
<input type="text" name="titre" id="titre" placeholder="ex: Les nymphes" 
       value="<?php echo isset($_GET['change']) && $_GET['change']=='modifier' ?  titre($manager) : ""; ?>" 
       maxlength="20" size="30">

<br />
<label for="auteur">votre nom</label>
<input type="text" name="auteur" id="auteur" placeholder="ex: Les nymphes" 
       value="<?php echo isset($_GET['change']) && $_GET['change']=='modifier' ? auteur($manager): ""; ?>" 
       maxlength="20" size="30">
<br />
<label for="contenu">votre contenu</label>
<textarea name="contenu" id="contenu"   placeholder="ex: Les nymphes..........." >
   <?php echo isset($_GET['change']) && $_GET['change']=='modifier' ? contenu($manager): "";//ternaire le champ se remplit si change=modifer et si modifier est set ?>
</textarea>
<input type="submit" name="modifierNews" id="modifierNews" value="valider modif">

<br />
<label for="image">image à integrer</label>
<input type="text" name="image" id="image" placeholder="C:\Users\franck\programmation\sauve_fichiers_serveur_wamp\www\TP_SOFTEAM\softeam\TP\PDO\tp1\image\image1.jpg" 
       value="<?php echo isset($_GET['change']) && $_GET['change']=='modifier' ? image($manager): ""; ?>" 
       maxlength="200" size="70">
</form>
        
<a href="index.php?id=0&change=lire" >lien vers index</a>        
<br> 
         <?php
        echo !isset($_GET['id']) ? "":'<br>id='. htmlspecialchars( $_GET['id']);
        echo !isset($_GET['id']) ? "":'<br>change='. htmlspecialchars($_GET['change']);
        ?>
    </body>
</html>
