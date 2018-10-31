<?php
	require 'core.inc.php';
	require 'connect.inc.php';

	$query="select first_name,last_name,alloted_branch where alloted_clg=".$_SESSION["app_no"];
		if($result=mysqli_query($mysql_connect,$query)){
			$result=mysqli_query($mysql_connect,$query);
			echo "<table border='1'>
				<tr>
					<th>name</th>
					<th>branch</th>
				</tr>";
				while($data=mysqli_fetch_assoc($result)){
					echo "<tr>";
					echo "<td>".$data["first_name"]."  ".$data["last_name"]."</td>";
					echo "<td>".$data["alloted_branch"]."</td>";
					echo "</tr>";
				}

		}
?>