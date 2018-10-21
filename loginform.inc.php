<?php 

if(isset($_POST['id']) && isset($_POST['password']))
{
	$id = $_POST['id'];
	$password = $_POST['password'];
	
	if(!empty($id) && !empty($password))
	{
		$password_hash = md5($password);
		$query = "SELECT id FROM students WHERE id='".mysqli_real_escape_string($mysql_connect, $id)."' AND password='".mysqli_real_escape_string($mysql_connect, $password_hash)."'";
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
				$user_id = $query_row['id'];
				$_SESSION['id'] = $id;
				header('Location: index.php');
			}
		}
	}
	else
	{
		echo 'You must enter a id and password.';
	}
}
?>

<form action="<?php echo $current_file; ?>" method="POST">
	Application ID: <input type="text" name="id" maxlength="20"><br/>
	Password: <input type="password" name="password" maxlength="20"><br/>
	<input type="submit" value="Log In">
</form>