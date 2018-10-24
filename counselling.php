<?php
	require 'connect.inc.php';

	$query="select app_no from exam_result where app_no in (select app_no from students where allocated='0') order by rank";
	
	if($students = mysqli_query($mysql_connect,$query))
	{	
		$counter1 = mysqli_num_rows($students);
		$i=0;
		while($i < $counter1)
		{
			$curr_student = mysqli_fetch_assoc($students);
			$query = "select * from pref where app_no='".$curr_student['app_no']."' order by pref_no asc";
			if($preferences = mysqli_query($mysql_connect,$query))
			{
				$counter2 = mysqli_num_rows($preferences);
				echo "Student ID: ".$curr_student['app_no']."<br>";
				$j=0;
				while($j<$counter2)
				{
					$f=0;
					$curr_pref = mysqli_fetch_assoc($preferences);
					echo "Preference: ".$curr_pref['clg_id'].",".$curr_pref['branch_id']."<br>";
					
					$query = "select * from seats where clg_id='".$curr_pref['clg_id']."' and branch_id='".$curr_pref['branch_id']."'";
					if($seats = mysqli_query($mysql_connect,$query))
					{
						$curr_seats = mysqli_fetch_assoc($seats);
						if($curr_seats['total_seats'] > $curr_seats['filled_seats'])
						{
							$query1 = "update students set alloted_clg='".$curr_pref['clg_id']."', alloted_branch='".$curr_pref['branch_id']."', allocated='1' where app_no='".$curr_student['app_no']."'";
							$query2 = "update seats set filled_seats='".($curr_seats['filled_seats']+1)."' where clg_id='".$curr_pref['clg_id']."' and branch_id='".$curr_pref['branch_id']."'";
							
							if(!mysqli_query($mysql_connect,$query1))
							{
								echo 'some error 1<br>';
								break;
							}
							if(!mysqli_query($mysql_connect,$query2))
							{
								echo 'some error 2<br>';
								break;
							}
							echo 'successfully alloted.<br>';
							$f=1;
							break;
						}
					}
					else
						echo 'seats query invalid<br>';
					$j++;
					if($f==1)
						break;
				}
			}
			else
				echo 'error inner query.';
			$i++;
		}
	}
	else
		echo 'error executing query.';
?>