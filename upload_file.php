<?php
	if(isset($_POST["submit"])){
		//$file= $_FILES["file"];
		//print_r($file);
		$filename=$_FILES['file']['name'];
		$filetype=$_FILES['file']['type'];
		$tmpname=$_FILES['file']['tmp_name'];
		$size=$_FILES['file']['size'];
		$file_store="uploads/".$filename;

		move_uploaded_file($tmpname,$file_store);
	}
?>