<?php
	require 'core.inc.php';
	require 'connect.inc.php';
	
	if(loggedin())
	{
		$firstname = getuserfield('first_name');
		echo 'You are logged in '.$firstname.'<br />';
		echo '<a href="preferences.php">edit preferences</a><br />';
		echo '<a href="logout.php">log out</a><br />';
	}
	else
	{
		include 'loginform.inc.php';
	}
?>