<?php include_once('includes/db_connect.php'); ?>
<?php $page_title = "Trashsquare | Rank"; ?>
<?php include('includes/header.php'); ?>
<?php
$sql_get_top_rank = "SELECT nom, prenom,classe, COUNT(user_id) as count ";
$sql_get_top_rank .= "FROM checkin AS c ";
$sql_get_top_rank .= "INNER JOIN user ON user.id = c.user_id ";
$sql_get_top_rank .= "GROUP BY user_id ORDER BY count DESC";
$query_top_rank = mysql_query($sql_get_top_rank);
$top_rank = mysql_fetch_array($query_top_rank);

$top_users = User::find_by_sql($sql_get_top_rank);
print_r($top_users);
foreach($top_users as $top_user) {
	echo "User: ". $top_user->count ."<br />";
	echo "Name: ". $top_user->nom_first_letter_prenom() ."<br /><br />";
}
?>
<div class="container contenu">
	<div class="row">
		<?php include('includes/sidebar-userInfo.php'); ?>
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
				<?php foreach($top_users as $top_user) { ?>
					<tr>
					<td><?php echo $n; ?></td>
					<?php if ( $top_user->nom == "" || $top_user->prenom == "")  {  ?>
						<td>N/A</td>
					<?php } else { ?>
						<td><?php echo $top_user->nom_first_letter_prenom(); ?></td>
					<?php } ?>
					<td><?php echo $top_rank['count']; ?></td>
					<td><?php echo $top_user->classe; ?></td>
					<?php $n++; ?>
					</tr>
				<?php } ?>
          		</table>
          		<!-- <p>Vous êtes actuellement en <span>98ème</span> position</p> -->
          	</div>
		</div>
		<?php include('includes/badges.php'); ?>
	</div>
</div>


</body>

</html>