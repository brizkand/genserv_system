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
	//INSIDE OF THIS IS THE JQUERY CODES
	$(document).ready(function(){
		$('.personal_info').load('left_info.php');
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
	});
</script>

</head>
<body onload="accountingSummaryOfPurchase(), checked_position()">
<?php
	if($_SESSION["access"] != true)
		{
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
		  <li class="dropdown"><a href="#" class="dropbtn" id='summaryOfPurchase'>ACCOUNTING</a>
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
		 <li class="dropdown"><a href="#" class="dropbtn">INVENTORY</a>
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
		<div class='pageTitle'><i class="fa fa-gears"></i> REQUEST CARDS MONITORING & RECEIVING CARDS PROCESS</div>
		<div class='box' style="overflow-x:auto;">
<?php
		include 'conn.php';
		$sql="SELECT * FROM operation_request_card_table where status = 1";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			echo "<table class='employee_table'><caption>Pending Card Request</caption>
				<tr>
					<th colspan='2'>Actions</th>
					<th>Request Date</th>
					<th>Request Quantiy</th>
					<th>Card Type</th>
					<th>Requested By</th>
				</tr>";
				while($row = $result->fetch_assoc()){
?>
				<tr>
					<?php echo "<td>" . "<a href = 'accounting_process_request_cards.php?id=$row[id]'>PROCESS" . "</a>" . "</td>";?>
					<td><a onclick="return confirm('Are you sure you want to delete this record?')" href='accounting_process_request_cards.php?idToDel=<?php echo $row["id"];?>'>DELETE</a></td>
					<td><?php echo $row['request_date'];?></td>
					<td><?php echo $row['request_quantity'];?></td>
					<td><?php echo $row['request_card_type'];?></td>
					<td><?php echo $row['employee_user'];?></td>
				</tr>
<?php
				}
?>
			</table>
<?php
		}
		else{
			echo "No records found!";
		}
?>
		</div>
		<!--THIS IS FOR INCOMING OF CARDS-->
		<div class='box'>
		<a href="#incomingHide" id='incomingShow' class="hideAndShow">Process Received Cards</a>
		<a href="#incomingShow" id='incomingHide' class="hideAndShow" style="display:none;">Hide Form</a>
			<div style="display:none;" id='incomingForm'>
				<form method="POST" action='accounting_cards_received_process.php'>
					<h2>Please fill-out the following!</h2>
					<span>Select Date: </span></br>
					<input type='date' value='<?php echo $today = date("Y-m-d");?>' name='gsatCardsReceivedDate' required></br>
					<input type='text' id= 'gsatCardsReceivedPO' name='gsatCardsReceivedPO' placeholder='PURCHASE ORDER' required></br>
					<input type='text' id= 'gsatCardsReceivedRN' name='gsatCardsReceivedRF' placeholder='REFERENCE NUMBER' required></br>
					<select name='gsatCardsReceivedCardType' required>
						<option value='PACKAGE 500'>PACKAGE 500</option>
						<option value='PACKAGE 300'>PACKAGE 300</option>
						<option value='PACKAGE 200'>PACKAGE 200</option>
						<option value='PACKAGE 99'>PACKAGE 99</option>
					</select></br>
					<input type='text' id= 'gsatCardsReceivedQuant' name='gsatCardsReceivedQuant' placeholder='QUANTITY' required></br>
					<input type='text' id= 'gsatCardsReceivedCardNoFrom' name='gsatCardsReceivedCardNoFrom' placeholder='CARD NUMBER FROM' required> --- 
					<input type='text' id= 'gsatCardsReceivedCardNoTo' name='gsatCardsReceivedCardNoTo' placeholder='CARD NUMBER TO' required></br>
					<input type='submit' id='gsatCardsReceivedSubmit' name='gsatCardsReceivedSubmit' value='Process Incoming Cards'></br>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
function accountingSummaryOfPurchase() {
	document.getElementById('summaryOfPurchase').style.backgroundColor = "#f8f8ff";
	document.getElementById('summaryOfPurchase').style.color = "#006400";
	document.getElementById('summaryOfPurchase').style.cursor = "default";
}
</script>
</body>
</html>