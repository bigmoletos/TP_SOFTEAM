
        <?php
        //tableau contenant les fichiers
        $fichiers = glob("news/politique/*.*");
      //  var_dump($fichiers);
        //compte le nombre des fichiers
        $nbfichiers=  count($fichiers);
       // var_dump($nbfichiers);
        //défini l'indice d'un fichier à afficher
        
        $indice=3;
        
        $article="<div class='article'>il n'y a pas d'article correspondant à votre indice</div>";
        
        //affiche le contenu de l'article en fonction de l'indice choisi, aprés avoir verifié qu'il existe

        if (($indice>=0) and ($indice < $nbfichiers)){
            $article="<div class='article'>".file_get_contents($fichiers[$indice])."<div>";
        }
        else{
            $article="<div class='article'>article inexistant</div>"; 
        }
       // echo $article;
       // var_dump($article);
        
  
echo "<?xml version=\"1.0\" encoding=\"utf-8\"
 ?>";
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">     
    <title>navigation entre article...</title>

    <link media="screen" type="text/css" rel="stylesheet" href="TP02-style.css" />

</head>
<body>

<?php

echo $article;

?>
    
</body>
</html>