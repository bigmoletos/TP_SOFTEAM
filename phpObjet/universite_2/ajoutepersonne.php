<?php
//on inclus le fichier de chargement automatique (chargeurClass.php)
// de toutes les classes du repertoire classe !!!les noms des classes doivent etre 
//identiques au nom du fichier de classe
include "chargeurClass.php";
include 'interfaceUniversite.php';
///code ahref:
//include 'classes/classEtudiant.php';

 
//on initialise les variables du formulaire
  $nom="";
  $age="";
  $diplome="";
  $salaire="";
  $choix="";
//pour eviter un erreur sur la superglobale $_POST on attend d'avoir cliqué 
//' sur le bouton enregistrer avant de faire le traitement car au debut il  n'y a pas de valeur

if(isset($_POST['enregistrer']))
    {
        ////on convertit les caractéres HTML, éventuellement saisies
        // dans le formulaire, en texte pour empecher les injections sql
        // trim pour enlever les espaces avant et apres la saisie
        $nom=htmlspecialchars(trim($_POST['nom']));
        if(!empty($nom))
        {
            $age =htmlspecialchars( trim($_POST['age']));
         if(!empty($age))
                {
            $diplome =htmlspecialchars( trim($_POST['diplome']));
                 //verifie le choix entre etudiant et enseignant
                 $choix=$_POST['choix'];
                 if($choix=='etudiant'){
                    //creation d'un nouvel objet etudiant avec comme 
                    //arguments les saisies formulaires
                    //fait appel à la methode ajoutEtudiant
                    // de la classe classEtudiant classe fille de classPersonne
                     $etudiant=new classEtudiant($nom,$age,$diplome);
                     $etudiant->ajoutEtudiant();
                    
//                $chaine =  parent::nom() . ";" . parent::age() . ";" .$this->_diplome . ";" ;
              }
                 //verifie le choix entre etudiant et enseignant  sur le bouton selection
                  if($choix=='enseignant')
                    {
                        $salaire=  htmlspecialchars(trim($_POST['salaire']));
                        if(!empty($salaire))
                         {

                            //creation d'un nouvel objet enseignant avec comme arguments les saisies formulaires
                           //   $enseignant = new Enseignant($_POST['nom'], $_POST['age'], $_POST['salaire']);
                           $enseignant=new classEnseignant($nom,$age,$salaire);
                           $enseignant->ajoutEnseignant();

                        } 
                }
        }
    }
}
  //test sur les variables   
//    echo $nom; 
//     echo $age; 
//     echo $choix;
//     echo $diplome; 
//     echo $salaire;
//    
//    var_dump($_POST);
 ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulaire_ajout_pesonne</title>
    </head>
    <body>
        <h1>formulaire pour ajouter une personne</h1>
       
        <br />
        <form  name="ajouteEtudiant" action="ajoutepersonne.php" method="POST">
            nom<input type="text" name="nom"><br /><br />
            age<input type="text" name="age"><br /><br />
          
            <!--saisie choix entre etudiant et enseignant-->
            choisir entre enseignant et etudiant
            <select name="choix">
            <option value="etudiant">Etudiant</option> 
            <option value="enseignant">Enseignant</option>  				
            </select>
            
            <!--<input type="text" name="dipsal">-->
            
            
            <!--<input type="submit" value="Enregistrer">-->
            <h2>Ajouter un étudiant</h2>  
            indiquez le Diplome pour les etudiants (uniquement pour les etudiants):
              <br />
            diplome <input type="text" name="diplome"><br /><br />
            
         <!--</form>-->

            <h2>Ajouter un enseignant</h2>
            <br />
            indiquez le salaire pour les enseignants (uniquement pour les enseignants):
        <!--<form  name="ajouteEnseignant" action="ajoutepersonne.php" method="POST">-->
            <br />
            salaire <input type="text" name="salaire"><br /><br />
            <input type="submit" name="enregistrer" value="valider l'ajout">

         </form>
        <?php
        //controle saisie formulaire à revoir 
//echo $change = empty($select) ? "<input type=submit name=\"change\" value=\"Modifiez entrée\">" : "";
//echo $enregistrer = empty($select) ? "" : $select;
//echo $choix = empty($select) ? "" : "<select name=\"attribut\"><option value=\"prenom\">Prénom</option><option value=\"age\">Âge</option></select>";
//echo $diplome = empty($select) ? "" : "<input type=\"text\" name=\"saisie\" required><br />";
//echo $changeModif = empty($select) ? "" : "<input type=submit name=\"modifier\" value=\"MODIFIER ENTREE\">";
?>
        
        <!--liens versle autres pages-->
        <a href ="ajoutcours.php"><input type="button" value="Ajouter un cours"></a>
	<a href ="ajoutsalle.php"><input type="button" value="Ajouter une salle"></a>
        <a href ="modifCours.php"><input type="button" value="Modifier un cours"></a>     
   
    </body>
</html>
