<?php
class Initiator {
	private $_url = null;
	private $_controller = null;

	private $_controllersPath = "controllers/"; // Always include trailing slash
	private $_modelsPath = "models/"; // Always include trailing slash
	private $_errorFile = "error.php";
	private $_indexFile = "index.php";

	/**
	 * Starts the Initiator
	 * @return boolean
	 */
	public function initiate() {
		$this->_fetchUrl();

		// Load the default controller if no URL is set
		if (empty($this->_url[0])) {
			$this->_loadDefaultController();
			return false;
		}

		$this->_loadExistingController();
		$this->_callControllerMethod();
	}

	/**
	 * Fetches the url
	 */
	private function _fetchUrl() {
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$this->_url = explode('/', $url);
	}

	/**
	 * This loads if there is no GET parameter passed through the url
	 */
	private function _loadDefaultController() {
		require $this->_controllersPath . $this->_indexFile;
		$this->_controller = new Index();
		$this->_controller->index();
	}

	/**
	 * Load an existing controller if there IS a GET parameter passed
	 * @return boolean|string
	 */
	private function _loadExistingController() {
		$file = $this->_controllersPath . $this->_url[0] . ".php";

		if (file_exists($file)) {
			require $file;
			$this->_controller = new $this->_url[0];
			$this->_controller->loadModel($this->_url[0], $this->_modelsPath);
		} else {
			$this->_error();
			return false;
		}
	}

	/**
	 * If a method is passed in the GET url paremter
	 *  protocol://host/controller/method/(parameter)/(parameter)/(parameter)
	 *  url[0] = Controller
	 *  url[1] = Method
	 *  url[2] = Parameter
	 *  url[3] = Parameter
	 *  url[4] = Parameter
	 */
	private function _callControllerMethod() {
		$length = count($this->_url);

		// Does the method exist
		if ($length > 1) {
			if (!method_exists($this->_controller, $this->_url[1])) {
				$this->_error();
			}
		}

		// The loading proccess
		switch ($length) {
		case 5:
			//Controller->Method(Parameter1, Parameter2, Parameter3)
			$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
			break;

		case 4:
			//Controller->Method(Parameter1, Parameter2)
			$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
			break;

		case 3:
			//Controller->Method(Parameter1)
			$this->_controller->{$this->_url[1]}($this->_url[2]);
			break;

		case 2:
			//Controller->Method
			$this->_controller->{$this->_url[1]}();
			break;

		default:
			$this->_controller->index();
			break;
		}
	}

	/**
	 * Display an error page if nothing exists
	 * @return boolean
	 */
	private function _error() {
		require $this->_controllersPath . $this->_errorFile;
		$this->_controller = new ErrorCls();
		$this->_controller->index();
		exit;
	}
}
?>