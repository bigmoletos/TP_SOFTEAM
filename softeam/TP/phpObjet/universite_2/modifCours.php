<?php
//ce fichier sert à modifier un cours en choisissant sont theme 
//on modifie les autres parameteres
//autoload des classes
include 'chargeurClass.php';
include 'interfaceUniversite.php';
//liste des variables du formulaire et initialisation
//$theme = "";
//$nbheures = "";
//$modifCours = "";
//$message = "";
//$listetudiant = "";
//$numeroSalle = "";
//$NomEnseignant = "";
//$modifier = "";
//*********************************************///
//boucle pour creer la liste des themes

$menutheme = array();
$listtheme = glob('fichiers/cours/*.txt');
//var_dump($listtheme);

foreach ($listtheme as $nom) {
    //on ne retire le nom du rep et de l'extension des fichiers pour n'avoir que le nom
    $theme = substr($nom, strlen('fichiers/cours/'), -strlen('.txt'));
    
//appel à la methode statique modifCours de la classe ClassCours
//la methode modifCours va afficher la liste des cours
    //on lui l'assigne ensuite à l'objet $obj
    $obj= ClassCours::afficheCours($theme);
    //preparation du tableau $menutheme
    var_dump($obj);
    
}
//*********************************************///


//Boucle pour creer le menu deroulant des enseignants
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
//*********************************************///
//enregistrement des données du formulaire

if (isset($_POST['modifier'])) {
    $theme = htmlspecialchars(trim($_POST['theme']));
    if (!empty($theme)) {
        $nbheures = htmlspecialchars(trim($_POST['nbheures']));
       // if (!empty($nbheures)) {
        //   $enseignant = htmlspecialchars(trim($_POST['NomEnseignant']));
         //   if (!empty($enseignant)) {


//if (!empty($etudiants)) {
                    $salle = htmlspecialchars(trim($_POST['numeroSalle']));
                    if (!empty($salle)) {
                    
            //creation d'un nouvel objet cours avec comme 
            //arguments les saisies formulaires 
            //fait appel à la methode ajoutCours
            $cours = new ClassCours($theme, $_POST['nbheures'], $_POST['NomEnseignant'], $_POST['listetudiants'],$_POST['numeroSalle'] );
		
          //  $cours = new classCours($theme, $nbheures, $enseignant, $etudiants, $salle);
            $cours->ajoutCours();
                    }
              //  }
           // }
       // }
    }
}

//var_dump($nbheures);
//var_dump($theme);
//var_dump($enseignant);
//var_dump($etudiants);
//var_dump($salle);
//var_dump($cours);
var_dump($_POST);
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Modifer un cours</h1>
        <form method="post" name="modifCours" action="modifCours.php">
            
            <!--******************************************-->
Nom du cours<br />
            <select name='theme' size='4' >
                            <!--//Boucle pour creer le menu deroulant des themes-->
                <?php
//                *****ancienne version************
//                $in = 0;
//                foreach ($menutheme  as $objet) {
//                    echo '<option value="' . $objet->theme() . '">' . $objet->theme() . '</option>';
//                    $in++;
//                }
//               **********avec la version serialize($nom)*******
               
                
                foreach ($obj as $key => $value) {
                    echo $key." => ".$value;
                    
     echo '<option value="' . $objet->$value() . '">' . $objet->$value() . '</option>';
//                   
                }
                
                
                
                
                ?>
           
            </select>
            
            
            <!--<input  type="text" name="theme" ><br /> <br />-->
            <!--****************-->
            
            Nombre d'heures du cours
            <input type="text" name="nbheures" >
            
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
            <input type="submit" name="modifier" value="modifier le cours " >


        </form>

        <a href ="ajoutepersonne.php"><input type="button" value="Ajouter une personne"></a>
        <a href ="ajoutsalle.php"><input type="button" value="Ajouter une salle"></a>
        <a href ="ajouterCours.php"><input type="button" value="ajouter un cours"></a>     

    </body>
</html>


