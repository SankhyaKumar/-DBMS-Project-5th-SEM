<?php
	require 'connect.inc.php';
	require 'core.inc.php';
	
	$q = intval($_GET['q']);
	
	$sql="SELECT clg_rank,website FROM branches WHERE branch_id IN (select branch_id from seats where clg_id=".$q.")";
	if($result = mysqli_query($mysql_connect,$sql))
	{
		
		while($row = mysqli_fetch_array($result)) {
			echo "NIRF Rank:".$row['clg_rank']."<br>Website: ".$row[website]."<br>";
		}
		
	}
	else
	{
		echo 'something is out';
	}
?>