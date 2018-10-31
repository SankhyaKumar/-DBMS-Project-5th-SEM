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

		<?php
			$sql="select profile_pic from students where app_no=".$_SESSION["app_no"];
			$result=mysqli_query($mysql_connect,$sql);
			$data=mysqli_fetch_assoc($result);
			if ($data["profile_pic"]!=""){
				?><img src="<?php echo "uploads/".$data['profile_pic']/*.$data["profile_pic"];*/ ?>" height="200" width="200">
				<?php
			}

		?>
		
		<h1>Profile</h1>
		Application number  :<?php  $query='select app_no from students where app_no='.$_SESSION['app_no'];
			$result=mysqli_query($mysql_connect,$query);
			$data=mysqli_fetch_assoc($result);
			echo $data['app_no'];
		?>

<br><br>
		Name  :<?php
		$query="select first_name,last_name from students where app_no=".$_SESSION["app_no"];
		if($conn=mysqli_query($mysql_connect,$query)){
			while($row=mysqli_fetch_assoc($conn)){
				echo $row['first_name']."  ".$row['last_name'];
			}
		}
		?>
		<br><br>	
		Email address:<?php
			$query="select email from students where app_no=".$_SESSION["app_no"];
			$result=mysqli_query($mysql_connect,$query);
			$data=mysqli_fetch_assoc($result);
			echo $data["email"];
		?>
		<br><br>
		Phone number is :<?php
			$query="select phone from students where app_no=".$_SESSION["app_no"];
			$result=mysqli_query($mysql_connect,$query);
			$data=mysqli_fetch_assoc($result);
			echo $data["phone"];
		?>
		<br><br>
		<form action="upload_file.php" method="post" enctype="multipart/form-data">
    	Select image to upload(in jpeg format) and 12th marksheet(in pdf format):<br>
    	<input type="file" name="file[]" required="" multiple="multiple"><br><br>
    	<input type="file" name="file[]" required="" multiple="multiple"><br><br>
    	<!--<input type="submit" value="Upload" name="new">-->
    	<input type="submit" value="change" name="change">
		</form>
		<br>
		<h2>Edit profile</h2>
		<form action="reset.php" method="post">
		New password:<input type="password" name="reset_password">
		<br>
		New email address:<input type='text' name="reset_email">
		<br>
		New phone number:<input type='text' name="reset_phone">
		<br>
		<input type="submit" name="reset">
	    </form>
	    <?php
	    	$query="select ms_12th from students where app_no=".$_SESSION["app_no"];
	    	if($result=mysqli_query($mysql_connect,$query))
			{
				$data=mysqli_fetch_assoc($result);
				$output=$data["ms_12th"];
				if($output!=""){
					?>
					<a href="<?php echo "uploads/".$output; ?>" target="_blank">download your marksheet for review</a>
					<?php
				}
			}
	    ?>
		
		
		
<?php
	}
	else if(loggedin() && $_SESSION['login_type']=='college'){
		
		echo '<a href="logout.php">log out</a><br />';
	}
	else if(loggedin() && $_SESSION['login_type']=='admin'){
		
		echo '<a href="logout.php">log out</a><br />';
	}
	else
	{
		include 'loginform.inc.php';
	}
?>