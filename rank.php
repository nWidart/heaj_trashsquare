<?php include_once('includes/db_connect.php'); ?>
<?php include_once('includes/functions.php'); ?>
<?php $page_title = "Trashsquare | Rank"; ?>
<?php include('includes/header.php'); ?>

<div class="container contenu">
	<div class="row">
          <?php include('includes/sidebar-userInfo.php'); ?>
		<div class="sixcol">
			<h2>Classement</h2>
          	<div class="scores rank">
          		<table>
          			<tr>
          				<th><img src="images/icn_trash.png" alt="Trash" /></th>
          				<th><img src="images/icn_stat.png" alt="Stat" /></th>
          				<th><img src="images/icn_code.png" alt="Code" /></th>
          				<th><img src="images/icn_badge.png" alt="Badge" /></th>
          				<th><img src="images/icn_crown.png" alt="Crown" /></th>
          			</tr>
          			
          			<tr>
          				<td>1</td>
          				<td>Moreno N.</td>
          				<td>1350pts</td>
          				<td>53</td>
          				<td>B240</td>
          			</tr>
          			
          			<tr>
          				<td>2</td>
          				<td>Anthony D.</td>
          				<td>1235pts</td>
          				<td>45</td>
          				<td>B237</td>
          			</tr>
          			
          			<tr>
          				<td>3</td>
          				<td>Julien D.</td>
          				<td>1132pts</td>
          				<td>40</td>
          				<td>B238</td>
          			</tr>
          			
          			<tr>
          				<td>4</td>
          				<td>Anne J.</td>
          				<td>964pts</td>
          				<td>32</td>
          				<td>n/a</td>
          			</tr>
          			
          			<tr>
          				<td>5</td>
          				<td>Gilles S.</td>
          				<td>850pts</td>
          				<td>24</td>
          				<td>n/a</td>
          			</tr>
          			
          			<tr>
          				<td>6</td>
          				<td>Gauthier B.</td>
          				<td>820pts</td>
          				<td>24</td>
          				<td>n/a</td>
          			</tr>
          			
          			<tr>
          				<td>7</td>
          				<td>Florian B.</td>
          				<td>796pts</td>
          				<td>22</td>
          				<td>n/a</td>
          			</tr>
          			
          			<tr>
          				<td>8</td>
          				<td>Célia S.</td>
          				<td>698pts</td>
          				<td>19</td>
          				<td>n/a</td>
          			</tr>
          			
          			<tr>
          				<td>9</td>
          				<td>Alexis W.</td>
          				<td>600pts</td>
          				<td>17</td>
          				<td>n/a</td>
          			</tr>
          			
          			<tr>
          				<td>10</td>
          				<td>Mathieu L.</td>
          				<td>550pts</td>
          				<td>13</td>
          				<td>n/a</td>
          			</tr>
          			
          		</table>
          		<p>Vous êtes actuellement en <span>98ème</span> position</p>
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