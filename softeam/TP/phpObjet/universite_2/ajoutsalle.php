<?php
include "chargeurClass.php";
include 'interfaceUniversite.php';
//include "classes/ClassSalle.php";
//on initialise les variables du formulaire
$capacite = "";
$numeroSalle = "";


if (isset($_POST['enregistrer'])) {
    $capacite = htmlspecialchars(trim($_POST['capacite']));
    if (!empty($capacite)) {
        $numeroSalle = htmlspecialchars(trim($_POST['numeroSalle']));
        if (!empty($numeroSalle)) {
            //creation d'un nouvel objet salle avec comme 
            //arguments les saisies formulaires numeroSalle et capacite
            //fait appel à la methode ajoutSalle
            $salle = new classSalle($numeroSalle, $capacite);
          //  $salle->ajoutSalle();
            $salle->ajoutSalle();
        }
    }
}

//var_dump($salle);
//var_dump($numeroSalle);
//var_dump($capacite);
//var_dump($_POST);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>formulaire_Ajout_salles</title>
    </head>
    <body>
        <h1>Ajouter une salle</h1>
        <form  method="POST" name="ajoutSalle" action="ajoutsalle.php" >
            numéro de la salle
            <input type="text" name="numeroSalle" >
            <br />
            nombre d'éléves max
            <input type="text" name="capacite"> 
            <br />
 <input type="submit" name="enregistrer" value="ajouter la salle" >
        </form>
       
        <br />
        <!--lien vers les autres pages-->
        <a href ="ajoutcours.php"><input type="button" value="Ajouter un cours"></a>
        <a href ="ajoutepersonne.php"><input type="button" value="Ajouter une personne"></a>
        <a href ="modifCours.php"><input type="button" value="Modifier un cours"></a>  
    </body>
</html>
