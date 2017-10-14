<?php
//cette page permet de gerer les cours en creant un fichier par cours 
//integrant le théme, le nombre d'heures du cours, le numero de la salle, 
//le nom de l'enseignant et la liste des etudiants
//autoload des classes
include 'chargeurClass.php';
include 'interfaceUniversite.php';
//liste et initialisation des variables du formulaire
$theme = "";
$nbheures = "";
$ajoutCours = "";
$message = "coucou les agneaux";
$listetudiant = "";
$numeroSalle = "";
$NomEnseignant = "";
$ajouter = "";

//Boucle pour creer le menu deroulant des enseignants
//
//***********************************************///
//ancienne version sans passer par les objets
//$listEnseignants = glob('fichiers/enseignants/*.txt');
//    $i = 0;
//foreach ($listEnseignants as $nom) 
//{
//   $nomEnseignant =substr($nom, strlen('fichiers/enseignants/'), -strlen('.txt'));
//   $menuEnseignant[]=$nomEnseignant;
//   
//        // $menuEnseignant.="<option value='[$i]'>$nomEnseignant[$i]</option>";
//         // echo "<option value='[$i]'>$nomEnseignant[$i]</option>";
//        //  $i++;
//} 
//*********************************************///
//////////nouvelle version via les objets
$menuEnseignant = array();
$listEnseignants = glob('fichiers/enseignants/*.txt');
//var_dump($listEnseignants);
$i = 0;
foreach ($listEnseignants as $nom) {
    //on ne retire le nom du rep et de l'extension des fichiers pour n'avoir que le nom
    $nomEnseignant = substr($nom, strlen('fichiers/enseignants/'), -strlen('.txt'));
    //creation d'un nouvel objet enseignant avec comme attribut le nom
    $tableau = new ClassEnseignant($nomEnseignant);
    //preparation du tableau $menuEnseignant
    $menuEnseignant[$i] = $tableau;
    $i++;
}
//var_dump($menuEnseignant);
//*********************************************///
//Boucle pour creer le menu deroulant des etudiants

$menuEtudiant = array();
$listEtudiants = glob('fichiers/etudiants/*.txt');
//var_dump($listEtudiants);
$j = 0;
foreach ($listEtudiants as $nom) {
    //on ne retire le nom du rep et de l'extension des fichiers pour n'avoir que le nom
    $nomEtudiant = substr($nom, strlen('fichiers/etudiants/'), -strlen('.txt'));
    //creation d'un nouvel objet entudiant avec comme attribut le nom
    $tableau = new ClassEtudiant($nomEtudiant);
    //preparation du tableau $menuEtudiant
    $menuEtudiant[$j] = $tableau;
    $j++;
}//var_dump($menuEtudiant);
//
//*********************************************///
//boucle pour le numero des salles

$menuSalle = array();
$listSalles = glob('fichiers/salles/*.txt');
//var_dump($listSalles);
$l = 0;
foreach ($listSalles as $nom) {
    //on ne retire le nom du rep et de l'extension des fichiers pour n'avoir que le nom
    $nomSalle = substr($nom, strlen('fichiers/salles/'), -strlen('.txt'));
    //creation d'un nouvel objet entudiant avec comme attribut le nom
    $tableau = new ClassSalle($nomSalle);
    //preparation du tableau $menuSalle
    $menuSalle[] = $tableau;
    $l++;
}//var_dump($menuSalle);

//enregistrement des données du formulaire
///*********ancienne version********///
//        if (isset($_POST['ajouter'])) {
//            $theme = htmlspecialchars(trim($_POST['theme']));
//            if (!empty($theme)) {
//                $nbheures = htmlspecialchars(trim($_POST['nbheures']));
//               // if (!empty($nbheures)) {
//                //   $enseignant = htmlspecialchars(trim($_POST['NomEnseignant']));
//                 //   if (!empty($enseignant)) {
//
//
//        //if (!empty($etudiants)) {
//                            $salle = htmlspecialchars(trim($_POST['numeroSalle']));
//                            if (!empty($salle)) {
//
//                    //creation d'un nouvel objet cours avec comme 
//                    //arguments les saisies formulaires 
//                    //fait appel à la methode ajoutCours
//                    $cours = new ClassCours($theme, $_POST['nbheures'], $_POST['NomEnseignant'], $_POST['listetudiants'],$_POST['numeroSalle'] );
//
//                  //  $cours = new classCours($theme, $nbheures, $enseignant, $etudiants, $salle);
//                    $cours->ajoutCours();
//                            }
//                      //  }
//                   // }
//               // }
//            }
//        }
//        
//***********nouvelle version d'enregistrement des cours*********************///

//
////nouvelle version d'enregistrement des cours dans des fichiers
// avec la serialisation. Chaque objet sera enregistré dans un fichier

if (isset($_POST['ajouter'])) {
    $theme = htmlspecialchars(trim($_POST['theme']));
    if (!empty($theme)) {
        $nbheures = htmlspecialchars(trim($_POST['nbheures']));
        if (!empty($nbheures)) {
           $enseignant = htmlspecialchars(trim($_POST['NomEnseignant']));
            if (!empty($enseignant)) {
                if (!empty($etudiants)) {
                    $salle = htmlspecialchars(trim($_POST['numeroSalle']));
                    if (!empty($salle)) {
                    
            //creation d'un nouvel objet cours avec comme 
            //arguments les saisies formulaires 
            //fait appel à la methode ajoutCours
            $cours =  ClassCours($theme, $_POST['nbheures'], $_POST['NomEnseignant'], $_POST['listetudiants'],$_POST['numeroSalle'] );
		
          //  $cours = new classCours($theme, $nbheures, $enseignant, $etudiants, $salle);
            $cours->ajoutCours();
                    }
                }
            }
        }
    }
}


//******fin enregistrement fichiers cours*********///

////var_dump($nbheures);
//var_dump($theme);
//var_dump($enseignant);
//var_dump($etudiants);
//var_dump($salle);
//var_dump($cours);
//var_dump($_POST);
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Ajout d'un cours</h1>
        <form method="post" name="ajoutCours" action="ajoutcours.php">
            Nom du cours
            <input  type="text" name="theme" ><br /> <br />
            Nombre d'heures du cours
            <input type="text" name="nbheures" >
            <!--******************************************-->
            <!--//Boucle pour creer le menu deroulant des salles-->
            Numero salle de cours
            <select  name="numeroSalle">
                <?php
                $k = 0;
                foreach ($menuSalle as $objet) {
                    echo '<option value="' . $objet->NumeroSalle() . '">' . $objet->NumeroSalle() . '</option>';
                    $k++;
                }
                ?>
            </select>
             <!--******************************************-->
            <br />  <br />
            Enseignant:<br />
            <select name='NomEnseignant' size='4' >
                <!--//Boucle pour creer le menu deroulant des enseignants-->
                <?php
                //////////////////////ancienne version sans passer par les objets
                //                foreach ($menuEnseignant as $nom) {
//                //                    //$choixEnseignant.="<option value=\"".$nom."\">".$nom."</option>";
//                //                    $choixEnseignant[$i].="<option value=\"\">$nom</option>";
//                //               
//                //                  //   echo $menuEnseignant[$i];
//                //                   $i++;
//                //                }
//                //                     echo $choixEnseignant[$i];
                                          // echo $menuEnseignant;
//                                          
                                          
                                          
                //////////////nouvelle version objet///////////

                $in = 0;
                foreach ($menuEnseignant as $objet) {
                    echo '<option value="' . $objet->Nom() . '">' . $objet->Nom() . '</option>';
                    $in++;
                }
               
                ?>
           
            </select>
            <!--******************************************-->
            
           <!--//Boucle pour creer le menu deroulant des étudiants-->
            <br /><br />
            Etudiants(selection multiple 'CRTL+selection'):<br />
            <select name='listetudiants[]' size='10' multiple>
                <?php
                $jn = 0;
                foreach ($menuEtudiant as $objet) {
                    echo '<option value="' . $objet->Nom() . '">' . $objet->Nom() . '</option>';
                    $jn++;
                }
                ?>
            </select>
             <!--******************************************-->
            <br />  <br />
            <br /> <br />
            <input type="submit" name="ajouter" value="Ajouter le cours à la liste" >


        </form>

        <a href ="ajoutepersonne.php"><input type="button" value="Ajouter une personne"></a>
        <a href ="ajoutsalle.php"><input type="button" value="Ajouter une salle"></a>
        <a href ="modifCours.php"><input type="button" value="Modifier un cours"></a>     

    </body>
</html>
