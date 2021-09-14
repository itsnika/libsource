<?php
class Authentication {
	// when client is in not logged in pages as logged in
	public static function isInNotLoggedInPages() {
		@session_start();
		ob_start();

		$loggedIn = Session::get('loggedIn');
		$admin = Session::get('admin');

		if ($loggedIn == false && $admin == true) {
			header('location: ' . BASE . 'admin');
			exit;
		}

		if ($loggedIn == true && $admin == false) {
			header('location: ' . BASE . 'home');
			exit;
		}
	}

	// when client is in logged in pages as not logged in
	public static function isInLoggedInPages() {
		@session_start();
		ob_start();

		$loggedIn = Session::get('loggedIn');
		$admin = Session::get('admin');

		if ($loggedIn == false && $admin == false) {
			header('location: ' . BASE . 'login');
			exit;
		}
	}

	// when client is in logged in pages as logged in as admin
	public static function isAdminOnLoggedInStudentPages() {
		@session_start();
		ob_start();

		$loggedIn = Session::get('loggedIn');
		$admin = Session::get('admin');

		if ($loggedIn == false && $admin == true) {
			header('location: ' . BASE . 'admin');
			exit;
		}
	}

	// when client is in logged in pages as logged in as a student
	public static function isStudentOnLoggedInAdminPages() {
		@session_start();
		ob_start();

		$loggedIn = Session::get('loggedIn');
		$admin = Session::get('admin');

		if ($loggedIn == true && $admin == false) {
			header('location: ' . BASE . 'home');
			exit;
		}
	}

	// admin and home should have user id parameter in url
	public static function adminAndHomeId() {
		@session_start();
		ob_start();

		$loggedIn = Session::get('loggedIn');
		$admin = Session::get('admin');

		if ($loggedIn == true && $admin == false) {
			$segments = explode('/', $_SERVER['REQUEST_URI']);

			if ($segments[3] !== "logout" && empty($segments[4])) {
				header('location: ' . BASE . 'home/index/' . Session::get('userid'));
				exit;
			}
		}

		if ($loggedIn == false && $admin == true) {
			$segments = explode('/', $_SERVER['REQUEST_URI']);

			if ($segments[3] !== "logout" && empty($segments[4])) {
				header('location: ' . BASE . 'admin/index/' . Session::get('id'));
				exit;
			}
		}
	}

	// book page must have an id as a parameter
	public static function bookId() {
		$segments = explode('/', $_SERVER['REQUEST_URI']);

		if (empty($segments[4])) {
			header("location: " . BASE . "search");
			exit;
		}
	}

	// admins can't reserve books
	public static function noReserveForAdmin() {
		@session_start();
		ob_start();

		$loggedIn = Session::get('loggedIn');
		$admin = Session::get('admin');

		if ($loggedIn == false && $admin == true) {
			$segments = explode('/', $_SERVER['REQUEST_URI']);

			if ($segments[3] == "reserve") {
				header("location: " . BASE . "book/index/" . $segments[4]);
				exit;
			}
		}
	}

	// profile page must hold only the current id
	public static function profileCurrentId() {
		@session_start();
		ob_start();

		$loggedIn = Session::get("loggedIn");
		$segments = explode('/', $_SERVER['REQUEST_URI']);

		if ($loggedIn == true && $admin == false) {
			$userid = Session::get("userid");

			if ($segments[2] == "profile" && $segments[4] !== $userid) {
				header("location: " . BASE . "profile/index/" . $userid);
				exit;
			}
		}
	}

	// settings page should have user id parameter in url
	public static function settingsId() {
		@session_start();
		ob_start();

		$loggedIn = Session::get('loggedIn');
		$admin = Session::get('admin');

		if ($loggedIn == true && $admin == false) {
			$segments = explode('/', $_SERVER['REQUEST_URI']);

			if (empty($segments[4])) {
				header('location: ' . BASE . 'settings/index/' . Session::get('userid'));
				exit;
			}
		}

		if ($loggedIn == false && $admin == true) {
			$segments = explode('/', $_SERVER['REQUEST_URI']);

			if (empty($segments[4])) {
				header('location: ' . BASE . 'settings/index/' . Session::get('id'));
				exit;
			}
		}
	}

	// profile page should have user id parameter in url
	public static function profileId() {
		@session_start();
		ob_start();

		$loggedIn = Session::get('loggedIn');
		$admin = Session::get('admin');

		if ($loggedIn == true && $admin == false) {
			$segments = explode('/', $_SERVER['REQUEST_URI']);

			if (empty($segments[4])) {
				header('location: ' . BASE . 'profile/index/' . Session::get('userid'));
				exit;
			}
		}
	}
}
?>