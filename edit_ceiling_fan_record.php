<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Genserv Online Access</title>
	<link rel="shortcut icon" type="image/x-icon" href="new_genserv_logo.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/genserv_online_style.css">
	<script src="my_javascript/check_pos.js" type="text/javascript"></script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="my_javascript/jquery-3.3.1.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.personal_info').load('left_info.php');
		});
	</script>
</head>
<body onload="inventory(), checked_position()">
<?php
	if($_SESSION["access"] != true)
		{
			header("Location: /index.php");
		}	
	$employeeFullName = $_SESSION["userCompleteName"];
?>
<div class="genserv_header">
   <img src="images/genserv_header.png">
   <div>
      <ul class= "top_nav">
	     <li><a href="home.php" class="mainbtn">HOME</a></li>
		 <li class="dropdown"><a href="#" class="dropbtn">EMPLOYEES SERVICES</a>
			<div class="dropdown-content">
				<a href="leave_calendar.php">LEAVE CALENDAR & FILING</a>
				<a href="#">OVERTIME FILING</a>
				<a href="#">TRANSPORTATION REINBURSEMENT</a>
			</div>
		 </li>
		  <li class="dropdown"><a href="#" class="dropbtn">ACCOUNTING</a>
			<div class="dropdown-content">
				<a href="summary_of_purchases.php">SUMMARY OF PURCHASES</a>
				<a href="materials_receiving_report.php">MATERIALS RECEIVING REPORT</a>
				<a href="accounting_view_request_cards.php">PROCESS REQUEST CARDS & RECEIVING CARDS</a>
				<a href="accounting_card_500_monitoring.php">GSAT CARD 500 MONITORING</a>
				<a href="accounting_card_300_monitoring.php">GSAT CARD 300 MONITORING</a>
				<a href="accounting_card_200_monitoring.php">GSAT CARD 200 MONITORING</a>
				<a href="accounting_card_99_monitoring.php">GSAT CARD 99 MONITORING</a>
			</div>
		 </li>
		 <li class="dropdown"><a href="#" class="dropbtn">OPERATION</a>
			<div class="dropdown-content">
				<a href="operation_gsat_crud_clients.php">CREATE NEW GSAT CLIENT</a>
				<a href="operation_gsat_clients_monitoring.php">GSAT CLIENT MONITORING</a>
				<a href="operation_gsat_request_cards.php">REQUEST CARDS & LOADING</a>
			</div>
		 </li>
		 <li class="dropdown"><a href="#" class="dropbtn" id='inventory'>INVENTORY</a>
			<div class="dropdown-content">
				<a href="ceiling_fan_inventory.php">CEILING FAN INVENTORY</a>
				<a href="gsat_inventory.php">GSAT BOX INVENTORY</a>
				<a href="#">OFFICE TOOLS INVENTORY</a>
			</div>
		 </li>
		 <li><a href="account setting.php" class="mainbtn">ACCOUNT SETTINGS</a></li>
		 <li class='dropdown' id="adminControls"><a href="#" class="dropbtn">ADMIN CONTROLS</a>
			<div class="dropdown-content">
				<a href="employees_account.php">EMPLOYEES ACCOUNT</a>
				<a href="admin_controls_leave.php">EMPLOYEES LEAVE PROCESSING</a>
				<a href="#">EMPLOYEES INFORMATION</a>
				<a href="#">CREATE NEWS</a>
			</div>
		 </li>
	  </ul>
   </div>
</div>
<div class="whole"> 
	<div class="personal_info">
		<!--THIS IS WHERE THE LEFT INFORMATION DISPLAY-->
	</div> 
	<div class = "main">
		<div class='pageTitle'><i class="fa fa-gears"></i> EDIT SUMMARY OF PURCHASES</div>
		<div class='box'>
			<?php
				error_reporting(0);
				if(isset($_POST['update'])){
					$editDateReleased = $_POST['dateReleased'];
					$editClientName = $_POST['clientName'];
					$editDeliveryReceipt = $_POST['deliveryReceipt'];
					$editReceived = $_POST['received'];
					$editReleased = $_POST['released'];
					$editID = $_POST['ID'];
					if(empty($editReceived) && !empty($editReleased)){
						if(!empty($editDateReleased) && !empty($editClientName) && !empty($editDeliveryReceipt) && !empty($editReleased)){
							include 'conn.php';
							$sql = "UPDATE ceiling_fan_table SET date_released = '$editDateReleased', client_name = '$editClientName', delivery_receipt = '$editDeliveryReceipt', released = '$editReleased', employee_user = '$employeeFullName' where product_id = '$editID'";
							if($conn->query($sql)===TRUE){
			?>
								<script>
									alert("Successfully updated record!");
									window.location.href = 'ceiling_fan_inventory.php';
								</script>
			<?php
							}
							else{
			?>
								<script>
									alert("Failed to update!");
									window.location.href = 'ceiling_fan_inventory.php';
								</script>
			<?php
							}	
						}
						else{
			?>
							<script>
								alert("Failed to update record! Please fill-out the form properly!");
								window.location.href = 'ceiling_fan_inventory.php';
							</script>
			<?php
						}
					}
					elseif(empty($editReleased) && !empty($editReceived)){
						if(!empty($editDateReleased) && !empty($editReceived)){
							include 'conn.php';
							$sql1 = "UPDATE ceiling_fan_table SET date_released = '$editDateReleased', received = '$editReceived', employee_user = '$employeeFullName' where product_id = '$editID'";
							if($conn->query($sql1)===TRUE){
			?>
								<script>
									alert("Successfully updated record!");
									window.location.href = 'ceiling_fan_inventory.php';
								</script>
			<?php
							}
							else{
			?>
								<script>
									alert("Failed to update!");
									window.location.href = 'ceiling_fan_inventory.php';
								</script>
			<?php
							}	
						}
						else{
			?>
							<script>
								alert("Failed to update record! Please fill-out the form properly!");
								window.location.href = 'ceiling_fan_inventory.php';
							</script>
			<?php
						}
					}
					elseif(!empty($editReceived) && !empty($editReleased)){
			?>
						<script>
							alert("Failed to update record! Please fill-out the form properly!");
							window.location.href = 'ceiling_fan_inventory.php';
						</script>
			<?php
					}
					elseif(empty($editReceived) && empty($editReleased)){
			?>
						<script>
							alert("Failed to update record! Please fill-out the form properly!");
							window.location.href = 'ceiling_fan_inventory.php';
						</script>
			<?php
					}
					else{
			?>
						<script>
							alert("Failed to update record! Please fill-out the form properly!");
							window.location.href = 'ceiling_fan_inventory.php';
						</script>
			<?php
					}
				}
			?>
			<?php
			//THIS IS FOR DELETING DATA IN CEILING FAN
			if(isset($_GET['deleteID'])){
				$idToDelete = $_GET['deleteID'];
				@require("conn.php");
				$sql3 = "delete from ceiling_fan_table where product_id = '$idToDelete'";
				$result=$conn->query($sql3);
				if($result){
			?>
					<script>
						alert("Successfully deleted a record!");
						window.location.href = 'ceiling_fan_inventory.php';
					</script>
			<?php
				}
				else{
			?>
					<script>
						alert("Failed to delete record!");
						window.location.href = 'ceiling_fan_inventory.php';
					</script>
			<?php
				}
			}
			?>
			<form method='POST' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>'>
				<span>Ceiling Fan I.D: </span><input type='text' class='readonlyText' name='ID' value='<?php echo $_GET['id'];?>' readonly='readonly'></br>
				<span>Date Released: </span><input type='date' name='dateReleased' value='<?php echo $_GET['dr'];?>'></br>
				<span>Client Name: </span><input type='text' name='clientName' value='<?php echo $_GET['cn'];?>'></br>
				<span>Delivery Receipt: </span><input type='text' name='deliveryReceipt' value='<?php echo $_GET['dr2'];?>'></br>
				<span>Received: </span><input type='number' name='received' value='<?php echo $_GET['r'];?>'></br>
				<span>Released: </span><input type='number' name='released' value='<?php echo $_GET['r2'];?>'></br>
				<input type='submit' value='Update' name='update'></br></br>
				<span>Click <a href="ceiling_fan_inventory.php">here </a>to go back!</span>
			</form>
		</div>
	</div>
</div>
<script>
	function inventory() {
	document.getElementById('inventory').style.backgroundColor = "#f8f8ff";
	document.getElementById('inventory').style.color = "#006400";
	document.getElementById('inventory').style.cursor = "default";
	}
</script>
</body>
</html>