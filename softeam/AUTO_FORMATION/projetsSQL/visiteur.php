<!DOCTYPE html>
<html>
	<head>
		<title>Classes et objets</title>
		
		<meta charset="utf-8"/>
	</head>	
	<body>
		
<p><br>classe<strong> </strong><br><br></p>		
		
<?php
		
		include_once("visiteur.class.php");
		// inclusion du fichier de classe,  include_once
		
		$visiteur1=new Visiteur;
		//on a instancié la classe avec new, on a crée de nouveaux objets à partir de la classe visiteur
		// ils ont donc les memes proprietés et methodes qui proviennent de leur classe visiteur
	
		$visiteur2=new Visiteur;
		//on cree des objets differents en leur mettant une valeur differente
		$visiteur1->set_prenom('franck');
		
		$visiteur2->set_prenom('sebastian');
		$visiteur1->set_nom('DESMEDT');
		
		
		echo 'Ton nom? '.$visiteur1->nom.'</br>';
		echo 'Ton prenom? '.$visiteur1->prenom.'</br>';
		echo 'bonjour ton nom est: '.$visiteur1->get_nom().' et ton prenom est : '.$visiteur1->get_nom().'</br>';
		
		echo 'bonjour '.$visiteur1->get_prenom().'</br>';
		//get permet d'aller rechercher l'objet
		echo 'bonjour '.$visiteur2->get_prenom().'</br>';
		
	echo "l'heritage et l'encaspulation des classes";
		// on peut creer des classes filles à  partir d'une classe mere
		//les classes filles permettent d'etendre les proprietés d'une classe mere
		//voir le fichier femme.class.php
		
?>
	
	</body>	
	</html>	
	