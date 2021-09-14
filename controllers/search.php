<?php
class Search extends Controller {
	function __construct() {
		parent::__construct();
		$this->view->js = array('search/js/index');

		Authentication::isInLoggedInPages();
	}

	function index() {
		$this->view->title = 'Search Books';

		$this->view->render('header');
		$this->view->render('search/index');
		$this->view->render('footer');
	}
}
?>