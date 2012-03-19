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

		<div class="sixcol">
			
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
          		
          	</div>
          
		</div>
		
	</div>
</div>


</body>

</html>