<?php
	
	require 'core.inc.php';
	require 'connect.inc.php';

	$query="select total_seats,filled_seats from seats where clg_id=".$_GET['c']." and branch_id=".$_GET['b'];

	//echo $_GET['b']."  ".$_GET['c'];
	$result=mysqli_query($mysql_connect,$query);
	$data=mysqli_fetch_assoc($result);


	echo "Seats left : ".($data['total_seats']-$data['filled_seats'])." out of ".$data['total_seats'];
	
?>