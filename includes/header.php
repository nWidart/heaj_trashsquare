<?php 
include_once('includes/db_connect.php');

if ( isset($_COOKIE["user_id"]) ) {

	$sql = "SELECT * FROM user WHERE id =" . $_COOKIE['user_id'];
	$query = mysql_query($sql, $connection);
	$userData = mysql_fetch_array($query);

	$userPrenom = $userData['prenom'];
	$userNom = $userData['nom'];
	$userLogin = $userData['login'];
	$userPassword = $userData['password'];
	$userId = $userData['id'];
	$userClasse = $userData['classe'];


	$sql_score = "SELECT user_id,COUNT(*) ";
	$sql_score .= "FROM checkin ";
	$sql_score .= "WHERE user_id=" . $_COOKIE["user_id"];
	//$sql_score .= "WHERE user_id=13";
	$score_data = mysql_query($sql_score, $connection);
	$score = mysql_fetch_array($score_data);

}

?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<?php if ( empty($page_title) ) { ?>
	<title>Trashsquare</title>
	<?php } else { ?>
	<title><?php echo $page_title; ?></title>
	<?php } ?>

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
					<li class="classement"><a href="index.php">Home</a></li>
					<li class="classement"><a href="rank.php">Classement</a></li>
					<li class="profil"><a href="profil.php">Profil</a></li>
				</ul>
			</nav>
		</div>
		<div class="threecol last">
			<ul class="connexion">
				<?php 
				if ( isset($_COOKIE['user_id']) ) {
				?>	
					<li>Bienvenue <a href="profil.php" class="profile_link"><?= $userPrenom; ?></a></li>
					<li><a href="deconection.php">Déconnexion</a></li>
				<?php } else { ?>
					<li><a href="login.php">Login</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>