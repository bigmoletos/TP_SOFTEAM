<?php
//appeler la classe Personne
require_once "classes/classeIndividu.php";
//construction du formulaire pour le nom
//verifier que le bouton change est cliqué
if (isset($_POST['change'])) {
//affiche le choix des modifications
    //construction d'un menu deroulant avec les <select> et <option>
    $select = "nom<select name=\"nom\">";
    $liste = glob("fichiers/*.txt");
//    trie le tableau $liste par string
    sort($liste,SORT_STRING);
    //print_r ($liste);
    foreach ($liste as $fichier) {
        $contenu = file_get_contents($fichier);
        //recuperation des lignes
        $ligne = explode("\n", $contenu);
        //exploitation des données
        $nom = $ligne[0];
        $select .= "<option value=\"" . $nom . "\">";
        $select .= $nom;
        $select .= "</option>";
    }
    $select .= "</select>";
}

//$liste2 = glob("fichiers/*.txt");
///echo $liste2;
 //sort($liste,SORT_STRING);
//echo $liste2;
//menu choix deroulant pour le prenom et la zone texte
//traitement
if (isset($_POST['modifier'])) {
    $nom = $_POST['nom'];
    // echo $nom;
    //verifier l'attribut modifié
    $saisie = trim($_POST['saisie']);
    if (!empty($saisie)) {
        //va chercher dans le formulaire de saisi le <select name="attribut"..
        //la variable attribut permettra de choisir entre age ou prenom
        $attribut = $_POST['attribut'];
        //verifier quel attribut modifier
        $contenu = file_get_contents("fichiers/" . $nom . ".txt");
        //  var_dump($contenu);
        $ligne = explode("\n", $contenu);
        $prenom = $ligne[1];
        $age = $ligne[2];
        //echo $prenom. '  ' .$age;
        if ($attribut == 'prenom') 
        {
            $prenom = $saisie;
        } 
        else 
        {
            $age = $saisie;
        }// fin if else 
        //modification de l'attribut concerné dans le fichier
        $newContenu = $nom . "\n" . $prenom . "\n" . $age . "\n";
        // on va reecrire le fichier avec les nouvelles données, en ne gardant 
        // que le nom et l'age ou le prenom'
        file_put_contents("fichiers/" . $nom . ".txt", $newContenu);
        echo "Le fichier " . $nom . " contient désormais " . $prenom . " " . $age;
    } else {
        echo "Vous n'avez rien saisi.";
    }
}//fin if isset $_POST['modifier']

//echo $liste;
// sort($liste,SORT_NATURAL);
//echo $liste;
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>change</title>
    </head>
    <body>
        <form action="MAJfichiers.php" method="POST">
<?php
//test les entrées formulaire et 
echo $change = empty($select) ? "<input type=submit name=\"change\" value=\"Modifiez entrée\">" : "";
echo $select = empty($select) ? "" : $select;
echo $choix = empty($select) ? "" : "<select name=\"attribut\"><option value=\"prenom\">Prénom</option><option value=\"age\">Âge</option></select>";
echo $modif = empty($select) ? "" : "<input type=\"text\" name=\"saisie\" required><br />";
echo $changeModif = empty($select) ? "" : "<input type=submit name=\"modifier\" value=\"MODIFIER ENTREE\">";

//////////////////
//             echo $change = empty($select) ? "<input type=submit name=\"change\" value=\"Modifiez entrée\">" : "";
//            echo $select = empty($select) ? "" : $select;
//            echo $choix = empty($select) ? "" : "<select name=\"attribut\"><option value=\"prenom\">Prénom</option><option value=\"age\">Âge</option></select>";
//            echo $modif = empty($select) ? "" : "<input type=\"text\" name=\"saisie\" required><br />";
//            echo $changeModif = empty($select) ? "" : "<input type=submit name=\"modifier\" value=\"MODIFIER ENTREE\">";
////////////////
?>
        </form>
    </body>
</html>
