<?php
class Policies extends Controller {
	function __construct() {
		parent::__construct();
		$this->view->js = array('policies/js/index');
	}

	public function conds() {
		$this->view->title = 'Terms and Conditions';

		$this->view->render('header');
		$this->view->render('policies/conds');
		$this->view->render('footer');
	}

	public function privacy() {
		$this->view->title = 'Privacy Policy';

		$this->view->render('header');
		$this->view->render('policies/privacy');
		$this->view->render('footer');
	}

	public function cookies() {
		$this->view->title = 'Cookie Policy';

		$this->view->render('header');
		$this->view->render('policies/cookies');
		$this->view->render('footer');
	}

	public function disclaimer() {
		$this->view->title = 'Disclaimer';

		$this->view->render('header');
		$this->view->render('policies/disclaimer');
		$this->view->render('footer');
	}

	public function eula() {
		$this->view->title = 'End-User License Agreement (EULA)';

		$this->view->render('header');
		$this->view->render('policies/eula');
		$this->view->render('footer');
	}

	public function service() {
		$this->view->title = 'Terms of Service';

		$this->view->render('header');
		$this->view->render('policies/service');
		$this->view->render('footer');
	}

	public function use () {
		$this->view->title = 'Terms of use';

		$this->view->render('header');
		$this->view->render('policies/use');
		$this->view->render('footer');
	}

	public function gdpr() {
		$this->view->title = 'GDPR Privacy Policy';

		$this->view->render('header');
		$this->view->render('policies/gdpr');
		$this->view->render('footer');
	}
}
?>