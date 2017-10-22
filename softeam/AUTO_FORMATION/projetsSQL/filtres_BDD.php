<!DOCTYPE html>
<html>
	<head>
		<title>travail sur Base de données PDO MyAdmin MySQL suite</title>
		
		<meta charset="utf-8"/>
	</head>	
	<body>
				<p><br><strong>Utilisation des filtres</strong><br><br></p>			
				<!--construction d'un tableau simple en html-->
		
		<style>
					table{
						border-collapse:collapse;
							}
					th,td{
						border:1px solid black;
							}
		</style>
		<table>
								<tr>
											<th>Nom du filtre</th>
											<th>ID du filtre</th>
								</tr>
<?php
// les differents filtres servent à :
// la validation des données
// le nettoyage des données
echo'<br><strong>FILTER_VALIDATE_INT</strong><br>';
///////////////////////////////////////
// Nom du filtre	ID du filtre
////////////////////////////////////////
// ci-dessous on fait un tableau avec une boucle pour avoir la liste des id des filtres
// int	257
// boolean	258
// float	259
// validate_regexp	272
// validate_url	273
// validate_email	274
// validate_ip	275
// validate_mac	276
// string	513
// stripped	513
// encoded	514
// special_chars	515
// full_special_chars	522
// unsafe_raw	516
// email	517
// url	518
// number_int	519
// number_float	520
// magic_quotes	521
// callback	1024


//////////
// filter_list permet de connaitre les differents ID des filtres
//////////
				$filtre=filter_list();
				foreach($filtre as $id=>$nomfiltre){
					echo'<tr><td>'.$nomfiltre.'</td><td>'.filter_id($nomfiltre).'</td></tr>';
	}

		


?>
		</table>
<?php
echo'<br><strong>FILTER_VALIDATE_INT</strong><br>';
//////////////////////////////////
//filter_VAR(variable a tester,nom du filtre)
///////////////////////////////// 
// FILTER_VALIDATE_INT teste si on a bien un nombre entier,
 // !!!!! ne teste pas la valeur 0
 // FILTER_VALIDATE_INT renvoie un bolléen si ok renvoie donc un TRUE
/////////////////////////////////
// on teste que la fonction ne teste pas un false on fait donc une double négation(false et !). On ne peut le faire avec un true
// 3===  est équivalent à un simple =
//pour tester la valeur 0 on rajoute un test avec OR
		$int1=100;
		$int2='aaa';
		$int3=0;
		
			if(
			filter_var($int3,FILTER_VALIDATE_INT)===0 
			OR 
			!filter_var($int3,FILTER_VALIDATE_INT)===false){
			echo'la variable contient bien un entier valide<br/>';
			}
			else{
				echo'la variable ne contient pas un entier valide<br/>';
			}	
				
// si on veut faire un test sur le type de valeur il est preferable d'utiliser	"is_int", c'est une fonction php 

// contenu dans une certaine fourchette ou non, pour cela il faut entrer des valeurs contenu dans un tableau array multi dimensionnel

$int1=-10;
$int2=50;
$int3=160;
$int4=0;

$min=1;
$max=100;

// le tableau contient un autre tableau array("options"=>array("min_range"=>$min,"max_range"=>$max))

		if(
			filter_var($int4,FILTER_VALIDATE_INT)===0 
			OR
			!filter_var($int4,FILTER_VALIDATE_INT,
			array("options"=>array("min_range"=>$min,"max_range"=>$max)))==false){
			echo'le nombre  fait  partie de l\'interval min: '.$min. ' et max '.$max.'<br/>';
			}
			else{
			echo'le nombre ne fait pas partie de l\'interval min: '.$min. ' et max '.$max.'<br/>';

			}

echo'<br><strong>FILTER_VALIDATE_EMAIL</strong><br>';			
////////////////////////			
// FILTER_VALIDATE_EMAIL
////////////////////////
// FILTER_SANITIZE_EMAIL permet de supprimer des caractéres non désirés dans un mail


$email1="franck@free.fr";
$email2="muriel@free";
$email3="sebfree.fr";			
$email4="*séb/@fre.e.fr";//ne marche pas avec cet email			

		$email4=filter_var($email4,FILTER_SANITIZE_EMAIL);

			if(
			!filter_var($email4,FILTER_VALIDATE_EMAIL)===false){
			
			echo'la forme du mail: '.$email4.' est valide<br/>';
			}
			else{
			echo'la forme du mail: '.$email4.' n\'est valide<br/>';
			}
			
echo'<br><strong>FILTER_VALIDATE_EMAIL ET FILTER_SANITIZE_EMAIL </strong><br>';			
////////////////////////			
// FILTER_VALIDATE_EMAIL test si une adresse mail est valide
////////////////////////
// FILTER_SANITIZE_EMAIL permet de supprimer des caractéres non désirés dans un mail			
			
// script plus complet on va enfermer le resultat dans une variable		
// email est invalide email valide email invalide avant nettoyage mais valide apres		

$email1="f/r/anck@(frée).fr";
$email2="muriel@free";
$email3="sebfree.fr";			
$email4="*séb/@fre.e.fr";		
			
			$emailnew=filter_var($email1,FILTER_SANITIZE_EMAIL);
			
			if(
			!filter_var($emailnew,FILTER_VALIDATE_EMAIL)===false){
			if($emailnew!=$email1){
			echo'la forme du mail: '.$email1.' est aprés nettoyage: '.$emailnew.' est valide<br/>';	
			}else{
				echo'la forme du mail: '.$emailnew.' est valide<br/>';
			}
			}else{
			echo'la forme du mail: '.$emailnew.' n\'est valide<br/>';
			}
			
			
echo'<br><strong>FILTER_VALIDATE_URL ET FILTER_SANITIZE_URL</strong><br>';				
////////////////////////			
// FILTER_VALIDATE_URL test si une adresse url est valide
 // mais selon des specifications des regles url, donc ne marche pas avec tout ex l'url3 apparait valide alors qu'il  manque le .com
////// les parametres suivants ne sont pas retirés par SANITIZE:
/////_.+!*(),{}|\\^~<>#%";/?:&@=[] 
////////////////////////
// FILTER_SANITIZE_URL permet de supprimer des caractéres non désirés dans une URL			
		
	$url1="http://franck.desmedt.com";
	$url2="http//franck./désme@(dt.com";
	$url3="http://franck.desmedt";
	
	
	$url_new=filter_VAR($url2, FILTER_SANITIZE_URL);
	
	
		if(
			!filter_VAR($url_new,FILTER_VALIDATE_URL)===false){
			if($url_new!=$url){
				echo'la forme du url: '.$url2.' est apres nettoyage: '.$url_new.' est valide<br/>';	
				
				
				}else{
					echo'la forme du url: '.$url_new.' est valide<br/>';
				}
				}else{
				echo'la forme du url: '.$url_new.' n\'est valide<br/>';
				}
////////////////////////////
echo'<br><strong>gestion des accents1</strong><br>';	
// gestion des accents, le code ci-dessous  qui remplace les lettres accentuées par les lettres non accentuées fonctionne uniquement pour un codage en 8 bits, hors souvent l'encodage en ASCII est encodé jusqu'à 32 bits
///////////////////////////////		
	
		$str="frànckdésmédt.com";	
			
		$str = strtr($str, 'ÁÀÂÄÃÅÇÉÈÊËÍÏÎÌÑÓÒÔÖÕÚÙÛÜÝ', 'AAAAAACEEEEEIIIINOOOOOUUUUY');
		$str = strtr($str, 'áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy');
		
		echo'sans les accents: '.$str;
		
/////////////////////////
// fonction a enregistrer en ISO-8859-1
echo'<br><strong>gestion des accents2</strong><br>'; 
///////////////////////////

		// function removeaccent($string)
		// {
		// $string="http//frànck./désme@(édt.com";	
		// $string = utf8_decode($string);
		// $string = strtr($string,    'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ',
			// 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
		// $string = utf8_encode($string);                 
		// return $string;
		
		// };
		
		// removeaccent();
/////////////////////////////
echo'<br><strong>gestion des accents3</strong><br>';	
//////////////////
//!!!!!!!! FONCTIONNE PARFAITEMENT
/////////////
// C'est en transformant d'anciens fichiers iso-8859-1 en utf-8 que la solution m'a sauté au visage tel un écureuil farceur : utiliser les entités échappées pour récupérer le caractère non accentué. En effet, "é" une fois échappé donne "&eacute" et "É" donne "&Eacute". Ne reste plus alors qu'à gérer les cas particuliers comme la cédille ou les ligatures, et le tour est joué. Ainsi, on utilise htmlentities() pour échapper les caractères exotiques puis on remplace ces expressions échappées grâce à de savantes expressions rationnelles :

	// $str="http//franck./désme@(dt.com";	
		function wd_remove_accents($str2, $charset='utf-8')
		{
			// $str2="http//franck./désme@(dt.com";	
			// global $str2;
			
			$str2 = htmlentities($str2, ENT_NOQUOTES, $charset);
			
	$str2 = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str2);
	$str2 = preg_replace(
		'#&([A-za-z]{2})(?:lig);#', '\1', $str2); // pour les ligatures e.g. '&oelig;'
	$str2 = preg_replace(
		'#&[^;]+;#', '', $str2); // supprime les autres caractères
			
			// return $str2;
			echo'sans les accents: '.$str2;
		}
		
$str2="http//l'été ànck./désmé@(dt.com";			
wd_remove_accents($str2);
wd_remove_accents("c'est l'étè à l'heure même")

// echo'sans les accents: '.$str2;

?>		








		
		
		
		
	</body>
</html>