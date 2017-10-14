<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>mon premier fichier PHP</title>
    </head>
    <body>
        <h1>Mon premier fichier PHP</h1>


        <?php
        // put your code here
//      phpinfo();
        echo "Bonjour!";
        $nom = "franck";
        $nb = 2;
        echo '<br />';
        echo '$nb';
        echo $nom;
        echo '<br />';
        echo 'Mon prenom est ' . $nom;
        echo '<br />';
        echo "Mon prenom est $nom";
        echo '<br />';

        $nb = $nb + 1;
        echo '$nb';
        echo'<p>Ceci est du code html dans un bloc PHP</p>';
//        CONSTANCES
//        constantes declarées avec la  fonction "define"
        define('MA_CONSTANTE', 5);

        $resultat = 100 * MA_CONSTANTE;
        echo MA_CONSTANTE;
        echo '<br />';
        echo $resultat;

        define('MA_CONSTANTE2', 8);

        echo MA_CONSTANTE2;
        echo '<br />';
        echo $resultat;

//      $i =-5;
//      $i = 5; // Entier en base 10// Entier en base 10// Entier en base 10// Entier en base 10 // Entier en base 10
//    $i = 012; 
//        $i = 012; // Entier base 8// Entier base 8// Entier base 8// Entier base 8 // Entier base 8 // Entier base 8
//        $i = 0x12; // Entier en base 16// Entier en base 16// Entier en base 16//  
        echo '<br />';
        $r = 7 / 3;
        echo $r;
        echo '<br />';

        $r = (int) (7 / 3); //permet de changer le type de la variable ici 2 entier au lieu d'un float 2.33333
        echo $r;


        echo '<br />';
        $r = 12e-6; //affichage scientifique
        echo $r;

        echo '<br />';
//  TABLEAU


        $tab = array("nicolas", "paul", "caroline");

        echo $tab[2];
        echo '<br />';
        $tab[6] = "franck";

        echo $tab[6];
        echo '<br />';

        $tab[] = "francois";
        echo $tab[7];
        echo '<pre>';
        echo '<br />';
        print_r($tab);
        echo '</pre>';
        ?>
        <table  width="200" height="200" cellspacing="5" bordercolor="#1883A4"  border="1" >
            <thead bgCOLOR="#524643">
                <tr><td colspan="3" bgCOLOR="#BBE3F0" align="center"> Mon tableau</td></tr>
                <tr><th> clé</th>
                    <th> Valeur</th>
                </tr>
            </thead>
            <body >

            <tr bgcolor="#E1D3D0" align="center"><td >0</td><td><?php echo $tab[0]; ?></td></tr>
            <tr bgcolor="#E1D3D0" align="center"><td>1</td><td><?php echo $tab[1]; ?></td></tr>
            <tr bgcolor="#E1D3D0" align="center"><td>2</td><td><?php echo $tab[2]; ?></td></tr>
    </body>  
</table>





<?php
echo '<br />';
echo' <table  width="200" height="200" cellspacing="5" bordercolor="#1883A4"  border="1" >
	<thead bgCOLOR="#524643">
                        <tr><td colspan="3" bgCOLOR="#BBE3F0" align="center"> Mon tableau</td></tr>
			<tr><th> clé</th>
			<th> Valeur</th>
			</tr>
	</thead>
	<body >
            
	    <tr bgcolor="#E1D3D0" align="center"><td >0</td><td>' . $tab[0] . '</td></tr>
            <tr bgcolor="#E1D3D0" align="center"><td>1</td><td> ' . $tab[1] . '</td></tr>
            <tr bgcolor="#E1D3D0" align="center"><td>2</td><td>' . $tab[2] . '</td></tr>
	</body>  
    </table>';

//  TABLEAU associatif

$tab2 = array(
    'prenom' => 'nicolas',
    'nom' => 'ERBIN',
    'adresse' => array(
        'adresse1' => 'paris',
        'adresse2' => 'marseille',
    ),
    'cp' => "13008",
    'tel' => array(
        'mobile' => '06 85 12 58 69',
        'mobile2' => '06 80 41 23 98'),
);





echo '<br />';
echo '<pre>';
print_r($tab2);
echo '</pre>';

echo $tab2['prenom'];
echo '<br />';
echo $tab2['tel']['mobile'];

echo '<br />';
echo '<pre>';
print_r($tab2);
echo '</pre>';


//echo '</pre>';
echo '<br />';
echo' <table  width="200" height="200" cellspacing="5" bordercolor="#1883A4"  border="1" >
	<thead bgCOLOR="#524643">
                        <tr><td colspan="3" bgCOLOR="#BBE3F0" align="center"> Mon tableau</td></tr>
			<tr><th> clé</th>
			<th> Valeur</th>
			</tr>
	</thead>
	<body >
            
	    <tr bgcolor="#E1D3D0" align="center"><td >prenom</td><td>' . $tab2['prenom'] . '</td></tr>
            <tr bgcolor="#E1D3D0" align="center"><td>nom</td><td> ' . $tab2['nom'] . '</td></tr>
            <tr bgcolor="#E1D3D0" align="center"><td>adresse</td><td>' . $tab2['adresse']['adresse2'] . '</td></tr>
            <tr bgcolor="#E1D3D0" align="center"><td>CP</td><td>' . $tab2['cp'] . '</td></tr>
                <tr bgcolor="#E1D3D0" align="center"><td>tel</td><td>' . $tab2['tel']['mobile'] . '</td></tr>
	</body>  
    </table>';



$tableau[0] = array(2, 4, 6);
$tableau[1] = array(1, 3, 5);

$tab3[0][] = 8;  //va rajouter 8 à la fin de $tableau[0] => array (2,4,6,8);
echo '<pre>';
print_r($tab3[0]);
echo '</pre>';

//LES OPERATEURS
$i = 0;
echo '<br />';
echo ++$i; //incremente $i mais ne sera affiché qu'au moment de l'echo revient à $i=$i+1 puis echo $i
echo '<br />';
echo $i++;
echo '<br />';
echo $i;


echo '<br />';

$a = 1;
$b = 3;
$max = ($a >= $b) ? $a : $b; // $max vaudra b, soit 3  car>2//

if ($a >= 2) {
    echo "valeur de a= $a";
} else {
    echo "valeur de b= $b";
}
echo '<br />';
switch ($a) {
    case 1;
        echo "valeur a=1  a= $a";
        break;
    case 2;
        echo "valeur a=2  a= $a";
        break;
    default;
        echo "message par defaut si case1 et case2 sont faux";
        break;
}
echo '<br />';
$g = 1;
while ($g <= 10) {
    echo $g;
    $g++;
}
echo '<br />';
for ($g = 1; $g <= 10; $g++) {
    echo$g;
}
echo '<br />';

echo '<br />';


//ci dessous on a un tableau dans un tableau il
//faut donc faire un if et un 2émes foreach

foreach ($tab2 as $key => $value) {
    if ($key == 'tel') {
        foreach ($tab2[$key] as $key => $value) {
            echo $key . '=' . $value . '<br />';
        }
    } elseif ($key == 'adresse') {
        foreach ($tab2[$key] as $key => $value) {
            echo $key . '=' . $value . '<br />';
        }
    } else {
        echo $key . '=' . $value . '<br />';
    }
}
echo '<br />';
//autre solution avec un if (is_array($tab2))

foreach ($tab2 as $key => $value) {
    if (is_array($value)) {
        foreach ($tab2[$key] as $key2 => $value2) {
            echo $key2 . '=' . $value2 . '<br />';
        }
    } else {
        echo $key . '=' . $value . '<br />';
    }
}
echo '<br />';

$tailletableau = count($tab2);
echo 'taille du tableau: ' . $tailletableau;

//return peut renvoyer, une valeur mais aussi un tableau MAIS on ne peut mettre 2 return de suite car il arrete la fonction

echo '<br />';
echo '<pre>';
print_r($_SERVER);
echo '</pre>';
echo '<br />';

echo '<br />';
echo '<pre>';
print_r($GLOBALS);
echo '</pre>';
echo '<br />';


echo '<br />';
echo '<pre>';
print_r($_ENV);
echo '</pre>';
echo '<br />';


//////////    

$a1 = 1;
$a2 = 2; // portée globale $a1 = 1; a2 2; // 

function affiche() {
    global $a1;
    $a1 = 5;  // $a1 est la variable globale
// // $a1 est la variable globale// $a1 est la variable globale // $a1 est la variable globale // $a1 est la variable globale // $a1 est la variable globale // $a1 est la variable globale // $a1 est la variable globale // $a1 est la variable globale // $a1 est la variable globale // $a1 est la variable globale // $a1 est la variable globale // $a1 est la variable globale
    echo$a1 . " et " . $GLOBALS['a2'];
    echo '<br />';
}

affiche(); // affiche "1 et 2" // affiche "1 et 2"/
echo '<br />';
echo 'a est:'.$a1; // affiche "2" ($a1 a été modifiée) 
////////////
 echo '<br />';
function up_to_10() {
    static $cpt = 0;
     //$cpt=0;  //sans le satitic on reste à 1 donc on fait une boucle infini
    $cpt++;
    echo '<br />';
    echo 'cpt est:' . $cpt;
    $tab4[]=$cpt;
    echo'$tab4';
    var_dump($tab4);
   // echo '<br />';
    if ($cpt < 10)up_to_10(); //ici on fait le if sur une seule ligne donc pas besoin de {}
    return $tab4;
}
up_to_10();
echo '<br />';
echo'var_dump(up_to_10()';
var_dump(up_to_10());
echo '</pre>';

$a=array(1,2,"abce",array("a", "b", "c"));
echo'$a';
var_dump($a);
echo '<br />';
echo'$tab2';
var_dump($tab2); //affiche tout les details du tableau mieux que print_r et sans etre obligé de rajouter echo '</pre>';
  echo '<br />';  



function concat($str="def"){
    $str="abc"+$str;
    return $str;
};

function toto(){
   
    return "toto";
};

echo concat(toto());echo '<br />'; 
echo concat("toto");echo '<br />'; 

echo "abc"."toto";echo '<br />'; 
echo toto().concat();echo '<br />'; 
echo"toto"."abc"."def";echo '<br />'; 

gettype(toto());echo '<br />';


echo'appel fonction date<br/>';

include ('fonction_date.php'); //ici on rappelle la fonction diff_date
date_default_timezone_set('Europe/Paris');
$date1="2018-06-21"; //bien respecter le format AAAA-MM-JJ
$date2="2017-06-21";
$aujourdhui=strtotime("now");

$retourneMaFonction=diff_dates($date1, $date2,$aujourdhui);//le return de notre tableau $tabDate qui est une 
//variable locale à la fonction est assigné à notre variable locale $retourneMaFonction
//le foreach permet de lire toutes les valeurs du tableau $tabDate
foreach ($retourneMaFonction as $value) {
   echo"$value" ;
}
//echo $tabDate;


echo'fin appel fonction date<br/>';










?>
</body>
</html>
