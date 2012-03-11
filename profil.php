<html>
<head>
	<title>Profil | Trashsquare</title>
</head>
<?php 
	include_once('includes/db_connect.php');

echo $_COOKIE['ID_UTILISATEUR']);

//$reponse = mysql_query("SELECT * FROM users WHERE id =". $_COOKIE['ID_UTILISATEUR']) or die (mysql_error());
//$donnees = mysql_fetch_array($reponse);
//print_r($reponse);
?>
<body>
<form action="http://<?= $_SERVER["SERVER_NAME"] . $_SERVER["SCRIPT_NAME"]; ?>" method="post">

	<fieldset>
		<legend>Profil</legend>
		<label for="Nom">Nom:</label>
		<input type="text" name="Nom" value="<?php echo $donnees['Adresse_Email']; ?>" class="text"  alt="Nom" title="Entrez votre nom de famille"/>
	</fieldset>

</form>
</body>
</html>