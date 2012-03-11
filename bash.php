<?php 

include_once('db_connect.php');


$i = 1;
while ($i <= 300) {

	$i++;
	$login = rand(1000, 9999);
	$password = rand(1000, 9999);

	$sql = "INSERT INTO user (login, password) 
			VALUES ('$login', '$password')";
	$result = mysql_query($sql, $connection);

}
if (!$result) {
	die("Database query failed: " . mysql_error());
}

