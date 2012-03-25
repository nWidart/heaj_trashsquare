<?php
require_once(LIB_PATH.DS.'database.php');

class User {
	public $id;
	public $nom;
	public $prenom;
	public $classe;
	public $login;
	public $password;
	public $count;

	public static function find_all() {
		return self::find_by_sql("SELECT * FROM user");
	}

	public static function find_by_id($id=0) {
		$result_array = self::find_by_sql("SELECT * FROM user WHERE id={$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	public static function find_by_sql($sql="") {
		global $database;
		$result_set = $database->query($sql);
		$object_array = array();
		while ( $row = $database->fetch_array($result_set) ) {
			$object_array[] = self::instantiate($row);
		}
		return $object_array;
	}

	public static function authenticate($login="", $password="") {
		global $database;
		$login = $database->escape_value($login);
		$password = $database -> escape_value($password);
		$sql = "SELECT * FROM user ";
		$sql .= "WHERE login = '{$login}' ";
		$sql .= "AND password = '{$password}' ";
		$sql .= "LIMIT 1";
		$result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;
	}
	public function full_name() {
		if( isset($this->nom) && isset($this->prenom) ) {
			return $this -> prenom . " " . $this -> nom;
		} else {
			return "";
		}
	}
	public function nom_first_letter_prenom () {
		if( isset($this->nom) && isset($this->prenom) ) {
			return $this -> nom . " " . substr($this -> prenom,0,1) . ".";
		} else {
			return "";
		}
	}
	public static function get_the_top_x($max = "10") {
		global $database;
		$sql_get_top_rank = "SELECT nom, prenom,classe, COUNT(user_id) as count ";
		$sql_get_top_rank .= "FROM checkin AS c ";
		$sql_get_top_rank .= "INNER JOIN user ON user.id = c.user_id ";
		$sql_get_top_rank .= "GROUP BY user_id ORDER BY count DESC";
		$result_set2 = $database -> query($sql_get_top_rank);
		$object_array2 = array();
		while ( $row = $database->fetch_array($result_set2) ) {
			$object_array2[] = self::instantiate($row);
		}
		return $object_array2;
	}
	private static function instantiate ($record) {
		$object = new self;
		foreach($record as $attribute=>$value){
		  if($object->has_attribute($attribute)) {
		    $object->$attribute = $value;
		  }
		}
		return $object;
	}
	private function has_attribute($attribute) {
	  $object_vars = get_object_vars($this);
	  return array_key_exists($attribute, $object_vars);
	}


}

?>