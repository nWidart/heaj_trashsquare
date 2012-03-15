
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
				$expiration = time() + 90 * 24 * 60 * 60;

	           // Création des cookies
	           setcookie("user_id", $row["id"], $expiration, "/");

	           // Redirection de l'utilisateur	           
	           header( "location: profil.php" );
			}
	}
}
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Trashsquare | Login</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<!-- 1140px Grid styles for IE -->
	<!--[if lte IE 9]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" /><![endif]-->

	<!-- The 1140px Grid - http://cssgrid.net/ -->
	<link rel="stylesheet" href="css/1140.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/progressbar.css" type="text/css" media="screen" />

	
	<!--css3-mediaqueries-js - http://code.google.com/p/css3-mediaqueries-js/ - Enables media queries in some unsupported browsers-->
	<script type="text/javascript" src="js/css3-mediaqueries.js"></script>
	


</head>
<body>
<div class="container header">
	<div class="row">
		<div class="threecol">
			<h1><a href="index.php" title="Index">Trashsquare</a></h1>
		</div>
		<div class="sixcol">
			<nav class="main-navigation">
				<ul>
					<li class="classement"><a href="rank.php">Classement</a></li>
					<li class="profil"><a href="profil.php">Profil</a></li>
					<li class="code"><a href="check.php">Code</a></li>
					<li class="map"><a href="map.php">Map</a></li>
				</ul>
			</nav>
		</div>
		<div class="threecol last">
			<ul class="connexion">
				<li>Bienvenue <a href="profil.php" class="profile_link">Simon</a></li>
				<li><a href="login.php">Connexion</a></li>
			</ul>
		</div>
	</div>
</div>

<div class="container contenu">
	<div class="row">
		<? if(isset($message)) { ?>
		<p class="error"><?= $message; ?></p>
		<? } ?>
		<form name="s_login" method="post" action="login.php" class="login">
			<label>Login:</label>
			<input type="text" value="" placeholder="Entrer votre login" name="login" id="login" /><br />
			<label>Password:</label>
			<input type="password" value="" name="mdp" id="mdp" /><br />
			<input type="submit" id="submit" name="submit" value="Se connecter" />
		</form>
		<? } ?>
	</div>
</div>

</body>
</html>