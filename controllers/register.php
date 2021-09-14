<?php
class Register extends Controller {
	function __construct() {
		parent::__construct();
		$this->view->js = array('register/js/index');

		Authentication::isInNotLoggedInPages();
	}

	function index() {
		$this->view->title = 'Register';

		$this->view->render('header');
		$this->view->render('register/index');
		$this->view->render('footer');
	}

	function register() {
		$fields = array("firstname", "lastname", "email", "username", "password");

		if (FormValidator::formIsSet("register", $fields, "register") !== false) {
			if (FormValidator::fieldLength("firstname") !== false) {
				if (FormValidator::fieldLength("lastname") !== false) {
					if (FormValidator::emailValid("email") !== false) {
						if (FormValidator::usernameValid("username") !== false) {
							if (FormValidator::passwordValid("password") !== false) {
								$credentials = array();

								$credentials['firstname'] = SecureInput::postedVar(ucfirst($_POST['firstname']));
								$credentials['lastname'] = SecureInput::postedVar(ucfirst($_POST['lastname']));
								$credentials['email'] = SecureInput::postedVar($_POST['email']);
								$credentials['username'] = SecureInput::postedVar($_POST['username']);
								$credentials['password'] = SecureInput::postedVar(Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY));

								$this->model->register($credentials);
							}
						}
					}
				}
			}
		}
	}
}
?>