<?php
include_once('db_connect.php');


     
// validation expected data exists
if ( !isset($_POST['login'] )) {
    $message =  "Merci d'entrer un login";
}

	$login = $_POST['login'];

	// 3. Perform database query
	$sql = "SELECT * FROM user WHERE login = ";
	$sql .= $login;
	$result = mysql_query($sql, $connection);
	echo $sql;

	if (!$result) {
		die("Database query failed: " . mysql_error());
	}
		
	// 5. Close connection
	if(isset($connection)) {
		mysql_close($connection);
		unset($connection);
	}


?>