<?php
class Allbooks extends Controller {
	function __construct() {
		parent::__construct();
		$this->view->js = array('allbooks/js/index');

		Authentication::isInLoggedInPages();
		Authentication::isStudentOnLoggedInAdminPages();
	}

	function index() {
		$this->view->allbooks = $this->model->allbooks();

		$this->view->title = 'All Books';

		$this->view->render('header');
		$this->view->render('allbooks/index');
		$this->view->render('footer');
	}
}
?>