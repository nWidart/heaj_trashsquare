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
         	$message .= "Action bien enregistr&eacute;e";
		}	
	}
}

?>
<?php $page_title = "Trashsquare | Check"; ?>
<?php include('includes/header.php'); ?>

<div class="container contenu">
	<div class="row">
		<? if(isset($message)) { ?>
		<p><?= $message; ?></p>
		<? } ?>
		<form class="check" action="" method="post">
			<select name ="poubelle">
				<?php 
					$sqlPoubelle = "SELECT * FROM poubelle";
					$resultsPoubelle = mysql_query($sqlPoubelle, $connection);
					$nombrePoubelle = mysql_num_rows($resultsPoubelle);

					for ($count = 1; $count <= $nombrePoubelle; $count++) {
						while ( $nomPoubelle = mysql_fetch_array($resultsPoubelle) ) {
							echo '<option value="'. $nomPoubelle['id'] . '">' . $nomPoubelle['nom'] . '</option>';
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