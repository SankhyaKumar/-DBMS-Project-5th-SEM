
<?php
	require 'connect.inc.php';
	
	$application_no=array();
	$allocated=array();
	if (!$mysql_connect) {
    die("Connection failed: " . mysqli_connect_error());
	}


	$query="select app_no from exam_result order by rank asc";
	$result = mysqli_query($mysql_connect,$query);
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)) {
        	//echo $row["app_no"];
        	//$a=$row["app_no"];
        	//echo $row["app_no"]."<br>";
        	array_push($application_no,$row["app_no"]);
		}
	}
	else{
		echo "0 rows fetched";
	}
	for($x=0;$x<sizeof($application_no);$x++){
		//$sql="select allocated from students where app_no=".$application_no["$x"];
		//echo $application_no["$x"]."<br>";
		$query1="select clg_id,branch_id from pref where app_no =".$application_no[$x]." order by pref_no asc";
		//$sql_result=mysqli_query($mysql_connect,$sql);
		
		$result1 = mysqli_query($mysql_connect,$query1);
		if(mysqli_num_rows($result1) > 0){
    		while($row1= mysqli_fetch_assoc($result1)) {
       			$query2="select filled_seats,total_seats from seats where clg_id =".$row1["clg_id"]." and branch_id=".$row1["branch_id"];

     			$sql="select allocated from students where app_no=".$application_no["$x"];

     			$sql_result=mysqli_query($mysql_connect,$sql);
     			$data=mysqli_fetch_assoc($sql_result);

     			
     			echo $row1["clg_id"]."   ".$row1["branch_id"]."<br>";
       			if($conn=mysqli_query($mysql_connect,$query2)){

    			if(mysqli_num_rows($conn)>0 ){

    				while($row2= mysqli_fetch_assoc($conn)  ){
    					
    					//echo $row2["filled_seats"]." ".$data["allocated"]."<br>";
    					if($row2["filled_seats"]<$row2["total_seats"] && $data["allocated"]==0){
    						echo $data["allocated"]."   ".$row2["filled_seats"]."   ".$row2["total_seats"]."<br>";
    						//echo "check";
    						//echo $data["allocated"]."<br>";
    						$query3="update seats set filled_seats=filled_seats+1 where clg_id=".$row1["clg_id"]." and branch_id=".$row1["branch_id"];
    						$result3=mysqli_query($mysql_connect,$query3);
    						$query4="update students set allocated=1 where app_no=".$data["allocated"];
    						$result4=mysqli_query($mysql_connect,$query4);
    						break;
    					}
    				}
    			}
    		}
    		else{
    			echo "error";
    			}
    		}
    		}
   		else{
        	echo "no result fetched in the inside while";
    	}
	}
?>