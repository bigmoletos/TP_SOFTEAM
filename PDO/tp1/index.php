<?php
require('chargeurClass.php');
require('connexionBDR.php');
$db = connexionDB();
$manager = new NewsManager($db);

 date_default_timezone_set("Europe/Paris");

 //controle des données dans l'URL pour savoir si on a cliqué sur modifier ou sur supprimer
 //si ok on fait un load de la news selecionnée
 //le $_GET fait appel à l'id qui apparait dans l'url de notre page admin.php
 
 //fonction qui se charge d'afficher toutes les news de la bdr en version courte
    function afficheNewsCourte($manager){
//la variable tableau stocke la liste des données passées par la fonction liste du manager
  $listeNews=$manager->getList();
       // $id=$_GET['id'];
//     echo ' <table>';    
    foreach ($listeNews as  $value) {

       echo' 
            <tr><td>'.$value->getId().'</td>
            <td><a href="http://localhost:8888/TP_SOFTEAM/softeam/TP/PDO/tp1/index.php?id='.$value->getId().'&change=details">'.$value->getTitre().'</a></td>
            <td>'.$value->getAuteur().'</td>
            <td>'.substr($value->getContenu(), 0 , 50 ).'.....</td>
            <td>'.$value->getDate_ajout().'</td>
            <td>'.$value->getDate_modif().'</td>
            </tr>';
               }
       }

 //fonction pour afficher news en version longue
  
    function afficheNewslongue($manager){
//la variable tableau stocke la liste des données passées par la fonction liste du manager
        $id=$_GET['id'];
       // var_dump($id);
        $news=$manager->Load($id);
       // $id=$_GET['id'];
//     echo ' <table>';    
          echo' 
            <tr><td >'.$news->getId().'</td>
            <td><a href="http://localhost:8888/TP_SOFTEAM/softeam/TP/PDO/tp1/index.php?id='.$news->getId().'&change=lire">'.$news->getTitre().'</a></td>
            <td>'.$news->getAuteur().'</td>
            <td>'.substr($news->getContenu(), 0 , 50 ).'.....</td>
            <td>'.$news->getDate_ajout().'</td>
            <td>'.$news->getDate_modif().'</td>
            </tr>';
               
       }
 
 
// ******************
 
 
 
 if (isset($_GET['modifier'])){
     $news=$manager->load((int) $_GET['modifier']);
 }
 if (isset($_GET['supprimer'])){
     $news=$manager->load((int) $_GET['supprimer']);
 }
 
 //////***********
 foreach ($manager->getlist(0.5)  as $news) {
     if (strlen($news->getContenu()) <= 400){
         $contenu=$news->getContenu();
     }
    else {
        $debut =  substr($news->getContenu(), 0 , 400 );
        $debut = substr($debut, 0 , strrpos($debut, ' ')). '....';
        $contenu=$debut;
    }
}
 
////**********************
 
// echo '<div><img src="'.$news->getImage(). '"/ class="listimg"><h3><a href="?id='. 
//         $news->getId(). '">'. $news->getTitre(). '</a></h3>'."\n".
//         '<p>'. nl2br($contenu). '</p></div>';


?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Page index affiche les news</title>
    </head>
    <body>
<!--        on va afficher 6 news avec une partie du contenu limité à 500 caracteres, 
        sur un clic du titre on va pourvoir acceder à la totalité du contenu-->

<h1>Bienvenue sur les news des anchois!</h1>
<form>
    <FIELDSET align="center">
        <LEGEND>la pêche à la mouche</LEGEND>
        <h3>liste des derniéres news</h3>  
<form>
    <table border="6">
        <tr><th >id</th><th>titre</th><th>auteur</th><th>contenu</th><th>date_ajout</th><th>date_modif</th>
            
      
        <?php  
        if ($_GET['change'] ==='lire'){
           echo  afficheNewscourte($manager);
        }
         if ($_GET['change'] =='details'){
           echo afficheNewslongue($manager);
        }
       // echo"  $_GET['change'] =='lire' ? afficheNewscourte($manager) : afficheNewslongue($manager) ";
        ?>
          </tr>
    </table>






</form>
        
        
    </FIELDSET>  
    <input type="submit" action='' name='ajouter'>
   
      
</form>          
     <!--<a href="admin.php" >lien vers admin</a>-->   
     <a href="admin.php?id=1&change=modifier" >lien vers admin</a>     
        
         <?php
        echo '<br>id='. $_GET['id'];
        echo '<br>change='. $_GET['change'];
        ?>
    </body>
</html>
