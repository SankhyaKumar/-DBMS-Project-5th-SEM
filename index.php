<?php
	require 'core.inc.php';
	require 'connect.inc.php';
	
	if(loggedin() && $_SESSION['login_type']=='student')
	{
		$firstname = getuserfield('first_name');
		echo 'You are logged in '.$firstname.'<br />';
		echo '<a href="preferences.php">edit preferences</a><br />';
		echo '<a href="logout.php">log out</a><br />';
?>

<form action="upload_file.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="file" id="fileToUpload">
    <input type="submit" value="Upload" name="submit">
</form>
<?php
		$query="select first_name,last_name from students where app_no=".$_SESSION["app_no"];
		if($conn=mysqli_query($mysql_connect,$query)){
			while($row=mysqli_fetch_assoc($conn)){
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


