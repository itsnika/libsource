<?php
class Settings extends Controller {
	function __construct() {
		parent::__construct();
		$this->view->js = array('settings/js/index');

		Authentication::settingsId();
		Authentication::isInLoggedInPages();
	}

	function index($userid) {
		$loggedInSession = Session::get('loggedIn');
		$adminSession = Session::get('admin');

		if ($loggedInSession == true && $adminSession == false) {
			$this->view->student = $this->model->selectStudent($userid);
		}

		if ($loggedInSession == false && $adminSession == true) {
			$this->view->admin = $this->model->selectAdmin($userid);
		}

		$this->view->title = 'Account Settings';

		$this->view->render('header');
		$this->view->render('settings/index');
		$this->view->render('footer');
	}

	function saveFirstName($userid) {
		$data = array();
		$data['userid'] = $userid;
		$data['firstname'] = SecureInput::postedVar(ucfirst($_GET['firstname']));

		$loggedInSession = Session::get('loggedIn');
		$adminSession = Session::get('admin');

		if ($loggedInSession == true && $adminSession == false) {
			if ($_SERVER['REQUEST_METHOD'] == GET) {
				if (strlen($_GET['firstname']) < 20) {
					$this->model->saveFirstNameStudent($data);
					?> <script>location='<?php echo BASE; ?>settings/index/<?php echo $userid; ?>'</script> <?php } else {
					$error = rawurlencode(LESS_THAN_20);
					?> <script>location='<?php echo BASE; ?>settings/index/<?php echo $userid; ?>?error=<?php echo $error; ?>'</script> <?php die();
				}
			}
		}

		if ($loggedInSession == false && $adminSession == true) {
			if ($_SERVER['REQUEST_METHOD'] == GET) {
				if (strlen($_GET['firstname']) < 20) {
					$this->model->saveFirstNameAdmin($data);
					?> <script>location='<?php echo BASE; ?>settings/index/<?php echo $userid; ?>'</script> <?php } else {
					$error = rawurlencode(LESS_THAN_20);
					?> <script>location='<?php echo BASE; ?>settings/index/<?php echo $userid; ?>?error=<?php echo $error; ?>'</script> <?php die();
				}
			}
		}
	}

	function saveLastName($userid) {
		$data = array();
		$data['userid'] = $userid;
		$data['lastname'] = SecureInput::postedVar(ucfirst($_GET['lastname']));

		$loggedInSession = Session::get('loggedIn');
		$adminSession = Session::get('admin');

		if ($loggedInSession == true && $adminSession == false) {
			if ($_SERVER['REQUEST_METHOD'] == GET) {
				if (strlen($_GET['lastname']) < 20) {
					$this->model->saveLastNameStudent($data);
					?> <script>location='<?php echo BASE; ?>settings/index/<?php echo $userid; ?>'</script> <?php } else {
					$error = rawurlencode(LESS_THAN_20);
					?> <script>location='<?php echo BASE; ?>settings/index/<?php echo $userid; ?>?error=<?php echo $error; ?>'</script> <?php die();
				}
			}
		}

		if ($loggedInSession == false && $adminSession == true) {
			if ($_SERVER['REQUEST_METHOD'] == GET) {
				if (strlen($_GET['lastname']) < 20) {
					$this->model->saveLastNameAdmin($data);
					?> <script>location='<?php echo BASE; ?>settings/index/<?php echo $userid; ?>'</script> <?php } else {
					$error = rawurlencode(LESS_THAN_20);
					?> <script>location='<?php echo BASE; ?>settings/index/<?php echo $userid; ?>?error=<?php echo $error; ?>'</script> <?php die();
				}
			}
		}
	}

	function saveEmail($userid) {
		$data = array();
		$data['userid'] = $userid;
		$data['email'] = SecureInput::postedVar($_GET['email']);

		$loggedInSession = Session::get('loggedIn');
		$adminSession = Session::get('admin');

		if ($loggedInSession == true && $adminSession == false) {
			if ($_SERVER['REQUEST_METHOD'] == GET) {
				if ((strpos($_GET["email"], "@")) !== false) {
					$this->model->saveEmailStudent($data);
					?> <script>location='<?php echo BASE; ?>settings/index/<?php echo $userid; ?>'</script> <?php } else {
					$error = rawurlencode(EMAIL_NOT_VALID);
					?> <script>location='<?php echo BASE; ?>settings/index/<?php echo $userid; ?>?error=<?php echo $error; ?>'</script> <?php die();
				}
			}
		}

		if ($loggedInSession == false && $adminSession == true) {
			if ($_SERVER['REQUEST_METHOD'] == GET) {
				if ((strpos($_GET["email"], "@") !== false)) {
					$this->model->saveEmailAdmin($data);
					?> <script>location='<?php echo BASE; ?>settings/index/<?php echo $userid; ?>'</script> <?php } else {
					$error = rawurlencode(EMAIL_NOT_VALID);
					?> <script>location='<?php echo BASE; ?>settings/index/<?php echo $userid; ?>?error=<?php echo $error; ?>'</script> <?php die();
				}
			}
		}
	}

	function saveUsername($userid) {
		$data = array();
		$data['userid'] = $userid;
		$data['username'] = SecureInput::postedVar($_GET['username']);

		$loggedInSession = Session::get('loggedIn');
		$adminSession = Session::get('admin');

		if ($loggedInSession == true && $adminSession == false) {
			if ($_SERVER['REQUEST_METHOD'] == GET) {
				if (strlen($_GET["username"]) > 5) {
					$this->model->saveUsernameStudent($data);
					?> <script>location='<?php echo BASE; ?>settings/index/<?php echo $userid; ?>'</script> <?php } else {
					$error = rawurlencode(USERNAME_NOT_VALID);
					?> <script>location='<?php echo BASE; ?>settings/index/<?php echo $userid; ?>?error=<?php echo $error; ?>'</script> <?php die();
				}
			}
		}

		if ($loggedInSession == false && $adminSession == true) {
			if ($_SERVER['REQUEST_METHOD'] == GET) {
				if (strlen($_GET["username"]) > 5) {
					$this->model->saveUsernameAdmin($data);
					?> <script>location='<?php echo BASE; ?>settings/index/<?php echo $userid; ?>'</script> <?php } else {
					$error = rawurlencode(USERNAME_NOT_VALID);
					?> <script>location='<?php echo BASE; ?>settings/index/<?php echo $userid; ?>?error=<?php echo $error; ?>'</script> <?php die();
				}
			}
		}
	}

	function savePassword($userid) {
		$data = array();
		$data['userid'] = $userid;
		$data['password'] = SecureInput::postedVar(Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY));

		$loggedInSession = Session::get('loggedIn');
		$adminSession = Session::get('admin');

		if ($loggedInSession == true && $adminSession == false) {
			if ($_SERVER['REQUEST_METHOD'] == POST) {
				if (strlen($_POST["password"]) > 8) {
					$this->model->savePasswordStudent($data);
					?> <script>location='<?php echo BASE; ?>settings/index/<?php echo $userid; ?>'</script> <?php } else {
					$error = rawurlencode(PASSWORD_NOT_VALID);
					?> <script>location='<?php echo BASE; ?>settings/index/<?php echo $userid; ?>?error=<?php echo $error; ?>'</script> <?php die();
				}
			}
		}

		if ($loggedInSession == false && $adminSession == true) {
			if ($_SERVER['REQUEST_METHOD'] == POST) {
				if (strlen($_POST["password"]) > 8) {
					$this->model->savePasswordAdmin($data);
					?> <script>location='<?php echo BASE; ?>settings/index/<?php echo $userid; ?>'</script> <?php } else {
					$error = rawurlencode(PASSWORD_NOT_VALID);
					?> <script>location='<?php echo BASE; ?>settings/index/<?php echo $userid; ?>?error=<?php echo $error; ?>'</script> <?php die();
				}
			}
		}
	}

	public function delete($userid) {
		$loggedInSession = Session::get('loggedIn');
		$adminSession = Session::get('admin');

		if ($loggedInSession == true && $adminSession == false) {
			$data = array();
			$data['userid'] = $userid;

			$this->model->deleteStudent($userid);
			header("location: " . BASE . "home/logout");
		}

		if ($loggedInSession == false && $adminSession == true) {
			$data = array();
			$data['userid'] = $userid;

			$this->model->deleteAdmin($userid);
			header("location: " . BASE . "admin/logout");
		}
	}
}
?>