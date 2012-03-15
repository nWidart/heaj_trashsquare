<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Trashsquare | Map</title>

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
		<div class="locaux">
			<div class="map">
				<span class="room" onmouseover="document.getElementById('bulle1').style.opacity= 1;"  onmouseout="document.getElementById('bulle1').style.opacity= 0;">B240</span>
				<span class="room" onmouseover="document.getElementById('bulle2').style.opacity= 1;"  onmouseout="document.getElementById('bulle2').style.opacity= 0;">B239</span>
				<span class="room" onmouseover="document.getElementById('bulle3').style.opacity= 1;"  onmouseout="document.getElementById('bulle3').style.opacity= 0;">B238</span>
				<span class="room" onmouseover="document.getElementById('bulle4').style.opacity= 1;"  onmouseout="document.getElementById('bulle4').style.opacity= 0;">B237</span>
				<span class="room" onmouseover="document.getElementById('bulle5').style.opacity= 1;"  onmouseout="document.getElementById('bulle5').style.opacity= 0;">B236</span>
				<span class="room" onmouseover="document.getElementById('bulle6').style.opacity= 1;"  onmouseout="document.getElementById('bulle6').style.opacity= 0;">B235</span>
				
				<div class="bulle right" id="bulle1">
					<span class="bulle-maire"><img src="images/maire.png" alt="Maire" /></span>
					<span class="bulle-txt"><span>Gauthier B.</span> est le maire de ce local depuis 3 jours.</span>
				</div>
				
				<div class="bulle right" id="bulle2">
					<span class="bulle-maire"><img src="images/maire.png" alt="Maire" /></span>
					<span class="bulle-txt"><span>Gauthier B.</span> est le maire de ce local depuis 3 jours.</span>
				</div>
				
				<div class="bulle right" id="bulle3">
					<span class="bulle-maire"><img src="images/maire.png" alt="Maire" /></span>
					<span class="bulle-txt"><span>Gauthier B.</span> est le maire de ce local depuis 3 jours.</span>
				</div>
				
				<div class="bulle left" id="bulle4">
					<span class="bulle-maire"><img src="images/maire.png" alt="Maire" /></span>
					<span class="bulle-txt"><span>Gauthier B.</span> est le maire de ce local depuis 3 jours.</span>
				</div>
				
				<div class="bulle left" id="bulle5">
					<span class="bulle-maire"><img src="images/maire.png" alt="Maire" /></span>
					<span class="bulle-txt"><span>Gauthier B.</span> est le maire de ce local depuis 3 jours.</span>
				</div>
				
				<div class="bulle left" id="bulle6">
					<span class="bulle-maire"><img src="images/maire.png" alt="Maire" /></span>
					<span class="bulle-txt"><span>Gauthier B.</span> est le maire de ce local depuis 3 jours.</span>
				</div>
				
				<img src="images/marker.png" alt="Mark" id="mark1" class="mark" />
				<img src="images/marker.png" alt="Mark" id="mark2" class="mark" />
				<img src="images/marker.png" alt="Mark" id="mark3" class="mark" />
				<img src="images/marker.png" alt="Mark" id="mark4" class="mark" />
				<img src="images/marker.png" alt="Mark" id="mark5" class="mark" />
				<img src="images/marker.png" alt="Mark" id="mark6" class="mark" />
				<img src="images/marker.png" alt="Mark" id="mark7" class="mark" />
				<img src="images/marker.png" alt="Mark" id="mark8" class="mark" />
			</div>
			
			<div class="activity">
				<form method="post" action="">
					<input type="text" id="search" />
					<input type="submit" />
				</form>
				
				<h3>Locaux les plus populaires</h3>
				<p class="first"><span>B240</span> 158 déchets jetés.</p>
				<p><span>B235</span> 137 déchets jetés.</p>
				<p><span>B237</span> 132 déchets jetés.</p>
				<p><span>B240</span> 115 déchets jetés.</p>
				<p><span>B236</span> 101 déchets jetés.</p>
				
				<h3>Dernières activités</h3>
				<p class="first"><span>B238</span> Par Mathieu L.</p>
				<p><span>B235</span> Par Moreno N.</p>
				<p><span>B240</span> Par Anne J.</p>
				<p><span>B237</span> Par Gilles S.</p>
				<p><span>B238</span> Par Gauthier B.</p>
			</div>
		</div>
	</div>
</div>


</body>

</html>