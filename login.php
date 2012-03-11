<html>
<head>
	<title></title>
</head>
<?php 
include_once('db_connect.php');
if ( isset($_POST['submit']) ) {

	if ( !isset($_POST['login']) || !isset($_POST['mdp']) ) {
		$message = "Veillez entrez un login / mot de passe.";
	} else {

		$login = $_POST["login"];
		$mdp = $_POST["mdp"];


		$result = mysql_query("
            SELECT *
            FROM user
            WHERE login = " . $login . "&& password = " . $mdp);
		}
		if(!$result) {
			$message = "Votre login ou mot de passe est incorrect.";
		} else {
			$row = mysql_fetch_array($result);
			$expiration = time() + 90 * 24 * 60 * 60;

           // Création des cookies
           setcookie("ID_UTILISATEUR", $row["id"], $expiration, "/");
           $message = "connecte";
           // Redirection de l'utilisateur	
           
           // http_redirect("www.google.be");
           header( "refresh:5;url=profil.php" );
           echo 'You\'ll be redirected in about 5 secs. If not, click <a href="profil.php">here</a>.'; 
		}
}

?>

<body>

<? if(isset($message)) { ?>
<p><?= $message; ?></p>
<? } if($masquer_formulaire != true) { ?>
<form name="s_login" method="post" action="login.php">
	<label>login</label>
	<input type="text" value="" name="login" id="login" />
	<label>password</label>
	<input type="password" value="" name="mdp" id="mdp" />
	<input type="submit" id="submit" name="submit" />
</form>
<? } ?>


</body>
</html>