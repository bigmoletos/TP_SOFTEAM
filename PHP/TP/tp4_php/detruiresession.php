<?php session_start();
//var_dump($_SESSION);
//session_register_shutdown ();
//session_destroy();
//session_unset(); //— Détruit toutes les variables d'une session
session_write_close(); //— Écrit les données de session et ferme la session
var_dump($_SESSION);
////corrigé/////

// Détruit toutes les variables de session 
$_SESSION = array(); 
// Si vous voulez détruire complètement la session, effacez également 
// le cookie de session. 
// cela détruira la session et pas seulement les données de session ! 

//var_dump($_COOKIE);

//if (isset($_COOKIE[session_name()]))  {
//	 setcookie(session_name(), '', time()-42000, '/'); 
//} 

//if (isset($_COOKIE[session_name()])) setcookie(session_name(), '', time()-42000, '/'); 
//autre methode plus courte
if (isset($_COOKIE[session_name()])&& isset($_SESSION[session_name()]) ) setcookie(session_name(), '', 1);

var_dump($_COOKIE);
// Finalement, on détruit la session. 
session_destroy();
var_dump($_COOKIE);
var_dump($_SESSION);

//header("Location: listearticle.php");
?>