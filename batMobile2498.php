<?php
include_once('includes/db_connect.php');
// Formulaire visible par défaut
$masquer_formulaire = false;


if ( isset($_POST['submit']) ) {
    $message = "";
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
			$message .= '<div class="error_msg">Ce login n\'existe pas!</div>';
		}
		else {
			$row = mysql_fetch_array($result);
			$user_id = $row['id'];
			$poubelle_id = $_POST['poubelle'];

			$query = "INSERT INTO 
				checkin(
                   	user_id,
                   poubelle_id
              )
              VALUES(
                   $user_id,
                   $poubelle_id
              )
         	";
         	mysql_query($query);
         	$message .= '<div class="succeed_msg">Action bien enregistr&eacute;e</div>';
		}	
	}
}

?>
<?php $page_title = "Trashsquare | Check"; ?>
<?php include('includes/header.php'); ?>

<div class="container contenu">
	<? if(isset($message)) {
		echo($message);
	} ?>
	<div class="row">
		<form class="check" action="" method="post">
			<label for="login">Entrez le nom de la poubelle ainsi que votre login pour valider votre check-in.</label>
			<select name ="poubelle">
				<?php 
					$sqlPoubelle = "SELECT * FROM poubelle";
					$resultsPoubelle = mysql_query($sqlPoubelle, $connection);
					$nombrePoubelle = mysql_num_rows($resultsPoubelle);

					for ($count = 1; $count <= $nombrePoubelle; $count++) {
						while ( $nomPoubelle = mysql_fetch_array($resultsPoubelle) ) {
							if ( $poubelle_id == $nomPoubelle['id'] ) {	
								echo '<option value="'. $nomPoubelle['id'] . '" SELECTED>' . $nomPoubelle['nom'] . '</option>';
							} else {
								echo '<option value="'. $nomPoubelle['id'] . '">' . $nomPoubelle['nom'] . '</option>'; 
							}
						}
					}
				?>
			</select>
			
			<input type="text" value="" placeholder="Entrer votre login" name="login" id="login" /> <br />
			<input type="submit" id="submit" name="submit" />
		</form>
	</div>
</div>


</body>

</html>