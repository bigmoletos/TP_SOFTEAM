






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
        <form name="formulaire" action="inscription2.php" method="post">
            Nom:
            <input name="nom" type="text" ><br/><br/>
            Prenom:
            <input name="prenom" type="text"><br/><br/>
            Age:
            <input name="age" type="text"><br/><br/>
            <br>
            <input type="submit"  value="suivant"><br/>
            <br>
            <a href="page1.php"><input type="button" value="quitter"/>
           
          <!--ci dessous 3 versions pour le bouton quitter-->
          
<!--                <input type="button" value="quitter" onClick="page1.php">
                <input type="button" value="quitter" action="page1.php">      -->
          <!--ferme completement la fenetre-->
            <!--<input type="button" value="Fermer" onClick="window.close()">-->
        </form>
    </body>
</html>
