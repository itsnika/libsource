<?php
class Home extends Controller {
	function __construct() {
		parent::__construct();
		$this->view->js = array('home/js/index');

		Authentication::isInLoggedInPages();
		Authentication::adminAndHomeId();
		Authentication::isAdminOnLoggedInStudentPages();
	}

	function index($userid) {
		$this->view->student = $this->model->selectStudent($userid);
		$this->student = $this->model->selectStudent($userid);

		foreach ($this->student as $key => $value) {
			$firstname = $value['firstname'];
			$lastname = $value['lastname'];
		}

		if (isset($this->student)) {
			$this->view->title = $firstname . " " . $lastname;
		} else {
			$this->view->title = 'Home Page';
		}

		$this->view->render('header');
		$this->view->render('home/index');
		$this->view->render('footer');
	}

	function logout() {
		Session::destroy();
		header('location: ' . BASE . 'login');
		exit;
	}
}
?>