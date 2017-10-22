<?php
//cette interface va gerer divers methodes communes à 
//toute l'universite comme l'enregistrement des données
include 'chargeurClass.php';


interface Universite{
    public function enregistrer($fichier);
}


            //code à integrer dans le fichier.php 
            //ajoutepersonne ajoutsalle ajoutcours
            class Enseignant implements Universite
    {
            //attributs

            //methodes


    

        public function enregistrer($fichier)
        {

        }

    }
    //            //on pourrait aussi ecrire
    //            //code à integrer dans le fichier php ajoutenseignant
    //            class classsalle extends classCours implements Universite{
    //            //attributs
    //
    //            //methodes
    //
    //
    //                public function enregistrer($fichier){
    //
    //            }
    //




?>



