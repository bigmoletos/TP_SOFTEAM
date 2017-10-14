<?php
session_start();

echo "bienvenu " . $_SESSION["login"];
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form name="ajout" action="page.php" method="post">
            <input type="submit" value="Consulter"><br/>
        </form>

        <form name="page" action="ajout.php" method="post">
            <input type="submit" value="Ajouter"><br/>
        </form>

        <form name="page" action="supprimer.php" method="post">
            <input type="submit" value="supprimer"><br/>
        </form>
    </body>
    
</html>