<?php
class Students extends Controller {
	function __construct() {
		parent::__construct();
		$this->view->js = array('students/js/index');

		Authentication::isInLoggedInPages();
		Authentication::isStudentOnLoggedInAdminPages();
	}

	function index() {
		$this->view->students = $this->model->selectAllStudents();

		$this->view->title = 'Registered Students';

		$this->view->render('header');
		$this->view->render('students/index');
		$this->view->render('footer');
	}

	function search() {
		$data = array();

		if ($_SERVER['REQUEST_METHOD'] == GET) {
			if (empty($_GET['query'])) {
				$error = rawurlencode(EMPTY_SEARCH);
				header("Location: " . BASE . "students/index?error=" . $error);
				die();
			} else {
				$data['query'] = $_GET['query'];

				$this->selectStudent = $this->model->selectStudent($data);
				foreach ($this->selectStudent as $key => $value) {
					$userid = $value['userid'];
				}

				header("location: " . BASE . "student/index/" . $userid);
			}
		}
	}
}
?>