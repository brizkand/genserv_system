<?php
	session_start();
	if($_SESSION["access"] != true)
		{
			header("Location: /index.php");
		}
	include 'conn.php';
	$sql = "SELECT * FROM leave_table where date_to >= cast(now() as date) ORDER BY date_from";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		echo "<table class='employee_table'><caption>Employees Leave Schedule</caption><tr>
		<th>Employee Id</th>
		<th>Name</th>
		<th>Position</th>
		<th>Date Filed</th>
		<th>Leave From Date</th>
		<th>Leave To Date</th>
		<th>Type of Leave</th>
		<th>Reasons</th>
		<th>Status</th>
		<th>Paid Status</th>
		</tr>";
		while($row=$result->fetch_assoc()){
		?>
			<tr>
				<td><?php echo $row["empid"];?></td>
				<td><?php echo $row["full_name"];?></td>
				<td><?php echo $row["position"];?></td>
				<td><?php echo $row["date_filed"];?></td>
				<td><?php echo $row["date_from"];?></td>
				<td><?php echo $row["date_to"];?></td>
				<td><?php echo $row["reason"];?></td>
				<td><?php echo $row["reason_text"];?></td>
				<td><?php echo $row["status"];?></td>
				<td><?php echo $row["payment"];?></td>
			</tr>
		<?php
		}
		?>
		</table>	
<?php
	}
	else{
		echo "Theres no leave filed right now!";
	}
?>