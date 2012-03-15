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

<?php $page_title = "Trashsquare | login"; ?>
<?php include('includes/header.php'); ?>

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
		
	</div>
</div>

</body>
</html>