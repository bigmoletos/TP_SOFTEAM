<!DOCTYPE html>
<html>
	<head>
		<title>les expressions réguliéres</title>
		
		<meta charset="utf-8"/>
	</head>	
	<body>
		
<p><br><strong>les expressions réguliéres de type Regex test</strong><br><br></p>		
		
<?php
// les regex sont une maniere de controler des données envoyer par les users et de faire toutes sorte de remplacement dans des chaines de caractéres. C'est un langage en soit, qui n'appartient pas à PHP.
// 2 types de regex les  Posix et les PCRE, le posix est abandonné depuis php5.3
///////////////////
// recherche d'une epxression dans une chain 
///////////////////
// les délimiteurs sont n'importe quels caracteres on va prendre//
// on va prendre les caractéres et les mettre dans une variable 
//!!!!!attention regex est sensible à la casse


		$r="j'apprends à coder";
		$regex="à";
		$regex4="coder";
		$regex2="coDer";
		$regex3="co";
	///////////////	
		if(preg_match("/$regex/",$r)){
			echo 'l\'expression "'.$regex.'" à bien été trouvée<br/>';
		}
		else{
			echo 'expression "'.$regex.'" non trouvée<br/>';
		}
	
	///////////////
		if(preg_match("/$regex4/",$r)){
			echo 'l\'expression "'.$regex4.'" à bien été trouvée<br/>';
		}
		else{
			echo 'expression "'.$regex4.'" non trouvée<br/>';
		}
	//////////////
	
		if(preg_match("/$regex2/",$r)){
			echo 'l\'expression "'.$regex2.'" à bien été trouvée<br/>';
		}
		else{
			echo 'expression "'.$regex2.'" non trouvée<br/>';
			
		}
	//////////////////	
// regex insensible à la casse il faut rajouter "i" apres le delimiteur	 if(preg_match("/$regex3/i",$r)){
////////////////////////

	$regex3="CoDer";
		if(preg_match("/$regex3/i",$r)){
			echo 'l\'expression "'.$regex3.'" à bien été trouvée<br/>';
		}
		else{
			echo 'expression "'.$regex3.'" non trouvée<br/>';
		}
	//////////////////	
// Pour faire une recherche uniquement au début de la chaine il faut rajouter  ^avant la variable $regex delimiteur	 ("/^$regex3/i",$r)

////////////////////////
		$regex3="CoDer";
		if(preg_match("/^$regex3/i",$r)){
			echo 'l\'expression "'.$regex3.'" à bien été trouvée<br/>';
		}
		else{
			echo 'expression "'.$regex3.'" non trouvée<br/>';
		}
		
	///////////////////
	// Pour faire une recherche uniquement à la fin de la chaine il faut rajouter  ^derriere la variable $regex delimiteur	 ("/$regex3$/i",$r)
	$regex3="CoDer";
		if(preg_match("/$regex3$/i",$r)){
			echo 'l\'expression "'.$regex3.'" à bien été trouvée<br/>';
		}
		else{
			echo 'expression "'.$regex3.'" non trouvée<br/>';
		}
				
			
	///////////////////
	//utilisation du OU symboliser par "|" pour chercher une expression ou une autre
	// preg_match("/$regex3 | $regex4/i",$r)){
		
		
		
	$regex3="CoDer";
		if(preg_match("/$regex3 | $regex4/i",$r)){
			echo 'l\'expression "'.$regex3.' ou l\'expression: '.$regex4.'" à bien été trouvée<br/>';
		}
		else{
			echo 'expression "'.$regex3.' ou l\'expression: '.$regex4.'" non trouvée<br/>';
		}
	
	///////////////////
	// on peut faire un erecherche sur un ensemble de caracteres définis entre[ ]
	/////////////
	
	
	
		if(preg_match("/[aeiou]/",$r)){
			echo 'l\'expression aeiou à bien été trouvée<br/>';
		}
		else{
			echo 'expression aeiou non trouvée<br/>';
		}
			
	///////////////////
	// on peut faire un erecherche sur un ensemble de caracteres définis entre[ ] s'utilise aussi avec les attributs^ et $ pour les recherches en début ou en fin de chain, pour cela il faut les mettres  (preg_match("/^[jaeiou]/",$r)){ et if(preg_match("/[aeiour]$/",$r))
	/////////////
	
	
	
		if(preg_match("/^[jaeiou]/",$r)){
			echo 'l\'expression jaeiou à bien été trouvée<br/>';
		}
		else{
			echo 'expression jaeiou non trouvée<br/>';
		}
			/////////////
			
		if(preg_match("/[aeiour]$/",$r)){
			echo 'l\'expression aeiour à bien été trouvée<br/>';
		}
		else{
			echo 'expression aeiour non trouvée<br/>';
		}	
		
		
	///////////////////
	// recherche n'importe de quelle lettre en minuscule entre a et z avec [a-z]
	
	// recherche n'importe de quelle lettre en majuscules entre a et z avec [A-Z]
	// recherche n'importe de quel chiffre  entre 0 et 9 avec [0-9]
	// on peut aussi combiner les arguments  avec [a-zA-Z-9]
	/////////////
	
$r="j'apprends à coder 2 fois plus vite";

	
		if(preg_match("/[a-z]/",$r)){
			echo 'l\'expression a-z à bien été trouvée<br/>';
		}
		else{
			echo 'expression a-znon trouvée<br/>';
		}	
		/////////////////////////
		
		if(preg_match("/[0-9]/",$r)){
			echo 'l\'expression 0-9 à bien été trouvée<br/>';
		}
		else{
			echo 'expression 0-9 non trouvée<br/>';
		}	
		///////////////////////
		
		if(preg_match("/[a-zA-Z0-9éèàç]/",$r)){
			echo 'l\'expression a-zA-Z0-9éèàç à bien été trouvée<br/>';
		}
		else{
			echo 'expression a-zA-Z0-9éèàç non trouvée<br/>';
		}	
		//////////////////////////////
		
		if(preg_match("/[?;!%@&#]/",$r)){
			echo 'l\'expression ?;!%@&# à bien été trouvée<br/>';
		}
		else{
			echo 'expression ?;!%@&# non trouvée<br/>';
		}		
		
	// etc.............

///////////////////
	// si on met le symbol ^à l'interieur des [] on va rechercher l'inverse soit tout ce qui n'est pas juste apres par ex dans if(preg_match("/[^a-f]/",$r)){ on recherche tout ce qui n'est PAS entre a et f
	/////////////
	
$r="j'apprends à coder 2 fois plus vite";

	
		if(preg_match("/[^a-f]/",$r)){
			echo 'l\'expression ^a-z à bien été trouvée<br/>';
		}
		else{
			echo 'expression ^a-z non trouvée<br/>';
		}	



///////////////////
	// les classes abregés en écrivant un \avant les aurguments  
	// \d est = à [0-9]
	// \D est l'inverse de [0-9], donc va rechercher tout sauf les chiffres entre 0 et 9
	// \w est =[a-zA-Z-9_]
	// \W est l'inverse de [a-zA-Z-9_], donc va rechercher tout sauf les chiffres et les lettres, donc essentiellement les symboles
	
	// en fonction du type  de machine le retour ligne est codé differement
	// sur un  mac il faut rechercher un \n alors que sur PC ou sur Unix se sera \r
	// \r ou \n(pour les mac) pour rechercher les retours lignes
	//\s recherche un espace
	//\S recherche tout sauf un espace
	// \. recherche n'importe quel caractere sauf un retour à la ligne
	///////////
	
$r="j'apprends à coder 2 fois plus vite";

	
		if(preg_match("/\d/",$r)){
			echo 'l\'expression ^a-z à bien été trouvée<br/>';
		}
		else{
			echo 'expression ^a-z non trouvée<br/>';
		}	



echo'<br><strong>les quantifieurs</strong><br>';	
///////////////////
	// les quantifieurs
	//? l'expression doit apparaitre une seule fois preg_match("/t?/",$r)){
		// on recherche soit pas de t soit un t
	//+ on recherche une ou plusieurs fois la meme chose preg_match("/t+/",$r)){
		// on recherche 1 ou plusieurs t
	//* on recherche l'expression doit apparaire preg_match("/t*/",$r)){
		// on recherche soit pas de t soit 1 t soit plrs t
	///////////
	
$r="j'apprends à coder 2 fois plus vite";

	
		if(preg_match("/t+/",$r)){
			echo 'l\'expression ^a-z à bien été trouvée<br/>';
		}
		else{
			echo 'expression ^a-z non trouvée<br/>';
		}	

///////////////////
	///a{3} si on veut rechercher un nombre precis d'expression ici on recherche 3 a
	// on peut toujours mettre ^pour rechercher au début ou $ pour rechercher à la fin
	// a{3,}si on veut un chiffre preci à minima au moins 3 a
	// a{3,5}entre 3 et 5 a
	// a{3,5}h entre 3 et 5 a et 1h
	///////////
	
$r="j'apprends à coder 2 fois plus vite";

	
		if(preg_match("/a{3.5}h/",$r)){
			echo 'l\'expression ^a-z à bien été trouvée<br/>';
		}
		else{
			echo 'expression ^a-z non trouvée<br/>';
		}	


///////////////////
	///
	
$r="j'apprends à coder 2 fois plus vite";

	
		if(preg_match("/a{3.5}h/",$r)){
			echo 'l\'expression ^a-z à bien été trouvée<br/>';
		}
		else{
			echo 'expression ^a-z non trouvée<br/>';
		}	
	
		
	echo'<br><strong>les meta caracteres</strong><br>';		

	echo"
^=au début
$= à la fin
|= ou
[]=definit une classe
?=zero ou un 
+=un ou plusieurs expresssions
*= zero un ou plusieurs expresssions
.=tout un retour ligne
\ caractere d'echappement
{}= definit les quantifieurs

<br>";

	
		
?>
</body>
</html>