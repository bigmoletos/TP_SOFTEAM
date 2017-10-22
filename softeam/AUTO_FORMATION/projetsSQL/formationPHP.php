<?php
			// PARTIE RESERVEE AUX COOKIES ET AUX SESSIONS.
			// TOUJOURS EN AHUT DE LA PAGE POUR ETRE INITAILISE EN PREMIER
			//il faut FORCEMENT INITIALISER LES COOKIES
			// ET LES SESSIONS AVANT TOUT CODE HTML.
			// DONC TOUT EN HAUT DE LA PAGE AVANT  MEME LE <!DOCTYPE html>
			// Ce code est donc déplacé en haut de la page
			// voir ligne 1754
			$nom_cookie_2="test2";
			$valeur_cookie_2="ceci est un test de cookie";
			setcookie($nom_cookie_2,$valeur_cookie_2);
			echo $_COOKIE["test2"];
			
			echo"</br>";
			$nom_cookie_1="test";
			$valeur_cookie_1="cookie franck";
			setcookie($nom_cookie_1,$valeur_cookie_1,time()+7200+3600,"/","h2gementoring.com",false,true);//"/","h2gementoring.com",false,tru
			echo $_COOKIE["test"];
			
			
			
			// pour supprimer le cookie on peut mettre une valeur de temsp passée, par ex time()-3600, le cookie sera supprimée.
			setcookie($nom_cookie_1,$valeur_cookie_1,time()+7200-3600);
			//comme nous sommes en heure d'ete il faut rajouter 2h pour avoir l'heure UNIX réelle

			session_start();
			//!!!!!!!!!!!!!!il faut FORCEMENT INITIALISER LES COOKIES
			// ET LES SESSIONS AVANT TOUT CODE HTML.
			// DONC TOUT EN HAUT DE LA PAGE AVANT  MEME LE <!DOCTYPE html>
			// Ce code est donc déplacé en haut de la page
			//pour lancer une session
			session_destroy();
			
			
			
			
			
			
			?>



<!DOCTYPE html>
<html>
	<head>
		<title>Ceci est ma 1er feuille en PHP</title>
		
		<meta charset="utf-8"/>
	</head>	
		
		
	<body>
		<p> ceci est un paragraphe en html </br>
		2éme  page</br></p>
		//http://php.net/manual/fr/function.array-pop.php
		<p> aide en ligne PHP <br><a href="http://php.net/manual/fr/language.constants.php" target="_blank">cliquez ici manuel d'aide du PHP</a></p>
		
	<?php /*noter les symboles pour faire des commentaires multiples sur plusieurs lignes. Pour une seule ligne on utiliser simplement les "// en début de ligne"  */
		
			echo "ceci est mon premier essai  en php </br></br>"; //ne pas oublier le ; à  la fin de chaque ligne de commande
			echo '<strong>les variables</strong></br>';
				//echo "il faut aller voir ma feuille formulaire.PHP</br></br>";
			
			//$departement="bouches du rhone";
			$departement="var";
			//$departement="vaucluse";
			//$departement="aube";
			//$departement="aude";
			//$departement="yveline";
			
			//$cp=83000;
			$cp=06100;
			//$cp=11250;
			//$cp=13008;
			//$cp=78340;
			//$cp=10140
			
				echo '<strong>les differents types de variables</strong></br>';
				echo "le type de variable est automatiquement défini lors de sa saisie</br></br>";	
			
			$chiffre=13.5;
			$varbool= true;
			$variable1=155;
			$variable2=155;
			$variable3=2;
			
			$multiplication=$variable1*$cp;
			
			echo $multiplication;
			
	?><!--ici on ressort du php pour retourné en html afin d'inserer un retour à la ligne-->
			<p></br></p> <!--insertion d'un commentaire en html, la syntaxe est différente des commentaires en PHP-->
	<?php //ici on rentre à nouveau en php 
				
				echo "autre methode pour afficher le retour ligne aprés avoir affiché la variable multiplication, au lieu d'utiliser les simples guillemets ou utilise les doubles guillemets.</br>Quand on utilise les simples guillemets il faut mettre un point devant et derriere les variables </br></br>";	
				
			
			//echo .$multiplication.'</br>';
			echo  "  $multiplication  </br>";/*autre methode pur afficher le retour ligne aprés avoir affiché la variable "multiplication", au lieu d'utiliser les simples' ou utilise les doubles"*/
			
			echo "à noter le méthode pour échapper un caractére spécial en mettant un  antislash devant, ex pour un mot ayant des guillemets simple l'avion devient l\'avion</br></br>";	
			
			echo 'nous sommes dans les '  .$departement. ' dans l\'arrondissement' .$cp. '</br>';//à noter le méthode pour échapper un caractére spécial en mettant un  antislash devant, ex pour un mot ayant des guillements simple l'avion devient l\'avion
			
			echo "nous sommes dans les  $departement dans l'arrondissement $cp </br></br>";
			
			
			echo 'la multiplication de  ' .$variable1. ' par le ' .$cp. ' est :' .$variable1 *$cp. '</br>';
			echo 'la multiplication de  ' .$variable1. ' par le ' .$cp. ' est :' .$multiplication. '</br></br>';
			
			 /*tentative de  modif d'une variable par une saisie clavier, ne fonctionne pas
			
			// $line = readline("Commande : ");
			 //readline_add_history($line);
			// echo $line;
			 // Lit 3 commandes de l'utilisateur
			for ($i=0; $i < 3; $i++) {
				$line = readline("Commande : ");
				readline_add_history($line);
			}

			// Liste l'historique
			print_r(readline_list_history());

			// Liste les variables
			print_r(readline_info());
		 
			 
			 
			// echo 'entrer votre reponse';
			//$reponse = trim(fgets(STDIN)); 
			//echo $reponse;
			*/
			
				echo "<strong>if_elseif_else</strong></br>";
				//echo "le type de varialbe est automatiquement défini par sa saisie</br></br>";
				
			if($variable1>=$variable2){
				echo 'la variable1 : ' .$variable1. ' est supérieure ou égale à la variable2 : ' .$variable2.'</br>';
			}
			
			if($variable1==$variable2){
				echo 'la variable1 : '.$variable1.' est égale à la variable2 : '.$variable2.'</br>';
			}
			else{
				echo 'la variable1 : '.$variable1.' est différente de la variable2 : '.$variable2.'</br>';
			}
			if($variable1!=10) {
				echo 'la variable1 : '.$variable1.' est différente de 10  </br>';
			}
				else{
					echo 'la variable1 : '.$variable1.' est égale à 10  </br>';
				}
			
			if($departement=="vaucluse"  OR $departement=="var"){
				echo 'le département : '.$departement.' appartient à la région PACA </br>';
			}
			elseif($departement=="aube" OR $departement=="aude"){
				echo 'le département : '.$departement.' est fait bien partie de notre selection intégrant  l\'aube et l\'aude </br>';
			}
			elseif ($departement=="bouches du rhone"){
				echo 'le département : '.$departement.' est bien celui des bouches du rhone </br>';
			}
			else{
				echo 'le département : '.$departement.' aucune des conditions precedentes ne correspond';
			}
?>
		<p></br></p> <!--insertion d'un commentaire en html, la syntaxe est différente des commentaires en PHP-->
<?php //ici on rentre à nouveau en php 	
			
				echo "<strong>switch</strong></br>";
				echo "utilisation de switch_case_break en lieu et place de if_elseif_else.</br> switch ne teste qu'une égalité</br></br>";
			
			
		switch($departement){//utilisation de switch case break en lieu et place de if elseif else 
							//switch ne teste qu'une égalité
			case "bouches du rhone":
				echo 'le département : '.$departement.' est bien celui des bouches du rhone </br>';
				break;
				
			case "aube":
				echo 'le département : '.$departement.' est bien celui de l\'aube </br>';
				break;	
				
			case "vaucluse":
				echo 'le département : '.$departement.' est bien celui du vaucluse </br>';
				break;	
			case "var":
				echo 'le département : '.$departement.' est bien celui du var </br>';
				break;	
			default:
				echo "aucune correspondance de département";			
		}
			
			

	
	echo"<p></br></p> <!--insertion d'un commentaire en html, la syntaxe est différente des commentaires en PHP-->";
		 	
	echo"<p><strong>test avec variable booléenne</strong></br></p>";
	
//	_If($varbool):_ avec cette ecriture on teste par defaut si _$varbool_ est vraie, inutile de faire _if($varbool==true)_, et pour tester l'inverse on fait: _if(!$varbool)_
			 

//<?php//ici on rentre à nouveau en php 
			//test avec variable booléenne
			
			//$varbool= false;
			//echo $varbool;
			
		if($varbool==true){
			echo 'Ma variable booléenne est vraie </br>';
			
		}
		else{
			echo 'Ma variable booléenne est fausse </br> ';	
			}
		
		if($varbool){ //avec cette ecriture on teste par defaut si varbool est vraie
			echo 'Ma variable booléenne est vraie </br>';
			
		}
		else{
			echo 'Ma variable booléenne est fausse </br>';	
			}
		
		if(!$varbool){ //teste l'inverse, ici si varboolest vraie teste quand c'est faux  
		//si varbool est false le teste se fait si c'est vraie
			echo 'Ma variable booléenne est vraie </br>';
			
		}
		else{
			echo 'Ma variable booléenne est fausse </br>';	
			}
		//teste avec les formes terner
		$cp=10140;
		
		if($cp==13008){
			$departement="bouches du rhone";
		}
			
		
		else{
			$departement="autres dpt";
		}
		$departement=($cp==13008)? "bouches du rhone": "autre dpt";//ici on teste tout sur une seule ligne
		
		echo " $departement </br>";
		
		
		///////les boucles
				echo "</br></br>";
				echo '<strong>les boucles</strong></br>';
				echo "boucle while</br></br>";
		
		$nb=1;
		while($nb<=10){ //boucle while
			echo "avec while le nb est $nb </br>";
			$nb++; // equivalent à $cp=$cp+1
			
		}
		
		
?>
	 </br>
			
<?php
	
				echo '<strong>do while</strong></br>';
				echo "x++ pour  incrementer de 1, x--pour décrementer de 1</br></br>";
		$nb=10;
		do{ //boucle do while
			echo " avec do while le nb est $nb </br>";
			$nb=$nb-1; //on peut aussi ecrire $nb--
		}
		while($nb>=5);
			
?>
</br>
			
<?php
				echo '<strong>for</strong></br>';
				echo "x++ pour  incrementer de 1, x--pour décrementer de 1</br></br>";
	//boucle for
	for($nb=20;$nb>=15;$nb--){
			echo 'avec for le nb est '.$nb.'</br>';
		}
		
?>
	 </br>
		<ul> <strong>les 3 types de tableaux et la boucle for each</strong>
		
		<li>
		les numerotés  ou tableaux indexés, </li>
		<li>
		les tableaux associatif et  les tableaux multi-dimensionnel,</li>
		<li>
		les tableaux multi-dimensionnel</li>
		</ul>
<?php
	
	//boucle for each utilisée surtout sur les tableaux
	//for($nb=20;$nb>=15;$nb--){
			//echo 'avec for each le nb est '.$nb.'</br>';	
	//}
			$col=array('bouches du rhone','var','vaucluse','aube','aude','yvelines');//methode tableau avec index  automatique ici de 0 à 5
				
			echo $col[3].'</br>';//affiche la 3éme valeur du tableau "aube", NE PAS OUBLIER LE  0	
				
			//tableau avec index rentré manuellement et non automatiquement//methode tableau avec index  automatique ici de 0 à 5
				$col[0]='bouches du rhone';
				$col[1]='var';
				$col[2]='vaucluse';
				$col[3]='aube';
				$col[4]='aude';
				$col[5]='yvelines';
			
			echo $col[2].'</br>';//affiche la 3éme valeur du tableau "vaucluse", NE PAS OUBLIER LE  0
				
				
				//tableau associatif automatique
				
			$tableau2=array(
			'bouches du rhone'=>13008,
			'var'=>83000,
			'vaucluse'=>06100,
			'aube'=>10140,
			'aude'=>11250,
			'yveline'=>"non renseigné");	
				
			echo $tableau2['bouches du rhone'].'</br>'; //affiche la 3éme valeur du tableau "13008", NE PAS OUBLIER LE  0	
				
				echo"</br></br>";
				echo"tableau  associatif manuel</br></br>";
				
				//tableau  associatif manuel
				$tableau2["bouches du rhone"]=13008;
				$tableau2["var"]=83000;
				$tableau2["vaucluse"]=06100;
				$tableau2["aube"]=10140;
				$tableau2["aude"]=11250;
				$tableau2["yveline"]=78340;
				
			echo $tableau2['aude'].'</br></br>'; //affiche la 3éme valeur du tableau "11250", NE PAS OUBLIER LE  0	
				
			
			
			for($x=0;$x<=5;$x++){
				echo $col[$x].'</br>';//affiche toutes les valeurs du tableau col, NE PAS OUBLIER 
				}
			
			foreach($col as $mesthemes){//on rentre le tableau et un item au choix, ici mesthemes
				echo 'avec each for sur le tableau col: '.$mesthemes.'</br></br>';
			}
			foreach($tableau2 as $mesthemes){
				echo 'avec each for sur le tableau2: '.$mesthemes.'</br>';
			}	
				$codepostal[83000]="var";
				$codepostal[06100]="vaucluse";
				$codepostal[11250]="aube";
				$codepostal[13008]="bouches du rhone";
				$codepostal[78340]="yvelines";
				$codepostal[10140]="aude";
			
		?>
			</br>
			
		<?php
					echo"</br></br>";
					echo '<strong>foreach</strong></br>';
					echo"</br></br>";
					
			foreach($codepostal as $mavaleur=>$correspondance){ //on peut aussi recuperer les cles et les valeurs
			//j'avais une erreur de scalar array car j'ai utilisé 2 fois la variable $cp dans mon programme, pour resoudre ce probleme j'ai remplacé le nom de la variable par $codepostal
				echo 'avec each for sur le tableau cp: '.$mavaleur.' correspond à: '.$correspondance.'</br>';
			}
	/*		
				$chiffre=13.5;
				$varbool= true;
				$variable1=155;
				$variable2=155;
				$variable3=2;
	*/
	
	 ?>
	 </br>
			
	<?php
	//utilisation de la fonction print_r, utilisé essentiellement pour le débogage
	
			print_r($codepostal);
			 ?>
	 </br>
			
	<?php
			print_r($col);
			 ?>
	 </br>
			
	<?php
			print_r($tableau2);
	
		//idem avec une presentation plus lisible en utilisant du code html à savoir l'instruction <pre> represente du texte preformaté, integrant les retour ligne et les espaces
	
			echo'<pre>';
			print_r($tableau2);
			echo'</pre>';
			
			echo'<pre>';
			print_r($col);
			echo'</pre>';
	
			//tableau multidimensionel, il est difficile de faire plus de 3 dimensions 
	
	?>
	 </br>
		<ul> Suite des tableaux
			<li><strong>les tableaux multi-dimensionnel</strong></li>
		</ul>
	<?php	
		$membres=array( //tableau en 2 dimensions il nous faudra donc 2 indices pour selectionner un element
					array('pierre',24,'pierre.gi@free.fr'),
					array('marcel',15,'marcel@free.fr'),
					array('clavier',57,'clavier@free.fr'),
					);
		echo $membres[0][0].' a '.$membres[0][1].' ans. Son mail est: '.$membres[0][2].'</br>';
		echo $membres[1][0].' a '.$membres[1][1].' ans. Son mail est: '.$membres[1][2].'</br>';
		echo $membres[2][0].' a '.$membres[2][1].' ans. Son mail est: '.$membres[2][2].'</br>';
		
		//idem avec une boucle for
		
	 ?>
		</br>
		
			
	<?php	
		for($ligne=0;$ligne<3;$ligne++){
			//on cree une nouvelle variable membre et son numero
			$membre_no=$ligne+1;
			echo'<div align="left">';
			
			echo 'le numero du membre est: '.$membre_no.'</br>';
			echo '<ul>'; //code html pour commencer une liste non numerotée
				for($colonne=0; $colonne<3;$colonne++){
					echo '<li>'.$membres[$ligne][$colonne].'</li>';
			
				}
			echo'</br>';
			echo'<padding:0>';
			echo'<margin:0>';
			echo'</ul>'; 
		}
		
			
		
	?>
	 </br>
		<ul> <strong>Les principales fonctions</strong></br>
			<li>Plus de 1000 fonctions déja integrées dans PHP</li>
		</ul>
		</br>
	<?php
		/*on commence toujours une fonction par une lettre ou un _(underscore)
				function Nomfonction(){
					code executé par la fonction
				}		

		*/
				function bonjour(){
					echo'bonjour à tous</br>';
				}
				bonjour();//ici on appele la fonction

			Function bonjourMembre($membre){
				echo 'Bonjour '.$membre.'!</br>';
			}
			bonjourMembre('alain');
			
			function bonjourcomplet($prenom,$age){
				echo 'l\'age de '.$prenom.' est de  '.$age.' ans</br>';
				
			}
			bonjourcomplet('alain', 32);
			
			echo"</br></br>differences entre echo et return</br></br>";
			
			 //difference entre return et echo
			
			function bonsoir(){
				return 'bonsoir à tous!</br>';
				
			}
			$bonjour=bonjour();//la fonction bonjour affiche la valeur "bonjour" immediatement mais elle n'est pas stockée et ne retourne aucune valeur
			$bonsoir=bonsoir();//la fonction bonsoir retourne la valeur "bonsoir" qui est stockée dans la variable $bonsoir
			
			echo $bonjour;
			echo $bonsoir;
			echo $bonjour;//ne s'affichera pas car valeur non stockée et deja affichée precedement
			echo $bonsoir;
			echo $bonjour;//ne s'affichera pas car valeur non stockée et deja affichée precedement
			echo $bonsoir;
			echo $bonjour;//ne s'affichera pas car valeur non stockée et deja affichée precedement
			
	function bonsoir2(){
				return 'bonsoir à tous!</br>';//le return termine la fonction la suite du programme donc pas executée
				echo'comme il y a un return juste avant,ce texte ne sera pas ecrit </br>';
			}
	bonsoir2();
	function bonsoir3(){
				echo'cette fois comme le return est juste apres,ce texte sera ecrit </br>';
				return 'bonsoir à tous!</br>';//le return termine la fonction la suite du programme donc pas executée
				
			}
	bonsoir3();
	
	?>
	 </br>
		<ul><strong> Suite des fonctions</strong>
			<li>controle de texte string</li>
		</ul>
		</br>
	<?php
	
					echo "</br></br><strong>fonctions</br> strlen</br> str_word_count str_repeat</br></strong></br></br>";
					
	
	
		echo strlen("bonjour c'est à moi").'</br>';//affiche 20 soit le nombre de caractéres
		echo str_word_count("bonjour c'est à toi").'</br>';//affiche 3 au lieu de 5 soit le nombre de mots d'une chaine de caractéres mais ne compte pas les caracteres speciaux (comme les mots accentués ex:à), ni les espaces ni les lettres en apostrophes
		echo str_word_count("bonjour c'est à lui",0,"à").'</br>';//affiche 5 car ici avrec les arguments 0 pour compter le nombre de mot et ensuite on rajoute les mots que l'on veut compter et qui sont normalement exclus
		
		
		echo str_repeat("toi et moi!  ",3).'</br>';
		$texte="Bonjour comment Allez-vous?";
		
		echo "</br></br><strong>fonctions:</br> str_replace</br> strtolower</br> strtoupper</br>  strpos</br></strong></br></br>";
		
		echo str_replace("bonjour","bonsoir",$texte,$i).'</br>';//est sensible à la case
		echo"nombre de remplacements: ".$i.'</br>';
		
		echo str_ireplace("Bonjour","bonsoir",$texte,$i).'</br>';//est INsensible à la case
		echo"nombre de remplacements: ".$i.'</br>';
		
		echo strtolower($texte).'</br>';//string to lower pour mettre une chaine en minuscules
		
		echo strtoupper($texte).'</br>';//string to lower pour mettre une chaine en mMajuscules
		
		echo strpos("bonjour","o").'</br>';//compte le position de la premiere lettre les espaces comptes pour1 et les caracteres accentues comptent pour 
		echo strpos("bonjour à tous","tous").'</br>';
		echo strpos("bonjour","e").'</br>';//affiche 0 car il n'y a pas de "e"
		
		$montexte='j\'aime le <strong>PHP</strong>';
		echo $montexte.'</br>';
		
		echo "</br></br><strong>fonctions:</br> htmlspecialchars</strong></br>converti des caracteres en entités html, utile pour sécuriser des formulaires, comme par exemple si au cos où quelqu'un entre des lignes de code pour casser un site.Peut utiliser 4 paramétres mais un  seul est obligatoire </br></br>";
		
		echo htmlspecialchars($montexte).'</br>';//converti des caracteres en entités html, utile pour sécuriser des formulaires, comme par exemple si au cos où quelqu'un entre des lignes de code pour casser un site.Peut utiliser 4 paramétres mais un  seul est obligatoire.
		/* 
		< devient &lt
		> devient &gt
		& devient &amp
		" devient &quot
		' devient &#039
		*/
		
		$montexte='j\'aime
		le
		<strong>PHP</strong> et aussi le 
			 codage';
		
		echo "</br></br><strong>fonctions:</br> nl2br</strong></br> signifie new ligne to break, permet de convertir des retours à la ligne en element HTML <br> afin de les garder dans le rendu final. Tres utile dans les formulaires  </br></br>";
		
		echo nl2br($montexte).'</br>';//signifie new ligne to break, permet de convertir des retours à la ligne en element HTML </br> afin de les garder dans le rendu final. Tres utile dans les formulaires
		
		//htmlspecialchars_decode
		
		echo "</br></br><strong>fonctions:</br> explode</strong></br> casse des chaines des caracteres en tableau selon un separateur ici on utilise un espace   </br></br>";
		
		
		$texte1="Bonjour à tous!";
		
		echo '<pre>';
		print_r(explode(" ",$texte1)).'</br>';//casse des chaine des caracteres en tableau selon un separateur ici on utilise un espace 
		//echo str_plit().'</br>';
		//echo'</br></br>';
		$texte2="Bonjour. .à. .tous.!.";//ici on prend le point comme séparateur
		 echo '<pre>';
		 print_r(explode(".",$texte2)).'</br>';
		echo '</pre>';
		echo'</br></br>';
		
		echo "</br></br><strong>fonctions:</br> str_split</strong></br> idem explode mais compte une  longeur de caractéres   </br></br>";
		
		//idem explode mais compte une  longeur de caractéres
		 print_r(str_split($texte1,2)).'</br>';//ici on slipt tous les 2 caracteres
		
		
		echo "</br></br><strong>fonctions:</br> implode et join</strong></br>  implode et join font l'inverse de explode  transforme un tableau en chaine de caractéres en utilisant des sépaarteurs   </br></br>";
		
		
		//implode et join font l'inverse de explode  transforme un tableau en chaine de caractéres en utilisant des sépaarteurs
		$tableau3=array('pierre','a',25,'ans');
		echo implode(" ",$tableau3).'</br>';
		echo implode(".",$tableau3).'</br>';
		echo join("/",$tableau3).'</br>';
		print_r(join($tableau3,2)).'</br>';//idem implode
		
	
	?>
	 </br>
		<ul> <strong>Suite des fonctions
			<li>contrôle des tableaux</li>
		</ul></strong></br>
	<?php
	//recherche dans un tableau associatif
	
	
			$tableau2=array(
					'bouches du rhone'=>13008,
					'var'=>83000,
					'vaucluse'=>06100,
					'aube'=>10140,
					'aude'=>11250,
					'aude2'=>11250,
					'yveline'=>"non renseigné"
					);
	
	
				echo '<strong>array_keys</strong><pre>';
				echo "pour recuperer les clés d'un tableau</br>";
				
		print_r(array_keys($tableau2)).'</br>';//pour recuperer les clés d'un tableau
		//echo '</pre>';
		echo'</br></br>';
		print_r(array_keys($tableau2,10140,true)).'</br>';//pour recuperer la clé d'une entrée du  tableau
				echo'</br></br>';
				echo '<strong>array_values</strong><pre>';
				echo"pour recuperer les valeurs d'un tableau</br>";
				
		//echo '<pre>' pre permet un affichage preformaté
		print_r(array_values($tableau2)).'</br>';//renvoi toutes les valeurs d'un tableau sans les clés
				echo '</pre>';
				echo '<strong>array_key_exists</strong><pre>';
				echo"verifie qu'une clé existe dans un tableau</br>";
	
		if(array_key_exists("var",$tableau2)){ //verifie qu'une clé existe dans un tableau
			echo"la clé existe";
		}
		 else{
			 echo"la clé n'existe pas"; 
		 }
				echo'</br></br>';
			
				echo'array_key_exists</br>';
	
		if(array_key_exists("idf",$tableau2)){ //verifie qu'une clé existe dans un tableau
			echo"la clé existe";
		}
		 else{
			echo"la clé n'existe pas"; 
		 }
	
				echo'</br></br>';
				//echo'array_search</br>';
				echo '<strong>array_search</strong><pre>';
				echo"cette fonction permet de chercher la clé d'une valeur dans un tableau</br>";
				
		//cette fonction permet de chercher la clé d'une valeur dans un tableau
		echo array_search(13008,$tableau2).'</br>';
		echo array_search(1300,$tableau2,true).'</br>';//pour trouver la valeur exacte
				//echo'in_array</br>';
					echo '<strong>in_array</strong><pre>';
					echo"cherche une valeur à l'interieur d'un tableau, renvoie true ou false. C'est une fonction sensible à la case mais pas au type de valeur</br>";
					
		echo in_array(13008,$tableau2).'</br>';//cherche une valeur à l'interieur d'un tableau, renvoie true ou false. C'est une fonction sensible à la case mais pas au type de valeur
		if(in_array(13008,$tableau2)){ //verifie qu'une valeur existe dans un tableau
			echo"la clé existe";
		}
		 else{
				echo"la clé n'existe pas"; 
	 }
	
				echo'</br><strong>in_array</strong></br>';
	
	if(in_array("13008",$tableau2,true)){ //idem mais verifie le type de valeur
		echo"la clé existe";
	}
	 else{
		 echo"la clé n'existe pas"; 
	 }
	
				echo'</br></br>';
					echo '<strong>count</strong><pre>';
					echo"retourne le nombre d'elements d'un tableau</br>";
	
	//compter et comparer des fonctions
		echo count($tableau2).'</br>';//retourne le nombre d'elements d'un tableau
		
				echo '<strong>array_count_values</strong><pre>';
				echo"compte le nombre de valeurs identiques dans un tableau</br>";
				
		print_r( array_count_values($tableau2)).'</br>';//compte le nombre de valeurs identiques
				
				echo '</pre>';
				echo'</br></br>';
				
				
				echo '<strong>array_diff_assoc</strong></br><pre>';
				echo 'affiche les differences de clé et de valeurs entre les 2 tableaux, sensible à la case</br>';
		
		$compare=array('a'=>'bleu','b'=>'vert','c'=>'jaune');
		
		$comparant=array('a'=>'bleu','b'=>'verte');
		
				
		
		print_r(array_diff_assoc($compare,$comparant));//compare les cle de plusieurs tableaux et envoie les differences, prend autant de tableau qu'il y a de tableaux à comparer
		//! attention c'est sensible à la case
				
		
		$compare=array('a'=>'bleue','b'=>'vert','c'=>'jaune');
		
		$comparant=array('a'=>'bleu','b'=>'vert');		
		
		print_r(array_diff_assoc($compare,$comparant));//compare les cle de plusieurs tableaux et envoie les differences, prend autant de tableau qu'il y a de tableaux à comparer
		//! attention c'est sensible à la case
						echo '<strong>array_diff_key</strong><pre>';
						echo 'affiche les differences de clé entre les 2 tableaux</br>';
		$compare=array('a'=>'bleu','b'=>'vert','c'=>'jaune');
		
		$comparant=array('c'=>'bleu','b'=>'vert','c'=>'jaune');		
		
		print_r(array_diff_key($compare,$comparant));//idem mais ne compare que les clés		
			
						echo '<strong>array_diff</strong><pre>';
						echo 'affiche les differences de valeur entre les 2 tableaux</br>';
						
		$compare=array('a'=>'bleu','b'=>'vert','c'=>'jaune');
		
		$comparant=array('a'=>'bleue','b'=>'vert','c'=>'jaunes');	
		
		print_r(array_diff($compare,$comparant));//idem mais ne compare que les valeurs		
				 	
						echo '</pre>';
						echo'</br></br>';
	
						echo '<strong>array_intersect_assoc</strong><pre>';
						echo 'affiche les similitudes  entre les  tableaux</br>';
		
		$compare=array('a'=>'bleu','b'=>'vert','c'=>'jaune');
		
		$comparant=array('a'=>'bleu','b'=>'vert','c'=>'jaunes');	
		
		print_r(array_intersect_assoc($compare,$comparant));//iaffiche les similitudes entre tableaux	
	
						echo '</pre>';
						echo'</br></br>';
	
	
						echo '<strong>array_intersect_key</strong><pre>';
						echo "affiche les similitudes de clés entre les  tableaux</br>";
		
		$compare=array('a'=>'bleu','b'=>'vert','c'=>'jaune');
		
		$comparant=array('a'=>'bleu','b'=>'vert','c'=>'jaune');	
		
		print_r(array_intersect_key($compare,$comparant));//iaffiche les similitudes de clés entre tableaux	
	
						echo '</pre>';
						echo'</br></br>';
						
						
						
						echo '<strong>array_intersect</strong><pre>';
						echo 'affiche les similitudes de valeurs entre les  tableaux</br>';
		
		$compare=array('a'=>'bleu','b'=>'vert','c'=>'jaune');
		
		$comparant=array('a'=>'bleu','b'=>'verts','c'=>'jaunes');	
		
		print_r(array_intersect($compare,$comparant));//iaffiche les similitudes de valeurs entre tableaux	
	
						echo '</pre>';
						echo'</br></br>';
	
	
						echo '<strong>array_fill</strong><pre>';
						echo 'permet de remplir un tableau avec 3 arguments, la clé de départ, le nombre de répetitions, la valeur à recopier</br>';
		
			
		
		print_r(array_fill(0,5,'rouge'));//permet de remplir un tableau avec 3 arguments, la clé, le nombre de répetitions, la valeur à recopier	
	
						echo '</pre>';
						echo'</br></br>';
						echo '<strong>utilisation de print_r avec une variable</strong></br>';
						
		$remplissage=array_fill(2,4,'vert');			
		print_r($remplissage);				
		
		
						echo '<strong>array_fill_keys</strong><pre>';
						echo "permet de remplir un tableau à partir des clés d'un tableau, avec 2 arguments, les clés d'un premier tableau , la valeur à recopier</br>";
		
			
		
		$compare=array('a','b','c','d');
		$remplissage=array_fill_keys($compare,'rouge');//permet de remplir un tableau avec 2 arguments, les clés d'un premier tableau , la valeur à recopier
		print_r($remplissage);	
	
	
						echo '</pre>';
						echo'</br></br>';
						
						
						echo '<strong>array_push</strong><pre>';
						echo "insere des elements en fin de tableau</br>";
		
			
		
		$compare=array('bleu','vert','carmin','brun');
		$remplissage=array_push($compare,'rouge','carmin','brun');//rajoute des valeurs 
		print_r($remplissage);	
						echo'</br></br>';
		$compare=array('bleu','vert','carmin','brun');
		array_push($compare,'rouge','carmin','brun');//rajoute des valeurs 
		print_r($compare);
	
						echo '</pre>';
						echo'</br></br>';
						
						echo '<strong>array_pop</strong><pre>';
						echo "supprime le dernier element d'un tableau</br></br>";
		
			
		
		$compare=array("ananas","bouteille","concombre","avocat","dune");
		$remplissage=array_pop($compare);//supprime le dernier element d'un tableau
		print_r($remplissage);	
	
						echo'</br></br>';
						
		$compare=array("ananas","bouteille","concombre","avocat","dune");
		array_pop($compare);//supprime le dernier element d'un tableau array_pop() dépile et retourne le dernier élément du tableau array, le raccourcissant d'un élément.
		//Note: Cette fonction remet le pointeur au début du tableau d'entrée (équivalent de reset()).

		print_r($compare);	
		
		
		
						echo '<strong>array_unshift</strong><pre>';
						echo "rajoute le premier element d'un tableau</br></br>";
		
			
		
		$compare=array("ananas","bouteille","concombre","avocat","dune");
		$remplissage=array_unshift($compare,'haricot');//rajoute le premier element d'un tableau
		print_r($remplissage);	
						echo'</br></br>';
		print_r($compare);	
						echo '</pre>';
						echo'</br></br>';
						
						echo '<strong>array_shift</strong><pre>';
						echo "retire le premier element d'un tableau</br></br>";
		
			
		
		$compare=array("ananas","bouteille","concombre","avocat","dune");
		$remplissage=array_shift($compare);//retire le premier element d'un tableau
		print_r($remplissage);	
						echo'</br></br>';
		echo$remplissage;	
						echo'</br></br>';
		print_r($compare);	
						echo '</pre>';
						echo'</br></br>';
						
						
						echo '<strong>array_splice</strong><pre>';
						echo "supprime ou remplace des les valeurs à partir d'une position d'où l'on doit modifier la valeur, permute des valeurs de plusieurs tableaux</br></br>";
		
			
		
		$compare=array('a'=>'bleu','b'=>'vert','c'=>'jaune');
		$compare2=array('a'=>'rouge','b'=>'violet','c'=>'jaune');
		array_splice($compare,2);//supprime toutes les valeurs à partir d'une position d'où l'on doit modifier la valeur ici 1 correspond à la 3 éme valeur
		print_r($remplissage);	
						echo'</br></br>';
		echo$remplissage;	
						echo'</br></br>';
		print_r($compare);	
						echo "utilisation des arguments facultatifs, ici on veut supprimer les elements à partir de la 2éme clé et rajouter tous les elements d'un autre tableau. A noter cela modifie les clés</br></br>";
						
		$compare=array('a'=>'bleu','b'=>'vert','c'=>'jaune');
		$compare2=array('a'=>'rouge','b'=>'violet','c'=>'mauve');
		array_splice($compare,1,2,$compare2);//utilisation des arguments facultatifs, ici on veut supprimer les elements à partir de la 2éme clé et rajouter tous les elements d'un autre tableau. A noter cela modifie les clés
		print_r($compare);				
						
						echo '</pre>';
						echo'</br></br>';
						
											
						
						echo '<strong>array_merge</strong><pre>';
						echo "combine des tableaux en un nouveau tableau</br></br>";
		
			
		
		$compare=array("ananas","bouteille","concombre","avocat","dune");
		$compare2=array("kiwi","ail","couvert","origan","poivre");
		$remplissage=array_merge($compare,$compare2);// combine des tableaux en un nouveau tableau, il y autant d'argument que de tableaux que l'on veut combiner
		print_r($remplissage);	
						
						
						echo '</pre>';
						echo'</br></br>';
						
						
						echo '<strong>array_combine</strong><pre>';
						echo "combine les clé d'un tableau numeroté avec les valeurs d'un autre, il faut que les 2 tableaux aient excatement le meme nombre de clé</br></br>";
		
			
		
		$compare=array("ananas","bouteille","concombre","avocat","dune");
		$compare2=array("kiwi","ail","couvert","origan","poivre");
		$remplissage=array_combine($compare,$compare2);// combine les clé d'un tableau numeroté avec les valeurs d'un autre, il faut que les 2 tableaux aient excatement le meme nombre de 
		print_r($remplissage);	
						
						
						echo '</pre>';
						echo'</br></br>';
						
						
						echo '<strong>array_unique</strong><pre>';
						echo "retire les doublons d'un tableau, sensible à la case</br></br>";
		
			
		
		$compare=array(4,"4","ananas","bouteille","bouteille","concombre","avocat","dune","Dune");
		//$compare2=array("kiwi","ail","couvert","origan","poivre");
		$remplissage=array_unique($compare);// combine les clé d'un tableau numeroté avec les valeurs d'un autre, il faut que les 2 tableaux aient excatement le meme nombre de 
		print_r($remplissage);	
						
						
						echo '</pre>';
						echo'</br></br>';
						
						
						echo '<strong>sort</strong><pre>';
						echo "trie dans l'ordre croissant les valeurs d'un tableau</br></br>";
		
			
		
		$compare=array(5,"5","pomme","ananas","bouteille","bouteille","concombre","avocat","dune","Dune");
		//$compare2=array("kiwi","ail","couvert","origan","poivre");
		$remplissage=sort($compare);// classe dans l'ordre croissant les valeurs d'un tableau 
		//print_r($remplissage);	
		print_r($compare);
						
						
						echo '</pre>';
						echo'</br></br>';
						
						
						
						echo '<strong>rsort</strong><pre>';
						echo "trie dans l'ordre décroissant les valeurs d'un tableau numerote</br></br>";
		
			
		
		$compare=array(5,"5","pomme","ananas","bouteille","bouteille","concombre","avocat","dune","Dune");
		//$compare2=array("kiwi","ail","couvert","origan","poivre");
		$remplissage=rsort($compare);// classe dans l'ordre decroissant les valeurs d'un tableau 
		//print_r($remplissage);	
		print_r($compare);
						
						
						echo '</pre>';
						echo'</br></br>';
						
						
						
						echo '<strong>ksort</strong><pre>';
						echo "trie dans l'ordre croissant les clés d'un tableau associatif</br></br>";
		
			
		
		$compare=array('pomme'=>'bleu','banane'=>'vert','courgette'=>'jaune');
		//$compare2=array('a'=>'rouge','b'=>'violet','c'=>'mauve');
		//$compare2=array("kiwi","ail","couvert","origan","poivre");
		$remplissage=ksort($compare);// classe dans l'ordre decroissant les clés d'un tableau associatif
		//print_r($remplissage);	
		print_r($compare);
						
						
						echo '</pre>';
						echo'</br></br>';
						
						
						echo '<strong>krsort</strong><pre>';
						echo "trie dans l'ordre décroissant les cles d'un tableau associatif</br></br>";
		
			
		
		$compare=array('pomme'=>'bleu','banane'=>'vert','courgette'=>'jaune');
		$compare2=array('a'=>'rouge','b'=>'violet','c'=>'mauve');
		//$compare2=array("kiwi","ail","couvert","origan","poivre");
		$remplissage=krsort($compare);// trie dans l'ordre décroissant les cles d'un tableau associatif
		//print_r($remplissage);	
		print_r($compare);
						
						
						echo '</pre>';
						echo'</br></br>';
						
						echo '<strong>asort</strong><pre>';
						echo "trie dans l'ordre décroissant les valeurs d'un tableau associatif</br></br>";
		
			
		
		$compare=array('pomme'=>'bleu','banane'=>'vert','courgette'=>'jaune');
		$compare2=array('a'=>'rouge','b'=>'violet','c'=>'mauve');
		//$compare2=array("kiwi","ail","couvert","origan","poivre");
		$remplissage=asort($compare);// trie dans l'ordre croissant les valeurs d'un tableau associatif
		//print_r($remplissage);	
		print_r($compare);
						
						
						echo '</pre>';
						echo'</br></br>';
						
						echo '<strong>arsort</strong><pre>';
						echo "trie dans l'ordre décroissant les valeurs d'un tableau associatif</br></br>";
		
			
		
		$compare=array('pomme'=>'bleu','banane'=>'vert','courgette'=>'jaune');
		$compare2=array('a'=>'rouge','b'=>'violet','c'=>'mauve');
		//$compare2=array("kiwi","ail","couvert","origan","poivre");
		$remplissage=arsort($compare);// trie dans l'ordre décroissant les valeurs d'un tableau associatif
		//print_r($remplissage);	
		print_r($compare);
						
						
						echo '</pre>';
						echo'</br></br>';
						
						
						echo '<strong>Formatage des dates</strong></br>';
						echo 'time stamps temps unix 1 janvier 1970</br></br>';
						echo '<strong>time</strong>';
						echo "donne le temps écoulé depuis le time stamp</br></br>";
		
		echo time();	
		
		
						echo'</br></br>';
						
						
						
						
						echo '<strong>date</strong></br>';
						echo "donne la date  suivant plusieurs arguments</br></br>";
		
		echo date("d/m/Y").'</br>';
		echo date("D/M/Y").'</br>';	
		echo date("l/d/m/Y").'</br>';			
		
		echo date("d/m/y").'</br>';	
		echo date("d/F/Y").'</br>';
		echo date("D/M/Y").'</br>';	
		echo date("l/d/m/Y").'</br>';			
		echo date("d/m/y - h:i:s").'</br>';
		echo 'il est ' .date("H\H:i\m:s").' et la date est le '.date("d/m/y").'</br>';			
		echo date("d-m-Y",11100000);//temps depuis le 1 janvier 1970
		echo "</br>affiche l'heure actuelle + une heure(3600s): ";
		echo date("H\H:i\m:s",time()+7200+3600);//affiche l'heure actuelle + une heure(3600s)
		//comme nous sommes en heure d'ete il faut rajouter 2h pour avoir l'heure UNIX réelle
		
							/*Jour	---	---
					d	Jour du mois, sur deux chiffres (avec un zéro initial)	01 à 31
					D	Jour de la semaine, en trois lettres (et en anglais - par défaut : en anglais, ou sinon, dans la langue locale du serveur)	Mon à Sun
					j	Jour du mois sans les zéros initiaux	1 à 31
					l ('L' minuscule)	Jour de la semaine, textuel, version longue, en anglais	Sunday à Saturday
					N	Représentation numérique ISO-8601 du jour de la semaine (ajouté en PHP 5.1.0)	1 (pour Lundi) à 7 (pour Dimanche)
					S	Suffixe ordinal d'un nombre pour le jour du mois, en anglais, sur deux lettres	st, nd, rd ou th. Fonctionne bien avec j
					w	Jour de la semaine au format numérique	0 (pour dimanche) à 6 (pour samedi)
					z	Jour de l'année	0 à 365
					Semaine	---	---
					W	Numéro de semaine dans l'année ISO-8601, les semaines commencent le lundi (ajouté en PHP 4.1.0)	Exemple : 42 (la 42ème semaine de l'année)
					Mois	---	---
					F	Mois, textuel, version longue; en anglais, comme January ou December	January à December
					m	Mois au format numérique, avec zéros initiaux	01 à 12
					M	Mois, en trois lettres, en anglais	Jan à Dec
					n	Mois sans les zéros initiaux	1 à 12
					t	Nombre de jours dans le mois	28 à 31
					Année	---	---
					L	Est ce que l'année est bissextile	1 si bissextile, 0 sinon.
					o	L'année ISO-8601. C'est la même valeur que Y, excepté si le numéro de la semaine ISO (W) appartient à l'année précédente ou suivante, cette année sera utilisé à la place. (ajouté en PHP 5.1.0)	Exemples : 1999 ou 2003
					Y	Année sur 4 chiffres	Exemples : 1999 ou 2003
					y	Année sur 2 chiffres	Exemples : 99 ou 03
					Heure	---	---
					a	Ante meridiem et Post meridiem en minuscules	am ou pm
					A	Ante meridiem et Post meridiem en majuscules	AM ou PM
					B	Heure Internet Swatch	000 à 999
					g	Heure, au format 12h, sans les zéros initiaux	1 à 12
					G	Heure, au format 24h, sans les zéros initiaux	0 à 23
					h	Heure, au format 12h, avec les zéros initiaux	01 à 12
					H	Heure, au format 24h, avec les zéros initiaux	00 à 23
					i	Minutes avec les zéros initiaux	00 à 59
					s	Secondes, avec zéros initiaux	00 à 59
					u	Microsecondes (ajouté en PHP 5.2.2). Notez que la fonction date() génèrera toujours 000000 vu qu'elle prend un paramètre de type entier, alors que la méthode DateTime::format() supporte les microsecondes si DateTime a été créée avec des microsecondes.	Exemple : 654321
					Fuseau horaire	---	---
					e	L'identifiant du fuseau horaire (ajouté en PHP 5.1.0)	Exemples : UTC, GMT, Atlantic/Azores
					I (i majuscule)	L'heure d'été est activée ou pas	1 si oui, 0 sinon.
					O	Différence d'heures avec l'heure de Greenwich (GMT), exprimée en heures	Exemple : +0200
					P	Différence avec l'heure Greenwich (GMT) avec un deux-points entre les heures et les minutes (ajouté dans PHP 5.1.3)	Exemple : +02:00
					T	Abréviation du fuseau horaire	Exemples : EST, MDT ...
					Z	Décalage horaire en secondes. Le décalage des zones à l'ouest de la zone UTC est négative, et à l'est, il est positif.	-43200 à 50400
					Date et Heure complète	---	---
					c	Date au format ISO 8601 (ajouté en PHP 5)	2004-02-12T15:19:21+00:00
					r	Format de date » RFC 2822	Exemple : Thu, 21 Dec 2000 16:01:07 +0200
					U	Secondes depuis l'époque Unix (1er Janvier 1970, 0h00 00s GMT)
					*/		
				echo'</br></br>';		
				echo "Pour mettre la date en francais</br></br>";		
				
		$jour=array(
		"",//on ne met pas de jour au premier element pour eviter la clé 0 lors des assignations car la fonction va renvoyer un numero de 1 à 7 et pas de 0 à 6 pour les jours de la semaine
		"lundi",
		"mardi",
		"mercredi",
		"jeudi",
		"vendredi",
		"samedi",
		"dimanche",
		);	

		$mois=array(
		"",//on ne met pas de jour au premier element pour eviter la clé 0 lors des assignations car la fonction va renvoyer un numero de 1 à 12 et pas de 0 à 11 pour les mois de l'année
		"janvier",
		"février",
		"mars",
		"avril",
		"mai",
		"juin",
		"juillet",
		"août",
		"septembre",
		"octobre",
		"novembre",
		"décembre"
		);
		
		echo date("N").'</br>';//donne le numero du jour de la semaine
		echo date("n").'</br>';//donne le numero du mois de l'année	
		
		$dateFR=$jour[date("N")].' '.date("d") .' '.$mois[date("n")].' '.date("Y");//on cherche dans les tableaux $jour et $mois les valeurs date("N") et date("n") pour avoir la valeur correspondant aux clés respectives.
	

		echo $dateFR;

				echo'</br></br>';		
				echo "Autre methode pour mettre la date en francais</br></br>";		
				echo '<strong>setlocale et strftime</strong></br>';

			
			setlocale(LC_TIME,"fr","fr_FR");//defini les paramétres locaux pour l'heure uniquement
			//ATTENTION Dans les fichiers d'aide il manque le "fr" dans setlocale(LC_TIME,"fr","fr_FR") et non setlocale(LC_TIME,"fr_FR")
			//setlocale(LC_ALL,"fr", "fr_FR");//défini les paramétres locaux pour tous les paramétres
			//setlocale(lc_time,"fr_FR");
			echo 'nous sommes le '.strftime("%A %d %B %Y").'</br>';//affiche avec les données formatée par le setlocale
			/*
						%a	Nom abrégé du jour de la semaine	De Sun à Sat
			%A	Nom complet du jour de la semaine	De Sunday à Saturday
			%d	Jour du mois en numérique, sur 2 chiffres (avec le zéro initial)	De 01 à 31
			%e	Jour du mois, avec un espace précédant le premier chiffre. L'implémentation Windows est différente, voyez après pour plus d'informations.	De 1 à 31
			%j	Jour de l'année, sur 3 chiffres avec un zéro initial	001 à 366
			%u	Représentation ISO-8601 du jour de la semaine	De 1 (pour Lundi) à 7 (pour Dimanche)
			%w	Représentation numérique du jour de la semaine	De 0 (pour Dimanche) à 6 (pour Samedi)
			Semaine	---	---
			%U	Numéro de la semaine de l'année donnée, en commençant par le premier Lundi comme première semaine	13 (pour la 13ème semaine pleine de l'année)
			%V	Numéro de la semaine de l'année, suivant la norme ISO-8601:1988, en commençant comme première semaine, la semaine de l'année contenant au moins 4 jours, et où Lundi est le début de la semaine	De 01 à 53 (où 53 compte comme semaine de chevauchement)
			%W	Une représentation numérique de la semaine de l'année, en commençant par le premier Lundi de la première semaine	46 (pour la 46ème semaine de la semaine commençant par un Lundi)
			Mois	---	---
			%b	Nom du mois, abrégé, suivant la locale	De Jan à Dec
			%B	Nom complet du mois, suivant la locale	De January à December
			%h	Nom du mois abrégé, suivant la locale (alias de %b)	De Jan à Dec
			%m	Mois, sur 2 chiffres	De 01 (pour Janvier) à 12 (pour Décembre)
			Année	---	---
			%C	Représentation, sur 2 chiffres, du siècle (année divisée par 100, réduit à un entier)	19 pour le 20ème siècle
			%g	Représentation, sur 2 chiffres, de l'année, compatible avec les standards ISO-8601:1988 (voyez %V)	Exemple : 09 pour la semaine du 6 janvier 2009
			%G	La version complète à quatre chiffres de %g	Exemple : 2009 pour la semaine du 3 janvier 2009
			%y	L'année, sur 2 chiffres	Exemple : 09 pour 2009, 79 pour 1979
			%Y	L'année, sur 4 chiffres	Exemple : 2038
			Heure	---	---
			%H	L'heure, sur 2 chiffres, au format 24 heures	De 00 à 23
			%k	L'heure au format 24 heures, avec un espace précédant un seul chiffre	De 0 à 23
			%I	Heure, sur 2 chiffres, au format 12 heures	De 01 à 12
			%l ('L' minuscule)	Heure, au format 12 heures, avec un espace précédant un seul chiffre	De 1 à 12
			%M	Minute, sur 2 chiffres	De 00 à 59
			%p	'AM' ou 'PM', en majuscule, basé sur l'heure fournie	Exemple : AM pour 00:31, PM pour 22:23
			%P	'am' ou 'pm', en minuscule, basé sur l'heure fournie	Exemple : am pour 00:31, pm pour 22:23
			%r	Identique à "%I:%M:%S %p"	Exemple : 09:34:17 PM pour 21:34:17
			%R	Identique à "%H:%M"	Exemple : 00:35 pour 12:35 AM, 16:44 pour 4:44 PM
			%S	Seconde, sur 2 chiffres	De 00 à 59
			%T	Identique à "%H:%M:%S"	Exemple : 21:34:17 pour 09:34:17 PM
			%X	Représentation de l'heure, basée sur la locale, sans la date	Exemple : 03:59:16 ou 15:59:16
			%z	Le décalage horaire. Non implémenté tel que décrit sous Windows. Voir plus bas pour plus d'informations.	Exemple : -0500 pour l'heure US de l'est
			%Z	L'abréviation du décalage horaire. Non implémenté tel que décrit sous Windows. Voir plus bas pour plus d'informations.	Exemple : EST pour l'heure de l'Est
			L'heure et la date	---	---
			%c	Date et heure préférées, basées sur la locale	Exemple : Tue Feb 5 00:45:10 2009 pour le 5 février 2009 à 12:45:10 AM
			%D	Identique à "%m/%d/%y"	Exemple : 02/05/09 pour le 5 février 2009
			%F	Identique à "%Y-%m-%d" (utilisé habituellement par les bases de données)	Exemple : 2009-02-05 pour le 5 février 2009
			%s	Timestamp de l'époque Unix (identique à la fonction time())	Exemple : 305815200 pour le 10 septembre 1979 08:40:00 AM
			%x	Représentation préférée de la date, basée sur la locale, sans l'heure	Exemple : 02/05/09 pour le 5 février 2009
			Divers	---	---
			%n	Une nouvelle ligne ("\n")	---
			%t	Une tabulation ("\t")	---
			%%	Le caractère de pourcentage ("%")	---
*/
				echo'</br></br>';		
					
				echo '<strong>Probleme accent avec strftime</strong></br>';
			//strftime traite les données en  latin, il faut donc l'encoder en utf8 pour regler le probleme des accents
			
			echo 'nous sommes le '.utf8_encode(strftime("%A %d %B %Y")).'</br>';



				echo'</br></br>';		
					
				echo '<strong>Verification format avec checkdate</strong></br>';
				echo "tres utile pour les controle de formulaire</br></br>";		
		
		$dateL="bonjour le ";
		$$dateL="monde!";//variable dynamique affichera "bonjour le monde!"
	$date1=checkdate(12,25,2014);
	$date2=checkdate(13,31,2014);
	$date3=checkdate(12,33,2014);
	$date4=checkdate(12,30,-2014);
	
	
	if($date4){
		echo 'la date4 est valide</br>';
	}
	else{
		echo'la date4 n\'est pas valide</br>';
		}
		
	$dates=array(
		$date[0]=10,25,2014,
		$date[1]=13,31,2014,
		$date[2]=12,33,2014,
		$date[3]=12,30,-2014,
		);
		
		//$date=${'date '.$x};
		
		print_r($dates);
		$x=0;
		$y=$x+1;
		$z=$y+1;
		echo "checkdate($dates[$x],$dates[$y],$dates[$z])</br>";
		echo "la date: $dateL${$dateL} est valide</br>";
		
		//echo "la date: $$dateL est valide</br>";//variable dynamique
		//echo "la date: $dateL $dateL est valide</br>";
		//echo "la date: $dates[$x] est valide</br>";
		
		for($x=0;$x<=11;$x++){//ATTENTION AVEC LA BOUCLE FOR IL FAUT METTRE DES ; et non des, entre les arguments
		$y=$x+1;
		$z=$x+2;
			if(checkdate($dates[$x],$dates[$y],$dates[$z])){//inutile de mettre true car la variable checkdate est reconnue comme booléenne, donc if teste si elle est vraie par défaut
				echo 'la date: '.$date[$x].',';$date[$y].',';$date[$z].' est valide</br>';
				//$compte=$compte+1;
			}			
			else{
				echo "la date: $dates[$x] n'est pas valide</br>";
				}
		}
			

								echo'</br></br>';		
					
				echo '<strong>Verification format avec getdate</strong></br>';
				echo "retourne un tableau complet avec toutes les données depuis un timestamps</br></br>";		


								echo '<pre>';
								echo'</br></br>';
		print_r(getdate());
								echo'</br></br>'; 
		print_r(getdate(1502630001));//valeur en s depuis la date de reference timestamps du 1janvier1970 du 13 aout 2017 au 1janv1970 on a 1502636251 secondes
								echo '</pre>';
								echo'</br></br>';

		echo ' depuis aujourd\'hui le timestamps est: '.time().'s il s\'est donc écoulé <strong>'.time().'</strong> secondes';//affiche les secondes depuis le timestamps

								echo'</br></br>';



			echo'</br></br>';		
					
				echo '<strong>les constantes en PHP</strong></br>';
				echo "identifieur ou identifiant</br></br>";		

//elle commence toujours par une lettre ou par un underscore"_"
				define("maconstante","franck");
				echo maconstante.'</br>';
				
				$a="Bonjour";//ici comme on est pas dans une fonction, cette constante est donc globale, on n peut donc pas y acceder dans une fonction sans la transformer
				
				define("NOMBRE",4);
				function portee(){
					echo $a;//ne sera pas affiché car défini en mode global et non dans la fonction
					echo NOMBRE;
					echo'</br>';
					$b=36;
					echo $b;
								}
				portee();
		
				echo'</br></br>';
				echo '<strong>les constantes magiques en PHP</strong></br>';
				echo "8 sont importantes. Leur nom est insensible à la case mais par convention on les mets en MAjuscules</br></br>";	
		
		
	//	__FILE__//contient le nom du fichier et son chemin
	//	__DIR__//donne le nom du dossier
	//	__FUNCTION__//affiche le nom de la fonction de la constante appelée
	//	__LINE__//affiche le numero de la ligne constante appelée
	//	__CLASS__
	//__METHODE__
	//__NAMESPACE__
		
		
		echo __LINE__.'</br>';
		echo __DIR__.'</br>';
		echo __FILE__.'</br>';
		
		function PP(){
			echo __FUNCTION__.'</br>';
		}
		
		echo'</br></br>';
		
		
		
				echo '<strong>les formulaires en PHP</strong></br>';
				echo "il faut aller voir ma feuille formulaire.PHP</br></br>";	
		//il nous faut pour cela creer une page target qui permettra de tester les données saisies
		 // un formulaire est une entrée pour les hakers pour injecter du code en javasript par ex pour recuperer les cookies
		//il faut donc securiser au maximum les entrées
		echo"</pre>";
	?>
		<form method="POST" action="target.php"><!--la feuille formulaire va interagir avec la feuille target dans laquelle se trouvent les données saisies dna sle formulaire.-->
	<p>Les variables <strong>$_POST['nom']</strong> et<strong> $_POST['age']</strong> sont automatiquement créées par PHP.<br> La variable <strong>$_SERVER</strong>,est une superglobale.<br> Maintenant, nous avons introduit une autre superglobale <strong>$_POST</strong> qui <br> contient toutes les données envoyées par la méthode POST.<br> Notez que dans notre formulaire, nous avons choisi la méthode POST.<br> Si vous avions utilisé la méthode <strong>GET</strong> alors notre formulaire aurait placé ces informations dans la variable <strong>$_GET</strong>, <br> une autre superglobale.<br> Vous pouvez aussi utiliser la variable <strong>$_REQUEST</strong>,<br> si vous ne souhaitez pas vous embarrasser de la méthode utilisée. <br>Elle contient un mélange des données de GET, POST, COOKIE et FILE.<br></p>
		
		<p>
			<label for = "prenom1">entrez votre prénom1 : </label><!--zone titre du formulaire-->
			
			<input type="text" name="prenom1" id="prenom1"/><!--zone de saisie du formulaire-->
		
		
		
			<label for = "prenom2">entrez votre prénom2 : </label><!--zone titre du formulaire-->
			
			<input type="text" name="prenom2" size="20" maxlength="15" id="prenom2"/><!--zone de saisie du formulaire-->
				
		
			<label for = "nom">entrez votre nom : </label><!--zone titre du formulaire-->
			
			<input type="text" name="nom" size="20" maxlength="15" id="nom"/><!--zone de saisie du formulaire-->
		
			<label for = "pseudo">entrez votre pseudo : </label><!--zone titre du formulaire-->
			
			<input type="text" name="pseudo"size="20" maxlength="15" id="pseudo"/><!--zone de saisie du formulaire-->
		
		<input type="submit" value="envoyer"> <!--bouton envoyer du formulaire-->
		</p>
		<p>
		<div id="saisieFormulaire">...</div><!--création d'une ancre-->
		
		
		</p>
		
		
		
		
		
		
		
		
		</form>
		
		
		
	<?php	
		
				echo '<strong>les instructions </br>include</strong></br>';
				echo "permet d'inclure un fichier</br></br>";	
		//creation d'une page à inclure dans le meme repertoire "fichier-inclus-dans-FormationPHP.php"
		
		include"fichier-inclus-dans-FormationPHP.php";
		echo"la feuille est bien incluse dans mon fichier";
		
				echo '<strong></br>require</strong></br>';
				echo "permet d'inclure un fichier comme include sauf qu'avec require si le fichier n'est pas present le programme renvoie un erreur fatale et il stoppera</br></br>";	
		
		require"fichier-inclus-dans-FormationPHP.php";
		echo"la feuille est bien incluse dans mon fichier";//si le fichier n'est pas present le programme stoppera
		include"fichier-inclus-dans-Formati.php";
		echo"la feuille est bien incluse dans mon fichier";//malgré l'erreur de fichier le echo s'affiche
		//require"fichier-inclus-dans-Formati.php";
		//echo"la feuille est bien incluse dans mon fichier";//avec l'erreur de fichier l'echo ne s'affiche pas
		
		
				echo '<strong>Opération sur les fichiers </br>fopen</strong></br>';
				echo "  pour ouvrir un fichier </br></br>";	
		
		
			$definition=fopen('definitionPHP.php',"r+");//ouvre le fichier en mode r+, quand on ouvre un fichier avec fopen, la fonction va renvoyer une information et on va toujours la stocker dans une variable. ,Pour le moment ce fichier s'ouvre mais on a aps encore demandé à l'afficher
		
		
		
?>
<strong>r</strong>	Ouvre en lecture seule, et place le pointeur de fichier au début du fichier.<br>
<strong>r+</strong>	Ouvre en lecture et écriture, et place le pointeur de fichier au début du fichier.<br>
<strong>w</strong>	Ouvre en écriture seule ; place le pointeur de fichier au début du fichier et réduit la taille du fichier à 0. <br>Si le fichier n'existe pas, on tente de le créer.<br>
<strong>w+</strong>	Ouvre en lecture et écriture ; place le pointeur de fichier <br>au début du fichier et réduit la taille du fichier à 0. Si le fichier n'existe pas, on tente de le créer.<br>
<strong>a</strong>	Ouvre en écriture seule ; place le pointeur de fichier à la fin du fichier. <br>Si le fichier n'existe pas, on tente de le créer. <br>Dans ce mode, la fonction fseek() n'a aucun effet, les écritures surviennent toujours.<br>
<strong>a+</strong>	Ouvre en lecture et écriture ; place le pointeur de fichier à la fin du fichier.<br> Si le fichier n'existe pas, on tente de le créer.<br> Dans ce mode, la fonction fseek() n'affecte que la position de lecture, les écritures surviennent toujours.<br>
<strong>x</strong>	Crée et ouvre le fichier en écriture seulement ;<br> place le pointeur de fichier au début du fichier. <br>Si le fichier existe déjà, fopen() va échouer, en retournant FALSE et en générant une erreur de niveau E_WARNING.<br> Si le fichier n'existe pas, fopen() tente de le créer.<br> Ce mode est l'équivalent des options O_EXCL|O_CREAT pour l'appel système open(2) sous-jacent.<br>
<strong>x+</strong>	Crée et ouvre le fichier pour lecture et écriture; le comportement est le même que pour x.<br>
<strong>c</strong>	Ouvre le fichier pour écriture seulement. <br>Si le fichier n'existe pas, il sera crée, s'il existe, il n'est pas tronqué<br> (contrairement à w) et l'appel à la fonction n'échoue pas (comme dans le cas de x).<br> Le pointeur du fichier est positionné au début.<br> Ce mode peut être utile pour obtenir un verrou<br> (voyez flock()) avant de tenter de modifier le fichier, utiliser w pourrait tronquer le fichier avant<br> d'obtenir le verrou (vous pouvez toujours tronquer grâce à ftruncate()).<br>
<strong>c+</strong>	Ouvre le fichier pour lecture et écriture, <br>le comportement est le même que pour le mode c.<br><br>

<?php


				echo '</br><strong>Opération sur les fichiers </br>fopen</strong></br>';
				echo " pour fermer un fichier  </br></br>";	

			fclose($definition);
			
			
				echo '</br><strong>Opération sur les fichiers </br> fgets</strong></br>';
				echo " pour afficher un fichier avant il faut l'ouvrir </br></br>";	
				
			$definition=fopen('definitionPHP.php',"r+");
			$affichagedef=fread($definition,1000);//afficher le
//			fichier avec un nombre de bit max (ici 1000), sans valeur il le lit jusqu'à la fin. 
//Là aussi la fonction va renvoyer une information et on va toujours la stocker dans une variable.
			echo $affichagedef;
			fclose($definition);
			
				echo '</br></br><strong>Opération sur les fichiers </br> fgets et feof</strong></br>';
				echo " Pour afficher un fichier, fgets lit le fichier ligne par ligne. Feof donne la fin du fichier </br></br>";		
				
			// si le fichier est gros et à plusieurs ligne on peut utiliser fgets
			// fgets lit le fichier ligne par ligne
			// il faudra faire une boucle ou une condition pour lire 
			// toutes les lignes avec feof //(end of the file)
			
			$definition2=fopen('definitionWIFI.txt',"r+");
			echo '</br><strong>avec fgets sur 1 ligne ne fonctionne
			pas sur certaines formes de fichiers en php</br></strong>';
			echo fgets($definition2,1000);
			$affichagedef2=fgets($definition2,1000);
			echo fgets($definition2,100);
			echo '</br><strong>avec fgets sur 1 ligne</strong></br>';
		
			echo $affichagedef2;
			fclose($definition2);						
			echo'</br><strong>boucle pour lire toutes les lignes</strong></br>';	
			$definition=fopen('definitionPHP.php',"r+");
			while(!feof($definition)){//tant que la fin n'est pas atteinte 
			// donc teste false avec le !, on fait un fgets, donc on va afficher ligne apres ligne.
			echo fgets($definition,100);
			}			
		
			fclose($definition);				
			
			
			/*
			r/r+ pointe au debut du fichier			
			a/a+ pointe à la fin du fichier
			w/w+ pointe au debut du fichier
			fgets() pointe à la fin de la ligne lue
			fgetc() le curseur se place au niveau du caractere suivant	
			*/			
			
			echo '</br><strong>ecriture dans des fichiers</br></strong>';
			
			
			$definition=fopen('definitionWIFI.txt',"r+");
			echo fseek($definition,5);//change le position du curseur,
//			lle 2éme argument est la nouvelle position du curseur en bit
			/*
			Attention il faut etre sur que les dossiers dans lesqules
			on travaille nous donnent tous les priviléges pour pourvoir faire les modifs
			il faudra rentrer 777 dans le fichier shmode 
			modifier le shmode a 7 correspond à tous les priviléges 
			et ceux pour tout le monde, les priviléges vont de 0 à 7, et il y a 3 destinataires: propriétaire,
				groupe
				reste du monde
			
			*/
			
			
			echo '</br><strong>fwrite</br></strong>';
			echo "  ecriture dans un fichier</br></br>";		
			
			$definition=fopen('definitionWIFI.html',"r+");
			fseek($definition,40);//avec fseek on deplace le curseur 
			// du nombre de bit afin d'ecrire à l'interieur du fichier
			fwrite($definition,"<strong>je veux rajouter ce texte à l'interieur du fichier en l'ouvrant avec r+</strong></br>");//rajoute le texte dans le fichier 
			//destinataire.L'endroit est défini par le mode d'ouverture
			// echo fgets($definition,1000);
			// $affichagedef=fgets($definition,1000);
			// echo fgets($definition,100);
			fclose($definition);
			
			$definition=fopen('definitionWIFI.html',"a+");
			// du nombre de bit afin d'ecrire à l'interieur du fichier
			fwrite($definition,"<strong>je veux rajouter ce texte à la fin du fichier en l'ouvrant avec a+</strong></br>");//rajoute le texte dans le fichier 
			//destinataire.L'endroit est défini par le mode d'ouverture
			fclose($definition);
			
			$definition2=fopen('definitionWIFI.txt',"r+");
			fseek($definition2,100);//avec fseek on deplace le curseur 
			// du nombre de bit afin d'ecrire à l'interieur du fichier
			fwrite($definition2,"<strong>je veux rajouter ce texte à l'interieur du fichier en l'ouvrant avec r+ et en rajoutant fseek</strong></br>");
			//rajoute le texte dans le fichier 
			//destinataire.L'endroit est défini par le mode d'ouverture
			fclose($definition2);
			//pour tester ces fonctions il faut recharger le fichier
			// pour voir apparaite les modifs
			
			
			echo '</br></br><strong>Variables super Globales</strong></br>';
			
			// les variables peuvent etre globales ou locales(définie à l'interieur d'une fonction).
			// Une  variable locale ne sera pas accessible en global et reciproquement

			
			// define("maconstante","franck");
				echo maconstante.'</br>';
				
				$a="Bonjour";//ici comme on est pas dans une fonction, cette constante est donc globale, on n peut donc pas y acceder dans une fonction sans la transformer
				$nombre1=6;
				define("NOMBRE1",4);
				function portee2(){
					echo $a;//ne sera pas affiché car défini en mode global et non dans la fonction
					echo $nombre1;//ne sera pas affiché car défini en mode global et non dans la fonction
					echo NOMBRE1;
					echo'</br>';
					$b=36;
					echo $b;
								}
			echo'</br>début affichage de la fonction portee2</br>';
			portee2();
			echo'</br>fin affichage de la fonction portee2</br>';
					echo $a;
					echo '</br>';
					echo $nombre1;
					echo '</br>';
					echo NOMBRE1;
			 
			
	//	__FILE__//contient le nom du fichier et son chemin
	//	__DIR__//donne le nom du dossier
	//	__FUNCTION__//affiche le nom de la fonction de la constante appelée
	//	__LINE__//affiche le numero de la ligne constante appelée
	//	__CLASS__
	//__METHODE__
	//__NAMESPACE__
			
		// il y a 9 variables superglobale, elles sont créées automatiquement	par php
			// $GLOBALS
			// $_GET pour collecter des infos apres la soumission d'un formulaire apres la methode get
			// $_POST pour collecter des infos apres la soumission d'un formulaire apres la methode post
			// $_REQUEST recollete des infos apres l'envoi d'un formulaire
			// $_SERVER
			// $__COOKIE
			// $_FILES permet d'avoir des infos sur des fichiers telechargé
			// $_SESSION
			// $_ENV variable de type tableau qui contient des infos sur notre environnement de travail PHP
			
			echo '</br></br><strong>$GLOBALS</strong></br>';
			
			$x=10;
			$y=20;
			
			function Multigloba(){
				$GLOBALS["z"]= $GLOBALS["x"]*$GLOBALS["y"];
				//on utilise $global pour utliser les variables globales x et y en local dans une fonction
			}
			Multigloba();
			//on utlise la fonction crées en local pour utiliser les vairables locales en mode global
			echo $z;
			//cest une variable tableau, la clé du tableau est l'index de la variable
			//c'est néammoins assez lourd à utiliser dan sun programme
			
			
			
			echo '</br></br><strong>$_SERVER</strong></br>';
			
			//nom du serveur, adresse IP
			echo $_SERVER ['SERVER_NAME'] . '</br>';
			//nom du serveur, ici localhost car on travaille en local.
			echo $_SERVER ['PHP_SELF'] . '</br>';
			//Le nom du fichier du script en cours d'exécution, par rapport à la racine web et ceux par rapport à la racine
			echo $_SERVER ['SERVER_ADDR'] . '</br>';
			// L'adresse IP du serveur sous lequel le script courant est en train d'être exécuté.127.0.0.1 pour l'IPV4 et ::1 pour un ipv6
			echo $_SERVER ['SCRIPT_NAME'] . '</br>';
			// Le nom du serveur hôte qui exécute le script suivant.
			// Si le script est exécuté sur un hôte virtuel, ce sera la valeur définie pour cet hôte virtuel.
			echo $_SERVER ['HTTP_HOST'] . '</br>';//Donne le port du server
			// echo $_SERVER [''] . '</br>';
			echo $_SERVER ['SCRIPT_FILENAME'] . '</br>';
			
			
			
			// 'GATEWAY_INTERFACE'
			// Numéro de révision de l'interface CGI du serveur : i.e. 'CGI/1.1'.
			// 'SERVER_SOFTWARE'
			// Chaîne d'identification du serveur, qui est donnée dans les en-têtes lors de la réponse aux requêtes.
			// 'SERVER_PROTOCOL'
			// Nom et révision du protocole de communication : i.e. 'HTTP/1.0';
			// 'REQUEST_METHOD'
			// Méthode de requête utilisée pour accéder à la page; i.e. 'GET', 'HEAD', 'POST', 'PUT'.
			
						// 'REQUEST_METHOD'
			// Méthode de requête utilisée pour accéder à la page; i.e. 'GET', 'HEAD', 'POST', 'PUT'.
			// Note:
			// Le script PHP se termine après avoir envoyé 
			// les en-têtes (c'est à dire après avoir produit n'importe quelle 
			// sortie sans bufferisation de sortie) si la méthode de la requête était HEAD.
			// 'REQUEST_TIME'
			// Le temps Unix du début de la requête. Disponible depuis PHP 5.1.0.
			// 'REQUEST_TIME_FLOAT'
			// Le timestamp du début de la requête, avec une 
			// précision à la microseconde. Disponible depuis PHP 5.4.0.
			// 'QUERY_STRING'
			// La chaîne de requête, si elle existe, qui est utilisée
			// pour accéder à la page.
			// 'DOCUMENT_ROOT'
			// La racine sous laquelle le script courant est exécuté,
			// comme défini dans la configuration du serveur.
			// 'HTTP_ACCEPT'
			// Contenu de l'en-tête Accept: de la requête courante, 
			// s'il y en a une.
			// 'HTTP_ACCEPT_CHARSET'
			// Contenu de l'en-tête Accept-Charset: de la requête courante, 
			// si elle existe. Par exemple : 'iso-8859-1,*,utf-8'.
			// 'HTTP_ACCEPT_ENCODING'
			// Contenu de l'en-tête Accept-Encoding: de la requête courante, 
			// si elle existe. Par exemple : 'gzip'.
			// 'HTTP_ACCEPT_LANGUAGE'
			// Contenu de l'en-tête Accept-Language: de la requête courante,
			// si elle existe. Par exemple : 'fr'.
			// 'HTTP_CONNECTION'
			// Contenu de l'en-tête Connection: de la requête courante,
			// si elle existe. Par exemple : 'Keep-Alive'.
			// 'HTTP_HOST'
			// Contenu de l'en-tête Host: de la requête courante, si elle existe.
			// 'HTTP_REFERER'
			// L'adresse de la page (si elle existe) qui a conduit le
			// client à la page courante. Cette valeur est affectée par 
			// le client, et tous les clients ne le font pas. Certains
			// navigateurs permettent même de modifier la valeur 
			// de HTTP_REFERER, sous forme de fonctionnalité. 
			// En bref, ce n'est pas une valeur de confiance.
			// 'HTTP_USER_AGENT'
			// Contenu de l'en-tête User_Agent: de la requête courante, si elle existe. 
			// C'est une chaîne qui décrit le client HTML utilisé pour voir la page courante.
			// Par exemple : Mozilla/4.5 [en] (X11; U; Linux 2.2.9 i586). 
			// Entre autres choses, vous pouvez utiliser cette valeur 
			// avec get_browser() pour optimiser votre page en fonction des capacités du client.
			// 'HTTPS'
			// Défini à une valeur non-vide si le script a été appelé via le protocole HTTPS.
			// Note: Noter que lors de l'utilisation de ISAPI avec
			// IIS, la valeur sera off si la demande n'a pas été faite via le protocole HTTPS.
			// 'REMOTE_ADDR'
			// L'adresse IP du client qui demande la page courante.
			// 'REMOTE_HOST'
			// Le nom de l'hôte qui lit le script courant. 
			// La résolution DNS inverse est basée sur la valeur de REMOTE_ADDR.
			// Note: Votre serveur web doit être configuré pour
			// créer cette variable. Par exemple, pour Apache, 
			// vous devez ajouter la directive HostnameLookups
			// On dans le fichier httpd.conf, pour que cette variable existe. 
			// Voyez aussi gethostbyaddr().
			// 'REMOTE_PORT'
			// Le port utilisé par la machine cliente pour communiquer avec le serveur web.
			// 'REMOTE_USER'
			// L'utilisateur authentifié.
			// 'REDIRECT_REMOTE_USER'
			// L'utilisateur authentifié si la requête a été redirigée en interne.
			// 'SCRIPT_FILENAME'
			// Le chemin absolu vers le fichier contenant le script 
			// en cours d'exécution.

			// Note:
			// Si un script est exécuté avec le CLI, avec un chemin relatif, comme file.php ou ../file.php, $_SERVER['SCRIPT_FILENAME'] contiendra le chemin relatif spécifié par l'utilisateur.
			// 'SERVER_ADMIN'
			// La valeur donnée à la directive SERVER_ADMIN (pour Apache),
			// dans le fichier de configuration. Si le script est exécuté par un hôte virtuel, 
			// ce sera la valeur définie par l'hôte virtuel.
			// 'SERVER_PORT'
			// Le port de la machine serveur utilisé pour les communications. 
			// Par défaut, c'est "80". En utilisant SSL, par exemple, 
			// il sera remplacé par le numéro de port HTTP sécurisé.
			// Note: Avec Apache 2, vous devez définir UseCanonicalName = On,
			// mais aussi UseCanonicalPhysicalPort = On afin de récupérer
			// le port physique (réel), sinon, cette valeur pourrait être erronée
			// et pourrait retourner ou non la valeur correcte. 
			// Dans tous les cas, il n'est pas sécurisé que de faire
			// confiance en cette valeur suivant le contexte.
			// 'SERVER_SIGNATURE'
			// Chaîne contenant le numéro de version du serveur
			// et le nom d'hôte virtuel, qui sont ajoutés aux pages 
			// générées par le serveur, si cette option est activée.
			// 'PATH_TRANSLATED'
			// Chemin dans le système de fichiers (pas le document-root)
			// jusqu'au script courant, une fois que le serveur a fait une traduction chemin virtuel -> réel.
			// Note: Depuis PHP 4.3.2, la variable PATH_TRANSLATED
			// n'est plus seulement définie implicitement sous Apache 2
			// SAPI contrairement à la situation sous Apache 1 où
			// elle est définie avec la même valeur que la variable 
			// serveur SCRIPT_FILENAME lorsqu'elle n'est pas fournie par Apache. 
			// Ce changement a été effectué pour être conforme aux spécifications
			// CGI qui fait que la variable PATH_TRANSLATED doit exister
			// seulement si la variable PATH_INFO est définie. 
			// Les utilisateurs d'Apache 2 devraient utiliser AcceptPathInfo = On dans leur httpd.conf pour définir PATH_INFO.
			// 'SCRIPT_NAME'
			// Contient le nom du script courant. Cela sert lorsque les pages
			// doivent s'appeler elles-mêmes. La constante __FILE__ contient
			// le chemin complet ainsi que le nom du fichier (i.e. inclut) courant.
			// 'REQUEST_URI'
			// L'URI qui a été fourni pour accéder à cette page.
			// Par exemple : '/index.html'.
			// 'PHP_AUTH_DIGEST'
			// Lorsque vous utilisez l'authentification HTTP Digest, 
			// cette variable est définie dans l'en-tête "Authorization" envoyé par le client (que vous devez donc utiliser pour réaliser la validation appropriée).
			// 'PHP_AUTH_USER'
			// Lorsque vous utilisez l'authentification HTTP, 
			// cette variable est définie à l'utilisateur fourni par l'utilisateur.
			// 'PHP_AUTH_PW'
			// Lorsque vous utilisez l'authentification HTTP, 
			// cette variable est définie au mot de passe fourni par l'utilisateur.
			// 'AUTH_TYPE'
			// Lorsque vous utilisez l'authentification HTTP, 
			// cette variable est définie au type d'identification.
			// 'PATH_INFO'
			// Contient les informations sur le nom du chemin fourni
			// par le client concernant le nom du fichier exécutant le script courant,
			// sans la chaîne relative à la requête si elle existe. Actuellement,
			// si le script courant est exécuté via
			// l'URL http://www.example.com/php/path_info.php/some/stuff?foo=bar, 
			// alors la variable $_SERVER['PATH_INFO'] contiendra /some/stuff.
			// 'ORIG_PATH_INFO'
			// Version orignale de 'PATH_INFO' avant d'être analysée par PHP.
			
			
			
				echo '</br></br><strong>$_COOKIE</strong></br>';
			
				echo "</br></br><strong>recueille les infos apres l'envoi d'un formulaire</strong></br>";
			
	// $__COOKIE petit fichier stocké sur le pc d'un client contient en general une seule info comme un  
	// pseudo ou un mot de passe, il a une accessibilité limitée dans le temps. 
	// pour le creer on utilise setcookie(), setcookie() à besoin de 2 des  7 parametres suivants  pour fonctionnner:
	// 1 nom du cookie
	// 2 valeur de notre cookies
	// 3 date d'expiration du cookie par rapport à la timestamps par ex pour 1h(3600s) ou fait time()+3600, 
	// 4 le chemin du cookie, pour qu'il soit accessible partout sur le site on met un /
	// 5 domaine ou sous-domaine où le cookie sera accessible, pour qu'il soit ccessible sur tout le site on met le nom du site 
	// 6 dire si le cookie est  accessible par https ou non
	// 7http only bloque ou non l'accessibilité au script apr dun javscript par exemple
	// plutot mettre sur true afin d'eviter des attaques
			
			
			
			$nom_cookie="utilisateur";
			$valeur_cookie="franck";
			setcookie($nom_cookie,$valeur_cookie,time()+7200+3600,"/","h2gementoring.com",false,true);
			//comme nous sommes en heure d'ete il faut rajouter 2h pour avoir l'heure UNIX réelle
			echo $_COOKIE["utilisateur"];
			
			$nom_cookie_2="test2";
			$valeur_cookie_2="ceci est un test de cookie";
			setcookie($nom_cookie_2,$valeur_cookie_2);
			
			
			echo $_COOKIE["test2"];
			
			// pour supprimer le cookie on peut mettre une valeur de temsp passée, par ex time()-3600, le cookie sera supprimée.
			setcookie($nom_cookie,$valeur_cookie,time()+7200-3600);
			
			//!!!!!!!!!!!!!!il faut FORCEMENT INITIALISER LES COOKIES
			// ET LES SESSIONS AVANT TOUT CODE HTML.
			// DONC TOUT EN HAUT DE LA PAGE AVANT  MEME LE <!DOCTYPE html>
			// Ce code est donc déplacé en haut de la page
			
			
			
			
						
			
			
			echo '</br></br><strong>$_SESSION</strong></br>';
			// session_start();
			//!!!!!!!!!!!!!!il faut FORCEMENT INITIALISER LES COOKIES
			// ET LES SESSIONS AVANT TOUT CODE HTML.
			// DONC TOUT EN HAUT DE LA PAGE AVANT  MEME LE <!DOCTYPE html>
			// Ce code est donc déplacé en haut de la page
			//pour lancer une session
			// session_destroy();
			
			//autre bon moyen de conserver et de transmettre ou transferer des informations de page en page, 
			// elle ne sont pas stockées sur l'ordinateur de l'utilisateur à l'inverse des cookies,
			// pour les conserver il faut lesmettre dans une base de donnée
			//permet par ex de stocker mot de passe et user d'un utlisateur, lui évitant de tout ressaisir
			//php va créer une cle unique à chaque nouveau visiteur, c'est cette clé qui sera réutilisée pour reconnaitre le visiteur
			// PHP fermera totu seul la session apres un certain temps, ou bien on peut utiliser session_destroy();
			
			// $_SESSION["prenom"]='franck';
			// $_SESSION["age"]='50';
			// $_SESSION["sport"]='palm';
			
			// session possede plusieurs index qui seront entrés par l'utilisateur
			// les valeur seront disponible sur toutes les pages sur lesquelles la session à ete demaréé
			
			
			
			
			echo '</br></br><strong>Programmation orientée objet POO</strong></br>';
			
			
			
			
// Il y a 2 manieres de coder:
	// A) procédural 
			// methode classique linéaire de haut en bas
	// B)  orienté objet POO
		// code plus clair et non linéaire	
		// une classe contient un ensemble de fonctions et de variables,
		 // on crée des objets à partir de la classe on dit instancie la classe , 
		 // ou que l'objet est une instance de la classe. La classe est le moule,
		 // l'objet le gateau, on peut faire autant de gateaux que l'on 
		 // veut à partir d'un moule donc d'une classe.		
			
			
			
			echo '</br></br><strong>classe visiteurs</strong></br>';
			
			
			// pour coder en POO
			// par convention on utilise un nouveau fichier pour chaque classe
			
			// voir mes fichiers: 
			// visiteurs.php
			// visiteur.class.php
			// femme.class.php
			
?>			
				<p> les classes <br><a href="visiteur.php" target="_blank">visiteur.php</a></p>
		<p> les classes <br><a href="visiteur.class.php" target="_blank">visiteur.class.php</a></p>
		<p> les classes <br><a href="femme.class.php" target="_blank">femme.class.php</a></p>	
		
			
<?php			
			
			echo '</br></br><strong>gestion des erreurs et des exceptions en PHP liées aux erreurs</strong></br>';
			
			
			
			echo '</br></br><strong>gestion des erreurs </strong></br>';
			
			// on peut soit creer un script autour de die soit creer une foncton personnnalisée
			

//hypo: on veut ouvrir un fichier qui n'existe pas en mode  r 
			
			if(!file_exists("fichierInconnu.txt")){
			//	die("fichier non trouvé");
				//!!!AVEC DIE LE PROGRAMME STOP ET N EXUTE PAS LA SUITE
				// echo "fichier inconnu";
		
		//ci dessous tentative pour sortir du die()
									// if($_GET['reboot'] == 1){
									   // $reboot = system("relanceServeurApresErreurFatal.bat", $logs);
									   // if($reboot == FALSE){
										  // echo "Erreur, serveur non reboot";
									   // }
									   // else{
										  // echo "Serveur reboot<br /><br />";
										  // echo $logs."<br /><br />";
									   // }
									// }
								// <a href="?reboot=1"><input type="button" value="Reboot Wamp"></a>
		
		
			}
			else{
				$fichier=fopen("fichierInconnu.txt","r");
			}
			
// parfois arreter le programme n'est pas la meilleure solution, il est donc preferable de 
// faire une fonction avec 2 arguments au moins, le niveau de l'erreur (voir les 
// differents niveaux d'erreurs) et le type d'erreur , on peut rajouter aussi , le nom du  fichier 
// contenant l'erreur, la ligne, le contexte
			
		
			echo '</br></br><strong>exceptions en PHP liées aux erreurs</strong></br>';
			
			
			// permettent de modifier un script en fonction des erreurs
			
			// en cas d'erreur le script stoppera
			// la gestion des exceptions se fait en 3 blocs soit 3 temps:
				
			// bloc try: teste si  la fonction déclenche un exception
			// bloc throw: lancer l'exception si elle doit etre lancée
			// bloc catch:  attrapper on récupere l'exception si   celle-ci a ete lancée
			
			
			
			function Division($x,$y){
				if($y==0){
					//si y=0 on crée un objet appartient à la classe exception avec new exception
					throw new Exception("Division par 0 impossible,  c'est le message  throw de l'exception");
					//throw va se charger de lancer l'exception si une erreur est apparue
				}
				
				return $x/$y;
				// on utilse ici return et non echo pour aficher la division car on a besoin de garder le resultat de l'operation
			}
				try{
					// verifie si un erreur est apparue, on teste differentes possbilités
					echo Division(2,4).'<br/>';
					echo Division(2,0).'<br/>';
					echo Division(0,4).'<br/>';//ce test ne sera pas effectué car php s'arrete à la premiere erreur
				}
				
				catch(Exception $e){
					//on donne $e comme nom a l'objet crée par  catch
					//catch attrappe l'exception si jamais elle existe
					echo 'message d\'erreur lié à un test try :' .$e->getMessage().'<br/>';
					echo ' à la ligne: '.$e->getLine().'<br/>' ;
					//getmessage renvoie le message d'erreur
					//l'objet crée
				}
				
				function Division2($x,$y){
				if($x/$y==NULL){
					//si y=0 on crée un objet appartient à la classe exception avec new exception
					throw new Exception("Le resultat de la Division2 rencontre une erreur ,  c'est le message  throw de l'exception");
					//throw va se charger de lancer l'exception si une erreur est apparue
				}
				
				return $x/$y;
				// on utilse ici return et non echo pour aficher la division car on a besoin de garder le resultat de l'operation
			}
				try{
					// verifie si un erreur est apparue, on teste differentes possbilités
					echo Division2(2,4).'<br/>';
					echo Division2(2,0).'<br/>';
					echo Division2(0,4).'<br/>';//ce test ne sera pas effectué car php s'arrete à la premiere erreur
				}
				
				catch(Exception $e){
					//on donne $e comme nom a l'objet crée par  catch
					//catch attrappe l'exception si jamais elle existe
					echo 'message d\'erreur lié à un test try :' .$e->getMessage().'<br/>';
					echo ' à la ligne: '.$e->getLine().'<br/>' ;
					//getmessage renvoie le message d'erreur
					//l'objet crée
				}
			
			
			
			
			echo '</br></br><strong>decouverte de mySQL, phpMyAdmin et les BDD</strong></br>';
			
			
			// une BDD permet de stocker des donnes de maniere définitive, les info sont triées et organisée
			// le systeme de gestion des BDD est ici mySQL on peut le faire aussi avec oracle ou postgreySQL. 
			// Les BDD reposent sur le SQL, il faut donc coder en SQL, via le PHP on va faire une connexion avec mySQL. 
			// On va ecrire des ordres en SQL pour le mySQL, et on va envoyer ces ordres par l'intermediaire du PHP.
			// Il y a 2 manieres d'inter agir soit directement avec PHP soit avec	phpMyAdmin permettra qui a deja ensemble de pages pré-codées 
			
			// on va ouvrir wamp en allat à l'adresse 
			echo '</br></br><strong> on va ouvrir wamp en allat à l\'adresse </strong></br>';
			
?>			
				<p> lien pour aller à mySQL et phpMyAdmin <br><a href="http://localhost:8888/" target="_blank">WAMP host mySQL et phpMyAdmin</a></p>
		
		
<?php	
			
			
			echo '</br></br><strong> phpMyAdmin </strong></br>';
			
			// pour ce connecter à PhpMyAdmin:
			// le user est :root
			// le mot de passe est vide
			
			// on va dans base de données et créer une nouvelle base
			// on creer une nouvelle table de nom "users" avec 4 colonnes
			// ensuiite s'affiche une page, les lignes correspondent en fait aux colonnes de la BDD
			// dans nom on entre le nom des colonnes:
								// id
								// nom
								// prenom
								// mail
			 // dans type on utiilse en general que les 4 premiers:
								// INT pour des entiers
								 // VARCHA pour des textes courts
								 // DATE pour des stocker des dates
								 // TEXT pour des textes longs
			
			// taille valeur on peut limiter la taille ici de  150 a 50 suffisent largement pour nos types d'entrées
			// ensuite on va directement à
			// index 
					//primary pour que entrée de la table soit unique normalement on ne met qu'une 
					// seule  colonne en primary ou unique, en general on l'utilise pour l'ID, 
			// on coche A_I pour auto-incrementer les entrées, on ne le fait que pour l'entrée primary en general
			// ensuite on sauvegarde
			// on revient au menu
			// on clique sur notre base de donnée et on clique sur insert ou inserer des noms
			// retour à l'affichage pour verifier que les id se sont créées automatiquement.
			// l'onglet SQL nous permettra d'entrer le code des requetes pour les actions que l'on 
			// souhaite sur la BDD, comme selectionner des donnes ou en inserer
			// l'onglet query est un fichier d'aide avec des requetes toutes pretes
		
		
		echo '</br></br><strong> connexion avec mySQL </strong></br>';
		
			// pour etablir une connection avec mySQL il y a
			// 2 possibilités soit avec mySQLi soit avec PDO, le mieux est d'utiliser le PDO car plus polyvalent. Pdo est orienté objet donc POO
			//verifier que l'extension PDO ou mySQLi est bien installée
			// il faut 4 infosl
			// le nom de l'hote: localhost
			// le nom  de la base:manddtest
			// notre nom d'utilisateur: root
			// notre mot de passe: rien ou root sur mac
			
	?>		<p> les classes et les  base de données<br><a href="BDD.php" target="_blank">mabddtest.php</a></p>	
			<p> base de données <br><a href="BDD.php" target="_blank">bdd.php</a></p>	
			<p> base de données2 <br><a href="BDD2.php" target="_blank">bdd2.php</a></p>	
			<p> base de données2 <br><a href="function_crea_BDD.php" target="_blank">function_crea_BDD.php</a></p>	
			<p> base de données2 <br><a href="function_modif_BDD.php" target="_blank">function_modifBDD.php</a></p>	
			<p> base de données2 <br><a href="function_supp_BDD.php" target="_blank">function_supp_BDD.php</a></p>	
			<p> base de données2 <br><a href="jointure_BDD.php" target="_blank">jointure_BDD.php</a></p>	
			<p> base de données2 <br><a href="fonctions_BDD.php" target="_blank">fonctions_BDD.php</a></p>
			<p> base de données2 <br><a href="compil_fonctions_BDD.php" target="_blank">compil_fonctions_BDD.php</a></p>	
			
			
			
			
			
	<?php
	
			
					echo '</br></br><strong> les fonctions BDD sous mySQL </strong></br>';
			
			
			
			
			// fonctions d'agregart
			// vont retourner une seule valeur à partir de plusieurs colonnes
// AVG pour un calcul de moyenne
			// et fonctions scalaires
			// vont travailler sur chaque champ et donc renvoyer autant de resultats que de champs
			
			
			
			
			
?>	























		
		
		
		
		
		

		
	
	</body>



</html>>