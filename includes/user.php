<?php
require_once(LIB_PATH.DS.'database.php');

class User {
	protected static $table_name="user";
	protected static $db_fields = array('id', 'nom', 'prenom', 'classe', 'login', 'password');

	public $id;
	public $nom;
	public $prenom;
	public $classe;
	public $login;
	public $password;

	public $score;



	public static function find_all() {
		return self::find_by_sql("SELECT * FROM ".self::$table_name);
	}

	public static function find_by_id($id=0) {
		$result_array = self::find_by_sql("SELECT * FROM " . self::$table_name . " WHERE id={$id} LIMIT 1");
		self::instantiate($result_array);
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
		$sql = "SELECT * FROM ". self::$table_name;
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


	public function the_user_score($user_id) {
		global $database;
		$sql_score = "SELECT user_id,COUNT(*) ";
		$sql_score .= "FROM checkin ";
		$sql_score .= "WHERE user_id=" . $user_id;
		$score_data = $database->query($sql_score);
		$this->score = $database->fetch_array($score_data);
		return $this->score;
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

	public function save() {
		// A new record won't have an id yet.
		return isset($this->id) ? $this->update() : $this->create();
	}

	public function create() {
		global $database;
		$attributes= $this->sanitized_attributes();
		$sql = "INSERT INTO " .self::$table_name." (";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
		if($database->query($sql)) {
			$this->id = $database->insert_id();
			return true;
		} else {
			return false;
		}
	}

	public function update() {
		global $database;
		$sql = "UPDATE ".self::$table_name." SET";
		$sql .= " `nom` = '" . $database->escape_value($this->nom) . "',";
		$sql .= " `prenom` = '" . $database->escape_value($this->prenom) . "',";
		$sql .= " `classe` = '" . $database->escape_value($this->classe) . "'";
		$sql .= " WHERE id=" . $database->escape_value($this->id);
		// $database->query($sql);
		// return ($database->affected_rows() == 1) ? true : false;
		return $sql;
	}

}












?>