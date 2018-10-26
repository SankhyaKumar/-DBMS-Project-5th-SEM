<?php

	require 'connect.inc.php';
	if (!$mysql_connect) {
    die("Connection failed: " . mysqli_connect_error());
	}
	$query="update seats set filled_seats=0";
	$result=mysqli_query($mysql_connect,$query);
	$query1="update students set allocated=0";
	$result1=mysqli_query($mysql_connect,$query1);
	if(isset($_POST["reset"])){
		$query1="update students set password='".$_POST["reset_password"]."' where app_no=".$_SESSION["app_no"];
		$query2="update students set email='".$_POST["reset_email"]."' where app_no=".$_SESSION["app_no"];
		$query3="update students set phone='".$_POST["reset_phone"]."' where app_no=".$_SESSION["app_no"];
		mysqli_query($mysql_connect,$query1);
		mysqli_query($mysql_connect,$query2);
		mysqli_query($mysql_connect,$query3);
	}

?>