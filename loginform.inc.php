<?php 

if(isset($_POST['app_no']) && isset($_POST['password']))
{
	$app_no = $_POST['app_no'];
	$password = $_POST['password'];
	
	if(!empty($app_no) && !empty($password))
	{
		$password_hash = $password;
		//$password_hash = md5($password);
		$query = "SELECT app_no FROM students WHERE app_no='".mysqli_real_escape_string($mysql_connect, $app_no)."' AND password='".mysqli_real_escape_string($mysql_connect, $password_hash)."'";
		
		if($query_run = mysqli_query($mysql_connect, $query))
		{
			$query_run = mysqli_query($mysql_connect, $query);
			
			$query_num_rows = mysqli_num_rows($query_run);
			if($query_num_rows==0)
			{
				echo 'Invalid id/password.';
			}
			else if($query_num_rows==1)
			{
				$query_row = mysqli_fetch_assoc($query_run);
				$app_no = $query_row['app_no'];
				$_SESSION['app_no'] = $app_no;
				header('Location: index.php');
			}
		}
		else
		{
			echo 'error running query';
		}
	}
	else
	{
		echo 'You must enter a app_no and password.';
	}
}
?>

<form action="<?php echo $current_file; ?>" method="POST">
	Application id: <input type="text" name="app_no" maxlength="20"><br/>
	Password: <input type="password" name="password" maxlength="20"><br/>
	<input type="submit" value="Log In">
</form>