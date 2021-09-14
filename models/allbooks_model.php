<?php
class Allbooks_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function allbooks() {
		return $this->db->select('SELECT * FROM books');
	}
}
?>