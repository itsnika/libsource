<?php
class View {
	function __construct() {
		$this->model = new Model();
	}

	public function render($name, $noInclude = false) {
		require "views/" . $name . ".php";
	}
}
?>