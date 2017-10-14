<?php
// il faut d�truire la session : copier coller de php.net...
// Initialisation de la session. 
// Si vous utilisez un autre nom 
// session_name("autrenom") 
session_start(); 

// D�truit toutes les variables de session 
$_SESSION = array(); 
// Si vous voulez d�truire compl�tement la session, effacez �galement 
// le cookie de session. 
// cela d�truira la session et pas seulement les donn�es de session ! 
var_dump($_COOKIE);
if (isset($_COOKIE[session_name()]))  {
	 setcookie(session_name(), '', time()-42000, '/'); 
} 

// Finalement, on d�truit la session. 
session_destroy();


header("Location: listearticle.php");
?>