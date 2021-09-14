<?php
class Index extends Controller {
	function __construct() {
		parent::__construct();
		$this->view->js = array('index/js/index');

		Authentication::isInNotLoggedInPages();
	}

	function index() {
		$this->view->title = 'Libsource';

		$this->view->render('header');
		$this->view->render('index/index');
		$this->view->render('footer');
	}
}
?>