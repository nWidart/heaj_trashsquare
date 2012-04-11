<?php

include_once('includes/init.php');
include_once('includes/db_connect.php');
// include_once('includes/functions.php');

if( !$session->is_logged_in() )
{
     header( "location: login.php" );
}
else
{
	if ( isset($_POST['submit']) ) {
		$stripdonnees = strip($_POST['nom'],$_POST['prenom'],$_POST['classe']);
		$message = "";
		if ( empty($stripdonnees['nom']) )
		 {
			 $message .= "Votre nom ne peut pas etre vide.<br />" ;
		 }
		 if ( empty($stripdonnees['prenom']) )
		 {
			 $message .= "Votre prenom ne peut pas etre vide.<br />" ;
		 }
		 if ( !preg_match("/^[1-3][A-Z]{3}[1-3]/",$stripdonnees['classe']) ) {
		 	$message .= "Merci d'entrez une classe correcte.";
		 }
		 else {
		 	$the_user->nom = $stripdonnees['nom'];
		 	$the_user->prenom = $stripdonnees['prenom'];
		 	$the_user->classe = $stripdonnees['classe'];
		 	$the_user->update();
		 	$message = '<span class="succes">Profil mis &agrave; jour!</span>';
		 }
	}
}
?>
<?php include('includes/header.php'); ?>
<div class="container contenu">
	<div class="row">
		<?php include('includes/sidebar-userInfo.php'); ?>
		<div class="sixcol">
			<h2>Profil</h2>
			<span class="poubelle">Votre Score</span>
			<?php
				if ( $score[1] <= 10 ) {
					$bar_width = $score[1] . "0";
				} else {
					$bar_width = "100";
				}
			?>
			<div class="ui-progress-bar ui-container" id="progress_bar">
            	<div class="ui-progress" style="width: <?php echo $bar_width; ?>%;">
              		<span class="ui-label">
                		<b class="value"><?php echo $score[1]; ?></b>
             	 	</span>
            	</div>
          	</div><!-- end progress bar -->
			<div class="param">
				<? if(isset($message)) { ?>
				<p>
				<?= $message; ?>
				</p>
				<? } ?>
				<form name="s_profil" method="post" action="param.php">
				<fieldset>
					<legend>Profil</legend>
					<label for="nom">Nom:</label>
					<input type="text" name="nom" id="nom" value="<?php echo $the_user->nom; ?>" alt="Nom" title="Entrez votre nom de famille"/><br />
					<label for="prenom">Pr&eacute;nom:</label>
					<input type="text" name="prenom" id="prenom" value="<?php echo $the_user->prenom; ?>" alt="Prenom" title="Entrez votre prénom"/>
					<label for="classe">Classe:</label>
					<input type="text" name="classe" id="classe" value="<?php echo $the_user->classe; ?>" alt="Classe" title="Entrez votre classe"/>
				</fieldset>
				<fieldset>
					<legend>Champs fixes</legend>
					<label for="login">Login:</label>
					<input disabled type="text" name="login" value="<?php echo $the_user->login; ?>" alt="login" title="login"/><br />
					<label for="mdp">Mot de passe:</label>
					<input disabled type="text" name="mdp" value="<?php echo $the_user->password; ?>" alt="mot de passe" title="mdp"/>
				</fieldset>
				<fieldset>
					<legend>Votre score!</legend>
					<p>Vous avez jeté <?php echo $score[1]; ?> déchets. Vous etes : <span><?php echo get_the_titre( $score[1] ); ?></span></p>
				</fieldset>
				<input type="submit" id="submit" name="submit" value="Mettre à jour" />
				</form>

			</div>
		</div>
		<?php include('includes/badges.php'); ?>
	</div>
</div>

</body>
</html>