<?php
class Book_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function selectBook($bookid) {
		return $this->db->select('SELECT * FROM books WHERE bookid = :bookid', array(':bookid' => $bookid));
	}

	public function selectMoreLikeThis($bookid) {
		$get_book_category = "select category from books where bookid = :bookid";
		$get_book_category = $this->db->prepare($get_book_category);
		$get_book_category->execute(array(':bookid' => $bookid));
		$f = $get_book_category->fetch();
		$category = $f["category"];

		return $this->db->select('SELECT * FROM books WHERE category = :category AND bookid != :bookid ORDER BY RAND() LIMIT 3', array(':category' => $category, ':bookid' => $bookid));
	}

	public function selectStudent($studentid) {
		return $this->db->select('SELECT * FROM details WHERE userid = :userid', array(':userid' => $studentid));
	}

	public function reserve($data) {
		$this->db->update('books', array(
			'copies' => $data['copies'],
		), "`bookid` = {$data['bookid']}");

		$sql = "INSERT INTO details (userid, bookid, ordereddate) VALUES (:userid, :bookid, :ordereddate)";
		$stmt = $this->db->prepare($sql);

		$result = $stmt->execute(array(
			':userid' => $data['userid'],
			':bookid' => $data['bookid'],
			':ordereddate' => date('Y-m-d'),
		));
	}

	public function selectDetails($userid) {
		return $this->db->select('SELECT * FROM details WHERE userid = :userid', array(':userid' => $userid));
	}

	public function unreserve($data) {
		$this->db->update('books', array(
			'copies' => $data['copies'],
		), "`bookid` = {$data['bookid']}");

		$userid = $data['userid'];

		$this->db->delete('details', "userid = '$userid'");
	}
}
?>