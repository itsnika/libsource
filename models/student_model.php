<?php
class Student_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function selectStudent($userid) {
		return $this->db->select('SELECT * FROM students WHERE userid = :userid', array(':userid' => $userid));
	}

	public function selectOrderedBook($userid) {
		$check_in_details = "select * from details where userid = :userid";
		$check_in_details = $this->db->prepare($check_in_details);
		$check_in_details->execute(array(':userid' => $userid));

		if ($check_in_details->rowCount() > 0) {
			$get_book_id = "select bookid from details where userid = :userid";
			$get_book_id = $this->db->prepare($get_book_id);
			$get_book_id->execute(array(':userid' => $userid));
			$f = $get_book_id->fetch();
			$bookid = $f["bookid"];

			return $this->db->select('SELECT * FROM books WHERE bookid = :bookid', array(':bookid' => $bookid));
		}
	}

	public function selectDetails($userid) {
		return $this->db->select('SELECT * FROM details WHERE userid = :userid', array(':userid' => $userid));
	}
}
?>