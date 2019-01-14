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
		$('#dataContainer').load('ceiling_fan_inventory_search.php');
		$("#outgoingShow").click(function(){
			$("#outgoingForm").fadeIn(500);
			$(this).fadeOut(500);
			$("#outgoingHide").fadeIn(1000);
		});
		$("#outgoingHide").click(function(){
			$("#outgoingForm").fadeOut(500);
			$(this).fadeOut(500);
			$("#outgoingShow").fadeIn(1000);
		});
		//FOR INCOMING
		$("#incomingShow").click(function(){
			$("#incomingForm").fadeIn(500);
			$(this).fadeOut(500);
			$("#incomingHide").fadeIn(1000);
		});
		$("#incomingHide").click(function(){
			$("#incomingForm").fadeOut(500);
			$(this).fadeOut(500);
			$("#incomingShow").fadeIn(1000);
		});
		$('#search').on('keyup', function(){
			var value = $(this).val().toUpperCase();
			$.post("ceiling_fan_inventory_search.php",{searchClient: value},function(result){
				$("#dataContainer").html(result);
			});
		});
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
	<div class='pageTitle'><i class="fa fa-gears"></i> CEILING FAN INVENTORY</div>
		<!--CONTAINER FOR RIGHT SPACE-->
		<!--<div class="box" id='ceilingFanTable' style="overflow-x:auto;"></div>-->
		
		
		<!--THIS IS FOR SEARCHING DATA IN CEILING FAN-->
		<div class='box'>
			<input type="search" name="search" id='search' placeholder="Search ceiling fan informations here!...">
			<div class='box' id="dataContainer">Search data will display here!</div>
		</div>
		
		<!--THIS IS FOR OUT-GOING-->
		<div class="box">
			<a href="#outgoingHide" id='outgoingShow' class="hideAndShow">Create Outgoing of Ceiling Fan</a>
			<a href="#outgoingShow" id='outgoingHide' class="hideAndShow" style="display:none;">Hide Outgoing Form</a>
			<div style="display:none;" id='outgoingForm'>
				<form method="post" action='ceiling_fan_outgoing_insert.php'>
					<h2>Please fill-out the following!</h2>
					<span>SELECT DATE: </span></br><input type='date' name='outgoingDate' required></br>
					<input type='text' class='upperCase' name='outgoingClient' placeholder='CLIENT NAME' required></br>
					<input type='text' name='outgoingDR' placeholder='DELIVERY RECEIPT NUMBER' required></br>
					<input type='number' name='outgoingQuantity' placeholder='QUANTITY' required></br>
					<input type='submit' name='outgoingSubmit' value='Process Outgoing'></br>
				</form>
			</div>
		</div>
		<!--THIS NEXT LINES OF CODES ARE FOR INCOMMING INPUT TYPE!-->
		<div class='box'>
			
			<a href="#incomingHide" id='incomingShow' class="hideAndShow">Create Incoming of Ceiling Fan</a>
			<a href="#incomingShow" id='incomingHide' class="hideAndShow" style="display:none;">Hide Incoming Form</a>
			<div style="display:none;" id='incomingForm'>
			
				<form method="post" action='ceiling_fan_incoming_insert.php'>
					<h2>Please fill-out the following!</h2>
					<span>Select Date: </span></br><input type='date' name='incomingDate' required></br>
					<input type='number' id= 'inReceived' name='incomingReceived' placeholder='QUANTITY' required></br>
					<input type='submit' id='inSubmit' name='incomingSubmit' value='Process Incoming'></br>
				</form>
			</div>
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