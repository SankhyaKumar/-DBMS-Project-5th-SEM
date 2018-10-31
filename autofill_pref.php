<?php

	require 'core.inc.php';
	require 'connect.inc.php';


	$query1="select app_no from students";

	if($result=mysqli_query($mysql_connect,$query1)){
		echo 'hi';
		$result1=mysqli_query($mysql_connect,$query1);
		while($data=mysqli_fetch_assoc($result1)){
			echo $data['app_no']."<br>";
			
			//echo "  ".$rand1."  ".$rand2."<br>";
			for ($i=1;$i<=5;$i++){
				$rand1=1000+rand(1,100);
				$rand2=10000+rand(1,35);
				echo "  ".$rand1."  ".$rand2."  ".$data['app_no']." ".$i."<br>";
				$query2="insert into pref values(".$data['app_no'].",".$i.",".$rand2.",".$rand1.")";
				if(!mysqli_query($mysql_connect,$query2)){
					//mysqli_query($mysql_connect,$query2);
					echo "error doing query";
				}
				

			}
		}
	}
	

?>