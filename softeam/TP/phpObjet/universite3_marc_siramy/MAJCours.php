<?php
if (!isset($_SESSION)) {
	session_start();
}
spl_autoload_register(function ($class) {
		include $class.'.php';
	});

$action_demandee = 'choix_modification';
if (isset($_SESSION[$action_demandee])) {
	$matiere_post    = explode("_", $_SESSION[$action_demandee]);
	$matiere_prefixe = $matiere_post[0];
	$matiere_nom     = $matiere_post[1];
	$fichier_nom     = $matiere_nom;
	$coursAModifier  = Cours::lire($fichier_nom, "Cours");
	$tabEtudiants    = Etudiant::lireTousEtudiants();
	$tabEnseignants  = Enseignant::lireTousEnseignants();
	unset($_SESSION[$action_demandee]);
} else if (isset($_POST["modifier_cours"])) {
	$cours_titre       = $_POST["cours_titre"];
	$cours_nbHeures    = (float) $_POST["cours_nbHeures"];
	$tabEtds           = Etudiant::trouverEtudiantsAPartirTab($_POST["cours_etudiants"]);
	$enseigntNomPrenom = $_POST["choix_enseignant"];
	$enseignant        = Enseignant::lireAvecNomPrenom($enseigntNomPrenom, "Enseignant");
	$cours             = new Cours($cours_titre, $cours_nbHeures, $tabEtds, $enseignant);
	$cours->sauver();
	header('Location: AfficheCours.php');
	exit;
}

include 'entete.php';
?>
<h1>Cours de <?php echo $coursAModifier->titre();?> à modifier</h1>

<form class="well" action="MAJCours.php" method="post" accept-charset="utf-8">
	<div class="form-group">
		<label class="control-label" for="cours_titre">Titre : </label>
		<input class="form-control" type="text" name="cours_titre" readonly="true" value="<?php echo $coursAModifier->titre()?>" />
	</div>
	<div class="form-group">
		<label class="control-label" for="cours_nbHeures">Nombre d'heures : </label>
		<input class="form-control" type="text" name="cours_nbHeures" value="<?php echo $coursAModifier->nbreHeures()?>" />
	</div>
	<div class="form-group">
		<label class="control-label" for="cours_enseignant">Enseignant : </label>
		<input class="form-control" list="cours_enseignant" type="text" id="choix_enseignant" name="choix_enseignant"
				value="<?php echo $coursAModifier->enseignant()->nom()." ".$coursAModifier->enseignant()->prenom()?>" />
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
		<select class="form-control" multiple name="cours_etudiants[]" size=10 style='height: 30%;'>
<?php
// pour chaque étudiant existant dans le fichier d'étudiants
// on recherche si il y en a déjà certains inscrits dans le cours, pour les préselectionner
foreach ($tabEtudiants as $etudiant) {
	if (Etudiant::chercherEtudiantParNomPrenomInArrayEtudiants($etudiant, $coursAModifier->listeEtudiants()) == 1) {
		echo ('<option selected value="'.$etudiant->nom()." ".$etudiant->prenom().'">'
			.$etudiant->nom()." ".$etudiant->prenom().'</option>');
	} else {
		echo ('<option value="'.$etudiant->nom()." ".$etudiant->prenom().'">'.$etudiant->nom()." ".$etudiant->prenom().'</option>');
	}
}
?>
</select>
	</div>
	<button class="btn btn-primary" type="submit" name="modifier_cours" value="modifier_cours">Mettre à jour</button>
	<a href="AfficheCours.php" class="btn btn-secondary active" role="button" aria-pressed="true">Annuler</a>
</form>
<?php include 'pieddepage.php';?>
