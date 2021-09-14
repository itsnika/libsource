<?php
class Profile extends Controller {
	function __construct() {
		parent::__construct();
		$this->view->js = array('profile/js/index');

		Authentication::isInLoggedInPages();
		Authentication::adminAndHomeId();
		Authentication::isAdminOnLoggedInStudentPages();
		Authentication::profileId();
		Authentication::profileCurrentId();
	}

	function index($userid) {
		$this->view->student = $this->model->selectStudent($userid);
		$this->student = $this->model->selectStudent($userid);
		$this->view->orderedbook = $this->model->selectOrderedBook($userid);
		$this->view->moreLikeThis = $this->model->selectMoreLikeThis($userid);
		$this->view->details = $this->model->selectDetails($userid);

		foreach ($this->student as $key => $value) {
			$firstname = $value['firstname'];
			$lastname = $value['lastname'];
		}

		if (isset($this->student)) {
			$this->view->title = $firstname . " " . $lastname;
		} else {
			$this->view->title = 'Profile Page';
		}

		$this->view->render('header');
		$this->view->render('profile/index');
		$this->view->render('footer');
	}
}
?>