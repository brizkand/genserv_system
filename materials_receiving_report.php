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
		$('#mrr').load('mrr_jquery.php');
		$('#mrrSearchMonth, #mrrSearchYear').change(function(){
			var searchMonth = $("#mrrSearchMonth").val();
			var searchYear = $("#mrrSearchYear").val();
			$.post("search_mrr.php",{searchM: searchMonth, searchY: searchYear},function(result){
				$("#txtHint2").html(result);
			});
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
		<div class='pageTitle'><i class="fa fa-gears"></i> MATERIALS RECEIVING REPORT</div>
		<div class='box' id='mrr' style="overflow-x:auto;"></div>
		<!--THIS IS FOR THE SEARCH!!!!!!!!!!!!!!-->
		<div class = 'box'>
			<form method='POST'>
			<h2>Search Materials Receiving Report here!</h2>
			<select id='mrrSearchMonth' name='searchMonth'>
				<option value=''>Select month here!</option>
				<option value='01'>January</option>
				<option value='02'>February</option>
				<option value='03'>March</option>
				<option value='04'>April</option>
				<option value='05'>May</option>
				<option value='06'>June</option>
				<option value='07'>July</option>
				<option value='08'>August</option>
				<option value='09'>September</option>
				<option value='10'>October</option>
				<option value='11'>November</option>
				<option value='12'>December</option>
			</select>
			<select id='mrrSearchYear' name='searchYear'>
				<option value='<?php $y=date("Y"); echo $y; ?>'><?php $y=date("Y"); echo $y; ?></option>
				<option value='2013'>2013</option>
				<option value='2014'>2014</option>
				<option value='2015'>2015</option>
				<option value='2016'>2016</option>
				<option value='2017'>2017</option>
				<option value='2018'>2018</option>
				<option value='2019'>2019</option>
				<option value='2020'>2020</option>
				<option value='2021'>2021</option>
				<option value='2022'>2022</option>
				<option value='2023'>2023</option>
				<option value='2024'>2024</option>
			</select>
			<br>
			</form>
			<div class='box' id="txtHint2" style="overflow-x:auto;">Search table will display here!</div>	
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