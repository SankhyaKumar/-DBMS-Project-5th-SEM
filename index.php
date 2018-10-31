

<?php
	require 'core.inc.php';
	require 'connect.inc.php';
	
	$certificates=0;

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
			else if($data["profile_pic"]==""){
				?><img src="upload1.jpg" height="150" width="200">
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
		// $_SESSION['app_no'];
		$sql123="select app_no,first_name,last_name,alloted_branch from students where alloted_clg=".$_SESSION["app_no"];
		
		if($result=mysqli_query($mysql_connect,$sql123)){
			//$result=mysqli_query($mysql_connect,$sql123);
			
				?>

				<table>
						<tr>
							<th>name</th>
							<th>branch allocated</th>
							<th>documents</a></th>
						</tr>

				<?php
				while($data=mysqli_fetch_assoc($result)){

					//$_SESSION['verify_app_no']=$data['app_no'];
					$sql="select allocated from students where app_no=".$data["app_no"];
					$sql12="select ms_12th from students where app_no=".$data["app_no"];

					$sql_result=mysqli_query($mysql_connect,$sql);
					if($sql_result12=mysqli_query($mysql_connect,$sql12)){
						$certificates=1;
					}

					$sql_data=mysqli_fetch_assoc($sql_result);
					//$sql_data12=mysqli_fetch_assoc($sql_result12);
					//$sql_rows=mysqli_num_rows($sql_result12);

					

					?>

					<tr>
						<?php
						if($certificates==1){
							?>
						<td><?php echo $data["first_name"]."  ".$data["last_name"]; ?></td>
						<td><?php echo $data["alloted_branch"]; ?></td>

						<?php  
							if($sql_data['allocated']!=2 && $certificates==1){
								?>
									<form  action="verify.php" method="post">
									<input type="hidden" name="data_app_no" value="$data['app_no']"> 
									<td><a href="<?php echo "uploads/".$sql_data['ms_12th']; ?>" target="_blank">download</a></td>
									<td><input type="submit" name="verify" value="verify" action="verify.php" method="post"></td>
									</form>
								<?php
							}
							else if($sql_data['allocated']==2 && $certificates==1){
								?>
								<form  action="verify.php" method="post">
									<input type="hidden" name="data_app_no" value="$data['app_no']"> 
									<td><a href="<?php echo "uploads/".$sql_data['ms_12th']; ?>" target="_blank">download</a></td>
									<td><input type="text" name="verified"  ></td>
									</form>
									<?php
							}
							
							

						
							}
							?>

					</tr>

					</table>


					<?php
				}

		}
		else {
			echo "error running query";
		}



	}
	else if(loggedin() && $_SESSION['login_type']=='admin'){
		
		echo '<a href="logout.php">log out</a><br />';
		?>
			<a href="counselling.php">start the counselling</a>
		<?php
	}
	else
	{
		include 'loginform.inc.php';
	}
?>
