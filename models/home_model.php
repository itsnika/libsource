<?php
class Home_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function selectStudent($userid) {
		return $this->db->select('SELECT * FROM students WHERE userid = :userid', array(':userid' => $userid));
	}
}
?>