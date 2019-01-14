<?php
	//THIS IS FOR DISPLAYING THE PROFILE OF THE USER!
	session_start();
	$empId = $_SESSION['employeeId'];
	include 'conn.php';
	$sql = "Select * from emp_table where empid = '$empId'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$pathx = "uploads/";
		$profile = $row['profile'];
		echo '<img src="'.$pathx.$profile.'" style="display: block; margin-left: auto; margin-right: auto; width:50%; border-radius:50%;">';
		echo "<p class='capitalize'>" . $row["fname"] . ' ' . $row["lname"] . "</p>";
		echo "<p class='capitalize'>" . $row['department'] . "</p>";
		echo "<p class='capitalize'>" . $row['position'] . "</p>";
		echo "<p class='lower'>" . $row['eadd'] . "</p>";
		echo "<p class='lower'>" . $row['cnum'] . "</p>";
	}
	echo "<p class='logout'>". "<a href='index.php'>LOGOUT" . "<a>" . "</p>";
	$conn->close();
	?>
		