<?php 
	if(!isset($_COOKIE["user_id"])) {
		header( "location: login.php" );
		exit();
	}


?>
<?php $page_title = "Trashsquare | Profil"; ?>

<?php include('includes/header.php'); 
include('includes/functions.php'); ?>

<div class="container contenu">
	<div class="row">
		<?php include('includes/sidebar-userInfo.php'); ?>
		<div class="sixcol">
			<h2>Profil</h2>
               
			<span class="poubelle">Votre Score</span>
			<p class="level"><?php echo get_the_titre( $score[1] ); ?></p>
			<div class="ui-progress-bar ui-container" id="progress_bar">
				<?php 
					if ( $score[1] <= 10 ) {
						$bar_width = $score[1] . "0";
					} else {
						$bar_width = "100";
					}
				?>
            	<div class="ui-progress" style="width: <?php echo $bar_width; ?>%;">
              		<span class="ui-label">
                		<b class="value"><?php echo $score[1]; ?></b>
             	 	</span>
            	</div>
          	</div><!-- end progress bar -->
          	
          	<div class="scores">
          		<table>
          			<tr>
          				<th><img src="images/icn_trash.png" alt="Trash" /></th>
          				<th><img src="images/icn_stat.png" alt="Stat" /></th>
          				<th><img src="images/icn_code.png" alt="Code" /></th>
          				<th><img src="images/icn_crown.png" alt="Crown" /></th>
          				<th><img src="images/icn_badge.png" alt="Badge" /></th>
          			</tr>
          			
          			<tr>
          				<td>B240</td>
          				<td>32</td>
          				<td>5</td>
          				<td>3</td>
          				<td>#3 <img src="images/arrow-up.png" alt="Up" /></td>
          			</tr>
          			
          			<tr>
          				<td>B239</td>
          				<td>19</td>
          				<td>6</td>
          				<td>2</td>
          				<td>#5 <img src="images/arrow-up.png" alt="Up" /></td>
          			</tr>
          			
          			<tr>
          				<td>B238</td>
          				<td>12</td>
          				<td>3</td>
          				<td>1</td>
          				<td>#23 <img src="images/arrow-equal.png" alt="Equal" /></td>
          			</tr>
          			
          			<tr>
          				<td>B237</td>
          				<td>5</td>
          				<td>2</td>
          				<td>0</td>
          				<td>#84 <img src="images/arrow-down2.png" alt="Down" /></td>
          			</tr>
          			
          			<tr>
          				<td>B236</td>
          				<td>2</td>
          				<td>0</td>
          				<td>0</td>
          				<td>#98 <img src="images/arrow-down2.png" alt="Down" /></td>
          			</tr>
          			
          			<tr>
          				<td>B235</td>
          				<td>0</td>
          				<td>0</td>
          				<td>0</td>
          				<td>n/a</td>
          			</tr>
          		</table>
          		<a href="map.php"><img src="images/blue-arrow.png" alt="Locaux" /> Voir tous les locaux</a>
          		<a href="rank.php"><img src="images/blue-arrow.png" alt="Locaux" /> Voir le classement</a>
          	</div>
          
		</div>
		<div class="threecol last">
			<h2>Badges reçus</h2>
			<div class="grade first">
				<img src="images/lvl5.png" alt="lvl5" />
				<p><span>Mr. Propre</span>
				Tu as jeté plus de 75 déchets au total.</p>
			</div>
			<div class="grade">
				<img src="images/lvl4.png" alt="lvl4" />
				<p><span>Aventurier</span>
				Tu as jeté plus de 50 déchets au total.</p>
			</div>
			<div class="grade">
				<img src="images/lvl3.png" alt="lvl3" />
				<p><span>Explorateur</span>
				Tu as jeté plus de 10 déchets au total.</p>
			</div>
			<div class="grade">
				<img src="images/lvl2.png" alt="lvl2" />
				<p><span>Initié</span>
				Tu as utilisé les poubelles de recyclage.</p>
			</div>
			<div class="grade">
				<img src="images/lvl1.png" alt="lvl1" />
				<p><span>Débutant</span>
				Tu as jeté 5 déchets durant les heures de cours.</p>
			</div>
		</div>
	</div>
</div>


</body>

</html>