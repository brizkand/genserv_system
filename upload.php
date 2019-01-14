<?php
	session_start();
	$userName = $_SESSION['username'];
	$userPass = $_SESSION['pass'];
	
	if(isset($_POST['submit'])){
		$file = $_FILES['file'];

		$fileName = $file['name'];
		$fileTempName = $file['tmp_name'];
		$fileError = $file['error'];
		$fileSize = $file['size'];
		$fileType = $file['type'];
		
		$fileExt = explode('.',$fileName);
		$fileActualExt = strtolower(end($fileExt));
		$format = array('jpg', 'jpeg', 'png');
		if(in_array($fileActualExt, $format)){
			if($fileError === 0){
				if($fileSize < 250000){
					$fileNewName = uniqid('',true) . "." . $fileActualExt;
					$fileDestination = "uploads/" . $fileNewName;
					move_uploaded_file($fileTempName, $fileDestination);
					include "conn.php";
					$sql = "UPDATE emp_table SET profile='$fileNewName' WHERE uname='$userName' AND pword='$userPass'";
					if($conn->query($sql)===TRUE){
						header("Location: account setting.php?success to upload");
					}
					else{
						echo "You are not allowed to update this profile!";
					}
				}
				else{
					echo "The file is to big to upload";
				}
			}
			else{
				echo "An error occured uploading this file!";
			}
		}
		else{
			echo 'You cannot upload this file type!';
		}
	}
?>