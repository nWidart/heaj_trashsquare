<?php 
	include_once('includes/db_connect.php');

	//echo $_COOKIE['ID_UTILISATEUR']);
	$id = $_GET['id'];

	$reponse = mysql_query("SELECT * FROM user WHERE id =". $id );
	$donnees = mysql_fetch_array($reponse);
?>
<html>
<head>
	<title>Profil | Trashsquare</title>
</head>

<body>
<form action="http://<?= $_SERVER["SERVER_NAME"] . $_SERVER["SCRIPT_NAME"]; ?>" method="post">

	<fieldset>
		<legend>Profil</legend>
		<label for="Nom">Nom:</label>
		<input type="text" name="Nom" value="<?php echo $donnees['nom']; ?>" alt="Nom" title="Entrez votre nom de famille"/>
		<label for="Prenom">Pr&eacute;nom:</label>
		<input type="text" name="Prenom" value="<?php echo $donnees['prenom']; ?>" alt="Prenom" title="Entrez votre prénom"/>
	</fieldset>
	<fieldset>
		<legend>Champs fixes</legend>
		<label for="login">Login:</label>
		<input disabled type="text" name="login" value="<?php echo $donnees['login']; ?>" alt="login" title="login"/>
		<label for="mdp">Mot de passe:</label>
		<input disabled type="text" name="mdp" value="<?php echo $donnees['password']; ?>" alt="mdp" title="mdp"/>
	</fieldset>
	<input type="submit" id="submit" name="submit" value="Mettre a jour votre profil" />
</form>
</body>
</html>