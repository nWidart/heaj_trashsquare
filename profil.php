<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Trashsquare | Profil</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<!-- 1140px Grid styles for IE -->
	<!--[if lte IE 9]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" /><![endif]-->

	<!-- The 1140px Grid - http://cssgrid.net/ -->
	<link rel="stylesheet" href="css/1140.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/progressbar.css" type="text/css" media="screen" />

	
	<!--css3-mediaqueries-js - http://code.google.com/p/css3-mediaqueries-js/ - Enables media queries in some unsupported browsers-->
	<script type="text/javascript" src="js/css3-mediaqueries.js"></script>
	


</head>
<body>
<div class="container header">
	<div class="row">
		<div class="threecol">
			<h1><a href="index.php" title="Index">Trashsquare</a></h1>
		</div>
		<div class="sixcol">
			<nav class="main-navigation">
				<ul>
					<li class="classement"><a href="rank.php">Classement</a></li>
					<li class="profil"><a href="profil.php">Profil</a></li>
					<li class="code"><a href="check.php">Code</a></li>
					<li class="map"><a href="map.php">Map</a></li>
				</ul>
			</nav>
		</div>
		<div class="threecol last">
			<ul class="connexion">
				<li>Bienvenue <a href="profil.php" class="profile_link">Simon</a></li>
				<li><a href="login.php">Déconnexion</a></li>
			</ul>
		</div>
	</div>
</div>

<div class="container contenu">
	<div class="row">
		<div class="threecol">
			<img src="images/avatar.png" alt="avatar">
			<h2 class="nom">Simon Vreux</h2>
			<p class="classe">2TiD1</p>
			<p class="level">Initié</p>
			<ul class="profile_menu">
				<li class="param"><a href="param.php">Paramètres</a></li>
				<li class="checkin"><a href="poubelle-1.php">Check-in</a></li>
			</ul>
		</div>
		<div class="sixcol">
			<h2>Profil</h2>
			<span class="poubelle">Votre Score</span>
			<div class="ui-progress-bar ui-container" id="progress_bar">
            	<div class="ui-progress" style="width: 15%;">
              		<span class="ui-label">
                		<b class="value">7</b>
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