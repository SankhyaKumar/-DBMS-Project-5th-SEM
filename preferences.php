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
						<div class='item'><a href="logout.php" class='link'>Logout</a></div>
						<div class='item'><a href="index.php" class='link'>Profile</a></div>
							
						

				</div>

			</div>
			
			<div id='main'>
				<p><b><i>please edit your preferences before 6 nov</i></b></p>
			<h2>Current preference list:</h2>
			<form method="post" action="#" id="preference_form">
				<!-- put options through php -->
				<table>
				<tr>
				<td>
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
				</td>
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
				</script>
				<td>
				<input type="hidden" name="code" id="code" value="0">
				<input class='btn' type="submit" value="Remove" onclick="removePref()"><br>
				<input class='btn' type="submit" value="Move Up" onclick="moveUp()"><br>
				</td>
				</table>
				<h2>Add a choice:</h2>
				<table>
				<tr>
				<td rowspan=2>
				<h3>College:</h3>
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
				</td>
				<td rowspan=2>
				
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
					function updateSeats()
					{
						
						var b=document.getElementById('branches').value;
						var c=document.getElementById('colleges').value;
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
							xmlhttp.open("GET","update_seats.php?b="+b+"&c="+c,true);
							xmlhttp.send();
						
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
				<h3>Branch:</h3>>
				<select name="branches" id="branches" style="width:300px;" size=10>
				</select>
				</td>
				<td>
				<div id="clg_info">
				</div>
				</td>
				<tr>
				<td>
				<input type="submit" class='btn' value="Add" onclick="addPref()">
				</td>
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
			</div><!--main-->
		</div>
	</body>
</html>		