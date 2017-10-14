<?php
//ouvrir ou creer u fichier s'il n'existe pas pour cela il faut que le repertoire
//soit en CHMOD 777, ce qui peut se faire avec filezilla
chmod("/somedir/somefile", 0755);
 chmod("file",01777);   // correct
/*r  Ouvre le fichier en lecture seule. Cela signifie que vous pourrez seulement lire le fichier.
r+  Ouvre le fichier en lecture et écriture. Vous pourrez non seulement lire le fichier, mais aussi y écrire (on l'utilisera assez souvent en pratique).
a  Ouvre le fichier en écriture seule. Mais il y a un avantage : si le fichier n'existe pas, il est automatiquement créé.
a+  Ouvre le fichier en lecture et écriture. Si le fichier & n'existe pas, il est créé automatiquement. Attention : le répertoire doit avoir un CHMOD à 777 dans ce cas ! À noter que si le fichier existe déjà, le texte sera rajouté à la fin*/

$monfichier=fopen('nouveauFichier.franck','a+');//a+ pour creer le fichier s'il n'existe pas
fseek($monfichier,0);//pour placer le curseur dans le fichier, ici au debut avec 0
//fseek()ne fonctionne pas avec a et a+, dans ce cas le texte sera toujours ecrit à la fin
fputs($monfichier,'mon texte à inserer dans mon nouveau fichier');//creer mon texte
$ligne=fgets($monfichier);//lecture de la premiere ligne jusqu'au permier saut de ligne

fclose($monfichier);//ferme le fichier
?>

