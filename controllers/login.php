<?php
class Login extends Controller {
	function __construct() {
		parent::__construct();
		$this->view->js = array('login/js/index');

		Authentication::isInNotLoggedInPages();
	}

	function index() {
		$this->view->title = 'Login';

		$this->view->render('header');
		$this->view->render('login/index');
		$this->view->render('footer');
	}

	function login() {
		$fields = array("username", "password");

		if (FormValidator::formIsSet("login", $fields, "login") !== false) {
			$credentials = array();

			$credentials['username'] = SecureInput::postedVar($_POST['username']);
			$credentials['password'] = SecureInput::postedVar(Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY));

			$this->model->login($credentials);
		}
	}
}
?>