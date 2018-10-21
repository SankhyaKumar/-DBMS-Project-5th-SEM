<?php
	require 'core.inc.php';
	require 'connect.inc.php';
	
	if(loggedin())
	{
		$firstname = getuserfield('first_name');
		echo 'You are logged in '.$firstname.'<br />';
	}
	else
	{
		include 'loginform.inc.php';
	}
?>