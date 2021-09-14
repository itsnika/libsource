<?php
class Model {
	function __construct() {
		$this->db = new Database(DATABASE_TYPE, DATABASE_HOST, DATABASE_NAME, DATABASE_USERNAME, DATABASE_PASSWORD);
	}
}
?>