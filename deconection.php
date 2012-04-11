<?
require_once('includes/init.php');
// On délog l'utilisateur
$session->logout();
// Redirection de l'utilisateur
header( "location: index.php" );