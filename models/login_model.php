<?php
class Login_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function login($credentials) {
		$check_username = "select * from admin where username = :username";
		$check_username = $this->db->prepare($check_username);
		$check_username->execute(array(':username' => $credentials['username']));

		$check_password = "select * from admin where password = :password";
		$check_password = $this->db->prepare($check_password);
		$check_password->execute(array(':password' => $credentials['password']));

		if ($check_username->rowCount() > 0 && $check_password->rowCount() > 0) {
			$sth = $this->db->prepare("SELECT * FROM admin WHERE username = :username AND password = :password");

			$sth->execute(array(
				':username' => $credentials['username'],
				':password' => $credentials['password'],
			));

			$data = array();
			$data = $sth->fetch();

			$count = $sth->rowCount();

			if ($count > 0) {
				Session::init();

				Session::set('admin', true);
				Session::set('id', $data['id']);

				$cookie_name = "admin";
				$cookie_value = "libsource";
				setcookie($cookie_name, $cookie_value, 2147483647);

				header('location: ' . BASE . 'admin/index/' . $data['id']);
			} else {
				$error = rawurlencode(WRONG_CREDENTIALS);
				header("Location: " . BASE . "login/index?error=" . $error);
				die();
			}
		} else {
			$sth = $this->db->prepare("SELECT * FROM students WHERE username = :username AND password = :password");

			$sth->execute(array(
				':username' => $credentials['username'],
				':password' => $credentials['password'],
			));

			$data = array();
			$data = $sth->fetch();

			$count = $sth->rowCount();

			if ($count > 0) {
				Session::init();

				Session::set('loggedIn', true);
				Session::set('userid', $data['userid']);

				$cookie_name = "user";
				$cookie_value = "libsource";
				setcookie($cookie_name, $cookie_value, 2147483647);

				header('location: ' . BASE . 'home/index/' . $data['userid']);
			} else {
				$error = rawurlencode(WRONG_CREDENTIALS);
				header("Location: " . BASE . "login/index?error=" . $error);
				die();
			}
		}
	}
}
?>