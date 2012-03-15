
<?php 
include_once('includes/db_connect.php');
include_once('includes/functions.php');

if(!isset($_COOKIE["user_id"]))
{
     header( "location: login.php" );
} else {
	if ( isset($_POST['submit']) ) {
		$stripdonnees = strip($_POST['nom'],$_POST['prenom']);

		if ( empty($stripdonnees['nom']) )
		 {
			 $message .= "Votre nom doit comporter entre 4 et 20 caractères<br />" ; 
		 } 
		 if ( empty($stripdonnees['prenom']) ) 
		 {
			 $message .= "Votre prenom doit comporter entre 4 et 20 caractères<br />" ; 
		 }
		 else {
		 	$sql = "UPDATE user
		 			SET `nom` = '" . $stripdonnees['nom'] . "',
		 			`prenom` = '" . $stripdonnees['prenom'] . "'
		 			WHERE id=" . $_COOKIE["user_id"];
		 	
		 	mysql_query($sql) or die (mysql_error());
		 	$message = '<span class="succes">Profil mit a jour!</span>';
		 }
	}
}
$reponse = mysql_query("SELECT * FROM user WHERE id =". $_COOKIE["user_id"] );
$donnees = mysql_fetch_array($reponse);



?>


<?php include('includes/header.php'); ?>

<div class="container contenu">
	<div class="row">
		<div class="threecol">
			<img src="images/avatar.png" alt="avatar">
			<h2><?php echo $userPrenom . " " . $userNom; ?></h2>
			<p class="classe">2TiD1</p>
			<p class="level"><?php echo get_the_titre( $score[1] ); ?></p>
			<ul class="profile_menu">
				<li class="param"><a href="param.php">Paramètres</a></li>
				<li class="checkin"><a href="check.php">Check-in</a></li>
			</ul>
		</div>
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
					<input type="text" name="nom" id="nom" value="<?php echo $donnees['nom']; ?>" alt="Nom" title="Entrez votre nom de famille"/><br />
					<label for="prenom">Pr&eacute;nom:</label>
					<input type="text" name="prenom" id="prenom" value="<?php echo $donnees['prenom']; ?>" alt="Prenom" title="Entrez votre prénom"/>
				</fieldset>
				<fieldset>
					<legend>Champs fixes</legend>
					<label for="login">Login:</label>
					<input disabled type="text" name="login" value="<?php echo $donnees['login']; ?>" alt="login" title="login"/><br />
					<label for="mdp">Mot de passe:</label>
					<input disabled type="text" name="mdp" value="<?php echo $donnees['password']; ?>" alt="mot de passe" title="mdp"/>
				</fieldset>
				<fieldset>
					<legend>Votre score!</legend>
					<p>Vous avez jetté <?php echo $score[1]; ?> déchets. Vous etes : <?php echo get_the_titre( $score[1] ); ?></p>
				</fieldset>
				<input type="submit" id="submit" name="submit" value="Mettre à jour" />
				</form>

			</div>
			
		</div>
		<div class="threecol last">
			<h2>Badges reçus</h2>
			<div class="grade first">
				<img src="images/lvl5.png" alt="lvl5" />
				<p><span>Poubelle collante</span>
				Tu as jeté plus de 75 déchets au total.</p>
			</div>
			<div class="grade">
				<img src="images/lvl4.png" alt="lvl4" />
				<p><span>A ras bord</span>
				Tu as jeté plus de 50 déchets au total.</p>
			</div>
			<div class="grade">
				<img src="images/lvl3.png" alt="lvl3" />
				<p><span>Poubelle verte</span>
				Tu as jeté plus de 10 déchets au total.</p>
			</div>
			<div class="grade">
				<img src="images/lvl2.png" alt="lvl2" />
				<p><span>Poubelle saine</span>
				Tu as utilisé les poubelles de recyclage.</p>
			</div>
			<div class="grade">
				<img src="images/lvl1.png" alt="lvl1" />
				<p><span>Paper King</span>
				Tu as jeté 5 déchets durant les heures de cours.</p>
			</div>
		</div>
	</div>
</div>

</body>
</html>