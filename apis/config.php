<?php
//ob_start("ob_gzhandler");
error_reporting(0);
session_start();

/* DATABASE CONFIGURATION */
/* define('DB_SERVER', 'sql213.unaux.com');
define('DB_USERNAME', 'unaux_21421175');
define('DB_PASSWORD', 'pawan1234');
define('DB_DATABASE', 'unaux_21421175_expense');
define("BASE_URL", "http://expense.unaux.com/apis/");
define("SITE_KEY", 'yourSecretKey'); */

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'expenset');
define("BASE_URL", "http://localhost/expense_api/apis/");
define("SITE_KEY", 'yourSecretKey');


function getDB() {
	$dbhost       = DB_SERVER;
	$dbuser       = DB_USERNAME;
	$dbpass       = DB_PASSWORD;
	$dbname       = DB_DATABASE;
	$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

	$dbConnection->exec("set names utf8");
	$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbConnection;
}
/* DATABASE CONFIGURATION END */

/* API key encryption */
function apiToken($session_uid) {
	$key = md5(SITE_KEY.$session_uid);
	return hash('sha256', $key);
}

?>
