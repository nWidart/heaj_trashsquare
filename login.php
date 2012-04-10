<?php
require_once('includes/init.php');

if ($session->is_logged_in()) {
	header( "location: profil.php" );
	exit();
}

if ( isset($_POST['submit']) ) {
	$login = trim($_POST['login']);
	$password = trim($_POST['mdp']);
	// check if user exists.
	$found_user = User::authenticate($login, $password);

	if ($found_user) {
		$session ->login($found_user);
		header( "location: profil.php" );
	} else {
		$message = "Login / Password incorrect.";
	}
} else {
	$login = "";
	$password = "";
}

?>

<?php $page_title = "Trashsquare | login"; ?>
<?php include('includes/header.php'); ?>

<div class="container contenu">
	<? if(isset($message)) {
		echo($message);
	} ?>
	<div class="row">
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