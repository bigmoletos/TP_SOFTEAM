<?php
require('chargeurClass.php');
require('connexionBDR.php');
$db = connexionDB();
$manager = new NewsManager($db);
//var_dump($manager);


//fonction qui se charge d'afficher toutes les news de la bdr en version courte
    function afficheNewsLongue($manager){
//la variable tableau stocke la liste des données passées par la fonction liste du manager
  $listeNews=$manager->getList();
       // $id=$_GET['id'];
//     echo ' <table>';    
    foreach ($listeNews as  $value) {

       echo' 
            <tr><td>'.$value->getId().'</td>
            <td><a href="http://localhost:8888/TP_SOFTEAM/softeam/TP/PDO/tp1/index.php?id='.$value->getId().'&change=lire">'.$value->getTitre().'</a></td>
            <td>'.$value->getAuteur().'</td>
            <td>'.substr($value->getContenu(), 0 , 50 ).'.....</td>
            <td>'.$value->getDate_ajout().'</td>
            <td>'.$value->getDate_modif().'</td>
            <td><a href="http://localhost:8888/TP_SOFTEAM/softeam/TP/PDO/tp1/admin.php?id='.$value->getId().'&change=modifier">modifier</a></td>
            <td><a href="http://localhost:8888/TP_SOFTEAM/softeam/TP/PDO/tp1/admin.php?id='.$value->getId().'&change=supprimer">supprimer</a></td>
            </tr>';
               }
       }

 //methode pour afficher       
       http://localhost:8888/TP_SOFTEAM/softeam/TP/PDO/tp1/
       
       http://localhost:8888/TP_SOFTEAM/softeam/TP/PDO/tp1/
       http://localhost/TP_SOFTEAM/TP_SOFTEAM/softeam/TP/PDO/tp1/admin.php pas ok
    
//fonction pour supprimer une news
function afficheNewsDel(){
}

//fonction pour modifer une news
function afficheNewsModif($manager)(){

}
//fonction pour afficher une news en version courte

function    afficheNewsCourte($manager){
    
}
  


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
<!--        
        affiche un tableau avec la liste des news avec la possibilite de les modifier, 
        afficher et supprimer ou d'ajouter une nouvelle news
lors  dela modification il faudra pre-remplir le formulaire avec les données
correspondant à l'id de la news selectionnée par le bouton modifier-->

<h1>liste des news</h1>  
<form>
    <table border="6">
        <tr><th>id</th><th>titre</th><th>auteur</th><th>contenu</th><th>date_ajout</th><th>date_modif</th><th>modifier</th><th>supprimer </th>
            
        </tr>
        <?php  $change=$_GET['change'];
        if ($change='modifier'){
        echo afficheNewsModif($manager);
        }
        if ($change='supprimer'){
        echo afficheNewsDel($manager);
        }
        ?>
        
    </table>






</form>
        
<a href="index.php?id=1&change=lire" >lien vers admin</a>        
<br> 
         <?php
        echo '<br>id='. $_GET['id'];
        echo '<br>change='. $_GET['change'];
        ?>
    </body>
</html>
