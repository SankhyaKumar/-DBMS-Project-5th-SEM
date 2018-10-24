<?php
	require 'core.inc.php';
	require 'connect.inc.php';
	
	if(loggedin() && $_SESSION['login_type']=='student')
	{
		$firstname = getuserfield('first_name');
		echo 'You are logged in '.$firstname.'<br />';
		echo '<a href="preferences.php">edit preferences</a><br />';
		echo '<a href="logout.php">log out</a><br />';

		$query="select first_name,last_name from students where app_no=".$_SESSION["app_no"];
		if($conn=mysqli_query($mysql_connect,$query)){
			echo "hi";
			while($row=mysqli_fetch_assoc($conn)){
				echo "hi12";
				echo $row['first_name']."  ".$row['last_name'];
			}
		}
		
		

	}
	else if(loggedin() && $_SESSION['login_type']=='collegen'){
		
		echo '<a href="logout.php">log out</a><br />';
	}
	else
	{
		include 'loginform.inc.php';
	}
?>

