<html>
<head>
	<title>Poubelle 1 | Trashsquare</title>
</head>

<?php
include_once('includes/db_connect.php');
// Formulaire visible par défaut
$masquer_formulaire = false;


if ( isset($_POST['submit']) ) {
     
	if ( !isset($_POST['login'] )) {
	    $message .= '<p class="error_msg">Merci d\'entrer un login</p>';
	} else {
		// controler si login existe
		$login = $_POST['login'];
		$result = mysql_query("
			SELECT * 
			FROM user 
			WHERE login = " . $login );
		// si erreur
		if ( !$result ) {
			$message .= '<p class="error_msg">Ce login n\'existe pas!</p>';
		}
		else {
			$row = mysql_fetch_array($result);
			$user_id = $row['id'];
			$result = mysql_query("
              INSERT INTO checkin(
                   user_id,
                   poubelle_id
              )
              VALUES(
                   $user_id,
                   1 
              )
         	");
         	$message .= "Action bien enregistr&eacute;e";
		}	
	}
}

?>

<body>

<? if(isset($message)) { ?>
<p><?= $message; ?></p>
<? } if($masquer_formulaire != true) { ?>
<form name="p_login" method="post" action="poubelle-1.php">
	<input type="text" value="" name="login" id="login" />
	<input type="submit" id="submit" name="submit" />
</form>
<? } ?>

</body>
</html>