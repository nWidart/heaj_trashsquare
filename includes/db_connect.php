<?php
// Database Constants
// defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
// defined('DB_USER')   ? null : define("DB_USER", "root");
// defined('DB_PASS')   ? null : define("DB_PASS", "root");
// defined('DB_NAME')   ? null : define("DB_NAME", "trashsquare");

defined('DB_SERVER') ? null : define("DB_SERVER", $_SERVER['DB1_HOST'] . ':' . $_SERVER['DB1_PORT'] );
defined('DB_USER')   ? null : define("DB_USER", $_SERVER['DB1_USER'] );
defined('DB_PASS')   ? null : define("DB_PASS", $_SERVER['DB1_PASS'] );
defined('DB_NAME')   ? null : define("DB_NAME", $_SERVER['DB1_NAME'] );
// Create a database connection
$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
if (!$connection) {
	die("Database connection failed: " . mysql_error());
}

// Select a database to use 
$db_select = mysql_select_db(DB_NAME, $connection);
if (!$db_select) {
	die("Database selection failed: " . mysql_error());
}