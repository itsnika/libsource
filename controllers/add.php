<?php
class Add extends Controller {
	function __construct() {
		parent::__construct();
		$this->view->js = array('add/js/index');

		Authentication::isInLoggedInPages();
		Authentication::isStudentOnLoggedInAdminPages();
	}

	function index() {
		$this->view->title = 'Add Book';

		$this->view->render('header');
		$this->view->render('add/index');
		$this->view->render('footer');
	}

	function addBook() {
		$data = array();

		$data['title'] = $_POST['title'];
		$data['author'] = $_POST['author'];
		$data['isbn'] = $_POST['isbn'];
		$data['year'] = $_POST['year'];
		$data['category'] = $_POST['category'];
		$data['edition'] = $_POST['edition'];
		$data['copies'] = $_POST['copies'];
		$data['originalcopies'] = $_POST['copies'];

		// categories and shelfs
		if ($_POST['category'] == "Generalities") {
			$data['shelf'] = "000-100";
		}

		if ($_POST['category'] == "Philosophy and Psychology") {
			$data['shelf'] = "100-200";
		}

		if ($_POST['category'] == "Religion") {
			$data['shelf'] = "200-300";
		}

		if ($_POST['category'] == "Social Sciences") {
			$data['shelf'] = "300-400";
		}

		if ($_POST['category'] == "Language") {
			$data['shelf'] = "400-500";
		}

		if ($_POST['category'] == "Natural Sciences And Mathematics") {
			$data['shelf'] = "500-600";
		}

		if ($_POST['category'] == "Technology (Applied Science)") {
			$data['shelf'] = "600-700";
		}

		if ($_POST['category'] == "The Arts") {
			$data['shelf'] = "700-800";
		}

		if ($_POST['category'] == "Literature and Rhetoric") {
			$data['shelf'] = "800-900";
		}

		if ($_POST['category'] == "Geography and History") {
			$data['shelf'] = "900";
		}

		// language
		if ($_POST['language'] == "English") {
			$data['language'] = "English";
		}

		if ($_POST['language'] == "Albanian") {
			$data['language'] = "Albanian";
		}

		$pic_file_name = $_FILES['cover']['name'];
		$data['bookpicture'] = $_FILES['cover']['name'];
		$pic_file_size = $_FILES['cover']['size'];
		$pic_file_tmp = $_FILES['cover']['tmp_name'];
		$ext = pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION);

		$pic_expensions = array("jpeg", "jpg", "png", "PNG", "JPG", "JPEG");

		if (!in_array($ext, $pic_expensions)) {
			$error = rawurlencode(FORMAT_ERROR);
			header("Location: " . BASE . "add/index?error=" . $error);
			die();
		} else {
			if ($pic_file_size > 2097152) {
				$error = rawurlencode(FILE_TOO_LARGE);
				header("Location: " . BASE . "add/index?error=" . $error);
				die();
			} else {
				move_uploaded_file($pic_file_tmp, "assets/images/book-covers/" . $pic_file_name);

				$this->model->addBook($data);
				header("location: " . BASE . "add");
			}
		}
	}
}
?>