<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$uname=test_input($_POST['username']);
		$password=test_input($_POST['pass']);
		if(!empty($uname)&&!empty($password)){
			include_once 'conn.php';
			$sql="SELECT * FROM emp_table WHERE uname='".$uname."' AND pword='".$password."' LIMIT 1";
			$result= $conn->query($sql);
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				$userFirstName = $row["fname"];
				$userLastname = $row["lname"];
				$userFullName = $userFirstName . " " . $userLastname;
				$_SESSION["userCompleteName"] = $userFullName;
				$_SESSION['userWelcome'] = 1;
				$_SESSION["username"] = $row["uname"];
				$_SESSION['pass'] = $row['pword'];
				$_SESSION['employeeId'] = $row['empid'];
				$_SESSION['employeePosition'] = $row['position'];
				if($_SESSION["username"]== $row["uname"] && $_SESSION['pass'] == $row['pword']){
					$_SESSION["access"] = true;
				}
				header("Location: /home.php"); // redirects
				//echo("You have successfully logged in");
				//exit();
			}
			else{
				//echo "<script>window.alert('Your password is incorrect!'); </script>";
?>
				<script>
					alert("Your password or username is incorrect! Please try again!");
					document.location.href = 'index.php';
				</script>
<?php
			}	
		}
		else{
?>
				<script>
					alert("Your password or username is incorrect! Please try again!");
					document.location.href = 'index.php';
				</script>
<?php
		}
	}
	//FOR VALIDATION OF DATA
		function test_input($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
?>