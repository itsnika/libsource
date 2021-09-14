<?php
class Register_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function register($credentials) {
		$check_admin_email = "select * from admin where email = :email";
		$check_admin_email = $this->db->prepare($check_admin_email);
		$check_admin_email->execute(array(':email' => $credentials['email']));

		if ($check_admin_email->rowCount() > 0) {
			$error = rawurlencode(EMAIL_EXISTS);
			header("Location: " . BASE . "register/index?error=" . $error);
			die();
		}

		$check_admin_username = "select * from admin where username = :username";
		$check_admin_username = $this->db->prepare($check_admin_username);
		$check_admin_username->execute(array(':username' => $credentials['username']));

		if ($check_admin_username->rowCount() > 0) {
			$error = rawurlencode(USERNAME_EXISTS);
			header("Location: " . BASE . "register/index?error=" . $error);
			die();
		}

		$check_email = "select * from students where email = :email";
		$check_email = $this->db->prepare($check_email);
		$check_email->execute(array(':email' => $credentials['email']));

		if ($check_email->rowCount() > 0) {
			$error = rawurlencode(EMAIL_EXISTS);
			header("Location: " . BASE . "register/index?error=" . $error);
			die();
		}

		$check_username = "select * from students where username = :username";
		$check_username = $this->db->prepare($check_username);
		$check_username->execute(array(':username' => $credentials['username']));

		if ($check_username->rowCount() > 0) {
			$error = rawurlencode(USERNAME_EXISTS);
			header("Location: " . BASE . "register/index?error=" . $error);
			die();
		}

		try {
			$sql = "INSERT INTO students (firstname, lastname, email, username, password) VALUES (:firstname, :lastname, :email, :username, :password)";
			$stmt = $this->db->prepare($sql);

			$result = $stmt->execute(array(
				':firstname' => $credentials['firstname'],
				':lastname' => $credentials['lastname'],
				':email' => $credentials['email'],
				':username' => $credentials['username'],
				':password' => $credentials['password'],
			));

			$userid = $this->db->lastInsertId('userid');

			if ($result) {
				Session::init();

				Session::set('loggedIn', true);
				Session::set('userid', $userid);

				$cookie_name = "user";
				$cookie_value = "libsource";
				setcookie($cookie_name, $cookie_value, 2147483647);

				header('location: ' . BASE . 'home/index/' . $userid);
			} else {
				$error = rawurlencode(WE_NOT_REG);
				header("Location: " . BASE . "register/index?error=" . $error);
				die();
			}
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}
?>