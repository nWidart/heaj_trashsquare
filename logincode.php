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
<div class="container logincode">
	<div class="row">

		<div class="sixcol">
			
          	<div class="scores">
          		
          			<?php $n = 1; ?>
                    <?php while ($login_code = mysql_fetch_array($query_login_code)) { ?>
                        
                        <p>
          				Login : <strong><?php echo $login_code['login']; ?></strong> <br />
          				Mot de passe : <strong><?php echo $login_code['password']; ?></strong>
          				</p>
          			<?php $n++; ?>
          			
          		   <?php } ?>
          			
          		
          		
          	</div>
          
		</div>
		
	</div>
</div>


</body>

</html>