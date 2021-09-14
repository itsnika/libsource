<?php
class BooksReserved_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function selectBooksReserved() {
		return $this->db->select('SELECT * FROM books WHERE copies != originalcopies');
	}
}
?>