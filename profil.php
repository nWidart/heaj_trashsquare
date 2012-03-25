<?php
require_once('includes/init.php');


	if( !$session->is_logged_in() ) {
		header( "location: login.php" );
		exit();
	}
?>
<?php $page_title = "Trashsquare | Profil"; ?>

<?php include('includes/header.php'); ?>
<?php
$sql_get_top_rank = "SELECT nom, prenom,classe, COUNT(user_id) as count ";
$sql_get_top_rank .= "FROM checkin AS c ";
$sql_get_top_rank .= "INNER JOIN user ON user.id = c.user_id ";
$sql_get_top_rank .= "GROUP BY user_id ORDER BY count DESC LIMIT 10";
$query_top_rank = mysql_query($sql_get_top_rank);
?>

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
						<th><img src="images/icn_badge.png" alt="Badge" /></th>
						<th><img src="images/icn_stat.png" alt="Stat" /></th>
          			</tr>
          			<?php $n = 1; ?>
                         <?php while ($top_rank = mysql_fetch_array($query_top_rank)) { ?>
                         <tr>
                              <td><?php echo $n; ?></td>
                              <?php if ( $top_rank['nom'] == "" || $top_rank['prenom'] == "")  {  ?>
		          				<td>N/A</td>
		          				<?php } else { ?>
		          				<td><?php echo $top_rank['nom'] . " " . substr($top_rank['prenom'],0,1) . "." ; ?></td>
		          				<?php } ?>
                              <td><?php echo $top_rank['count']; ?></td>
                              <td><?php echo $top_rank['classe']; ?></td>
                              <?php $n++; ?>
                         </tr>
                       <?php } ?>
          		</table>
          		<a href="map.php"><img src="images/blue-arrow.png" alt="Locaux" /> Voir tous les locaux</a>
          		<a href="rank.php"><img src="images/blue-arrow.png" alt="Locaux" /> Voir le classement</a>
          	</div>

		</div>
		<?php include('includes/badges.php'); ?>
	</div>
</div>


</body>

</html>