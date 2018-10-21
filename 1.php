
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
       			echo $row1["clg_id"]."  ".$row1["branch_id"]."<br>";
       			//array_push($college_id,$row1["clg_id"]);
       			//array_push($id_branch,$row1["branch_id"]);
       			$query2="select filled_seats,total_seats from seats where clg_id =".$row1["clg_id"]." and branch_id=".$row1["branch_id"];


       			if($conn=mysqli_query($mysql_connect,$query2)){
    			//$data=mysqli_fetch_assoc($conn);
    			if(mysqli_num_rows($conn)>0){
    				while($row2= mysqli_fetch_assoc($conn)){
    					if($row2["filled_seats"]<$row2["total_seats"]){
    						$query3="update seats set filled_seats=filled_seats+1";
    						$result3=mysqli_query($mysql_connect,$query3);
    						$query4="update students set allocated=1";
    						$result4=mysqli_query($mysql_connect,$query4);
    					}
    				}
    			}
    		}
    		else{
    			echo "error";
    			
    		}

    		}
    		//$y=0;
    		//$i=5;
    		//while($i--){
    			//break;
    			//$query2="select filled_seats,total_seats from seats where clg_id =".$college_id[$y]." and branch_d=".$id_branch[$y]."";
    		//	if($conn=mysqli_query($mysql_connect,$query2)){
    			//$data=mysqli_fetch_assoc($conn);
    		//	if(mysqli_num_rows($conn)>0){
    		//		if($row2["filled_seats"]<$row2["total_seats"]){
    		//			$query3="update seats set filled_seats=filled_seats+1";
    		//			$result2=mysqli_query($mysql_connect,$query3);
    		//		}
    		//	}
    		//}
    		/*else{
    			echo "error";
    			
    		}*/
    		}
    	
   		else{
        	echo "no result fetched in the inside while";
    	}
	}
	
	
    
	//echo $college_id[1];


	//echo $data["total"];
	

?>