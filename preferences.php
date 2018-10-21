<?php
	require 'connect.inc.php';
	require 'core.inc.php';
?>

<html>
	<head>
		<title>Councelling</title>
	</head>
	<body>
		Current preference list:<br />
		<form method="post" action="#" id="preference_form">
			<!-- put options through php -->
			<select id="preference" name="preference" size=10 style="width:400px;">
				<?php
					$query="SELECT * FROM pref WHERE app_no='".$_SESSION['app_no']."'";
					if($preferences = mysqli_query($mysql_connect, $query))
					{
						$preferences = mysqli_query($mysql_connect, $query);
						
						$pref_no = mysqli_num_rows($preferences);
						for($i=0; $i < $pref_no; $i++)
						{
							$curr_pref = mysqli_fetch_assoc($preferences);
							$query="SELECT clg_name FROM colleges WHERE clg_id='".$curr_pref['clg_id']."'";
							$college_name = mysqli_query($mysql_connect, $query);
							$college_name = mysqli_fetch_assoc($college_name);
							
							$query="SELECT branch_name FROM branches WHERE branch_id='".$curr_pref['branch_id']."'";
							$branch_name = mysqli_query($mysql_connect, $query);
							$branch_name = mysqli_fetch_assoc($branch_name);
							?>
								<option value="<?php echo ($i);?>"><?php echo ($i+1).". ".$college_name["clg_name"]."(".$branch_name["branch_name"].")";?></option>
							<?php
						}
						//$query_row = mysqli_fetch_assoc($query_run);
					}
					else
					{
						echo 'error running query';
					}
				?>
			</select>
			<br />
			<script type="text/javascript">
				function removePref()
				{
					var choice=document.getElementById("preference").value;
					
					if(choice=='')
					{
						alert("Please select an option.");
					}
					else
					{
						document.getElementById("code").value="1";
						document.getElementById("preference_form").action='edit_preferences.php';
					}
				}
			</script>
			<input type="hidden" name="code" id="code" value="0">
			<input type="submit" value="Remove" onclick="removePref()">
			<br>
			<br>
			Add a choice:<br><br>
			College:<br>
			<select style="width:400px;" size=10>
				<?php
					$query="SELECT * FROM colleges";
					if($colleges = mysqli_query($mysql_connect, $query))
					{
						$colleges = mysqli_query($mysql_connect, $query);
						$col_num = mysqli_num_rows($colleges);
		
						for($i=0; $i < $col_num; $i++)
						{
							$curr_college = mysqli_fetch_assoc($colleges);
							?>
							
							<option value="<?php $curr_college['clg_id']?>"><?php echo $curr_college["clg_name"]?></option>
							
							<?php
						}
					}
					
				?>
			</select>
			<br>
			Branch:<br>
			<select style="width:400px;" size=10>
				
			</select>
		</form>
	</body>
</html>