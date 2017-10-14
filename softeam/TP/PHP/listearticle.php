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
        <?php
        echo'<ul>';
        $listeFichiers = glob("news/politique/*.news");//tableau contenant les noms des fichiers d'un repertoire
        
        $listeFichiers[] = "nouvel article";  //rajoute un article en derniere ligne
        unset($listeFichiers[1]);//on supprime une entrée dans le tableau

        var_dump($listeFichiers);
        foreach ($listeFichiers as $key => $value) {
            echo 'article: ' . $key;
            echo'<li><a href=' . $value . '>' . $value . ' </a></li>';

            // echo $key.'='.$value.'<br>';
        }

        echo'</ul>';
        ////////////////////////////
        echo "deuxieme tableau <br/>";
        //va chercher les noms des dossiers avec GLOB_ONLYDIR
        $listeDossiers = glob("news/*", GLOB_ONLYDIR);
        var_dump($listeDossiers);
        //on va ensuite afficher les fichiers de chaque dossiers du repertoire news
        //   pour cela on utilise de foreach imbriqués

        echo'<ul>'; //on prepare la liste non indexée

        
                foreach ($listeDossiers as $key => $dossier) {
                    //on refait un glob sur les fichiers dans chaque dossiers
                    $listeFichiers2 = glob("$dossier/*");
                    
                    $listeFichiers2[] = "nouvel article bis";  //rajoute un article en derniere ligne
                    unset($listeFichiers2[0]);//on supprime une entrée dans le tableau
                    
//var_dump($listeFichiers2);
                    echo'<li>' . $dossier . ' </li>';//on affiche les dossiers
                    
                    foreach ($listeFichiers2 as $key => $fichier) {
                        //on rajoute une sous liste avec le <u>
                        echo'<ul>';
                        echo'<li><a href=' . $fichier . '>' . $fichier . ' </a></li>';
                        echo'</ul>';
                    }
                }



        echo'</ul>'; //on ferme la liste non indexée
        
        
        
        ?>

<!--<p><?php echo "$listeFichiers"; ?></p>-->
    </body>
</html>
