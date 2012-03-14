<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Trashsquare | Index</title>

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
			<h1><a href="index.html" title="Index">Trashsquare</a></h1>
		</div>
		<div class="sixcol">
			<nav class="main-navigation">
				<ul>
					<li class="classement"><a href="#">classement</a></li>
					<li class="profil"><a href="index.php">profil</a></li>
					<li class="code"><a href="code.php">code</a></li>
					<li class="map"><a href="#">map</a></li>
				</ul>
			</nav>
		</div>
		<div class="threecol last">
			<ul class="connexion">
				<li>Bienvenue <a href="profil.php" class="profile_link">Simon</a></li>
				<li><a hred="#">Déconnexion</a></li>
			</ul>
		</div>
	</div>
</div>

<div class="container contenu">
	<div class="row">
		<form class="code" action="" method="post">
			<label for="code">Entrez le code affiché sur la poubelle pour valider votre check-in</label>
			<input type="text" id="code" name="code" /><br />
			<input type="submit" value="Confirmer" />
		</form>
	</div>
</div>


</body>

</html>