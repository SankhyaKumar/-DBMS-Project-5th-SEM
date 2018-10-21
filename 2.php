<?php

	require 'connect.inc.php';
	if (!$mysql_connect) {
    die("Connection failed: " . mysqli_connect_error());
	}
	$query="update seats set filled_seats=0";
	$result=mysqli_query($mysql_connect,$query);
	$query1="update students set allocated=0";
	$result1=mysqli_query($mysql_connect,$query1);
	
?>