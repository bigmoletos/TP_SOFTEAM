<?php


$pages_vues =0;
// 1 : on ouvre le fichier
$monfichier = fopen('compteur.txt', 'a+');


//a+ Ouvre le fichier en lecture et écriture. Si le fichier & n'existe pas, il est créé automatiquement. Attention : le répertoire doit avoir un CHMOD à 777 dans ce cas ! À noter que si le fichier existe déjà, le texte sera rajouté à la fin.
//'r'	Ouvre en lecture seule, et place le pointeur de fichier au début du fichier.
//'r+'	Ouvre en lecture et écriture, et place le pointeur de fichier au début du fichier.
//'w'	Ouvre en écriture seule ; place le pointeur de fichier au début du fichier et réduit la taille du fichier à 0. Si le fichier n'existe pas, on tente de le créer.
//'w+'	Ouvre en lecture et écriture ; place le pointeur de fichier au début du fichier et réduit la taille du fichier à 0. Si le fichier n'existe pas, on tente de le créer.
//'a'	Ouvre en écriture seule ; place le pointeur de fichier à la fin du fichier. Si le fichier n'existe pas, on tente de le créer. Dans ce mode, la fonction fseek() n'a aucun effet, les écritures surviennent toujours.
//'a+'	Ouvre en lecture et écriture ; place le pointeur de fichier à la fin du fichier. Si le fichier n'existe pas, on tente de le créer. Dans ce mode, la fonction fseek() n'affecte que la position de lecture, les écritures surviennent toujours.
//'x'	Crée et ouvre le fichier en écriture seulement ; place le pointeur de fichier au début du fichier. Si le fichier existe déjà, fopen() va échouer, en retournant FALSE et en générant une erreur de niveau E_WARNING. Si le fichier n'existe pas, fopen() tente de le créer. Ce mode est l'équivalent des options O_EXCL|O_CREAT pour l'appel système open(2) sous-jacent.
//'x+'	Crée et ouvre le fichier pour lecture et écriture; le comportement est le même que pour 'x'.
//'c'	Ouvre le fichier pour écriture seulement. Si le fichier n'existe pas, il sera crée, s'il existe, il n'est pas tronqué (contrairement à 'w') et l'appel à la fonction n'échoue pas (comme dans le cas de 'x'). Le pointeur du fichier est positionné au début. Ce mode peut être utile pour obtenir un verrou (voyez flock()) avant de tenter de modifier le fichier, utiliser 'w' pourrait tronquer le fichier avant d'obtenir le verrou (vous pouvez toujours tronquer grâce à ftruncate()).
//'c+'	Ouvre le fichier pour lecture et écriture, le comportement est le même que pour le mode 'c'.

//2  : lectgure d ela premiere page du fichier...
$ligne = fgets($monfichier);

 // par ex On augmente de 1 ce nombre de pages vues
$pages_vues += 1;

 // On remet le curseur au début du fichier avec le 0 ne fonctionne qu'avec r er r+
fseek($monfichier, 0);

//3  : ecriture dans le fichier...
fputs($monfichier, 'Texte à écrire'); 




// 4 : quand on a fini de l'utiliser, on ferme le fichier
fclose($monfichier);

echo '<p>Cette page a été vue ' . $pages_vues . ' fois !</p>';


// autre methode pour ouvrir un fichier sans possibvilite de a a+ r +r
file_get_contents($monfichier);
//renvoie le contenue dans un tableau ligne à ligne
file($monfichier);
//ou
fread($handle, $pages_vues)
        
//retourne le contenue sous la forme de tableau associatif
//parse_ini_file($monfichier);

//file_put_contents($monfichier, "mon texte en  plus");
//
//faire un var_dump ou un print_r pour lire les variables supergolables.
//$_SERVER : ce sont des valeurs renvoyées par le serveur. Elles sont nombreuses et quelques-unes d'entre elles peuvent nous être d'une grande utilité. Je vous propose de retenir au moins$_SERVER['REMOTE_ADDR']. Elle nous donne l'adresse IP du client qui a demandé à voir la page, ce qui peut être utile pour l'identifier.
//$_ENV : ce sont des variables d'environnement toujours données par le serveur. C'est le plus souvent sous des serveurs Linux que l'on retrouve des informations dans cette superglobale. Généralement, on ne trouvera rien de bien utile là-dedans pour notre site web.
//$_SESSION : on y retrouve les variables de session. Ce sont des variables qui restent stockées sur le serveur le temps de la présence d'un visiteur. Nous allons apprendre à nous en servir dans ce chapitre.
//$_COOKIE : contient les valeurs des cookies enregistrés sur l'ordinateur du visiteur. Cela nous permet de stocker des informations sur l'ordinateur du visiteur pendant plusieurs mois, pour se souvenir de son nom par exemple.
//$_GET : vous la connaissez, elle contient les données envoyées en paramètres dans l'URL.
//$_POST : de même, c'est une variable que vous connaissez et qui contient les informations qui viennent d'être envoyées par un formulaire.
//$_FILES : elle contient la liste des fichiers qui ont été envoyés via le formulaire précédent.
        
//htmlspecialchars () : convertit les caractères spéciaux du HTML (chevrons, esperluette et guillemets) en les entités HTML correspondantes. À utiliser par exemple pour insérer des données dans un document XML (où les autres entités HTML ne sont pas déclarées) ;
//htmlentities () : convertit les caractères spéciaux (accents, symboles …) en leur entité HTML corespondante (&eacute; , etc.). À utiliser pour insérer des données dans une page HTML classique (article, titre, …) ;
//strip_tags () : efface tous les tags HTML et PHP d'une chaîne (peut être contourné dans certaines conditions). À utiliser pour récupérer du texte but, sans aucune balise ;
//intval () : retourne la valeur entière de l'entrée. S'il s'agit d'un nombre, la patie entière est renvoyée. Sinon, il est « calculé » (une chaîne vaut généralement zéro). Fonctionne de la même manière qu'un transtypage en integer. À utiliser pour s'assurer d'avoir un nombre entier comme valeur (ID, note, ...) ;
//mysql_real_escape_string () : Échappe les caractères et les opérateurs spéciaux spécifiques au serveur MySQL courant. À utiliser pour toutes les données utilisées dans une requête SQL, excepté peut-être les entiers traités avec intval () ;
//addslashes () : Ajoute des backslashes devant les caractères spéciaux courants de la chaîne (guillemets simples et doubles, backslash et le caractère NULL). À utiliser pour passer des valeurs dans une fonction JavaScript dynamique, un attribut HTML (bien que htmlentities () et htmlspecialchas () soient plus adaptées dans ce cas), mais surtout pas pour échapper des données avant une insertion dans une base de données ;
//is_numeric () : Retourne true si le paramètre est un nombre, false sinon. Attention, la condition s'applique pour les entiers, les nombres à virgules flottante, et les nombres en notation scientifique (à confirmer). À utiliser pour tester si la valeu est bien un nombre avant de l'utiliser, au lieu d'effectuer une conversion arbitraire dans le cas où la valeur n'est pas du bon type ;
//ctype_digit () : Détermine si le paramètre est un entier ou non. À utiliser pour vérifier une ID ;      
//  
        
//operateurs logiques
//$a and $b	And (Et)	TRUE si $a ET $b valent TRUE.
//$a or $b	Or (Ou)	TRUE si $a OU $b valent TRUE.
//$a xor $b	XOR	TRUE si $a OU $b est TRUE, mais pas les deux en même temps.
//! $a	Not (Non)	TRUE si $a n'est pas TRUE.
//$a && $b	And (Et)	TRUE si $a ET $b sont TRUE.
//$a || $b	Or (Ou)	TRUE si $a OU $b est TRUE.        
//        
?>


