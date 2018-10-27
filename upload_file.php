<?php
	require 'core.inc.php';
	require 'connect.inc.php';
	if(isset($_POST["new"])){
		$total = count($_FILES['file']['name']);
		echo $total."<br>";
		for( $i=0 ; $i < $total ; $i++ ) {
			$tmpFilePath = $_FILES['file']['tmp_name'][$i];
			$filename=$_FILES['file']['name'][$i];

			if($i==0){
			$newFileName=$_SESSION["app_no"]."_profile_".$filename;
			}
			else if($i==1){
				$newFileName=$_SESSION["app_no"]."_12th_".$filename;
			}


			//echo $$newFileName."<br>";
			if ($tmpFilePath != ""){
				$newFilePath = "./uploads/" . $newFileName;
				if((get_file_extension($filename)=="PNG" || get_file_extension($filename)=="jpeg") && !file_exists($newFileName) && $i==0){
					//echo "1";
					move_uploaded_file($tmpFilePath,$newFilePath);
					$query="update students set profile_pic='".$newFileName."' where app_no=".$_SESSION["app_no"];
					mysqli_query($mysql_connect,$query);
					echo $_SESSION["app_no"]."<br>";
				}
				else if((get_file_extension($filename)=="PNG" || get_file_extension($filename)=="jpeg") && !file_exists($newFileName) && $i==1){
					//echo "2";
					echo $_SESSION["app_no"]."<br>";
					move_uploaded_file($tmpFilePath,$newFilePath);
					$query="update students set ms_12th='".$newFileName."' where app_no=".$_SESSION["app_no"];
					mysqli_query($mysql_connect,$query);

				}
				else if(file_exists($newFileName)){
					echo "the file is already present in our database please"."<br>";
					echo "click on change to change the document";
				}
				}
			}
		}	
		//if(unlink($newFilePath)) echo "file deleted";
	
	else if (isset($_POST["change"])){
		$total = count($_FILES['file']['name']);
		for( $i=0 ; $i < $total ; $i++ ) {
			$tmpFilePath = $_FILES['file']['tmp_name'][$i];
			$filename=$_FILES['file']['name'][$i];

			if($i==0){
			$newFileName=$_SESSION["app_no"]."_profile_".$filename;
			}
			else if($i==1){
				$newFileName=$_SESSION["app_no"]."_12th_".$filename;
			}


			if ($tmpFilePath != ""){
				$newFilePath = "./uploads/" . $newFileName;

				$query1="select profile_pic from students where app_no=".$_SESSION["app_no"];
				$query2="select ms_12th from students where app_no=".$_SESSION["app_no"];
				
				$result1=mysqli_query($mysql_connect,$query1);
				$result2=mysqli_query($mysql_connect,$query2);

				$data1=mysqli_fetch_assoc($result1);
				$data2=mysqli_fetch_assoc($result2);

				//echo $data1["profile_pic"];
				//echo $data2["ms_12th"];
				//if(unlink("./uploads/" . $data1["profile_pic"])) echo "file1 deleted"."<br>";
				//if(unlink("./uploads/" . $data2["ms_12th"])) echo "file2 deleted"."<br>";
				

				if((get_file_extension($filename)=="PNG" || get_file_extension($filename)=="jpeg") && !file_exists($newFileName) && $i==0){
					
					unlink("./uploads/" . $data1["profile_pic"]);
					move_uploaded_file($tmpFilePath,$newFilePath);
					$query="update students set profile_pic='".$newFileName."' where app_no=".$_SESSION["app_no"];
					mysqli_query($mysql_connect,$query);
					//echo $_SESSION["app_no"]."<br>";
				}
				else if((get_file_extension($filename)=="PNG" || get_file_extension($filename)=="jpeg") &&!file_exists($newFileName) && $i==1){
					
					unlink("./uploads/" . $data2["ms_12th"]);
					//echo $_SESSION["app_no"]."<br>";
					move_uploaded_file($tmpFilePath,$newFilePath);
					$query="update students set ms_12th='".$newFileName."' where app_no=".$_SESSION["app_no"];
					mysqli_query($mysql_connect,$query);

				}
				
			}
		}	
	}

	function get_file_extension($file_name) {
    return substr(strrchr($file_name,'.'),1);
}
?>