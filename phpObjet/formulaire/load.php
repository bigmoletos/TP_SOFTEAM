<?php
//appeler la classe Personne
require_once "classes/classeIndividu.php";
//vérifier que le boutton load est activé
if (isset($_POST['load'])) {
//introduction du code html pour creer un tableau <table> qui sera ensuite fermé par </table>;
    $tableau = "<table>";
    //on initialise a 0 l'indice des tableaux
    $i = 0;
    //boucle sur chaque indice du tableau , glob va chercher la liste des fichiers
    //as $fichier =à chaque indice du tableau correspondra la valeur $fichier 
     $liste=glob("fichiers/*.txt");
		foreach ($liste as $fichier){
        //lecture du contenu des fichiers, c'est un tableau
        $contenu = file_get_contents($fichier);
        //fseek($contenu,0);
        //extraction des chaines de caracteres entre chaque retour ligne /n
        $ligne = explode("\n", $contenu);
        //construction d'un nouvel objet individu contenant chaque ligne
        $perso[$i] = new Individu($ligne[0], $ligne[1], $ligne[2]);
        //on concatene tableau pour avoir le code html complet du tableau
        $tableau .= "<tr><td style=\"border-style: solid;\">";
        //on appelle la methode 'faire_tableau.php' de la classe individu
        $tableau .= $perso[$i]->faire_tableau_php();
        //var_dump($tableau);
        $tableau .= "</td></tr>";
        $i++;
    }
    $tableau .= "</table>"; //fin while $contenu = fopen
} else {
    $messageSaisir = "Veuillez cliquer sur le bouton: chargez les fichiers.<br />";
}//
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form  method="POST" action="load.php">

            <?php
            //ternaire si tableau est vide afficher le message de $messagesaisir sinon
            //afficher le tableau
            echo $tableau = empty($tableau) ? $messageSaisir : $tableau;
            ?>
            <input type="submit"  name="load" value="chargez les fichiers">
        </form>

    </body>
</html>
