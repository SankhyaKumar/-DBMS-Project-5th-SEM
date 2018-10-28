<?php
	require 'connect.inc.php';
	require 'core.inc.php';
	
	if(!loggedin())
	{
		header('Location: index.php');
	}
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
					$query="SELECT * FROM pref WHERE app_no='".$_SESSION['app_no']."' order by pref_no";
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
								<option value="<?php echo ($i+1);?>"><?php echo ($i+1).". ".$college_name["clg_name"]."(".$branch_name["branch_name"].")";?></option>
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
				function moveUp()
				{
					var choice=document.getElementById("preference").value;
					
					if(choice=='')
					{
						alert("Please select an option.");
					}
					else
					{
						document.getElementById("code").value="3";
						document.getElementById("preference_form").action='edit_preferences.php';
					}
				}
				function moveDown()
				{
					var choice=document.getElementById("preference").value;
					
					if(choice=='')
					{
						alert("Please select an option.");
					}
					else
					{
						document.getElementById("code").value="4";
						document.getElementById("preference_form").action='edit_preferences.php';
					}
				}
			</script>
			<input type="hidden" name="code" id="code" value="0">
			<input type="submit" value="Remove" onclick="removePref()"><br>
			<input type="submit" value="Move Up" onclick="moveUp()"><br>
			<br>
			<br>
			Add a choice:<br><br>
			College:<br>
			<select name="colleges" id="colleges" style="width:400px;" size=10>
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
							
							<option onclick="updateBranch(this.value)" value="<?php echo $curr_college['clg_id']?>"><?php echo $curr_college["clg_name"]?></option>
							
							<?php
						}
					}
					
				?>
			</select>
			<br>
			<script type="text/javascript">
				function updateBranch(str)
				{
					if (str == "") {
						document.getElementById("branches").innerHTML = "";
						return;
					} else { 
						if (window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest();
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						xmlhttp.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
								document.getElementById("branches").innerHTML = this.responseText;
							}
						};
						xmlhttp.open("GET","update_branches.php?q="+str,true);
						xmlhttp.send();
					}
					updateRank(str);
				}
				function updateRank(str)
				{
					if (str == "") {
						document.getElementById("clg_info").innerHTML = "";
						return;
					} else { 
						if (window.XMLHttpRequest) {
							xmlhttp = new XMLHttpRequest();
						} else {
							xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						xmlhttp.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
								document.getElementById("clg_info").innerHTML = this.responseText;
							}	
						};
						xmlhttp.open("GET","update_rank.php?q="+str,true);
						xmlhttp.send();
					}
				}
			</script>
			Branch:<br>
			<select name="branches" id="branches" style="width:400px;" size=10>
			</select>
			<div id="clg_info">
			</div>
			<br>
			<input type="submit" value="Add" onclick="addPref()">
			<script type="text/javascript">
				function addPref()
				{
					var college=document.getElementById("colleges").value;
					var branch=document.getElementById("branches").value;
					if(college=='' || branch=='')
					{
						alert("Please select an option.");
					}
					else
					{
						document.getElementById("code").value="2";
						document.getElementById("preference_form").action='edit_preferences.php';
					}
				}
			</script>
			
		</form>
	</body>
</html>