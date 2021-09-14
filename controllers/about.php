<?php
class About extends Controller {
	function __construct() {
		parent::__construct();
		$this->view->js = array('about/js/index');
	}

	function index() {
		$this->view->title = 'About Libsource';

		$this->view->render('header');
		$this->view->render('about/index');
		$this->view->render('footer');
	}
}
?>