<?php
/**
 * @desc: Class that holds static methods, used in validating a form.
 */
class FormValidator {
	/**
	 * @method: Checks if the form is set.
	 * @param: $submit -> the form submit.
	 * @param: $fields -> array that holds all the form fields.
	 */
	public static function formIsSet($submit, $fields = array(), $errorRoute) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST[$submit])) {
			for ($i = 0; $i < count($fields); $i++) {
				$field = $fields[$i];

				if (empty($_POST[$field])) {
					$error = rawurlencode(FIELDS_BLANK);
					header("Location: " . BASE . "$errorRoute/index?error=" . $error);
					die();
				}
			}
		} else {
			$error = rawurlencode(FORM_NOT_SET);
			header("Location: " . BASE . "$errorRoute/index?error=" . $error);
			die();
		}
	}

	/**
	 * @method: Checks if the field doesn't exeed maximum character length.
	 * @param: $field -> the field passed.
	 */
	public static function fieldLength($field) {
		if (strlen($_POST[$field]) > 20) {
			$error = rawurlencode(LESS_THAN_20);
			header("Location: " . BASE . "register/index?error=" . $error);
			die();
		}
	}

	/**
	 * @method: Checks if the email is valid according to its criteria.
	 * @param: $email -> email passed.
	 */
	public static function emailValid($email) {
		if (strpos($_POST[$email], "@") == false) {
			if (strpos($_POST[$email], ".com") == false) {
				$error = rawurlencode(EMAIL_NOT_VALID);
				header("Location: " . BASE . "register/index?error=" . $error);
				die();
			}
		}
	}

	/**
	 * @method: Checks if the username is valid.
	 * @param: $username -> username passed.
	 */
	public static function usernameValid($username) {
		if (strlen($_POST[$username]) < 5) {
			$error = rawurlencode(USERNAME_NOT_VALID);
			header("Location: " . BASE . "register/index?error=" . $error);
			die();
		}
	}

	/**
	 * @method: Checks if the password is valid according to its criteria.
	 * @param: $password -> password passed.
	 */
	public static function passwordValid($password) {
		if (strlen($_POST[$password]) < 8) {
			$error = rawurlencode(PASSWORD_NOT_VALID);
			header("Location: " . BASE . "register/index?error=" . $error);
			die();
		}
	}
}
?>