<?php
	require 'connect.inc.php';
	require 'core.inc.php';
	
	$code = $_POST["code"];
	
	// remove
	if($code=="1")
	{
		$choice = $_POST["preference"];
		$query="SELECT * FROM pref WHERE app_no=".$_SESSION['app_no']." order by pref_no";
		if($preferences = mysqli_query($mysql_connect, $query))
		{
			
			$pref_no = mysqli_num_rows($preferences);
			//echo $req_pref["clg_id"];
			$curr_pref = mysqli_fetch_assoc($preferences);
			for($i=1; $i < $pref_no && $i < $choice; $i++)
			{
				$curr_pref = mysqli_fetch_assoc($preferences);
			}
			$priority = $curr_pref['pref_no'];
			$query="DELETE FROM pref WHERE app_no='".$_SESSION['app_no']."' AND clg_id='".$curr_pref['clg_id']."' AND branch_id='".$curr_pref['branch_id']."'";
			if(mysqli_query($mysql_connect, $query))
			{
				$query="select max(pref_no) as max from pref group by app_no having app_no='".$_SESSION['app_no']."'";
				if($query=mysqli_query($mysql_connect, $query))
				{
					if(mysqli_num_rows($query)!=0)
					{
						$max_pref=mysqli_fetch_assoc($query);
						$max_pref=$max_pref['max'];
						echo $max_pref;
						echo '<Br>';
						echo $priority;
						if($priority<$max_pref)
						{
							$query="update pref set pref_no = pref_no - 1 WHERE pref_no > ".$priority;
							if(!mysqli_query($mysql_connect, $query))
							{
								echo 'error running query1.';
							}
							else
							{
								echo 'done';
							}
						}
					}
				}
				
				header('Location: '.$http_referer);
			}
			else
			{
				echo 'error running query2.';
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
			// limit 30
			if(pref_no > 30)
			{
				echo 'Max 30 preferences allowed.<br>';
			}
			else
			{
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
					if(!($max_pref=mysqli_query($mysql_connect, "SELECT pref_no from pref where app_no=".$_SESSION['app_no']." order by pref_no desc" )))
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
		}
		else
		{
			echo 'error running query';
		}
	}
	elseif($code=="3")
	{
		// move up
		$curr_pref = $_POST['preference'];
		$query = "select * from pref where pref_no='".$curr_pref."' and app_no='".$_SESSION['app_no']."'";
		if($result = mysqli_query($mysql_connect,$query))
		{
			$result = mysqli_fetch_assoc($result);
			$college = $result['clg_id'];
			$branch = $result['branch_id'];
			if($curr_pref != 1)
			{
				$query1 = "update pref set pref_no=pref_no+1 where app_no='".$_SESSION['app_no']."' and pref_no=".($curr_pref-1)."";
				$query2 = "update pref set pref_no=pref_no-1 where branch_id = '".$branch."' and clg_id='".$college."' and app_no='".$_SESSION['app_no']."'";
				if(mysqli_query($mysql_connect,$query1) &&  mysqli_query($mysql_connect,$query2))
				{
					header('Location: preferences.php');
				}
				else
				{
					echo 'some error';
				}
			}
		}
		else
		{
			echo 'some error';
		}
	}
?>
