<?php
class Add_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function addBook($data) {
		$sql = "INSERT INTO books (title, author, isbn, year, edition, language, category, bookpicture, shelf, copies, originalcopies) VALUES (:title, :author, :isbn, :year, :edition, :language, :category, :bookpicture, :shelf, :copies, :originalcopies)";
		$stmt = $this->db->prepare($sql);

		$result = $stmt->execute(array(
			':title' => $data['title'],
			':author' => $data['author'],
			':isbn' => $data['isbn'],
			':year' => $data['year'],
			':edition' => $data['edition'],
			':language' => $data['language'],
			':category' => $data['category'],
			':bookpicture' => $data['bookpicture'],
			':shelf' => $data['shelf'],
			':copies' => $data['copies'],
			':originalcopies' => $data['originalcopies'],
		));
	}
}
?>