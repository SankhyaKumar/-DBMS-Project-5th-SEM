<?php
	require 'core.inc.php';
	require 'connect.inc.php';

	$query1="update student set allocated=2 where app_no="$_SESSION['verify_app_no'];
	mysqli_query($mysql_connect,$query1);
	header('Location: index.php');
?>