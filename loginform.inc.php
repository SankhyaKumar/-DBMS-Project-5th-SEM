<?php
require('PHPMailer/PHPMailer.php');
require('PHPMailer/SMTP.php');
require('PHPMailer/Exception.php');

?>
<html>
	<head>
		<title>College Zone</title>
		<link href='layout.css' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" type="image/png" href='favicon.png'>

	</head>
	
	<body>
	
	<div id='big_wrapper'>
			<div id='header'>
				<div id='logo'>
					<img src='logo.png' id='logo_img'>
				</div>
				<div id='menu'>
					<button id='toggle_btn' onclick="toggle(this.value)" value=0>Show Login</button><br>
					
					<style type='text/css'>
						#toggle_btn{
							margin-top:20px; border:1px solid white; background: rgba(0,0,0,0);color: white; padding:10px;
						}
						#toggle_btn:hover{
							color:yellow;
							border:1px solid yellow;
						}
					</style>
			
				</div>
			</div>
			
			<div id='main'>
			<?php
		if(isset($_GET['q']))
			echo 'Password details has been sent to registered email.<br>';
	?>
<?php

 
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); // array to string
}; 

if(isset($_POST['type']) && $_POST['type']=='login')
{
	//echo $_POST['type'];
	if(isset($_POST['app_no']) && isset($_POST['password']))
	{
		
		$choice=$_POST['choice'];
		$app_no = $_POST['app_no'];
		$password = $_POST['password'];
		if($choice=='student'){
			
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
						$_SESSION['login_type']="student";
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
		else if($choice=="college"){
			if(!empty($app_no) && !empty($password))
			{
				$password_hash = $password;
				//$password_hash = md5($password);
				//
				$query = "SELECT clg_id FROM colleges WHERE clg_id='".mysqli_real_escape_string($mysql_connect, $app_no)."' AND clg_password='".mysqli_real_escape_string($mysql_connect, $password_hash)."'";
				
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
						$clg_id = $query_row['clg_id'];
						$_SESSION['app_no'] = $clg_id;
						$_SESSION['login_type']="college";
						
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
		else if($choice="Admin"){

			if(!empty($app_no) && !empty($password))
			{
				$password_hash = $password;
				//$password_hash = md5($password);
				$query = "SELECT user_name FROM admin WHERE user_name='".$_POST["app_no"]."' and password='".$password_hash."'";
				
				if($query_run = mysqli_query($mysql_connect, $query))
				{
					$query_num_rows = mysqli_num_rows($query_run);
					if($query_num_rows==0)
					{
						echo 'Invalid id/password.';
					}
					else if($query_num_rows==1)
					{
						$query_row = mysqli_fetch_assoc($query_run);
						$app_no = $query_row['user_name'];
						$_SESSION['app_no'] = $_POST["app_no"];
						$_SESSION['login_type']="admin";
						header('Location: index.php');
					}
				}
				else
				{
					echo 'error running query...';
				}
			}
			else
			{
				echo 'enter username and password';
			}

		}
	}
}
else if(isset($_POST['type']) && $_POST['type']='request')
{
	$app_no = $_POST['app_no_req'];
	$query = "select email,password from students where app_no='".$app_no."'";
	if($result = mysqli_query($mysql_connect, $query))
	{
		if(mysqli_num_rows($result) == 0)
		{
			echo 'invalid application no.<br>';
		}
		else
		{
			$result=mysqli_fetch_assoc($result);
			if($result['password']!='')
			{
				echo 'password already requested.';
			}
			else
			{
				$pass=randomPassword();
				$query = "update students set password='".$pass."' where app_no='".$app_no."'";
				if(!mysqli_query($mysql_connect,$query))
					echo 'error';
				$mail = new PHPMailer\PHPMailer\PHPMailer();;                
				try {
					
					$mail->SMTPDebug = 2;          
					$mail->isSMTP();               
					$mail->Host = 'smtp.gmail.com';
					$mail->SMTPAuth = true;                             
					$mail->Username = 'rishabh.kalakoti@gmail.com';     
					$mail->Password = 'Percy@3538';                     
					$mail->SMTPSecure = 'tls';                          
					$mail->Port = 587;                                  

					$mail->setFrom('rishabh.kalakoti@gmail.com', 'Mailer');
					$mail->addAddress($result['email']);     
					
					$mail->isHTML(true);                                
					$mail->Subject = 'Password request';
					$mail->Body    = "current password:".$pass."<br>You can change the password later.";
					$mail->AltBody = "current password:".$pass." You can change the password later.";

					$mail->send();
					echo 'Your details have been sent. Thank You.';
					header('Location: index.php?q=1');
				} catch (Exception $e) {
					echo  'Details could not be sent.';
				}
			}
		}
	}
	else
	{
		echo 'error running query<br>';
	}
}

?>

			<script type='text/javascript'>
				function toggle(flag)
				{
					if(flag==0)
					{
						document.getElementById('login_info').style.display='block';
						document.getElementById('toggle_btn').value=1;
						document.getElementById('toggle_btn').innerHTML='Hide Login';
					}
					else
					{
						document.getElementById('login_info').style.display='none';
						document.getElementById('toggle_btn').value=0;
						document.getElementById('toggle_btn').innerHTML='Show Login';
					}
				}
			</script>
<div id='login_info'>
<form action="<?php echo $current_file; ?>" method="POST">
	<input type="hidden" id="type" value="login" name="type">
	<table style='margin:auto;'>
	<tr>
	<td>User login type: </td>
	<td>
	<select id='choice' name="choice" onchange='changeVal()'>
		<option  value="college">college</option>
		<option  value="student" selected>student</option>
		<option  value="Admin">Admin</option>

	</select>
	</td>



	<script type='text/javascript'>
		function changeVal()
		{
			var xd=document.getElementById('xd');
			var str=document.getElementById('choice').value;
			var val='';
			if(str=='Admin')
				val='Username: ';
			else
				val='Login id: ';
			xd.innerHTML = val;
			//alert('XD');
		}
		changeVal();
	</script>
	<tr>
	<td>
	<div id='xd' style="display:inline-block;">
	Login Id: 
	</div>
	</td>
	<td>
	<input type="text" name="app_no" class='txt'> &nbsp;
	</td>
	<tr>
	<td>
	Password: 
	</td>
	<td><input type="password" name="password" class='txt'> </td>
	<Tr>
	<td colspan=2 align='center'><input type="submit" value="Log In" class='btn'></td>
	
	
	<tr>
	<Td colspan=2>
	<i>Don't have a password yet? Request password</i>
	<tr>
	<td>
	Application No: </td>
	<td>
	<input type="text" name="app_no_req" maxlength="20" class='txt'> 
	</td>
	<tr>
	<td colspan=2 align='center'>
	<input type="submit" value="Request" onclick="document.getElementById('type').value='request';" class='btn'>
	</td>
	</table>
</form>
<hr>



</div>



<div style="text-align:center">
  <iframe src='https://cdn.knightlab.com/libs/timeline3/latest/embed/index.html?source=1159G_mIy8MDLgIBlnXWyB36GMq2IqRWxAJqtuvInK-s&font=Default&lang=en&initial_zoom=2&height=500' width='100%' height='500' webkitallowfullscreen mozallowfullscreen allowfullscreen frameborder='0'></iframe>

			<Table>
			<tr>
			<td width="60%" style="padding:50px;">
			<h2 style=''>About CollegeZone</h2>
			<p align='justify'>CollegeZone is a online counselling and admission portal for students aspiring to pursue engineering in india.The portal makes admission procedure of students easy by reducing all manual work by making all possible admission and registration procedures available digitally.We aim to make effort so minimal that when students enter their alloted colleges, all they have to do is go and attend their first lectures and not waste time in signatures and validation!</p>
			</p>
			</td>
			<td width="40%" style=''>
			<h3 style='text-align:center;background-color:rgb(64,188,216); color:white; padding:20px;width:200px;'>External Links</h2>
			<br>
			<a class='link' href='https://josaa.nic.in/webinfocms/Public/View.aspx?page=71' target='blank' style=''>Rank and seat allotment statistics</a>
			<br><br><br>
			<a class='link' href='https://josaa.nic.in/seatinfo/root/InstituteView.aspx' target='blank' style=''>Institute detials</a>
			
			</td>
			</table>
			<p style="margin:20px;">
			
			</div><!--main-->
		</div>
	</body>
	<script src="script.js"></script>
</html>