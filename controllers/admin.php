<?php
class Admin extends Controller {
	function __construct() {
		parent::__construct();
		$this->view->js = array('admin/js/index');

		Authentication::isInLoggedInPages();
		Authentication::adminAndHomeId();
		Authentication::isStudentOnLoggedInAdminPages();
	}

	function index($userid) {
		$this->view->admin = $this->model->selectAdmin($userid);
		$this->admin = $this->model->selectAdmin($userid);

		foreach ($this->admin as $key => $value) {
			$firstname = $value['firstname'];
			$lastname = $value['lastname'];
		}

		if (isset($this->admin)) {
			$this->view->title = $firstname . " " . $lastname;
		} else {
			$this->view->title = 'Admin Page';
		}

		$this->view->render('header');
		$this->view->render('admin/index');
		$this->view->render('footer');
	}

	function logout() {
		Session::destroy();
		header('location: ' . BASE . 'login');
		exit;
	}
}
?>