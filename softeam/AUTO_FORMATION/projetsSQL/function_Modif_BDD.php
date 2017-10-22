<!DOCTYPE html>
<html>
	<head>
		<title>Modification de données Base de données PDO MyAdmin MySQL suite</title>
		
		<meta charset="utf-8"/>
	</head>	
	<body>
		
<p><br><strong>Modification de données dans une base de donnée existante </strong><br><br></p>		
		
<?php
		$serveur="localhost";
		$login="root";
		$pass="";
		
		$bdd="mabddtest2";//nom dela base de données
		$table="visiteurs";//"commentaires";//"inscrits";//test4";//nom de la table
// nom des colonnes		
		$col1="id";//"nb";
		$col2="nom";//"id_inscrit";
		$col3="prenom";
		$col4="email";//"mail";
		$col5="sexe";//"commentaires";
		$col6="age";//"id_inscrit";//"commentaires";//"id_inscrit";//"tel portable";"numero client";
		$col7="CP";//"rue";
		$col8="dons";//"ville";
		$col9="pays";
		$col10="CP";
		$col11="";
		
	 function _modif_BDD(){
	global $serveur,$login,$pass,$bdd,$table,$col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10;	
		
		try{
			$connexion=new PDO("mysql:host=$serveur;dbname=$bdd;charset=utf8",$login,$pass);
			$connexion->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			

	
////////////////
echo'<br/><strong>modifs1</strong><br/>';
/////////////////
//update va mettre à jour la base $table en remplacant/ou remplacant  l'$col6 avec 	
// SET à 50 ans, WHERE permet de choisir uniquement l'ID n°1, donc uniquement la 
// premiere ligne	
// $modif="UPDATE $table SET $col6=50 WHERE $table.$col1='1'";	
			
				// $modif="UPDATE $table SET $col8='3.56' WHERE $table.$col1='2'";								
					
////fonctionne bien avec	le SET CASE WHEN THEN ELSE END WHERE				
// $col8="dons"
// $col3="prenom"

				// $modif="UPDATE $table
					// SET $col8=CASE
					// WHEN $col3='pigeon' THEN 0.02
					// WHEN $col3='muriel' THEN 145.53
					// WHEN $col3='sebastian' THEN 3.65
					// WHEN $col3='henry' THEN 5.5800
					// WHEN $col3='sylvie' THEN 745.63
					// WHEN $col3='francois' THEN 1451.57
					// WHEN $col3='lucille' THEN 201.002
					// WHEN $col3='franck' THEN 14540.10
					// WHEN $col3='bertrand' THEN 40.02
					// WHEN $col3='gaston' THEN 687.002
					// ELSE $col8=5555555
					// END 
					// WHERE $col8 IS  NOT NULL
					// ";
			
		
			// $requete=$connexion->prepare($modif);
			// $requete->execute();
			
			$modif="UPDATE $table
					SET $col6=CASE
					WHEN $col3='pigeon' THEN 2
					WHEN $col3='muriel' THEN 49
					WHEN $col3='sebastian' THEN 13
					WHEN $col3='henry' THEN 38
					WHEN $col3='sylvie' THEN 27
					WHEN $col3='francois' THEN 76
					WHEN $col3='lucille' THEN 17
					WHEN $col3='franck' THEN 51
					WHEN $col3='bertrand' THEN 38
					WHEN $col3='gaston' THEN 44
					ELSE $col8=5555555
					END 
					WHERE $col8 IS  NOT NULL
					";
			
		
			$requete=$connexion->prepare($modif);
			$requete->execute();
////////////
			
			
			
////////////
echo'<br/><strong>modifs2</strong><br/>';
/////////////////		
		
			// $modif="UPDATE $table SET $col5='F' WHERE $col2='muriel'";
			// $requete=$connexion->prepare($modif);
			// $requete->execute();
////////////////
echo'<br/><strong>modifs3</strong><br/>';
/////////////////				
			
			// $modif="UPDATE $table 
			// SET $col6=51  if $col6>3 AND $col6<80 WHERE $col2='franck'
			// SET  $col6=20 if $col6>3 AND $col6<80 WHERE $col2='bertrand'
			// SET  $col6=20 if $col6>3 AND $col6<80 WHERE $col6 IS NOT NULL'
			
			// ";
			// $requete=$connexion->prepare($modif);
			// $requete->execute();
			
////////////////
echo'<br/><strong>modifs31</strong><br/>';
/////////////////				
			
					// $modif="UPDATE $table
					// SET $col6=CASE
					// WHEN $col3='muriel' THEN $col6=1
					// WHEN $col3='sebastian' THEN $col6=3
					// WHEN $col3='henry' THEN $col6=5
					// WHEN $col3='sylvie' THEN $col6=7
					// WHEN $col3='francois' THEN $col6=11
					// WHEN $col3='lucille' THEN $col6=14
					// ELSE $col6
					// END
					// WHERE $col3 IS NOT NULL
					// ";
				
					// $requete=$connexion->prepare($modif);
					// $requete->execute();
					
//////////////////////////////			
				
//////////////
echo'<br/><strong>modifs4</strong><br/>';
/////////////////		
///////////////////////////////			
	echo'<strong>ajout plusieurs colonnes </strong>';		
///////////////////////////////		
// 
		
			
		// $modif="ALTER TABLE Visiteurs ADD (
		// $col1 TEXT(1000),
		// $col2 DATE,
		// $col3 INT(10)
		// ) ";
			// $requete=$connexion->prepare($modif);
			// $requete->execute();
///////////////////////////////			
	echo'<strong>ajout d\'une colonne </strong>';		
///////////////////////////////		
// 	
		//on insere dans la table Visiteurs la colonne sexe de type VARCHAR,(texte court) et de longeur 10
		//ici on utilise des marqeurs à la place des variables, pour cela il suffit de mettre:devant le nom de la donnée
		
			// $modif="ALTER TABLE $table ADD id_inscrit int(11) ";
			// $requete=$connexion->prepare($modif);
			// $requete->execute();
			
////////////////
echo'<br/><strong>modifs5</strong><br/>';
/////////////////	

			// $modif="ALTER TABLE $table ADD cp INT(100) NULL";
			// $requete=$connexion->prepare($modif);
			// $requete->execute();
		
///////////////////////////////			
echo'<br/><strong>modifications multiples dans la table </strong><br/>';		
///////////////////////////////			
// la formue multiple avec case fonctionne			
		// update va mettre à jour la base $table en remplacant/ou remplacant  l'age avec 
			// SET à 50 ans, WHERE permet de choisir toutes les lignes où franck apparait en $col2
			// premiere ligne		

			
			// $modif=	"UPDATE $table
						// SET    $col6= CASE
						// WHEN $col6 > 0 AND $col6 < 50 THEN 25
						// WHEN $col6  IS  NULL THEN 36
						// ELSE $col6
						// END
						// WHERE  $col6 IS  NULL
						// ";
				
					// $requete=$connexion->prepare($modif);
					// $requete->execute();
					
					
				// $modif=	"UPDATE $table
						// SET   sexe= CASE
						// WHEN $col2='franck' OR $col2='sebastian' OR $col2='bertrand' THEN 'H'
						// WHEN $col2='muriel' OR $col2='lucille' THEN 'F'
						// ELSE sexe
						// END
						// WHERE  sexe IS  NULL
						// ";
			
					// $requete=$connexion->prepare($modif);
					// $requete->execute();
					
					
				// $modif=	"UPDATE $table
						// SET   cp= CASE
						// WHEN $col2='franck' OR $col2='sebastian' OR $col2='muriel' OR $col2='lucille' THEN 13008
						// WHEN  $col2='bertrand' THEN 34120
						// ELSE sexe
						// END
						// WHERE  $col7 IS  NULL
						// ";
				
					// $requete=$connexion->prepare($modif);
					// $requete->execute();
				
//////////////////////////////////			
					
			echo'<br/>Information de la BDD mis a jour<br/>';
		}

		catch(PDOException $e){
		echo'<br/>Echec de la base de donnée '.$e->$getMessage();
	
		}

	}
		
		
	_modif_BDD();
	
		?>
		
		
		
		
		
		
		</body>
		</html>
		