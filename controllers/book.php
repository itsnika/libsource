<?php
class Book extends Controller {
	function __construct() {
		parent::__construct();
		$this->view->js = array('book/js/index');

		Authentication::isInLoggedInPages();
		Authentication::bookId();
		Authentication::noReserveForAdmin();
	}

	function index($bookid) {
		$this->view->book = $this->model->selectBook($bookid);
		$this->view->moreLikeThis = $this->model->selectMoreLikeThis($bookid);
		$this->book = $this->model->selectBook($bookid);

		foreach ($this->book as $key => $value) {
			$title = $value['title'];
		}

		$userid = Session::get("userid");
		$this->view->details = $this->model->selectDetails($userid);

		if (isset($this->book)) {
			$this->view->title = $title;
		} else {
			$this->view->title = 'Book Page';
		}

		$this->view->render('header');
		$this->view->render('book/index');
		$this->view->render('footer');
	}

	function reserve($bookid) {
		$data = array();

		$loggedInSession = Session::get('loggedIn');
		$adminSession = Session::get('admin');

		if ($loggedInSession == true && $adminSession == false) {
			$studentid = Session::get("userid");
			$this->student = $this->model->selectStudent($studentid);

			if (!empty($this->student)) {
				header("location: " . BASE . "home");
			} else {
				$data['userid'] = Session::get('userid');
				$data['bookid'] = $bookid;

				$this->book = $this->model->selectBook($bookid);

				foreach ($this->book as $key => $value) {
					$copies = $value['copies'];
				}

				if ($copies > 0) {
					$data['copies'] = $copies - 1;
					$this->model->reserve($data);
					header("location: " . BASE . "book/index/" . $bookid);
				}
			}
		}
	}

	function unreserve($bookid) {
		$data = array();

		$loggedInSession = Session::get('loggedIn');
		$adminSession = Session::get('admin');

		if ($loggedInSession == true && $adminSession == false) {
			$data['userid'] = Session::get('userid');
			$userid = Session::get("userid");
			$data['bookid'] = $bookid;

			$this->book = $this->model->selectBook($bookid);

			foreach ($this->book as $key => $value) {
				$copies = $value['copies'];
			}

			$this->details = $this->model->selectDetails($userid);

			foreach ($this->details as $key => $value) {
				$useridDetails = $value['userid'];
				$bookidDetails = $value['bookid'];
				$ordereddateDetails = $value['ordereddate'];
			}

			if ($useridDetails == $userid && $bookidDetails == $bookid) {
				$data['copies'] = $copies + 1;
				$this->model->unreserve($data);
				header("location: " . BASE . "book/index/" . $bookid);
			} else {
				header("location: " . BASE . "home");
			}
		}
	}
}
?>