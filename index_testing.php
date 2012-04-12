<?php

require_once('includes/MySqlDb.php');
$Db = new MySqlDb('localhost', 'root', 'root', 'trashsquare');

$results = $Db->get('user',10);



?>
<!DOCTYPE html>

<html lang="en">
<head>
   <meta charset="utf-8">
   <title>Testing the new database class</title>
</head>
<body>
<?php
	foreach ($results as $key) {
		echo $key['login'];
		echo '<br />';
	}
?>
</body>
</html>