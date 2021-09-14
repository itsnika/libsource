<?php
class Results_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function selectByCategory($data) {
		$res = $this->db->select('SELECT * FROM books WHERE category = :category LIMIT 15', array(':category' => $data['category']));

		if (empty($res)) {
			$error = rawurlencode(NO_RES);
			header("Location: " . BASE . "search/index?error=" . $error);
			die();
		}

		return $res;
	}

	public function selectByCategoryCount($data) {
		$res = $this->db->prepare("SELECT * FROM books WHERE category = :category LIMIT 15");
		$res->bindValue(':category', $data['category']);
		$res->execute();
		$count = $res->rowCount();

		return $count;
	}

	public function selectByQuery($data) {
		$query = "%{$data['query']}%";
		$res = $this->db->select('SELECT * FROM books WHERE title LIKE :query OR author LIKE :query OR isbn LIKE :query LIMIT 15', array(':query' => $query));

		if (empty($res)) {
			$error = rawurlencode(NO_RES);
			header("Location: " . BASE . "search/index?error=" . $error);
			die();
		}

		return $res;
	}

	public function selectByQueryCount($data) {
		$query = "%{$data['query']}%";

		$res = $this->db->prepare('SELECT * FROM books WHERE title LIKE :query OR author LIKE :query OR isbn LIKE :query LIMIT 15');
		$res->bindValue(':query', $data['query']);
		$res->execute();
		$count = $res->rowCount();

		return $count;
	}

	public function selectByCategoryAndQuery($data) {
		$query = "%{$data['query']}%";
		$res = $this->db->select('SELECT * FROM books WHERE category = :category AND (title LIKE :query OR author LIKE :query OR isbn LIKE= :query) LIMIT 15', array(':category' => $data['category'], ':query' => $query));

		if (empty($res)) {
			$error = rawurlencode(NO_RES);
			header("Location: " . BASE . "search/index?error=" . $error);
			die();
		}

		return $res;
	}

	public function selectByCategoryAndQueryCount($data) {
		$query = "%{$data['query']}%";

		$res = $this->db->prepare('SELECT * FROM books WHERE category = :category AND (title LIKE :query OR author LIKE :query OR isbn LIKE= :query) LIMIT 15');
		$res->bindValue(':category', $data['category']);
		$res->bindValue(':query', $data['query']);
		$res->execute();
		$count = $res->rowCount();

		return $count;
	}
}
?>