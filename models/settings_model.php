<?php
class Settings_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function selectAdmin($userid) {
		return $this->db->select('SELECT * FROM admin WHERE id = :userid', array(':userid' => $userid));
	}

	public function selectStudent($userid) {
		return $this->db->select('SELECT * FROM students WHERE userid = :userid', array(':userid' => $userid));
	}

	public function saveFirstNameStudent($data) {
		$this->db->update('students', array(
			'firstname' => $data['firstname'],
		), "`userid` = {$data['userid']}");
	}

	public function saveFirstNameAdmin($data) {
		$this->db->update('admin', array(
			'firstname' => $data['firstname'],
		), "`id` = {$data['userid']}");
	}

	public function saveLastNameStudent($data) {
		$this->db->update('students', array(
			'lastname' => $data['lastname'],
		), "`userid` = {$data['userid']}");
	}

	public function saveLastNameAdmin($data) {
		$this->db->update('admin', array(
			'lastname' => $data['lastname'],
		), "`id` = {$data['userid']}");
	}

	public function saveEmailStudent($data) {
		$check_admin_email = "select * from admin where email = :email";
		$check_admin_email = $this->db->prepare($check_admin_email);
		$check_admin_email->execute(array(':email' => $data['email']));

		if ($check_admin_email->rowCount() > 0) {
			$error = rawurlencode(EMAIL_EXISTS);
			header("Location: " . BASE . "settings/index/" . $data['userid'] . "?error=" . $error);
			die();
		}

		$check_email = "select * from students where email = :email";
		$check_email = $this->db->prepare($check_email);
		$check_email->execute(array(':email' => $data['email']));

		if ($check_email->rowCount() > 0) {
			$error = rawurlencode(EMAIL_EXISTS);
			header("Location: " . BASE . "settings/index/" . $data['userid'] . "?error=" . $error);
			die();
		}

		$this->db->update('students', array(
			'email' => $data['email'],
		), "`userid` = {$data['userid']}");
	}

	public function saveEmailAdmin($data) {
		$check_admin_email = "select * from admin where email = :email";
		$check_admin_email = $this->db->prepare($check_admin_email);
		$check_admin_email->execute(array(':email' => $data['email']));

		if ($check_admin_email->rowCount() > 0) {
			$error = rawurlencode(EMAIL_EXISTS);
			header("Location: " . BASE . "settings/index/" . $data['userid'] . "?error=" . $error);
			die();
		}

		$check_email = "select * from students where email = :email";
		$check_email = $this->db->prepare($check_email);
		$check_email->execute(array(':email' => $data['email']));

		if ($check_email->rowCount() > 0) {
			$error = rawurlencode(EMAIL_EXISTS);
			header("Location: " . BASE . "settings/index/" . $data['userid'] . "?error=" . $error);
			die();
		}

		$this->db->update('admin', array(
			'email' => $data['email'],
		), "`id` = {$data['userid']}");
	}

	public function saveUsernameStudent($data) {
		$check_admin_username = "select * from admin where username = :username";
		$check_admin_username = $this->db->prepare($check_admin_username);
		$check_admin_username->execute(array(':username' => $data['username']));

		if ($check_admin_username->rowCount() > 0) {
			$error = rawurlencode(USERNAME_EXISTS);
			header("Location: " . BASE . "settings/index/" . $data['userid'] . "?error=" . $error);
			die();
		}

		$check_username = "select * from students where username = :username";
		$check_username = $this->db->prepare($check_username);
		$check_username->execute(array(':username' => $data['username']));

		if ($check_username->rowCount() > 0) {
			$error = rawurlencode(USERNAME_EXISTS);
			header("Location: " . BASE . "settings/index/" . $data['userid'] . "?error=" . $error);
			die();
		}

		$this->db->update('students', array(
			'username' => $data['username'],
		), "`userid` = {$data['userid']}");
	}

	public function saveUsernameAdmin($data) {
		$check_admin_email = "select * from admin where username = :username";
		$check_admin_email = $this->db->prepare($check_admin_email);
		$check_admin_email->execute(array(':username' => $data['username']));

		if ($check_admin_email->rowCount() > 0) {
			$error = rawurlencode(USERNAME_EXISTS);
			header("Location: " . BASE . "settings/index/" . $data['userid'] . "?error=" . $error);
			die();
		}

		$check_email = "select * from students where username = :username";
		$check_email = $this->db->prepare($check_email);
		$check_email->execute(array(':username' => $data['username']));

		if ($check_email->rowCount() > 0) {
			$error = rawurlencode(USERNAME_EXISTS);
			header("Location: " . BASE . "settings/index/" . $data['userid'] . "?error=" . $error);
			die();
		}

		$this->db->update('admin', array(
			'username' => $data['username'],
		), "`id` = {$data['userid']}");
	}

	public function savePasswordStudent($data) {
		$this->db->update('students', array(
			'password' => $data['password'],
		), "`userid` = {$data['userid']}");
	}

	public function savePasswordAdmin($data) {
		$this->db->update('admin', array(
			'password' => $data['password'],
		), "`id` = {$data['userid']}");
	}

	public function deleteStudent($userid) {
		$this->db->delete('students', "userid = '$userid'");

		$sql = $this->db->prepare("DELETE FROM details WHERE userid = :userid");
		$sql->execute(array(
			":userid" => $userid,
		));
	}

	public function deleteAdmin($userid) {
		$this->db->delete('admin', "id = '$userid'");
	}
}
?>