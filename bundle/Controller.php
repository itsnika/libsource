<?php
class Controller {
	public function __construct() {
		$this->view = new View();
		$this->model = new Model();
	}

	/**
	 * @param string $name Name of the model
	 * @param string $path Location of the models
	 */
	public function loadModel($name, $modelPath = "models/") {
		$path = $modelPath . $name . "_model.php";

		if (file_exists($path)) {
			require $modelPath . $name . "_model.php";
			$modelName = $name . "_Model";
			$this->model = new $modelName();
		}
	}
}
?>