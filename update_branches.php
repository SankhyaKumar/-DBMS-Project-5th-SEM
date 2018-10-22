<?php
	require 'connect.inc.php';
	require 'core.inc.php';
	
	$q = intval($_GET['q']);
	
	$sql="SELECT branch_name,branch_id FROM branches WHERE branch_id IN (select branch_id from seats where clg_id=".$q.")";
	if($result = mysqli_query($mysql_connect,$sql))
	{
		
		while($row = mysqli_fetch_array($result)) {
			echo "<option value=".$row['branch_id'].">".$row['branch_name']."</option>";
		}
		
	}
	else
	{
		echo 'something is out';
	}
?>