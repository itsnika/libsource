<?php
class Students_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function selectAllStudents() {
		return $this->db->select('SELECT * FROM students');
	}

	public function selectStudent($data) {
		$query = $data['query'];
		$res = $this->db->select('SELECT * FROM students WHERE email = :query OR username = :query', array(':query' => $query));

		if (empty($res)) {
			$error = rawurlencode(NO_RES);
			header("Location: " . BASE . "students/index?error=" . $error);
			die();
		}

		return $res;
	}
}
?>