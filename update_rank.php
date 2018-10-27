<?php
	require 'connect.inc.php';
	require 'core.inc.php';
	
	$q = intval($_GET['q']);
	
	$sql="SELECT clg_rank, website FROM colleges WHERE clg_id=".$q;
	if($result = mysqli_query($mysql_connect,$sql))
	{
		while($row = mysqli_fetch_array($result)) {
			echo "Website: ".$row['website']."<br>NIRF rank: ".$row['clg_rank']."";
		}
	}
	else
	{
		echo 'something is out';
	}
?>