<?php

//ce fichier utilise les données du formulaire d'entrée indexformulaire.php
//ne marche pas bien
////controle si les champs sont vides
//if (empty($_POST['nom'] || $_POST['prenom'] || $_POST['age'])) {
 //   echo'veuillez saisir une valeur  dans nom ou prenom ou age';
    // echo'veuillez cliquer sur enregistrer';
//}
//vérifier que le formulaire a été rempli
if (!empty($_POST['enregistrer'])) {
//retirer les espaces devant et derriere
    $nom = trim($_POST['nom']);
    //verifie que le champs nom n'est pas vide
    if (!empty($nom)) {
        $prenom = trim($_POST['prenom']);
        if (!empty($prenom)) {
            $age = trim($_POST['age']);
            if (!empty($age)) {
                $chaine = $nom . "\n" . $prenom . "\n" . $age . "\n";
                file_put_contents("fichiers/" . $nom . ".txt", $chaine);
                 var_dump($chaine);
                //version mathilde pour creer les fichiers
                //$dossier = fopen("fichiers/".$nom.".txt","w");
                //$ecrire = $nom . "\n" . $prenom . "\n" . $age . "\n"; 
                //fwrite($dossier, $ecrire);
                //fclose($dossier);
                echo "le fichier " . $nom . " a bien été créé.";
            } //fin if(!empty($age))
            else {
                echo'veuillez saisir une valeur dans age';
            }
        }//fin if(!empty($prenom))
            else {
                echo'veuillez saisir une valeur dans prenom';
            }
       // echo'veuillez saisir une valeur  prenom';
    }//if(!empty($nom))
     else {
                echo'veuillez saisir une valeur dans nom';
            }
   
}// 


?>