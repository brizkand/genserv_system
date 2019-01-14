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
<script src="my_javascript/check_pos.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/genserv_online_style.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="my_javascript/jquery-3.3.1.min.js"></script>
<script>
	//INSIDE OF THIS IS THE JQUERY CODES
	$(document).ready(function(){
		$('.personal_info').load('left_info.php');
		$("#summary_table").load("summary_of_purchases_table_jquery.php");
		
		$("#sopShow").click(function(){
			$(this).fadeOut(500);
			$('#sopForm').fadeIn(500);
			$('#sopHide').fadeIn(1000);
		});
		$("#sopHide").click(function(){
			$(this).fadeOut(500);
			$('#sopForm').fadeOut(500);
			$('#sopShow').fadeIn(1000);
		});
	});
	//THIS IS FOR THE AJAX
	function showMonth(str) {
	if (str=="") {
		document.getElementById("txtHint").innerHTML="";
		return;
	} 
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		var year = document.getElementById("searchYear").value;
	} 
	else { // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","search_sop.php?q="+str+ "&y="+year,true);
  xmlhttp.send();
}
  /////////SHOW SOP SEARCH TABLE
  function showYear(year) {
	if (year=="") {
		document.getElementById("txtHint").innerHTML="";
		return;
	} 
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		var str = document.getElementById("searchMonth").value;
	} 
	else { // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","search_sop.php?q="+str+ "&y="+year,true);
  xmlhttp.send();
  
}
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
		<div class='pageTitle'><i class="fa fa-gears"></i> SUMMARY OF PURCHASES</div>
		<!--THIS DIV IS FOR DISPLAYING THE GSAT TABLE FROM OTHER PAGE USING JQUERY-->
		<div class='box' id='summary_table' style="overflow-x:auto;"></div>
		<!--THIS IS FOR THE SEARCH!!!!!!!!!!!!!!-->
		<div class = 'box'>
			<form method='POST'>
			<h2>Search Summary of Purchases here!</h2>
			<select id='searchMonth' name='searchMonth' onchange="showMonth(this.value)">
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
			<select id='searchYear' name='searchYear' onchange="showYear(this.value)">
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
			<div class='box' id="txtHint" style="overflow-x:auto;">Search table will display here!</div>
			
		</div>
		<div class='box'>
			<?php
				include 'conn.php';
				$sql = "SELECT * FROM summary_of_purchases_table ORDER BY id DESC LIMIT 1";
				$result = $conn->query($sql);
				if($result->num_rows > 0){
					$row = $result->fetch_assoc();
					$lastID = $row['id'];
					$lastDatePurchased = $row['date_purchased'];
					$lastPurchasedOrder = $row['purchase_order'];
					$lastMRRNo = $row['mrr_number'];
					$lastVendor = $row['vendor'];
					$lastTINNo = $row['tin_number'];
					$lastAddress = $row['address'];
					$lastDescription = $row['description'];
					$lastQuantity = $row['quantity'];
					$lastRate = $row['rate'];
					$lastAmount = $row['amount'];
					$lastPayment = $row['payment'];
					$lastMonthNow = $row['month_now'];
					$lastPONumberAuto = $row['po_number_auto'];
				}
				else {
					echo "No records found!";
				}
				if(isset($_POST['sopSubmit'])){
					$sopDate = $_POST['sopDate'];
					$sopPO = $_POST['sopPurchaseOrder'];
					$sopMRR = $_POST['sopMRR'];
					$sopVendor = $_POST['sopVendor'];
					$sopTIN = $_POST['sopTIN'];
					$sopAddress = $_POST['sopAddress'];
					$sopDescription = $_POST['sopDescription'];
					$sopQuantity = $_POST['sopQuantity'];
					$sopRate = $_POST['sopRate'];
					$sopAmount = $_POST['sopAmount'];
					$sopPayment = $_POST['sopPayment'];
					if(!empty($sopMRR)){
						$sopMonthNow = substr($sopMRR, 2, 2);
						$sopPONumberAuto = substr($sopMRR, 7, 2);
						$sopYear = substr($sopDate,0,4);
					}
					if(!empty($sopDate) && !empty($sopPO) && !empty($sopMRR) && !empty($sopVendor) && !empty($sopTIN) &&
					!empty($sopAddress) && !empty($sopDescription) && !empty($sopQuantity) && !empty($sopRate) && 
					!empty($sopAmount) && !empty($sopPayment)){
						if($sopMRR === $lastMRRNo){
							echo"<script>window.alert('You already inserted this data on database!');</script>";
						}
						else{
							$sql1 = "SELECT * FROM summary_of_purchases_table WHERE mrr_number = '$sopMRR'";
							$result1 = $conn->query($sql1);
							if($result1->num_rows > 0){
								echo"<script>window.alert('You already inserted this data on database!');</script>";
							}
							else{
								$sql2 = "INSERT INTO summary_of_purchases_table(date_purchased, purchase_order, mrr_number, 
								vendor, tin_number, address, description, quantity, rate, amount, payment, month_now, po_number_auto, year)VALUES
								('$sopDate','$sopPO','$sopMRR','$sopVendor','$sopTIN','$sopAddress','$sopDescription','$sopQuantity',
								'$sopRate','$sopAmount','$sopPayment','$sopMonthNow','$sopPONumberAuto', '$sopYear')";
								if($conn->query($sql2)===TRUE){
								echo"<script>window.alert('You successfully inserted a records!');</script>";
								}
								else{
									echo"<script>window.alert('Failed to insert records!');</script>";
								}
							}
						}
					}
					else{
						echo"<script>window.alert('You must fill-out all required text box!');</script>";
					}
				}
			?>
			<a href="#sopHide" id='sopShow' class="hideAndShow">Show form of Summary Purchases</a>
			<a href="#sopShow" id='sopHide' class="hideAndShow" style="display:none;">Hide Form</a>
			<div style="display:none;" id='sopForm'>
				<form method='POST' action="summary_of_purchases_insert.php">
					<h2>Please fill-out the following!</h2>
					<span>Select Date: </span></br><input type='date' name='sopDate' required></br>
					<input type='text' name='sopPurchaseOrder' placeholder='Purchase Order' required></br>
					<?php
						include 'conn.php';
						$sql = "SELECT po_number_auto FROM summary_of_purchases_table ORDER BY po_number_auto DESC LIMIT 1";
						$result = $conn->query($sql);
						if($result->num_rows > 0){
							$row=$result->fetch_assoc();
							$autoNum = $row['po_number_auto'];
							$autoNum = $autoNum + 1;
							$addNum1 = 0; 
							$addNum2 = 0; 
						}
					?>
					<input type='text' name='sopMRR' placeholder='Monthly Receive Report No.' value='<?php
						$year = date('Y');
						$endYear = substr($year,2,2);
						$month = date('m');
						if($autoNum<=99){
							echo $endYear . $month . "-" .$addNum1 . $addNum2 . $autoNum;
						}
						else if($autoNum>99 && $autoNum<1000){
							echo $endYear . $month . "-" .$addNum1 . $autoNum;
						}
						else if($autoNum>999){
							echo $endYear . $month . "-" . $autoNum;
						}
						else{
							echo "Please insert manually!";
						}
					?>' readonly='readonly' required></br>
					<input type='text' name='sopVendor' placeholder='Vendor' required></br>
					<input type='text' name='sopTIN' placeholder='TIN Number' required></br>
					<input type='text' name='sopAddress' placeholder='Address' required></br>
					<input type='text' name='sopDescription' placeholder='Description' required></br>
					<input type='number' name='sopQuantity' placeholder='Quantity' required></br>
					<input type='number' name='sopRate' placeholder='Rate' required></br>
					<input type='number' name='sopAmount' placeholder='Amount' required></br>
					<input type='number' name='sopPayment' placeholder='Payment' required></br>
					<input type='submit' name='sopSubmit' value='Submit'></br>
				</form>
			</div>
		</div>
	</div
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