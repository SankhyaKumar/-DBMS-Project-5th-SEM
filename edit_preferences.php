<?php
	require 'connect.inc.php';
	require 'core.inc.php';
	
	$code = $_POST["code"];
	
	// remove
	if($code=="1")
	{
		$choice = $_POST["preference"];
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
	elseif($code=="2")
	{
		$branch = $_POST["branches"];
		$college = $_POST["colleges"];
		$query="SELECT * FROM pref WHERE app_no='".$_SESSION['app_no']."'";
		if($preferences = mysqli_query($mysql_connect, $query))
		{
			$preferences = mysqli_query($mysql_connect, $query);
			
			$pref_no = mysqli_num_rows($preferences);
			//echo $req_pref["clg_id"];
			$f=0;
			$curr_pref = mysqli_fetch_assoc($preferences);
			for($i=0; $i < $pref_no; $i++)
			{
				$curr_pref = mysqli_fetch_assoc($preferences);
				if($curr_pref['clg_id']==$college && $curr_pref['branch_id']==$branch)
				{
					$f=1;
					echo 'This selection has already been made';
					break;
				}
			}
			if($f==0)
			{
				if(!($max_pref=mysqli_query($mysql_connect, "SELECT pref_no from pref group by app_no having app_no=".$_SESSION['app_no']." order by pref_no desc" )))
					$max_pref=0;
				else
				{
					$max_pref=mysqli_fetch_assoc($max_pref);
					$max_pref=$max_pref['pref_no'];
				}
				$query="INSERT INTO pref VALUES(".$_SESSION['app_no'].",".($max_pref+1).",".$college.",".$branch.")";
				if(! $res=mysqli_query($mysql_connect,$query))
				{
					echo 'error processing';
				}
				header('Location: '.$http_referer);
			}
		}
		else
		{
			echo 'error running query';
		}
	}
?>
