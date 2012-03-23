<?php

class Session {
	private $logged_in=false;
	public $user_id;

	function __construct() {
		session_start();
		$this->check_login();
	    if($this->logged_in) {
	      // actions to take right away if user is logged in
	    } else {
	      // actions to take right away if user is not logged in
	    }
	}

	public function is_logged_in() {
		return $this->logged_in;
	}

	public function login($user) {
		// database should find user based on username/password
		if($user){
			$expiration = time() + 3600;
			setcookie("user_id",  $user->id, $expiration, "/");
			$this->user_id = $_COOKIE['user_id'];
			$this->logged_in = true;
		}
  }

	public function logout() {
		// Suppression des cookies
		setcookie("user_id", "", time() - 1, "/");
		$this->logged_in = false;
	}

	private function check_login() {
		if(isset($_COOKIE['user_id'])) {
			$this->user_id = $_COOKIE['user_id'];
			$this->logged_in = true;
		} else {
			unset($this->user_id);
			$this->logged_in = false;
		}
	}

}

$session = new Session();
?>