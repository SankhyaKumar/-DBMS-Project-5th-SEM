
<?php
	require 'connect.inc.php';
	
	$application_no=array();
	$college_id=array();
	$id_branch=array();
	if (!$mysql_connect) {
    die("Connection failed: " . mysqli_connect_error());
	}
	//$query1="select count(pref_no) as total from pref where app_no in (select app_no from exam_result where app_no order by rank asc)";
	//$result=mysqli_query($mysql_connect,$query1);
	//$data=mysqli_fetch_assoc($result);


	$query="select app_no from exam_result order by rank asc";
	$result = mysqli_query($mysql_connect,$query);
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)) {
        	//echo $row["app_no"];
        	//$a=$row["app_no"];
        	array_push($application_no,$row["app_no"]);

        	/*$query1="select clg_id,branch_id from pref where app_no =".$a." order by pref_no asc";
   			$result1 = mysqli_query($mysql_connect,$query1);
    		if(mysqli_num_rows($result1) > 0){
    			while($row1= mysqli_fetch_assoc($result1)) {
       				echo $row1["clg_id"]."  ".$row1["branch_id"];
       				$clg_id=$row1["clg_id"];
       				$branch_id=$row1["branch_id"];
    			}
    		}
   			else{
        		echo "no result fetched in the inside while";
    		}*/
		}
	}
	else{
		echo "0 rows fetched";
	}

	for($x=0;$x<sizeof($application_no);$x++){
		$query1="select clg_id,branch_id from pref where app_no =".$application_no[$x]." order by pref_no asc";

		$result1 = mysqli_query($mysql_connect,$query1);
		if(mysqli_num_rows($result1) > 0){
    		while($row1= mysqli_fetch_assoc($result1)) {
       			echo $row1["clg_id"]."  ".$row1["branch_id"];
       			array_push($college_id,$row1["clg_id"]);
       			array_push($id_branch,$row1["branch_id"]);
    		}
    		$x=0
    		while(1){
    			$sql="select filled_seats as total from seats where clg_id =".$college_id[$x]." and branch_d=".$id_branch[$x]."";
    			$sql01="select total_seats as total_seats from seats where clg_id =".$college_id[$x]." and branch_d=".$id_branch[$x]."";
    			$conn=mysqli_connect($mysql_connect,$sql);
    			$conn01=mysqli_connect($mysql_connect,$sql01);
    			$data=mysqli_fetch_assoc($conn);
    			$data01=mysqli_fetch_assoc($conn01);
    			if($data["total"]!=$data01["total_filled"]){
    				$sql1="update seats set filled_seats=filled_seats+1 where clg_id=".$college_id[$x]." and branch_id=".$id_branch[$x]."";
    				$sql2="update students set allocation=1";
    				$result2=mysqli_query($mysql_connect,$sql1);
    				$result3=mysqli_query($mysql_connect,$sql2);

    			}
    			else{
    				echo "all the seats are filled";
    				break;
    			}
    		}
    	}
   		else{
        	echo "no result fetched in the inside while";
    	}
	}
	
	
    for($y=)



	//echo $data["total"];
	

?>