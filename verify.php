<?php
	require 'core.inc.php';
	require 'connect.inc.php';
	require('PHPMailer/PHPMailer.php');
	require('PHPMailer/SMTP.php');
	require('PHPMailer/Exception.php');

	$query1="update students set allocated=2 where app_no=".$_POST['data_app_no'];
	$query = "select email from students where app_no=".$_POST['data_app_no'];
	mysqli_query($mysql_connect,$query1);
	if($result = mysqli_query($mysql_connect, $query))
	{
		if(mysqli_num_rows($result) == 0)
		{
			echo 'invalid application no.<br>';
		}
		else{
			$result=mysqli_fetch_assoc($result);
			echo $result['email'];
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
					$mail->Subject = 'college alloted';
					$mail->Body    = "you have been alloted a college please check your profile on collegezone for further rederences";
					//$mail->AltBody = "current password:".$pass." You can change the password later.";

					$mail->send();
					echo 'Your details have been sent. Thank You.';
					header('Location: index.php');
				} catch (Exception $e) {
					echo  'Details could not be sent.';
				}
		}
	}
	else{
		echo "no query executed";
	}
	//header('Location: index.php');
	echo $result['email'];
?>