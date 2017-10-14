<?php

function __autoload($class)
{
    require_once($class . '.php');
}

session_start();

//***********************************************************//

include('hydratation.php');

//***********************************************************//

$racine="fiches/cours/";

?>

<html>
	<head>
	</head>
	<body>
		<form method="post" action="gestion.php">
			Nom : 
			<input type="text" name="nom">
			Age : 
			<input type="text" name="age">
			<select name="fonction">
  				<option value="0">Etudiant</option> 
  				<option value="1">Enseignant</option>  				
			</select>
			Diplome ou Salaire :
			<input type="text" name="dipsal">
			<input type="submit" value="Enregistrer">
		</form>

		<form method="post" action="ajoutcours.php">
			titre du cours : 
			<input type="text" name="titre">
			Durée : 
			<input type="text" name="duree">
			<select id="select" name="enseignant">
		 	<?php $i=0;
		 		foreach($tabenseignant as $objet)
				{
					echo '<option value="'.$objet->Nom().$i.'">'.$objet->Nom().'</option>';
					$i++;
				};
			?>
			</select>
			<select id="select" name="etudiant[]" multiple>
			<?php $j=0;
		 		foreach($tabetudiant as $objet)
				{
					echo '<option value="'.$j.'">'.$objet->Nom().'</option>';
					$j++;
				};
			?>
			</select>
			Choix de la salle :
			<select id="select" name="salle">
				<?php 
				$j=0;
			 		foreach($tabsalle as $objet)
					{
						if ($objet->Etat()=="true")
							echo '<option value="'.$objet->Nom().$j.'">'.$objet->Nom().' il y a '.$objet->Place().' places'.'</option>';
						$j++;	
					};
				?>
			</select>
			<input type="submit" value="Enregistrement du cours">
		</form>

		<form method="post" action="modification.php">
			<select id="select" name="modification">
		 	<?php $i=0;	
				foreach($tabcours as $objet)
				{
					echo '<option value="'.$objet->Titre().$i.'">'.$objet->Titre().'</option>';
					$i++;
				}
			?>
			</select>
			<input type="submit" value="Modifier un cours">
		</form>

		<form method="post" action="salle.php">
			<select id="select" name="sallelibre">
		 	<?php $i=0;	
				foreach($tabsalle as $objet)
				{
					if ($objet->Etat()=="false")
						echo '<option value="'.$objet->Nom().$i.'">'.$objet->Nom().'</option>';
					$i++;
				}
			?>
			</select>
			<input type="submit" value="Liberer une salle">
		</form>
	</body>
</html>