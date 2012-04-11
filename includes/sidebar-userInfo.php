<div class="threecol">
<?php
	if ( isset($the_user) ) {
		if ( $the_user->nom == "" && $the_user->prenom == "" ) {
			echo '<span class="error_msg">Tu n\'as pas encore entrer ton nom et prenom. Entre <a href="param.php">ton nom et prenom ici.</a></span>';
		}
?>
		<h2 class="nom">
			<?php
			if ( !empty($the_user->prenom) && !empty($the_user->nom) ) {
				echo $the_user->prenom . " " . $the_user->nom;
			}
			?>
		</h2>

		<h3>
			<?php
			if ( !empty($the_user->classe) ) {
				echo $the_user->classe;
			}
			?>
		</h3>
	<ul class="profile_menu">
		<li class="param"><a href="param.php">Paramètres</a></li>
		<li class="logout"><a href="deconection.php">Déconnexion</a></li>
	</ul>
	<?php } ?>
</div>