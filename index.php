<?php
/**
 * The project index file
 *
 * Opens the first, loads the resources, then routes to other files
 *
 * PHP version 7.2.5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt. If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   Library Management System, Web-based Application
 * @author     Gerald Nika <nikageri01@gmail.com>
 * @copyright  2018 Gerald Nika
 * @license    http://www.php.net/license/3_01.txt PHP License 3.01
 * @link       https://www.libsource.com/
 * @since      File available since Release 1.0.0
 */

// enable this during page runtime for security purposes
error_reporting(0);

require 'configurations/configuration.php';

require 'utilities/Authentication.php';
require 'utilities/FormValidator.php';
require 'utilities/SecureInput.php';

require 'standarts/errors.php';

// Autoload classes inside bundle
spl_autoload_register(function ($class) {
	require BUNDLE . $class . ".php";
});

// Initialize the Initiator Class
$initiator = new Initiator();
$initiator->initiate();
?>