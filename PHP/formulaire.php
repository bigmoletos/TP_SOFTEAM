<?php ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
// put your code here
        ?>

        <form action="essai4.php" method="post">
            
            NOM <input type=text name="nom"><br>
            PRENOM <input type=text name="prenom"><br>
            ADRESSE <input type=text name="adresse"><br>
            <INPUT type=submit  value="cliquez ici">
        </form> 

        <form>  
            <input type="checkbox" name="case" checked="checked" />
            Aimez-vous les frites ?
            <input type="radio" name="frites" value="oui" id="oui" checked="checked" /> <label for="oui">Oui</label>
            <input type="radio" name="frites" value="non" id="non" /> <label for="non">Non</label>
        </form>

        <form method="post" action="http://www.monsite.com/cible.php">

            <!--htmlspecialchars evite la saisie de code html dans un formulaire-->
            <!--<p>Je sais comment tu t'appelles, hé hé. Tu t'appelles <?php echo htmlspecialchars($_POST['prenom']); ?> !</p>-->



    </body>
</html>
