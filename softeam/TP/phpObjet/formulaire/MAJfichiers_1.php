<?php
//appeler la classe Personne
require_once "classes/classeIndividu.php";
//construction du formulaire pour le nom
//verifier que le bouton change est cliqué
if (!isset($_POST['menu'])) 
  {
            $i = 0;
            //commence le menu deroulant, on va ecrire le html avec le php
           // $select = "<select name=\"nom\">";
            // $select = "nom<br /><select name=\"nom\">";
            //$select = "nom<select name=\"nom\">";
            echo"<select name='menu' multiple>";
           //    crée la liste des fichiers du repertoire fichiers
           $liste = glob("fichiers/*.txt");
           //trie la liste 
           sort($liste, SORT_STRING);
           //print_r ($liste);
           //boucle sur le tableau $liste en affectant 
           //la valeur de lindice du tableau à la variable $fichier
            foreach ($liste as $fichier) 
            {
                    //va chercher le contenu des fichiers
                    $contenu = file_get_contents($fichier);
                    //découpage par ligne du contenu, va creer autant de ligne qu'il y aura de \n
                    $ligne = explode("\n", $contenu);
                    //traitement du contenu des fichiers
                    $nom=$ligne[0];
                    $prenom= $ligne[1];
                    $age=$ligne[2];
                        // $données=  $nom.' '.$prenom.'<br />';
                         //echo $données;
                        // echo$nom."<br />";
                        // echo$prenom."<br />";
                        // echo$age."<br />";
                         //intergration des données dans une liste deroulante
                          //concatenation de la cahine select, afin de 
                          //former la syntaxe d'un formulaire à menu déroulant     
//                    $select .= "<option value=\"" . $nom . "\">";
//                    $select .= $nom;
//                    $select .= "</option>";
            echo "  <option value=\"$nom\" >$nom</option>";
            echo "  <option value=\"$age\" >$age</option>";
                    
                    $i++;
            }
          // $select .= "</select>"; 
           echo "  </select><br />";
    }
    
    else
     {
        echo'veuillez saisir une donnée';
      }
//menu choix deroulant pour le prenom et la zone texte
//$nom = $_POST['nom'];
//$prenom = $_POST['prenom'];
//$saisie = $_POST['saisie'];
//$change = $_POST['change'];
//$multiple = $_POST['multiple[]'];
//traitement
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>change</title>
    </head>
    <body>
        <!--//tableau avec menu deroulant-->
        
        <form action="MAJfichiers_1.php" method="POST">
            <?php
    
            echo"<select name='menu' >";
            echo "  <option value=\"$nom\" >$nom</option>";
            echo "  <option value=\"$age\" >$age</option>";
            echo "  </select><br />";
            
            echo "  <input type=\"text\" name=\"saisie\">";
            echo "  <input type=\"submit\" name=\"change\" value=\"changer valeur\">";
            ?>   
        </form>
        
        
        
    <!--//tableau avec menu deroulant à choix multiple-->  
    
        <form action="MAJfichiers_1.php" method="POST">
                <?php
                

            echo"<select  name=\"multiple\" multiple>";
            echo "  <option value=\"$nom\" >$nom</option>";
            echo "  <option value=\"$prenom\" >$prenom</option>";
            echo "  </select>";


            echo "  <input type=\"text\" name=\"saisie2\">";
            echo "  <input type=\"submit\" name=\"change2\" value=\"changer valeur2\">";
            ?>       
        </form>
    </body>
</html>
