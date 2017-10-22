<!DOCTYPE html>
<html>
	<head>
		<title>Base de données PDO MyAdmin MySQL suite</title>
		
		<meta charset="utf-8"/>
	</head>	
	<body>
		
<p><br><strong>Modifs d'une base de donnée existante </strong><br><br></p>		
		
<?php
		$serveur="localhost";
		$login="root";
		$pass="";
		$bdd="mabddtest2";//nom dela base de données
		$table="visiteurs";//nom de la table
		
		
		try{
			$connexion=new PDO("mysql:host=$serveur;dbname=$bdd",$login,$pass);
			$connexion->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			// $modif="UPDATE Visiteurs SET age=50 WHERE id=1";		
			//update va mettre à jour la base visiteurs en remplacant/ou remplacant  l'age avec 
			// SET à 50 ans, WHERE permet de choisir uniquement l'ID n°1, donc uniquement la 
			// premiere ligne
			
			// $modif="UPDATE Visiteurs SET sexe='F' WHERE prenom='muriel'";
			//update va mettre à jour la base visiteurs en remplacant/ou remplacant  l'age avec 
			// SET à 50 ans, WHERE permet de choisir toutes les lignes où franck apparait en prenom
			// premiere ligne
			
			// $modif="UPDATE Visiteurs 
			// SET age=51  if age>3 AND age<80 WHERE prenom='franck'
			// SET  age=20 if age>3 AND age<80 WHERE prenom='bertrand'
			// SET  age=20 if age>3 AND age<80 WHERE age IS NOT NULL'
			
			// ";
///////////////////////////////			
	echo'<strong>modifications multiple dans la table </strong>';		
///////////////////////////////			
			
		$modif=	"UPDATE Visiteurs
				SET    age= CASE
				 WHEN age > 0 AND age < 50 THEN 25
				 WHEN age  IS  NULL THEN 36
				 ELSE age
				END
				WHERE  age IS  NULL
				";
				//la formue multiple avec case fonctionne
					$requete=$connexion->prepare($modif);
					$requete->execute();
					
					
				$modif=	"UPDATE Visiteurs
				SET   sexe= CASE
				 WHEN prenom='franck' OR prenom='sebastian' OR prenom='bertrand' THEN 'H'
				  WHEN prenom='muriel' OR prenom='lucille' THEN 'F'
				 ELSE sexe
				END
				WHERE  sexe IS  NULL
				";
				//la formue multiple avec case fonctionne	
					$requete=$connexion->prepare($modif);
					$requete->execute();
					
					
				$modif=	"UPDATE Visiteurs
				SET   cp= CASE
				 WHEN prenom='franck' OR prenom='sebastian' OR prenom='muriel' OR prenom='lucille' THEN 13008
				  WHEN  prenom='bertrand' THEN 34120
				 ELSE sexe
				END
				WHERE  cp IS  NULL
				";
				//la formue multiple avec case fonctionne	
					$requete=$connexion->prepare($modif);
					$requete->execute();
				
			// update va mettre à jour la base visiteurs en remplacant/ou remplacant  l'age avec 
			// SET à 50 ans, WHERE permet de choisir toutes les lignes où franck apparait en prenom
			// premiere ligne
			
			
		
			
			
			$requete=$connexion->prepare($modif);
			//l'utilisation de la variable $modif permet une lecture plus claire
///////////////////////////////			
	echo'<strong>suppression d\'une ligne </strong>';		
///////////////////////////////

			
			$suppr="DELETE FROM $table WHERE id=3";
			// delete FROM va effacer des données de maniére définitive
			
			$requete=$connexion->prepare($suppr);
			//l'utilisation de la variable $modif permet une lecture plus claire
			$requete->execute();
			
	///////////////////////////////			
	echo'<strong>suppression d\'une colonne </strong>';		
///////////////////////////////		

			// $suppr="ALTER TABLE Visiteurs DROOP CP";
			// delete FROM va effacer des données de maniére définitive
			//poour supprimer la colonne CP
			
///////////////////////////////			
	echo'<strong>suppression d\'une table entiere </strong>';		
///////////////////////////////		
	
			// $suppr="ALTER TABLE tableTest2 DROOP tableTest2";
			// pour supprimer lla table complete
			// $requete=$connexion->prepare($suppr);
			// l'utilisation de la variable $modif permet une lecture plus claire
			// $requete->execute();
			
			echo'Information de la BDD mis a jour';
		}

		catch(PDOException $e){
		echo'Echec de la base de donnée '.$e->$getMessage();
	
		}

		
		
		?>
		
		
		
		
		
		
		</body>
		</html>
		