<?php include_once('includes/db_connect.php'); ?>
<?php include_once('includes/functions.php'); ?>
<?php $page_title = "Trashsquare | Rank"; ?>
<?php include('includes/header.php'); ?>
<?php 
$sql_get_login_code = "SELECT * ";
$sql_get_login_code .= "FROM user";
$query_login_code = mysql_query($sql_get_login_code);
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
          				<th>login</th>
                        <th>code</th>
          			</tr>
          			<?php $n = 1; ?>
                         <?php while ($login_code = mysql_fetch_array($query_login_code)) { ?>
                         <tr>
          				<td><?php echo $login_code['login']; ?></td>
          				<td><?php echo $login_code['password']; ?></td>
          				
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