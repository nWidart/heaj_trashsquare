<div class="threecol">
	<?php 
	if ( isset($userId) ) {
	?>
	<?php 
	if ( $userPrenom == "" || $userNom == "") {
		echo '<span class="error_msg">Tu n\'as pas encore entrer ton nom et prenom. Entre <a href="param.php">ton nom et prenom ici.</a></span>';
	}
	?>
	<h2 class="nom"><?php echo $userPrenom . " " . $userNom; ?></h2>
	<ul class="profile_menu">
		<li class="param"><a href="param.php">Paramètres</a></li>
		<li class="logout"><a href="deconection.php">Déconnexion</a></li>
	</ul>
	<?php } ?>
</div>