<?php include_once('includes/db_connect.php'); ?>
<?php include_once('includes/functions.php'); ?>
<?php $page_title = "Trashsquare | Rank"; ?>
<?php include('includes/header.php'); ?>
<?php 
$sql_get_top_rank = "SELECT nom, prenom,classe, COUNT(user_id) as count ";
$sql_get_top_rank .= "FROM checkin AS c ";
$sql_get_top_rank .= "INNER JOIN user ON user.id = c.user_id ";
$sql_get_top_rank .= "GROUP BY user_id ORDER BY count DESC";
$query_top_rank = mysql_query($sql_get_top_rank);
//$top_rank = mysql_fetch_array($query_top_rank);




 ?>
<div class="container contenu">
	<div class="row">
          <?php 
          //if ( isset($userId) ) {
               include('includes/sidebar-userInfo.php');
          //}
          ?>
		<div class="sixcol">
			<h2>Classement</h2>
          	<div class="scores rank">
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
          				<td><?php echo $top_rank['nom'] . " " . substr($top_rank['prenom'],0,1) . "." ; ?></td>
          				<td><?php echo $top_rank['count']; ?></td>
                              <td><?php echo $top_rank['classe']; ?></td>
          				<?php $n++; ?>
          			</tr>
          		   <?php } ?>
          			
          		</table>
          		<!-- <p>Vous êtes actuellement en <span>98ème</span> position</p> -->
          	</div>
          
		</div>
		<div class="threecol last">
               <?php 
               if ( isset($userId) ) {
               ?>
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
               <?php } ?>
		</div>
	</div>
</div>


</body>

</html>