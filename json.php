<?php
	session_start();
	if($_SESSION["access"] != true)
		{
			header("Location: /index.php");
		}
	$emp_Id = $_SESSION['employeeId'];
	include 'conn.php';
	$sql = "SELECT * FROM emp_table WHERE empid = '$emp_Id'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$rows = $result->fetch_assoc();
			$myJSON = json_encode($rows);
			
			echo $myJSON;
		}	
?>