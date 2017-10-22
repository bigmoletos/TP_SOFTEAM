<!DOCTYPE html>
<html>
	<head>
		<title>Cette page est en interaction avec mon formulaire en PHP mais aussi avec ma feuille formationPHP.php</title>
		
		<meta charset="utf-8"/>
	</head>	
		
		
	<body>
	
	<p>><!-- en rentre en html pour interagir avec le puis à l'intérieur du code html on repasse en php pour acceder aux données saisies par l'utilisateur.-->
	Bonjour
		<?php
			echo'<pre></br>';
			echo"tableau montrant que le formulaire crée un tableau array avec pour clé le prénom et pour valeur la saisie</br>";
			
		print_r ($_POST);//$_POST est le nom du tableau array crée par le formulaire
		
				echo'</pre>';
				echo '</br></br><strong>htmlspecialchars</strong></br></br>';
				echo "proctection de saisie du formulaire, évite l'interpretation du code html.htmlspecialchars affiche la saisie tel quel, sans l'interpreter</br>";
				
				
				
				
				echo "</br>proctection de saisie du formulaire, la fonction strip_tags permet de supprimer totalement tous les caractéres html c'est encore plus efficace que htmlspecialchars.</br>";
				
				
								
			echo htmlspecialchars($_POST["prenom1"]).'</br>';//variable créée automatiquement par une saisie dans le formulaire, le mot prenom1  sert de cle au tableau array sa la valeur est la saisie de l'utilisateur
			//htmlspecialchars permet de transformer ce qui est ecrit dans le formulaire en texte non interpretable par le html, évitant ainsi un haker d'injecter du code via le formulaire
			  //la fonction strip_tags permet de supprimer totalement tous les caractéres html c'est encore plus efficace que htmlspecialchars. 
				  echo '</br></br>';
				  
				  echo "on voit ci-dessous que strip_tags à supprimé tous les caractéres html, contrairement htmlspecialchars qui les affiche tel quel, sans l'interpreter, sauf les slash et antislash</br></br>";
					//echo '</br></br>';
					
					 echo strip_tags($_POST["prenom1"]).'</br>';
					
					
					echo '</br><strong>stripslashes()</strong></br>';
					
					
			 echo stripslashes($_POST["prenom1"]).'</br>';//on peut encore renforcer la sécurité du formulaire avec les fonctions trim()retire les espaces et stripslashes() permet de ne pas tenir compte d'un antislah
			 
			 
			 echo '</br></br><strong>trim </strong></br></br>';
			 echo 'trim supprime les espaces></br></br>';
			 
			  echo trim($_POST["prenom1"]).'</br>';
			  
			 echo "</br><strong>pour utiliser toutes les vérifications ensemble on va creer une fonction qui les regroupe toutes</strong></br></br>";
			 
			 $prenom2=$nom=$pseudo="";//on assigne vide à toutes les variables
			 
			 function securisation($donnees){
				 
				 $donnees=trim($donnees);
				 $donnees=stripcslashes($donnees);
				 $donnees=strip_tags($donnees);
				 $donnees=htmlspecialchars($donnees);
				 $donnees=htmlentities($donnees);
				 return $donnees;
				}
				
						echo '<pre>';
			print_r($_POST);
						echo '</pre>';
			
			 $prenom2= securisation($_POST['prenom2']);
			 $nom= securisation($_POST['nom']);
			 $pseudo= securisation($_POST['pseudo']);
			 
			 echo 'ton prenom est: '.$prenom2.'</br>';
			 echo 'ton nom est: '.$nom.'</br>';
			 echo 'ton pseudo est: '.$pseudo.'</br>';
		?>
	, fais comme chez toi</p>
	<p>	
	Tu ne t'appelles pas
		<?php
			echo htmlspecialchars($_POST["prenom2"]);
		?>
	, j'ai du mal comprendre!
	</p>
	<p>clique <a href="formationPHP.php#saisieFormulaire"> ici </a> pour retaper ton prenom</p>
		
		<!--
		#saisieFormulaire rajouté à la fin de l'adresse formationPHP.php permet d'aller directement à l'ancre nommée #saisieFormulaire
		
		trim()va enlever tous les espaces superflues
		stripslashes()
		-->
	</body>	
	
	
	</html>	