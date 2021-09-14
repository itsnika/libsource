<?php
class Results extends Controller {
	function __construct() {
		parent::__construct();
		$this->view->js = array('results/js/index');

		Authentication::isInLoggedInPages();
	}

	function index() {
		$data = array();

		if ($_SERVER['REQUEST_METHOD'] == GET) {
			if ($_GET['category'] == "categ" && empty($_GET['query'])) {
				$error = rawurlencode(EMPTY_SEARCH);
				header("Location: " . BASE . "search/index?error=" . $error);
				die();
			} else {
				if ($_GET['category'] !== "categ" && empty($_GET['query'])) {
					$data['category'] = $_GET['category'];
					$this->view->byCategory = $this->model->selectByCategory($data);
					$this->view->count = $this->model->selectByCategoryCount($data);
				}

				if ($_GET['category'] == "categ" && !empty($_GET['query'])) {
					$data['query'] = $_GET['query'];
					$this->view->byQuery = $this->model->selectByQuery($data);
					$this->view->count = $this->model->selectByQueryCount($data);
				}

				if ($_GET['category'] !== "categ" && !empty($_GET['query'])) {
					$data['category'] = $_GET['category'];
					$data['query'] = $_GET['query'];
					$this->view->byCategoryAndQuery = $this->model->selectByCategoryAndQuery($data);
					$this->view->count = $this->model->selectByCategoryAndQueryCount($data);
				}
			}
		}

		$this->view->title = "Books' Results";

		$this->view->render('header');
		$this->view->render('results/index');
		$this->view->render('footer');
	}
}
?>