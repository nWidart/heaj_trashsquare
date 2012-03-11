<?php 
	include_once('includes/db_connect.php');
	include_once('includes/functions.php');

	if ( isset($_POST['submit']) ) {
		$stripdonnees = strip($_POST['nom'],$_POST['prenom']);

		if ( empty($stripdonnees['nom']) || preg_match("^[A-Za-z0-9_\ ]{4,20}$",$stripdonnees['nom']) )
		 {
			 $message .= "Votre nom doit comporter entre 4 et 20 caractères<br />" ; 
		 } 
		 if ( empty($stripdonnees['prenom']) || preg_match("^[A-Za-z0-9_\ ]{4,20}$",$stripdonnees['prenom']) ) 
		 {
			 $message .= "Votre prenom doit comporter entre 4 et 20 caractères<br />" ; 
		 }
		 else {
		 	$sql = "UPDATE user
		 			SET nom = '" . $stripdonnees['nom'] . "',
		 			prenom = '" . $stripdonnees['prenom'] . "'
		 			WHERE id=" . $_COOKIE["user_id"];
		 	echo $sql;		
		 	//mysql_query($sql) or die (mysql_error());
		 }
	}

	$reponse = mysql_query("SELECT * FROM user WHERE id =". $_COOKIE["user_id"] );
	$donnees = mysql_fetch_array($reponse);
?>
<html>
<head>
	<title>Profil | Trashsquare</title>
</head>

<body>
<? if(isset($message)) { ?>
<p>
	<?= $message; ?>
</p>
<? } if($masquer_formulaire != true) { ?>
<form name="s_profil" method="post" action="profil.php">
	<fieldset>
		<legend>Profil</legend>
		<label for="nom">Nom:</label>
		<input type="text" name="nom" id="nom" value="<?php echo $donnees['nom']; ?>" alt="Nom" title="Entrez votre nom de famille"/>
		<label for="prenom">Pr&eacute;nom:</label>
		<input type="text" name="prenom" id="prenom" value="<?php echo $donnees['prenom']; ?>" alt="Prenom" title="Entrez votre prénom"/>
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
<?php } ?>
</body>
</html>