<?
require_once('includes/init.php');
// Redirige l'utilisateur s'il n'est pas identifié
if (!$session->is_logged_in()) {
	header( "location: login.php" );
	exit();
}
else
{
	// On délog l'utilisateur
    $session->logout();
     // Redirection de l'utilisateur
	header( "location: index.php" );
}