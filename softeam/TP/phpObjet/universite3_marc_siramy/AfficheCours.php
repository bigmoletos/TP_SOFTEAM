<?php
// si la session n'est pas déjà initialisée (auto-start), on l'initialise
if (!isset($_SESSION)) {
	session_start();
}
spl_autoload_register(function ($class) {
		include $class.'.php';
	});

/**
 * si on clique sur le bouton "Ajouter Cours" ou "Modifier Cours", cette information est passée à la session
 * puis on redirige vers la page correspondante (AjouterCours.php ou MAJCours.php) et on stoppe l'execution du code php
 * sur la page courante
 */
if (isset($_POST['ajouter_cours'])) {
	$_SESSION["ajouter_cours"] = $_POST["ajouter_cours"];
	header('Location: AjouterCours.php');
	exit;
} else if (isset($_POST['modifier_cours'])) {
	$_SESSION["choix_modification"] = $_POST["choix_modification"];
	header('Location: MAJCours.php');
	exit;
}

// sinon afficher cours
$tabCours = Cours::lireTousCours();
include 'entete.php';
?>
<h1>Liste des cours dispensés</h1>
<form action="" method="post" accept-charset="utf-8">
	<table class="table table-sm table-bordered table-condensed table-responsive">
		<thead>
			<tr>
				<th> - </th>
				<th>Titre</th>
				<th>Nombre d'heures</th>
				<th>Enseignant</th>
				<th>Salle</th>
			</tr>
		</thead>
		<tbody>
<?php
foreach ($tabCours as $unCours) {?>
					<tr>
						<td><input type="radio" name="choix_modification" value="modifier_<?php echo $unCours->titre()?>" />
						</td>
						<td><?php echo $unCours->titre();?></td>
						<td><?php echo $unCours->nbreHeures();?></td>
						<td><?php echo $unCours->enseignant()->prenom()." ".$unCours->enseignant()->nom();?></td>
	<?php if ($unCours->salle() != null) {?>
									<td><?php echo $unCours->salle->nom();?></td>
		<?php
	} else {
		echo '<td></td>';
	}?>
	</tr>
	<?php }?>
		</tbody>
	</table>
	<!-- <input type="hidden" name="cours_courant" value=<?php urlencode(serialize($unCours));?>/> -->
<?php
if ($authentifie) {?>
	<button type="submit" name="ajouter_cours" class="btn btn-primary">Ajouter un cours</button>
					<button type="submit" name="modifier_cours" class="btn btn-secondary">Modifier le cours</button>
	<?php
}
?>
</form>
<?php include 'pieddepage.php';?>