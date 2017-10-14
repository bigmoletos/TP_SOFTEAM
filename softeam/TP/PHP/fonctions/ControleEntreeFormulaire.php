<?php

//objectifs:
//    retirer les espaces avant et aprés la saisie 
//    verifier si la saisie n'est pas vide'
//    retirer le code html inséré dans le formulaire


function controleentreeformulaire($fichier) {

    $filesecret = "connexion.txt";
    $descFic = fopen($filesecret, "r");
    while ($ligne = fread($descFic, filesize($filesecret))) {
        $data = $ligne;
        echo $data . "<br />";
    }
    htmlspecialchars(trim($_GET[$name]));
    //empty
    $filesecret = "connexion.txt";
}
if(!empty($_POST['login'])){
    
    
    
}
?>

