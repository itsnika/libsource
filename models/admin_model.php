<?php
class Admin_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function selectAdmin($userid) {
		return $this->db->select('SELECT * FROM admin WHERE id = :userid', array(':userid' => $userid));
	}
}
?>