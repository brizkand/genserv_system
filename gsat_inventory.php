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
		$("#gsatTable").load("gsat_table_jquery.php");
		//THIS IS FOR OUTGOING BUTTOS
		$("#gsatOutgoingShow").click(function(){
			$(this).fadeOut(500);
			$('#gsatOutgoingForm').fadeIn(500);
			$('#gsatOutgoingHide').fadeIn(1000);
		});
		$("#gsatOutgoingHide").click(function(){
			$(this).fadeOut(500);
			$('#gsatOutgoingForm').fadeOut(500);
			$('#gsatOutgoingShow').fadeIn(1000);
		});
		//THIS IS FOR INCOING BUTTONS
		$("#gsatIncomingShow").click(function(){
			$(this).fadeOut(500);
			$('#gsatIncomingForm').fadeIn(500);
			$('#gsatIncomingHide').fadeIn(1000);
		});
		$("#gsatIncomingHide").click(function(){
			$(this).fadeOut(500);
			$('#gsatIncomingForm').fadeOut(500);
			$('#gsatIncomingShow').fadeIn(1000);
		});
	});
</script>
</head>
<body onload="gsatInventory(), checked_position()">
<?php
	if($_SESSION["access"] != "true"){
		header("Location: /index.php");
	}
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
		 <li class="dropdown"><a href="#" class="dropbtn" id='gsat_inventory'>INVENTORY</a>
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
	<!--THIS DIV IS FOR THE RIGHT SPACE AFTER USER INFORMATIONS.-->
	<div class = "main">
		<!--THIS IS FOR THE TITLE PAGE-->
		<div class='pageTitle'><i class="fa fa-gears"></i> GSAT INVENTORY</div>
		<!--THIS DIV IS FOR DISPLAYING THE GSAT TABLE FROM OTHER PAGE USING JQUERY-->
		<div class="box" id='gsatTable' style="overflow-x:auto;"></div>
		<!--THIS IS FOR OUTGOING OF GSAT-->
		<div class='box'>
			<?php
			include 'conn.php';
				$sql="SELECT * FROM gsat_table ORDER BY id DESC LIMIT 1";
				$result= $conn->query($sql);
				if($result->num_rows > 0){
					$row=$result->fetch_assoc();
					$lastGsatID = $row['id'];
					$lastGsatDeliveryReceipt = $row['delivery_receipt'];
					$lastGsatDate = $row['date'];
					$lastGsatClient = $row['client'];
					$lastGsatIncoming = $row['incoming'];
					$lastGsatOutgoing = $row['outgoing'];
					$lastGsaTotalReleased = $row['total_released'];
					$lastGsatBalance = $row['balance'];
					$lastGsatProduct = $row['product_name'];	
				}
				if(isset($_POST['gsatOutgoingSubmit'])){
					$gsatOutDate = $_POST['gsatOutgoingDate'];
					$gsatOutClient = $_POST['gsatOutgoingClient'];
					$gsatOutDR = $_POST['gsatOutgoingDR'];
					$gsatOutQuantity = $_POST['gsatOutgoingQuantity'];
					if(!empty($gsatOutDate) && !empty($gsatOutClient) && !empty($gsatOutDR) && !empty($gsatOutQuantity)){
						if($gsatOutDR === $lastGsatDeliveryReceipt){
							echo"<script>window.alert('You already inserted this data on database!');</script>";
						}
						else{
							$updatedGsatBalance = $lastGsatBalance - $gsatOutQuantity;
							$updatedGsatTotalReleased = $lastGsaTotalReleased + $gsatOutQuantity;
							$sql="INSERT INTO gsat_table(delivery_receipt, date, client, outgoing, total_released, balance)VALUES
							('$gsatOutDR', '$gsatOutDate', '$gsatOutClient', '$gsatOutQuantity', '$updatedGsatTotalReleased', '$updatedGsatBalance')";
							if($conn->query($sql)===TRUE){
								echo"<script>window.alert('You successfully inserted a records!');</script>";
							}
							else{
								echo"<script>window.alert('Failed to insert records!');</script>";
							}
						}
					}
					else{
						echo"<script>window.alert('You must fill-out all required textbox!');</script>";
					}
				}
			?>
			<a href="#gsatOutgoingHide" id='gsatOutgoingShow' class="hideAndShow">Show form of Gsat Outgoing</a>
			<a href="#gsatOutgoingShow" id='gsatOutgoingHide' class="hideAndShow" style="display:none;">Hide Outgoing Form</a>
			<div style="display:none;" id='gsatOutgoingForm'>
				<form method='POST' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
					<h2>Please fill-out the following!</h2>
					<span>Select Date: </span></br><input type='date' name='gsatOutgoingDate' required></br>
					<input type='text' name='gsatOutgoingClient' placeholder='Client Name' required></br>
					<input type='text' name='gsatOutgoingDR' placeholder='Delivery Receipt Number' required></br>
					<input type='number' name='gsatOutgoingQuantity' placeholder='Quantity' required></br>
					<input type='submit' name='gsatOutgoingSubmit' value='Process Outgoing'></br>
				</form>
			</div>
		</div>
		<div class='box'>
			<?php
				if(isset($_POST['gsatIncomingSubmit'])){
					$gsatInDate = $_POST['gsatIncomingDate'];
					$gsatInClient = $_POST['gsatIncomingClient'];
					$gsatInDR = $_POST['gsatIncomingDR'];
					$gsatInQuantity = $_POST['gsatIncomingQuantity'];
					if(!empty($gsatInDate) && !empty($gsatInClient) && !empty($gsatInDR) && !empty($gsatInQuantity)){
						if($gsatInDR===$lastGsatDeliveryReceipt){
							echo"<script>window.alert('You already inserted this data on database!');</script>";
						}
						else{
							$updatedGsatBal = $gsatInQuantity + $lastGsatBalance;
							$sql="INSERT INTO gsat_table(delivery_receipt,date,client,incoming,total_released,balance)VALUES
							('$gsatInDR', '$gsatInDate', '$gsatInClient', '$gsatInQuantity', '$lastGsaTotalReleased', '$updatedGsatBal')";
							if($conn->query($sql)===TRUE){
								echo"<script>window.alert('You successfully inserted a records!');</script>";
							}
							else{
								echo"<script>window.alert('Failed to insert records!');</script>";
							}
						}
					}
					else{
						echo"<script>window.alert('You must fill-out all required textbox!');</script>";
					}
				}
			?>
			<a href="#gsatIncomingHide" id='gsatIncomingShow' class="hideAndShow">Show form of Gsat Incoming</a>
			<a href="#gsatIncomingShow" id='gsatIncomingHide' class="hideAndShow" style="display:none;">Hide Incoming Form</a>
			<div style="display:none;" id='gsatIncomingForm'>
				<form method='POST' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>'>
					<h2>Please fill-out the following!</h2>
					<span>Select Date: </span></br><input type='date' name='gsatIncomingDate' required></br>
					<input type='text' name='gsatIncomingClient' placeholder='Client Name' required></br>
					<input type='text' name='gsatIncomingDR' placeholder='Delivery Receipt Number' required></br>
					<input type='number' name='gsatIncomingQuantity' placeholder='Quantity' required></br>
					<input type='submit' name='gsatIncomingSubmit' value='Process Incoming'></br>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
function gsatInventory() {
	document.getElementById('gsat_inventory').style.backgroundColor = "#f8f8ff";
	document.getElementById('gsat_inventory').style.color = "#006400";
	document.getElementById('gsat_inventory').style.cursor = "default";
}
</script>
</body>
</html>