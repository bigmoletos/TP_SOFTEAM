<!DOCTYPE html>
<html>
	<head>
		<title>ceci est un fichier d'aide en PHP</title>
		
		<meta charset="utf-8"/>
	</head>	
		
		
	<body>
		
		<?php /*
$a == $b	Egal	TRUE si $a est égal à $b après le transtypage.
$a === $b	Identique	TRUE si $a est égal à $b et qu'ils sont de même type.
$a != $b	Différent	TRUE si $a est différent de $b après le transtypage.
$a <> $b	Différent	TRUE si $a est différent de $b après le transtypage.
$a !== $b	Différent	TRUE si $a est différent de $b ou bien s'ils ne sont pas du même type.
$a < $b	Plus petit que	TRUE si $a est strictement plus petit que $b.
$a > $b	Plus grand	TRUE si $a est strictement plus grand que $b.
$a <= $b	Inférieur ou égal	TRUE si $a est plus petit ou égal à $b.
$a >= $b	Supérieur ou égal	TRUE si $a est plus grand ou égal à $b.
$a <=> $b	Opérateur combiné	Un entier inférieur, égal ou supérieur à zéro lorsque $a est respectivement inférieur, égal, ou supérieur à $b. Disponible depuis PHP 7.
$a ?? $b ?? $c	Opérateur d'union nul	Retourne la première opérande depuis la gauche vers la droite qui existe, et différent de NULL. Si rien n'existe, NULL sera retourné. Disponible depuis PHP 7.

Caractères échappés
\n	Fin de ligne (LF ou 0x0A (10) en ASCII)
\r	Retour à la ligne (CR ou 0x0D (13) en ASCII)
\t	Tabulation horizontale (HT or 0x09 (9) en ASCII)
\v	Tabulation verticale (VT ou 0x0B (11) en ASCII) (depuis PHP 5.2.5)
\e	échappement (ESC or 0x1B (27) en ASCII) (depuis PHP 5.4.4)
\f	Saut de page (FF ou 0x0C (12) en ASCII) (depuis PHP 5.2.5)
\\	Antislash
\$	Signe dollar
\"	Guillemet double
\[0-7]{1,3}	La séquence de caractères correspondant à cette expression rationnelle est un caractère, en notation octale
\x[0-9A-Fa-f]{1,2}	La séquence de caractères correspondant à cette expression rationnelle est un caractère, en notation hexadécimale
*/


// Ce post présente "50 commandements du développement PHP". Je pense qu'il serait bien d'élargir ces commandements grâce aux connaissances des Zéros et de les regrouper par catégories afin d'avoir une lecture plus méthodique.
// Peut-être que ces commandements mettrons fin à certaines de vos mauvaises habitudes de développement, pour moi c'est le cas.

// Attention certains commandements améliorent la vitesse d'exécution de vos scripts mais dégradent la lisibilité du code... Pesez le pour et le contre avant de vous lancer dans un grand ménage. Dès fois il vaut mieux perdre trois dixièmes de millièmes d'exécution pour gagner un temps précieux au développement... Je pense notamment au numéro 14.


// Vous utilisez une des fonctions suivantes, vous devriez lire le/les commandements associés
// @ suivis d'une fonction => 15
// __autoload => 7
// __get => 7
// __set => 7
// addslashes => 49
// echo => 4
// EREG => 11
// error_reporting => 20
// for => 5
// header => 39
// include => 9
// include_once => 8, 9
// mail => 50
// md5 => 36
// microtime => 10
// mysql_escape_string => 49
// PCRE => 11
// phpinfo => 34
// preg_replace => 13
// print => 1
// require => 9
// require_once => 8, 9
// str_replace => 13
// strlen => 24
// switch => 14
// time => 10


// [Généralité] 1. echo est plus rapide que print. [Test]

// [Généralité] 2. Mettre ses chaines de caractères entre simple quotes '...' est plus rapide qu'entre des doubles quotes "..." car PHP analyse s'il y'a des variables entre les doubles quotes. Utiliser les simple quote pour du texte pur.

// [Généralité] 3. Utiliser sprintf au lieu de mettre des variables dans des double quotes, C'est dix fois plus rapide. [Test]

// [Généralité] 4. Utiliser les paramètres multiples (virgule) dans un echo au lieu de la concaténation des chaines. [Test]
// 1
// 2
// 3
// <?php
// echo 'Test ', $variable;
// ?>


// [Généralité] 5. Utiliser le plus possible des variables pour les calculs, éviter de les mettre dans les boucles. [Test] 
// Exemple :
// Ne pas faire :
// 1
// 2
// 3
// <?php
// for($x=0; $x < count($array); $x)
// ?>

// La fonction count est appelée à chaque boucle, mieux vaut utiliser $max=count($array) pour stocker le résultat du calcul avant la boucle.
// Faire :
// 1
// 2
// 3
// <?php
// for($x=0, $max=count($array); $x < $max; $x)
// ?>


// [Mémoire] 6. Pensez à utiliser unset ou rendre null vos variables, en particulier les gros tableaux. [Voir]

// [POO] 7. Eviter les méthodes magiques comme __get, __set, __autoload. [Lire]

// [Généralité] 8. Utiliser require() au lieu de require_once() quand c'est possible. [Test]

// [Généralité] 9. Utilisez des chemins complets dans vos include et require. C'est du temps gagné pour la résolution du chemin au niveau de votre OS. [Test]
// include et require sont identiques à part que require arrête le script si le fichier n'est pas trouvé. Les performances sont quasi identiques. [Lire]


// [Généralité] 10. Depuis PHP 5.1.0, l'heure de démarrage d'un script peut être trouvé grâce à $_SERVER[’REQUEST_TIME’], à utiliser à la place de time() ou microtime(). [Lire]

// [Généralité] 11. PCRE regex est plus rapide que EREG, mais il faut toujours regarder s'il n'est pas possible d'utiliser une fonction native comme strncasecmp, strpbrk et stripos à la place. [Voir]

// [Généralité] 12. Quand vous parsez du XML en PHP essayez xml2array, qui permet d'utiliser les fonctions PHP XML, pour du HTML vous pouvez essayer DOM document ou DOM XML en PHP4. [Voir]

// [Généralité] 13. str_replace est plus rapide que preg_replace, str_replace est globalement le meilleur dans tous les cas, même si quelques fois strtr est plus rapide avec des chaines longues. Utiliser un array() dans str_replace est plus rapide que d'utiliser plusieurs str_replace.

// [Généralité] 14. “else if” est plus rapide qu'un case/switch. [Test]
// Attention : Valable pour un élèvé de elseif, dans le cas de l'utilisation d'un ou deux elseif, cette méthode reste plus rapide. [Test]

// [Généralité] 15. La suppression d'erreurs avec @ est très lent. [Lire]

// [Cache] 16. Pour réduire l'utilisation de la bande passante, il faut activer le mode mod_deflate dans Apache2 ou mod_gzip pour Apache1.

// [Mémoire] 17. Fermer les connexions aux BDD après les avoir utilisé.

// [Généralité] 18. $row[’id’] est 7 fois plus rapide que $row[id], car si vous ne mettez pas les quotes, PHP Pense qu'il va s'agir d'une constante. Source

// [Gestion d'erreurs] 19. L'utilisation de tags d'un autre style ou des shorts tags pour ouvrir du code PHP est déconseillé. [Source]

// [Gestion d'erreurs] 20. L'utilisation d'un code strict permettant de supprimer toutes les erreurs, warning etc est conseillé. error_reporting(E_ALL) doit toujours être activé. [Source]

// [Cache] 21. Les scripts PHP sont rendus 2 à 10 fois moins rapidement par Apache qu'une page statique. Essayez d'utiliser au maximum des pages statiques (Gestion de cache Cf.22). [Source]

// [Cache] 22. Les scripts PHP sont compilés à la volée (si pas de cache). Installez un système de cache PHP (comme memcached, eAccelerator ou Turck MMCache) permet d'augmenter de 25-100% les performances.

// [Cache] 23. Une alternative aux systèmes de cache est de générer régulièrement le rendu en HTML statique. Essayez Smarty ou Cache Lite. [Source]

// [Généralité] 24. Utilisez isset où c'est possible au lieu de strlen. [Test]
// Ne pas faire :
// 1
// 2
// 3
// 4
// 5
// 6
// <?php
// if (strlen($foo) < 5)
// {
    // echo "Foo is too short";
// }
// ?>

// Mais :
// 1
// 2
// 3
// 4
// 5
// 6
// <?php
// if (!isset($foo{5}))
// {
   // echo "Foo is too short";
// }
// ?>


// [Généralité] 25. ++$i est plus rapide que $i++, donc utilisez le pre-increment quand c'est possible. [Source, Source 2]

// [POO|Généralité] 26. Ne réinventez pas la roue, utilisez les fonctions natives de PHP qui seront toujours plus rapides; Si vous avez le temps de réécrire, faites le sous forme de modules C / C++. [Source]
// Mouais la faut pas déconner :p

// [Généralité] 27. Analysez votre code (Profiler). Utilisez Xdebug pour profiler du code PHP. [Source, Tutoriel Site du Zéro]

// [Généralité] 28. Documentez votre code. [Source]

// [Généralité] 29. Apprenez les différences entre du bon et du mauvais code. [Source, Aide site du Zéro]

// [Généralité] 30. Utilisez les standards [lien 2 | lien 3 | Aide site du Zéro] pour une meilleure compréhension de votre code par les autres. [Source]

// [MVC] 31. Séparez les couches: Contenu, PHP et HTML. HTML dans un autre fichier que le PHP Organisation MVC). [Tuto site du Zéro]

// [MVC] 32. IL n'est pas obligatoire d'utiliser des systèmes de templates complexes comme Smarty, PHP en intègre déjà, regardez ob_get_contents et extract. [Petit tuto]

// [Sécurité] 33. Ne jamais avoir confiance en les variables utilisateurs: $_POST et $_GET. Utilisez mysql_real_escape_string quand vous utilisez MySQL, et htmlspecialchars quand vous rendez du HTML. [Source, A lire]

// [Sécurité] 34. Pour des raisons de sécurité, ne dévoilez jamais d'infos concernant vos paths, extensions et configuration, comme utiliser display_errors ou phpinfo(). [Source]

// [Sécurité] 35. Désactivez register_globals (Normalement désactivé par défaut, pas pour rien!). L'utiliser engendre un risque de sécurité. Bientôt, le PHP6 supprimera complètement cette fonction ! [Source]

// [Sécurité] 36. Ne jamais utiliser du texte clair pour stocker les mots de passe ou les comparer. Utilisez un hash md5 au minimum sha de préférence. [Source]

// [Mémoire] 37. Utilisez ip2long() et long2ip() pour stocker les adresses IP en INT plutôt qu'en STRING. 

// [Généralité] 38. Pour ne pas réinventer la roue, vous pouvez utiliser les nombreux projets PEAR souvent standarts. [Source]

// [Généralité] 39. Quand vous utilisez header('Location: '.$url); n'oubliez pas d'y faire suivre un die(); car le script continue de tourner même après l'instruction. [Source]

// [POO] 40. En POO, si une méthode peut être static, alors déclarez la en static. Elle sera 4 fois plus rapide. [Source].

// [POO] 41. Incrémenter une variable locale dans une méthode POO est le plus rapide. [Test]

// [POO] 42. Incrémenter une propriété d'un objet est 3 fois plus lent qu'une variable locale. [Source]
// Pas bien :
// 1
// 2
// 3
// <?php
  // $this->prop++;
// ?>

// Bien
// 1
// 2
// 3
// 4
// <?php
  // $var++;
  // $this->prop = $var;
// ?>


// [Variable] 43. Incrémenter une variable indéfinie est 9-10 fois plus lent qu'une variable pré définie. [Source]

// [POO] 44. Déclarer une variable globale dans une fonction sans l'utiliser ralenti les choses. PHP doit faire une sorte de check sur la variable pour vérifier qu'elle existe. [Source]

// [POO] 45. Le nombre de méthodes dans une classe ne change rien aux performances d'appel d'une méthode. [Source]

// [POO] 46. Les méthodes d'une classe dérivée vont plus vite que celles de la classe mère. [Source]

// [POO|Fonction] 47. Une fonction avec zéro ou 1 argument et un corps vide prends autant de temps que d'incrémenter 7 ou 8 fois une variable locale. Avec une méthode vide c'est autant de temps que d'incrémenter 15 fois une variable locale. [Source]
// Merci Cassoulet pour la re-traduction :)

// [POO] 48. Tout ne doit pas être objet, chaque méthode et propriété consomme de la mémoire. [Source]
// En effet le Web n'est pas fais pour la POO, celle-ci améliore la lisibilité mais ralentis le déroulement de php.

// [Sécurité] 49. Échappez les chaines provenant de l'extérieur avec mysql_real_escape_string, au lieu de mysql_escape_string ou addslashes. Si magic_quotes_gpc est activé, mieux vaut utiliser stripslashes en premier. [Source]

// [Sécurité] 50. Attention lors de l'utilisation de mail() et de ses headers, il y'a des failles de sécurité. [Source]
?>