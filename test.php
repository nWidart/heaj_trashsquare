<?php require_once('includes/database.php');

if (isset($db)) { echo 'true<br />'; } else { echo 'false'; }

echo $db ->escape_value("It's working?<br />");

$sql = "SELECT * FROM user";
$result_set = $db->query($sql);
$premier_user = $db->fetch_array($result_set);
echo $premier_user['nom'];


?>