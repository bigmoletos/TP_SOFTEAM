<!DOCTYPE html>
<html>
	<head>
		<title>travail sur Base de données PDO MyAdmin MySQL suite</title>
		
		<meta charset="utf-8"/>
	</head>	
	<body>
		
<p><br><strong>Jointure entre 2 bases</strong><br><br></p>		
		
<?php

// il y a 3 types de jointures
// Externes:
// FULL OUTER JOIN
// LEFT JOIN
// RIGHT JOIN

// et 1 type Internes:
// INNER JOIN 

// les externes

// les internes ne retournent de reusltat uniquement s'il y a correspondance dans les 2 tables contrairement aux jointures externes qui  renverrons toujours un resusltat.
// on peut faire la meme chose en SQL avec UNION

	$serveur="localhost";
		$login="root";
		$pass="";
		
		$bdd="mabddtest2";//nom dela base de données
		$table="inscrits";//"commentaires";//nom de la table
		$table2="commentaires";
// nom des colonnes		
		$col1="id";//"nb";
		$col2="prenom";//"id_inscrit";
		$col3="nom";
		$col4="email";//"mail";
		$col5="commentaires";//"sexe";//;
		$col6="id_inscrit";//"tel portable";"numero client";
		$col7="CP";//"rue";
		$col8="ville";
		$col9="pays";
		$col10="CP";
		$col11="";
		
		
			function _jointure_BDD(){
			
			
			global$serveur,$login,$pass,$bdd,$table,$table2,$col1,$col2,$col3,$col4,$col5,$col6,$col7,$col8,$col9,$col10;	
	
					try{
						$connexion=new PDO("mysql:host=$serveur;dbname=$bdd;charset=utf8",$login,$pass);
						$connexion->setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		// jointure interne correspondance entre les tables qui nous interessent

		// on veut recuperer les info de la col prenom de la table inscrit ET de la colonne commentaires de la table commentaire
		// FROM à partir de la table 1 avec la fonction INNER JOIN on fait le joint avec la table2 , en 
		// faisant une correspondance sur les 2 tables à partir de la col id de la table inscrits de la 
		// col id-inscrits de la table commentaires
//////////////////////
// premiere ecriture
////////////////////		
		// $jointure_interne="
		// SELECT inscrits.prenom, commentaires.commentaires
		// FROM inscrits
		// INNER JOIN commentaires
		// ON inscrits.id=commentaires.id_inscrit
		// ";
		//preparation de la requete
		// $requete=$connexion->prepare($jointure_interne);
		// on place la requete dans notre objet de connexion et on applique la methode prepare 
		// avec comme argument notre requete sql quiest enfermée dans notre variable $jointure_interne
		
		// on execute la requete
		// $requete->execute();
		// $resultat=$requete->fetchAll();//affichage de la requete par fetchall	

/////////////////////
// deuxieme ecriture plus lisible avec l'alias AS
////////////////////		
// AS permet de creer un alias qui sera plus facile à utiliser que le nom d'une table qui serait ambigu ou trop long.
// Apres choisit un alias avec AS il suffit de remplacer le nom de la table par calias

		// $jointure_interne="
		// SELECT ins.prenom, com.commentaires
		// FROM inscrits AS ins
		// INNER JOIN commentaires AS com
		// ON ins.id=com.id_inscrit
	
		// ";
		
		// $requete=$connexion->prepare($jointure_interne);
		// $requete->execute();
		// $resultat=$requete->fetchAll();//affichage de la requete par fetchall	
	

/////////////////////
// troisieme ecriture avec WHERE
////////////////////		



		// $jointure_interne="
		// SELECT ins.prenom, com.commentaires
		// FROM inscrits AS ins
		// INNER JOIN commentaires AS com
		// ON ins.id=com.id_inscrit	
		// WHERE ins.nom='franck'
		// ";
		
		// $requete=$connexion->prepare($jointure_interne);
		// $requete->execute();
		// $resultat=$requete->fetchAll();//affichage de la requete par fetchall	

/////////////////////
// 4em' ecriture avec LEFT JOIN
////////////////////		
// va recuperer tous les prenoms de la table1 (inscrits) et seulement les commentaires liés à un auteur de la table de droite

		// $jointure_interne="
		// SELECT ins.prenom, com.commentaires
		// FROM inscrits AS ins
		// LEFT JOIN commentaires AS com
		// ON ins.id=com.id_inscrit	
	
		// ";
		
		// $requete=$connexion->prepare($jointure_interne);
		// $requete->execute();
		// $resultat=$requete->fetchAll();//affichage de la requete par fetchall	

/////////////////////
// 5eme  ecriture avec RIGHT JOIN
////////////////////		
// va recuperer tous les prenoms de la table2 (commentaires) et seulement les commentaires liés à un inscrit  de la table de droite

		// $jointure_interne="
		// SELECT ins.prenom, com.commentaires
		// FROM inscrits AS ins
		// RIGHT JOIN commentaires AS com
		// ON ins.id=com.id_inscrit	
	
		// ";
		
		// $requete=$connexion->prepare($jointure_interne);
		// $requete->execute();
		// $resultat=$requete->fetchAll();//affichage de la requete par fetchall	
	

/////////////////////
// 5eme  ecriture avec une UNION car FULL OUTER JOIN ne marche pas avec mySql
////////////////////		
// va recuperer tous les prenoms de la table2 (commentaires) et tous les commentaires liés à un inscrit  de la table de droite
// UNION va renvoyer une seule occurence d'une meme valeur

		// $jointure_interne="
		// SELECT prenom FROM $table
		// UNION
		// SELECT commentaires FROM $table2
	
		// ";
		 
		// $requete=$connexion->prepare($jointure_interne);
		// $requete->execute();
		// $resultat=$requete->fetchAll();//affichage de la requete par fetchall	
		
	
/////////////////////
// 6eme  ecriture avec une UNION ALL car FULL OUTER JOIN ne marche pas avec mySql
////////////////////		
// va recuperer tous les prenoms de la table2 (commentaires) et tous les commentaires liés à un inscrit  de la table de droite
// UNION ALL va renvoyer toutes les occurences d'une meme valeur

		// $jointure_interne="
		// SELECT prenom FROM $table
		// UNION ALL
		// SELECT commentaires FROM $table2
	
		// ";
		 
		// $requete=$connexion->prepare($jointure_interne);
		// $requete->execute();
		// $resultat=$requete->fetchAll();//affichage de la requete par fetchall	
		
	
/////////////////////
// 6eme  ecriture avec une UNION ALL  plus LEFT JOIN et RIGHT JOIN pour faire exactement comme  FULL OUTER JOIN qui ne marche pas avec mySql
////////////////////		

// va recuperer tous les prenoms de la table2 (commentaires) et tous les commentaires liés à un inscrit  de la table de droite
// UNION ALL va renvoyer toutes les occurences d'une meme valeur
//le WHERE utilisé dans le RIGHT JOIN permet de ne prendre les commentaires que si l'id est null dans la table inscrit

		$jointure_interne="
		SELECT ins.prenom, com.commentaires
		FROM inscrits AS ins
		LEFT JOIN commentaires AS com
		ON ins.id=com.id_inscrit
		
		UNION ALL
		
		SELECT ins.prenom, com.commentaires
		FROM inscrits AS ins
		LEFT JOIN commentaires AS com
		ON ins.id=com.id_inscrit
		WHERE ins.id IS NULL
	
		";
		 // WHERE ins.id IS NULL
		$requete=$connexion->prepare($jointure_interne);
		$requete->execute();
		$resultat=$requete->fetchAll();//affichage de la requete par fetchall			
	
//////////////////////
// ecriture avec des variables
////////////////////	
		// $jointure_interne="
		// SELECT $table.$col2, $table2.$col5
		// FROM $table
		// INNER JOIN $table2
		// ON $table.$col1=$table2s.$col6
		// ";
		// $requete=$connexion->prepare($jointure_interne);
		// $requete->execute();
		// $resultat=$requete->fetchAll();
	
		//////////////////////////problemes d'accents
// rajouter dans le script au niveau de la connexion à la base de données juste apres le dbname=table1;charset=utf8, !!!sans espace	ensuite il faut verifier l'interclassement des tables	en utf8_unicode_ci
			
			echo'tableau jointure</br> ';
			echo'<pre>';
			print_r($resultat);
			echo'</pre>';
			echo'fin tableau jointure</br> ';
	}
	
	catch(PDOException $e){
		echo'Echec de la requete: '.$e->getMessage.'<br/>';
	}
}

_jointure_BDD();


?>
</body>
</html>