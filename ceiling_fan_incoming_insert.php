<?php
	session_start();
	include 'conn.php';
	$employeeFullName = $_SESSION["userCompleteName"];
	$sql="SELECT * FROM ceiling_fan_table ORDER BY product_id DESC LIMIT 1";
	$result= $conn->query($sql);
	if($result->num_rows > 0){
		$row=$result->fetch_assoc();
		$lastID = $row['product_id'];
		$lastDate = $row['date_released'];
		$lastClient = $row['client_name'];
		$lastDR = $row['delivery_receipt'];
		$lastReceived = $row['received'];
		$lastReleased = $row['released'];
	}
	if(isset($_POST['incomingSubmit'])){
		$inDate = $_POST['incomingDate'];
		$inReceived = $_POST['incomingReceived'];
		if(!empty($inDate) && !empty($inReceived)){
			$sql="INSERT INTO ceiling_fan_table(date_released,received, employee_user)VALUES('$inDate', '$inReceived', '$employeeFullName')";
			if($conn->query($sql)===TRUE){
?>
				<script>
					alert("Successfully inserted incoming record!");
					window.location.href = 'ceiling_fan_inventory.php';
				</script>
<?php
			}
			else{
?>
				<script>
					alert("Failed to insert incoming record!");
					window.location.href = 'ceiling_fan_inventory.php';
				</script>
<?php
			}
		}
		else{
?>
			<script>
				alert("Please fill-out all required fields!");
				window.location.href = 'ceiling_fan_inventory.php';
			</script>
<?php
		}
	}
?>