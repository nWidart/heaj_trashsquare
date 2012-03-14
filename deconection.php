<?
include_once('includes/db_connect.php');
// Redirige l'utilisateur s'il n'est pas identifié
if(empty($_COOKIE["user_id"]))
{
     redirect_to("index.php");
}
else
{
     
     // Suppression des cookies
     setcookie("user_id", "", time() - 1, "/");
     
     // Redirection de l'utilisateur
     redirect_to("login.php");
     
}