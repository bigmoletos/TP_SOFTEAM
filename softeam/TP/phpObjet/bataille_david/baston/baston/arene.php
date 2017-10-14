<?php

// Auto loader
function chargerClasse($classname) {
    require $classname . '.php';
}

spl_autoload_register('chargerClasse');

// On utilise les sessions pour pouvoir stocker le personnage d'une page à l'autre
session_start();

// Gestion de la déconnexion
if (isset($_GET['deconnexion'])) {
    session_destroy();
    header('Location: arene.php');
    exit();
}

// Si la session perso existe en session, on restaure l'objet.
if (isset($_SESSION['perso'])) {
    $perso = $_SESSION['perso'];
}

// Appel au manager
$manager = new PersonnageManager();
$message = "";

// Fonction qui affiche le formulaire
function affiche_form() {
    return '<form action="" method="post">
        <p>
        Nom : <input type="text" name="nom" maxlength="50" />
        Type : <select name="type">
        <option value="guerrier">Guerrier</option>
        <option value="magicien">Magicien</option>
        <option value="pretre">Prêtre</option>
        <option value="voleur">Voleur</option>
        </select>
        <input type="submit" value="Valider" name="ok" />
        </p>
        </form>';
}

// Fonction qui affiche les infos de mon perso
function affiche_interface($perso) {
    return "<fieldset><legend>Mes informations</legend><p>
            Nom : " . $perso->__getNom() . "<br />
            PV : " . $perso->__getPv() . "
            Type : " . $perso->__getType() . "
            Pouvoir : " . $perso->__getPouvoir() . "
            <p><a href=\"?deconnexion=1\">Déconnexion</a></p>
          </p></fieldset>";
}

// Fonction qui liste les adversaires
function affiche_liste($manager, $perso) {
    //On récupère la liste des personnages avec le manager
    $persos = $manager->listing($perso->__getNom());
    // Si elle est vide on affiche un message d'erreur
    if (empty($persos)) {
        $liste = 'Personne à frapper !';
    }
    // Sinon on crée une chaine de caractère liste :
    else {
        $liste = '';
        
        // Pour chaque personnage de la liste
        // On doit concaténer dans la chaine de caractère un lien possédant
        // Un attribut href égal à ?frapper=nom_du_personnage_a_frapper
        // Une ancre de lien correspondant au nom du personnage à frapper
        // Afficher à coté ses points de vie restants
        foreach ($persos as $unPerso) {
            $liste .= '<a href="?frapper=' . $unPerso->__getNom() . '">' . htmlspecialchars($unPerso->__getNom()) . '</a> (PV : ' . $unPerso->__getPv() . ', Type : ' . $unPerso->__getType() . ', Pouvoir : ' . $unPerso->__getPouvoir() . ')<br />';        
        }
    }
    // On retourne la liste complète
    return "<fieldset>
        <legend>Qui frapper ?</legend>
        <p>" . $liste . "</p>
        </fieldset>";
}

// Si on a utilisé le formulaire pour choisir ou créer un personnage (aka si on a des données dans $_POST)
if (isset($_POST['nom'])) {
    $nom = $_POST['nom'];
    // On instancie ce nouveau personnage.
    // Sinon si il existe on le charge depuis le fichier et on l'instancie
    if ($manager->exists($nom)) {
        $perso = $manager->get($nom);
    }
    // Sinon on le crée
    elseif (isset($_POST['type'])) {
        $type = $_POST['type'];
        $perso = new $type($nom);
        if($perso->nomValide())
            $manager->add($perso);
        else
            $message = "nom invalide";
    }
} elseif (isset($_GET['frapper'])) {
    // Gestion des erreurs :
    // Si notre objet personnage n'existe pas, afficher un message d'erreur pour demander de choisir un personnage
    if (!isset($perso)) {
        $message = 'Merci de créer un personnage ou de vous identifier.';
    }
    // Sinon si le personnage qu'on essaie de frapper n'existe pas, afficher un message d'erreur
    elseif (!$manager->exists($_GET['frapper'])) {
        $message = 'Le personnage que vous voulez frapper n\'existe pas !';
    }
    // Sinon si on a cliqué sur un personnage pour le frapper :
    else {
        // on instancie le personnage à frapper
        $persoAFrapper = $manager->get($_GET['frapper']);
        // On stocke dans $retour les messages que renvoie la méthode frapper.
        $retour = $perso->frapper($persoAFrapper);
        // Si le personnage frappé est blessé, on affiche un message et on met à jour ses informations (pv)
        if ($retour == Personnage::BLESSE || $retour == Voleur::CRITIQUE) {
            $message = 'Le personnage a bien été frappé !';
            if($retour == Voleur::CRITIQUE)
                $message = 'Coup Critique !';
            $manager->update($perso);
            $manager->update($persoAFrapper);
        }
        // Sinon si le personnage frappé est mort, on affiche un message et on supprime le fichier correspondant
        elseif ($retour == Personnage::TUE || $retour == Voleur::CRITIQUE_TUE) {
            $message = 'Vous avez tué ce personnage !';
            if($retour == Voleur::CRITIQUE_TUE)
                $message = 'Coup Critique !';
            $manager->update($perso);
            $manager->delete($persoAFrapper);
        }
    }
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Bienvenue dans l'arène</h1>
        <h2>Choisissez ou créez un personnage</h2>
        Nombre de personnages créés : <?php echo $manager->count() ?>
        <?php
// Message d'erreur éventuel
        echo '<p>', $message, '</p>';
// Si on utilise un personnage (nouveau ou pas).
        if (isset($perso)) {
            // On affiche ses infos
            echo affiche_interface($perso);
            // On affiche la liste des autres personnages
            echo affiche_liste($manager, $perso);
        }
// Sinon on affiche le formulaire de création
        else {
            echo affiche_form();
        }
        ?>
    </body>
</html>

<?php
// A la fin, on charge l'objet personnage modifié dans la variable session.
if (isset($perso)) {
    $_SESSION['perso'] = $perso;
}