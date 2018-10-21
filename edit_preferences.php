<?php
	require 'connect.inc.php';
	require 'core.inc.php';
	
	$code = $_POST["code"];
	$choice = $_POST["preference"];
	echo $code;
	// remove
	if($code=="1")
	{
		$query="SELECT * FROM pref WHERE app_no='".$_SESSION['app_no']."'";
		if($preferences = mysqli_query($mysql_connect, $query))
		{
			$preferences = mysqli_query($mysql_connect, $query);
			
			$pref_no = mysqli_num_rows($preferences);
			//echo $req_pref["clg_id"];
			$curr_pref = mysqli_fetch_assoc($preferences);
			for($i=0; $i < $pref_no && $i < $choice; $i++)
			{
				$curr_pref = mysqli_fetch_assoc($preferences);
			}
			$query="DELETE FROM pref WHERE app_no='".$_SESSION['app_no']."' AND clg_id='".$curr_pref['clg_id']."' AND branch_id='".$curr_pref['branch_id']."'";
			if(mysqli_query($mysql_connect, $query))
			{
			header('Location: '.$http_referer);
			}
			else
			{
				echo 'error running query.';
			}
		}
		else
		{
			echo 'error running query';
		}
	}
	
?>
