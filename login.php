<?php 
include_once('includes/db_connect.php');
if(isset($_COOKIE["user_id"])) {
	header( "location: profil.php" );
} else {
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
				$expiration = time() + 3600;

	           // Création des cookies
	           setcookie("user_id", $row["id"], $expiration, "/");

	           // Redirection de l'utilisateur	           
	           header( "location: profil.php" );
			}
	}
}
?>
<html>
<head>
	<title>Login | Trashsquare</title>
</head>


<body>

<? if(isset($message)) { ?>
<p><?= $message; ?></p>
<? } ?>
<form name="s_login" method="post" action="login.php">
	<label>login</label>
	<input type="text" value="" placeholder="Entrer votre login" name="login" id="login" />
	<label>password</label>
	<input type="password" value="" name="mdp" id="mdp" />
	<input type="submit" id="submit" name="submit" />
</form>


</body>
</html>