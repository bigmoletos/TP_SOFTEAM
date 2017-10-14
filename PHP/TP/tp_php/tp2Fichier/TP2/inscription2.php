<?php 



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
        <title></title>
    </head>
    <body>
        <form name="formulaire" action="traitement_ajout.php" method="post">
            CP:
            <input name="cp" type="text" ><br/><br/>
            Ville:
            <input name="ville" type="text"><br/><br/>
            Adresse:
            <input name="adresse" type="text"><br/><br/>
            Pays
            <input name="pays" type="text"><br/><br/>
            <br />
        
            <br />
            <input name="suivant" type="submit"  value="suivant"  ><br/>
            <br />
            <input type="submit"  name="precedent" value="precedent" action="inscription1.php"><br/>
            <br />
            <a href="page1.php"><input type="button" value="quitter"/>
           
          <!--ci dessous 3 versions pour le bouton quitter-->
          
<!--                <input type="button" value="quitter" onClick="page1.php">
                <input type="button" value="quitter" action="page1.php">      -->
          <!--ferme completement la fenetre-->
            <!--<input type="button" value="Fermer" onClick="window.close()">-->
        </form>
    </body>
</html>
