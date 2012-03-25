<?php
include_once('includes/db_connect.php');
require_once('includes/init.php');

if($session->is_logged_in()) {
	$sql_score = "SELECT user_id,COUNT(*) ";
	$sql_score .= "FROM checkin ";
	$sql_score .= "WHERE user_id=" . $session->user_id;

	$user = User::find_by_id($session ->user_id);
	$user_score_set = $database->query($sql_score);
	$score = $database->fetch_array($user_score_set);
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
	<link rel="stylesheet" href="css/styles.css" type="text/css" media="print" />
	<link rel="stylesheet" href="css/progressbar.css" type="text/css" media="screen" />
	<link rel="icon" type="image/png" href="images/favicon.png" />
	<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" /><![endif]-->

	<!--css3-mediaqueries-js - http://code.google.com/p/css3-mediaqueries-js/ - Enables media queries in some unsupported browsers-->
	<script type="text/javascript" src="js/css3-mediaqueries.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>
	 // DOM ready
	 $(function() {
      // Create the dropdown base
      $("<select />").appendTo("nav");

      // Create default option "Go to..."
      $("<option />", {
         "selected": "selected",
         "value"   : "",
         "text"    : "Go to..."
      }).appendTo("nav select");

      // Populate dropdown with menu items
      $("nav a").each(function() {
       var el = $(this);
       $("<option />", {
           "value"   : el.attr("href"),
           "text"    : el.text()
       }).appendTo("nav select");
      });

	   // To make dropdown actually work
	   // To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
      $("nav select").change(function() {
        window.location = $(this).find("option:selected").val();
      });

	 });
	</script>


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
				if ( $session->is_logged_in() ) {
				?>
					<li>Bienvenue <a href="profil.php" class="profile_link"><?= $user->prenom; ?></a></li>
					<li><a href="deconection.php">Déconnexion</a></li>
				<?php } else { ?>
					<li><a href="login.php">Login</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>