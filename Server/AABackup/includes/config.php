<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('UTC');

//database credentials
define('DBHOST','localhost');
define('DBUSER','kdevil2k');
define('DBPASS','kS!95127541');
define('DBNAME','kdevil2k');

try 
{
	//create PDO connection
	$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	//show error
    echo $e->getMessage();
    exit;
}

//include the user class, pass in the database connection
include('classes/user.php');
$user = new User($db);
?>
