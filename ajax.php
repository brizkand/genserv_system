<?php 
		session_start();
		if($_SESSION["access"] != "TRUE")
		{
			header("Location: /index.php");
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/genserv_online_style.css">
<link rel="stylesheet" type="text/css" href="css/admin_control_style.css">
</head>
<body>
<?php 
	$q = intval($_POST['search']);
	@require("conn.php");
	if(isset($_POST['search'])){
		
		$sql="SELECT * FROM emp_table WHERE empid = '".$q."'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			echo"<table>
			<tr>
			<th>First name</th>
			<th>Last name</th>
			</tr>";
			while($row = $result->fetch_assoc()){
				echo "<tr>";
				echo "td" . $row["fname"] . "</td>";
				echo "td" . $row["lname"] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		else{
			echo ""0 result;
		}
	}
?>
</body>
</html>