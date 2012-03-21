<?php
require_once('config.php');


class MySQLDatabase {
	private $connection;
	public $last_query;
	private $magic_quotes_active;
	private $real_escape_string_exists;

	/* ------------------------------------------------------------------------------------------------------------------------
	 * Construct method
	 * Opening the connection
	 */
	function __construct() {
		$this -> open_connection();
		$this -> magic_quotes_active = get_magic_quotes_gpc();
		$this -> real_escape_string_exists = function_exists( "mysql_real_escape_string" );
	}

	/* ------------------------------------------------------------------------------------------------------------------------
	 * public function to open a database connection
	 * AND selects a database
	 */
	public function open_connection() {
		$this->connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
		if (!$this->connection) {
			die("Database connection failed: " . mysql_error());
		} else {
			$db_select = mysql_select_db(DB_NAME, $this->connection);
			if (!$db_select) {
				die("Database selection failed: " . mysql_error());
			}
		}
	}

	/* ------------------------------------------------------------------------------------------------------------------------
	 * public function to close a database connection
	 */
	public function close_connection() {
		if ( isset($this->connection) ) {
			mysql_close( $this->connection );
			unset( $this->connection );
		}
	}
	/**
	 * Perform a sql statement
	 * @param  string $sql the sql statement
	 * @return string      the results
	 */
	public function query($sql) {
		$this -> last_query = $sql;
		$result = mysql_query($sql, $this->connection);
		$this->confirm_query($result);
		return $result;
	}
	/**
	 * check if the query is clean
	 * @param  string $value the query the check
	 * @return string        the cleaned up string
	 */
	public function escape_value( $value ) {
		if( $this -> real_escape_string_exists ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $this -> magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$this -> magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}

	public function fetch_array($result_set) {
    	return mysql_fetch_array($result_set);
  	}
  	public function num_rows($result_set) {
		return mysql_num_rows($result_set);
	}
	public function insert_id() {
		// get the last id inserted over the current db connection
		return mysql_insert_id($this->connection);
	}
	public function affected_rows() {
		return mysql_affected_rows($this->connection);
 	}

	/**
	 * confirm if a query has ben executed
	 * @param  string $result the query to analyse
	 * @return [type]          [description]
	 */
	private function confirm_query($result) {
		if (!$result) {
			$output = "Database connection failed: " . mysql_error() . "<br /><br />";
			$output .= "Last SQL query: " . $this -> last_query;
			die ($output);
		}
	}
}

$database = new MySQLDatabase();
$db =& $database;


?>