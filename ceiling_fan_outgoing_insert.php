<?php
	session_start();
	$employeeFullName = $_SESSION["userCompleteName"];
	include 'conn.php';
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
	if(isset($_POST['outgoingSubmit'])){
		$outDate = $_POST['outgoingDate'];
		$outClient = textToUpper(test_input($_POST['outgoingClient']));
		$outDR = $_POST['outgoingDR'];
		$outQuantity = $_POST['outgoingQuantity'];
		if(!empty($outDate) && !empty($outClient) && !empty($outDR) && !empty($outQuantity)){
			$sql="INSERT INTO ceiling_fan_table(date_released, client_name, delivery_receipt, released, employee_user)VALUES
				('$outDate', '$outClient', '$outDR', '$outQuantity', '$employeeFullName')";
			if($conn->query($sql)===TRUE){
				?>
				<script>
					alert('You successfully inserted outgoing record!');
					window.location.href = 'ceiling_fan_inventory.php';
				</script>
				<?php
			}
			else{
				?>
				<script>
					alert('Failed to insert outgoing record!');
					window.location.href = 'ceiling_fan_inventory.php';
				</script>
				<?php
			}	
		}
		else{
			?>
				<script>
					alert('You must fill-out all required fields in outgoing form!');
					window.location.href = 'ceiling_fan_inventory.php';
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
	//TO MAKE DATA UPPERCASE
	function textToUpper($text){
		$text = strtoupper($text);
		return $text;
	}
?>