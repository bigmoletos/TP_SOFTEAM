<html>
    <body>

        <p> Bonjour <h1>
            <?php
            $sexe=$_GET['sexe'];
            $Traitsexe = ($sexe == "M") ? "Monsieur" : "Madame"; //ternaire
            echo $Traitsexe . ' ';
            // print $_GET['sexe'] . " ";
            print $_GET['prenom'] . " ";
            print $_GET['nom'];
            ?>
        </h1> Vous avez choisi le vin suivant!
        <?php
        echo ' ';
        echo'<h1>';
        print $_GET['choix'];
        echo'</h1>';
        ?>
        <?php var_dump($_GET); ?>
</html>
</body><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

