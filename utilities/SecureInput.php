<?php
/**
 * @desc SecureInput Class
 */
class SecureInput {
	public static function postedVar($input) {
		$input = trim($input);
		$input = stripcslashes($input);
		$input = stripslashes($input);
		$input = htmlentities($input);
		$input = htmlspecialchars($input);
		$input = addslashes($input);

		return $input;
	}
}
?>