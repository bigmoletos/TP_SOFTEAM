<!DOCTYPE html>
<html>
	<head>
		<title>travail sur Base de données PDO MyAdmin MySQL suite</title>
		
		<meta charset="utf-8"/>
	</head>	
	<body>
		
<p><br><strong>Fonctions scalaires et agregat dans MySql</strong><br><br></p>		

<p>lien d'aide sur les fonctions<br><a href="https://dev.mysql.com/doc/refman/5.7/en/string-functions.html#function_elt" target="_blank">aide en ligne sur les fonctions</a></p>

			
<?php

		// fonctions d'agregart
			// vont retourner une seule valeur à partir de plusieurs colonnes
// AVG pour un calcul de moyenne
			// et fonctions scalaires
			// vont travailler sur chaque champ et donc renvoyer autant de resultats que de champs
			
	
	$serveur="localhost";
		$login="root";
		$pass="";
		
		$bdd="mabddtest2";//nom dela base de données
		$table="visiteurs";//"inscrits";//"commentaires";//nom de la table
		$table2="commentaires";
// nom des colonnes		
		$col1="id";//"nb";
		$col2="prenom";//"id_inscrit";
		$col3="nom";
		$col4="email";//"mail";
		$col5="commentaires";//"sexe";//;
		$col6="age";//"id_inscrit";//"tel portable";"numero client";
		$col7="CP";//"rue";
		$col8="dons";//"ville";
		$col9="pays";
		$col10="CP";
		$col11="";
		
		
			function _fonction_BDD(){
			
		echo'<p>lien d\'aide sur les fonctions<br><a href="https://dev.mysql.com/doc/refman/5.7/en/string-functions.html#function_elt" target="_blank">https://dev.mysql.com/doc/refman/5.7/en/string-functions.html#function_elt</a></p>';
		
		
		
			global$serveur,$login,$pass,$bdd,$table,$table2,$col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10;	
	
					try{
						$connexion=new PDO("mysql:host=$serveur;dbname=$bdd;charset=utf8",$login,$pass);
						$connexion->setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	echo'<br><strong>Fonctions d\'agregat dans MySql</strong><br>';
	
////////
// AVG moyenne
/////
						
					// $foncscal="
					// SELECT	 AVG($col6) FROM $table
					// ";	
						
						// $requete=$connexion->prepare($foncscal);
						// $requete-> execute();
						// $resultat=$requete->fetchall();
						
						
////////
// COUNT compte le nombre d'entrées totales de FROM
/////
						
					// $foncscal="
					// SELECT	 COUNT(*) FROM $table
					// ";	
						
						// $requete=$connexion->prepare($foncscal);
						// $requete-> execute();
						// $resultat=$requete->fetchall();
											
						
						
						
////////
// COUNT(DISTINCT) dans ce cas la fonction COUNT ne comptera plus qu'un seule fois une meme valeur
/////
						
					// $foncscal="
						// SELECT	 COUNT(DISTINCT $col2) FROM $table";	
						
						
						// $requete=$connexion->prepare($foncscal);
						// $requete-> execute();
						// $resultat=$requete->fetchall();
												
						
						
						
////////
// MIN et MAX donne les mini et maxi d'une colonne
/////
						
					// $foncscal="
					// SELECT	 MIN($col6) FROM $table
					// ";	
						
						// $requete=$connexion->prepare($foncscal);
						// $requete-> execute();
						// $resultat=$requete->fetchall();
												
						
////////
// SUM calcul de la somme
/////
						
					// $foncscal="
					// SELECT	 SUM($col6) FROM $table
					// ";	
						
						// $requete=$connexion->prepare($foncscal);
						// $requete-> execute();
						// $resultat=$requete->fetchall();						
						
echo'<br><strong>Fonctions scalaires dans MySql</strong><br>';						
						
////////
// UCASE et LCASE met en majuscules ou en minuscules
/////
						
					// $foncscal="
					// SELECT	 UCASE($col3) FROM $table
					// ";	
						
						// $requete=$connexion->prepare($foncscal);
						// $requete-> execute();
						// $resultat=$requete->fetchall();						
						
////////
// LENGTH donne la longueur des valeurs d'une colonne
/////
						
					// $foncscal="
					// SELECT	 LENGTH($col3) FROM $table
					// ";	
						
						// $requete=$connexion->prepare($foncscal);
						// $requete-> execute();
						// $resultat=$requete->fetchall();							
						
////////
//ROUND arrondi aux decimales inferieures
/////
						
					// $foncscal="
					// SELECT	 ROUND($col8,2) FROM $table
					// ";	
						
						// $requete=$connexion->prepare($foncscal);
						// $requete-> execute();
						// $resultat=$requete->fetchall();							
						
						
////////
// NOW pour donner la date actuelle
/////
						
					// $foncscal="
					// SELECT	 $col3, NOW() FROM $table
					// ";	
						
						// $requete=$connexion->prepare($foncscal);
						// $requete-> execute();
						// $resultat=$requete->fetchall();	


echo'<br><strong>Fonctions GROUP BY et HAVING dans MySql</strong><br>';								
						
////////
// GROUP BY 
//////
// ex: tableau de la moyenne des dons avec l'age dans la table inscrits te on grope selon l'age
// SELECT	 AVG(dons),age FROM inscrits GROUP BY age
						
// avec cette ecriture on ne peux plus utiliser le critere WHERE apres GROUP BY pour cela on remplace 
// WHER par HAVING, on demande de ne prendre que les dons superieurs à 100
// SELECT	 AVG(dons),age FROM inscrits GROUP BY age HAVING AVG(dons)>100	
//par contre on peux utiliser WHERE avant GROUP BY
// SELECT	 AVG(dons),age FROM $table GROUP BY age HAVING AVG(dons)>100
//ci dessous les dons de bertrand ne seront pas affichés
// SELECT	 AVG(dons),age  FROM $table WHERE prenom!='bertrand' GROUP BY age HAVING AVG(age)<40

					// ";
			
					// $foncscal="
					// SELECT	 AVG($col8),$col6 FROM $table GROUP BY $col6 HAVING AVG($col8)>100
					// ";	
					
						// $foncscal="
					// SELECT	 AVG($col8),$col6 FROM $table GROUP BY $col6 HAVING AVG($col6)<40
					// ";	
						$foncscal="
					SELECT	 AVG($col8),$col6  FROM $table WHERE $col3!='bertrand' GROUP BY $col6 HAVING AVG($col6)<40
					";		
						$requete=$connexion->prepare($foncscal);
						$requete-> execute();
						$resultat=$requete->fetchall();	

						
						
					echo'tableau fonction</br> ';
					echo'<pre>';
					print_r($resultat);
					echo'</pre>';
					echo'fin tableau fonction</br> ';
						
			}
	
		catch(PDOException $e){
		echo'Echec de la requete: '.$e->getMessage.'<br/>';
	}
}

_fonction_BDD();

?>
</body>
</html>