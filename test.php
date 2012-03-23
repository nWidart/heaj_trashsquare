<?php
require_once('includes/init.php');



$user = User::find_by_id(1);
echo $user->full_name();
echo "<br />";

$users = User::find_all();
foreach($users as $user) {
  echo "User: ". $user->login ."<br />";
  echo "Name: ". $user->full_name() ."<br /><br />";
}
?>