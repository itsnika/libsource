<?php
class ErrorCls extends Controller {
	function __construct() {
		parent::__construct();
		$this->view->js = array('error/js/index');
	}

	public function index() {
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$this->view->msg = BASE . $url . NOT_EXISTS;

		$this->view->title = '404 Error';
		$this->view->render('errorHeader');
		$this->view->render('error/index');
	}
}
?>