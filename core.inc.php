<?php
require 'connect.inc.php';
ob_start();
session_start(); 
$current_file = $_SERVER['SCRIPT_NAME'];

if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))
{
	$http_referer = $_SERVER['HTTP_REFERER'];
}
function loggedin()
{
	if(isset($_SESSION['app_no']) && !empty($_SESSION['app_no']))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function getuserfield($field)
{
	global $mysql_connect;
	$query = "SELECT ".$field." FROM students WHERE app_no='".$_SESSION['app_no']."'";
	if($query_run = mysqli_query($mysql_connect, $query))
	{
		$query_run = mysqli_query($mysql_connect, $query);
		$query_row = mysqli_fetch_assoc($query_run);
		$return_field = $query_row[$field];
		return $return_field;
		
	}	
}
?>