<?php
class Student extends Controller {
	function __construct() {
		parent::__construct();
		$this->view->js = array('student/js/index');

		Authentication::isInLoggedInPages();
		Authentication::isStudentOnLoggedInAdminPages();
	}

	function index($userid) {
		$this->view->student = $this->model->selectStudent($userid);
		$this->student = $this->model->selectStudent($userid);
		$this->view->orderedbook = $this->model->selectOrderedBook($userid);
		$this->view->details = $this->model->selectDetails($userid);

		foreach ($this->student as $key => $value) {
			$firstname = $value['firstname'];
			$lastname = $value['lastname'];
		}

		if (isset($this->student)) {
			$this->view->title = $firstname . " " . $lastname;
		} else {
			$this->view->title = 'Student';
		}

		$this->view->render('header');
		$this->view->render('student/index');
		$this->view->render('footer');
	}
}
?>