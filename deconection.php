<?
include_once('includes/db_connect.php');
// Redirige l'utilisateur s'il n'est pas identifié
if(empty($_COOKIE["user_id"]))
{
	header( "location: index.php" );
}
else
{
     
     // Suppression des cookies
     setcookie("user_id", "", time() - 1, "/");
     
     // Redirection de l'utilisateur
	header( "location: profil.php" );
     
}