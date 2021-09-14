<?php
class BooksReserved extends Controller {
	function __construct() {
		parent::__construct();
		$this->view->js = array('booksreserved/js/index');

		Authentication::isInLoggedInPages();
		Authentication::isStudentOnLoggedInAdminPages();
	}

	function index() {
		$this->view->booksReserved = $this->model->selectBooksReserved();

		$this->view->title = 'Books Reserved';

		$this->view->render('header');
		$this->view->render('booksreserved/index');
		$this->view->render('footer');
	}
}
?>