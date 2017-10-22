<!DOCTYPE html>
<html>
	<head>
		<title>Suppression de données Base de données PDO MyAdmin MySQL suite</title>
		
		<meta charset="utf-8"/>
	</head>	
	<body>
		
<p><br><strong>modification de données dans une base de donnée existante </strong><br><br></p>		
		
<?php
		$serveur="localhost";
		$login="root";
		$pass="";
		
		$bdd="mabddtest2";//nom dela base de données
		$table="test4";//nom de la table
// nom des colonnes		
		$col1="id";//"nb";
		$col2="prenom";//"id_inscrit";
		$col3="nom";
		$col4="email";//"mail";
		$col5="sexe";//"commentaires";
		$col6="age";//"tel portable";"numero client";
		$col7="CP";//"rue";
		$col8="ville";
		$col8="pays";
		$col9="CP";
		$col10="";
		
		
		
		try{
			$connexion=new PDO("mysql:host=$serveur;dbname=$bdd",$login,$pass);
			$connexion->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			

	
////////////////
echo'<strong>modifs1</strong>';
/////////////////
//update va mettre à jour la base $table en remplacant/ou remplacant  l'$col6 avec 	
// SET à 50 ans, WHERE permet de choisir uniquement l'ID n°1, donc uniquement la 
// premiere ligne	

			// $modif="UPDATE $table SET $col6=50 WHERE $col1=1";		
			
////////////////
echo'<strong>modifs2</strong>';
/////////////////		
		
			// $modif="UPDATE $table SET $col5='F' WHERE $col2='muriel'";
			
////////////////
echo'<strong>modifs3</strong>';
/////////////////				
			
			// $modif="UPDATE $table 
			// SET $col6=51  if $col6>3 AND $col6<80 WHERE $col2='franck'
			// SET  $col6=20 if $col6>3 AND $col6<80 WHERE $col2='bertrand'
			// SET  $col6=20 if $col6>3 AND $col6<80 WHERE $col6 IS NOT NULL'
			
			// ";
			
////////////////
echo'<strong>modifs4</strong>';
/////////////////		






		
///////////////////////////////			
echo'<strong>modifications multiples dans la table </strong>';		
///////////////////////////////			
// la formue multiple avec case fonctionne			
		// update va mettre à jour la base $table en remplacant/ou remplacant  l'age avec 
			// SET à 50 ans, WHERE permet de choisir toutes les lignes où franck apparait en $col2
			// premiere ligne		

			
			$modif=	"UPDATE $table
						SET    $col6= CASE
						WHEN $col6 > 0 AND $col6 < 50 THEN 25
						WHEN $col6  IS  NULL THEN 36
						ELSE $col6
						END
						WHERE  $col6 IS  NULL
						";
				
					$requete=$connexion->prepare($modif);
					$requete->execute();
					
					
				$modif=	"UPDATE $table
						SET   sexe= CASE
						WHEN $col2='franck' OR $col2='sebastian' OR $col2='bertrand' THEN 'H'
						WHEN $col2='muriel' OR $col2='lucille' THEN 'F'
						ELSE sexe
						END
						WHERE  sexe IS  NULL
						";
			
					$requete=$connexion->prepare($modif);
					$requete->execute();
					
					
				$modif=	"UPDATE $table
						SET   cp= CASE
						WHEN $col2='franck' OR $col2='sebastian' OR $col2='muriel' OR $col2='lucille' THEN 13008
						WHEN  $col2='bertrand' THEN 34120
						ELSE sexe
						END
						WHERE  $col7 IS  NULL
						";
				
					$requete=$connexion->prepare($modif);
					$requete->execute();
				
			
					
			echo'Information de la BDD mis a jour';
		}

		catch(PDOException $e){
		echo'Echec de la base de donnée '.$e->$getMessage();
	
		}

		
		
		?>
		
		
		
		
		
		
		</body>
		</html>
		