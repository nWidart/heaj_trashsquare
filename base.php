<?php
	include_once('db_connect.php');


	// 3. Perform database query
	$sql = "SELECT * FROM user";
	$result = mysql_query($sql, $connection);
	if (!$result) {
		die("Database query failed: " . mysql_error());
	}

	// 4. Use returned data
	while ($row = mysql_fetch_array($result)) {
		//print_r($row);
		echo $row['password'] . '<br/>';
	}

	// 5. Close connection
	if(isset($connection)) {
		mysql_close($connection);
		unset($connection);
	}
?