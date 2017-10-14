<?php
// si la session n'est pas déjà initialisée (auto-start), on l'initialise
if (!isset($_SESSION)) {
	session_start();
}
spl_autoload_register(function ($class) {
		include $class.'.php';
	});

/**
 * Si l'utilisateur a demandé l'affichage de cette page (ajout de cours), charger les listes d'enseignants et d'etudiants
 * à affecter au cours à créer, puis afficher le formulaire de création de cours.
 */
//if (isset($_SESSION["ajouter_cours"])) {
$tabEtudiants   = Etudiant::lireTousEtudiants();
$tabEnseignants = Enseignant::lireTousEnseignants();
unset($_SESSION["ajouter_cours"]);
//}

/**
 * Lorsque l'utilisateur a complété le formulaire de création de cours et a cliquer sur le bouton "Créer le cours",
 * enregistrer le cours et afficher la liste des cours (via AfficheCours.php)
 */
if (isset($_POST["valider_ajouter_cours"])) {
	var_dump($_POST);
	$cours_titre = $_POST["cours_titre"];
	$cours_nbHeures = (int)$_POST["cours_nbHeures"];
	$tabEtds = Etudiant::trouverEtudiantsAPartirTab($_POST["cours_etudiants"]);
	$enseigntNomPrenom = $_POST["cours_enseignant"];
	$enseignant = Enseignant::lireAvecNomPrenom($enseigntNomPrenom, "Enseignant");
	$cours = new Cours($cours_titre, $cours_nbHeures, $tabEtds, $enseignant);
	//echo $cours;
	$cours->sauver();
	header('Location: AfficheCours.php');
	exit;
}

include "entete.php";
?>
<h1>Cours à créer</h1>

<form class="well" action="AjouterCours.php" method="post" accept-charset="utf-8">
	<div class="form-group">
		<label class="control-label" for="cours_titre">Titre : </label>
		<input class="form-control" type="text" name="cours_titre" placeholder="Titre du cours" />
	</div>
	<div class="form-group">
		<label class="control-label" for="cours_nbHeures">Nombre d'heures : </label>
		<input class="form-control" type="text" name="cours_nbHeures" placeholder="Nombre d'haures à affecter" />
	</div>
	<div class="form-group">
		<label class="control-label" for="cours_enseignant">Enseignant : </label>
		<input class="form-control" list="cours_enseignant" type="text"
			id="choix_enseignant" name="cours_enseignant" placeholder="Double-cliquer pour sélectionner un(e) enseignant(e)" />
		<datalist id="cours_enseignant">
<?php
foreach ($tabEnseignants as $enseignant) {
	echo ('<option value="'.$enseignant->nom()." ".$enseignant->prenom().'">'
		.$enseignant->nom()." ".$enseignant->prenom().'</option>');
}
?>
</datalist>
	</div>
	<div class="form-group">
		<label class="control-label" for="cours_liste_etudiants">Etudiants : </label>
		<select class="form-control" multiple name="cours_etudiants[]" size=10 style="height: 30%;"
			placeholder="Sélectionner des étudiant(e) à affecter au cours">
<?php
foreach ($tabEtudiants as $etudiant) {
	echo ('<option value="'.$etudiant->nom()." ".$etudiant->prenom().'">'.$etudiant->nom()." ".$etudiant->prenom().'</option>');
}
?>
</select>
	</div>
	<button class="btn btn-primary" type="submit" name="valider_ajouter_cours">Créer le cours</button>
	<a href="AfficheCours.php" class="btn btn-secondary active" role="button" aria-pressed="true">Annuler</a>
</form>
<?php include 'pieddepage.php';?>
