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
<script src="my_javascript/jquery-3.3.1.min.js"></script>
<script>
	$(document).ready(function(){
		$('.personal_info').load('left_info.php');
		/*$(".second-options").click(function(){
			$('.dropdown-content2').fadeToggle(100);
		});*/
	});
</script>
</head>
<body onload="home(), checked_position()">
<?php
	if($_SESSION["access"] != true)
		{
			header("Location: /index.php");
		}
	$employeeFullName = $_SESSION["userCompleteName"];
	$welcomeCount = $_SESSION['userWelcome'];
	if(!empty($employeeFullName) && $welcomeCount == 1){
		?>
		<script>
			alert("<?php echo "Welcome " . strtoupper($employeeFullName) . " to Genserv Portal!";?>");
		</script>
		<?php
		$_SESSION['userWelcome'] = 0;
	}
?>
<div class="genserv_header">
   <img src="images/genserv_header.png">
   <div>
      <ul class= "top_nav">
	     <li><a href="home.php" class="mainbtn" id="home">HOME</a></li>
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
		 <li class="dropdown"><a href="#" class="dropbtn">INVENTORY</a>
			<div class="dropdown-content">
				<a href="ceiling_fan_inventory.php">CEILING FAN STOCK INVENTORY</a>
				<a href="gsat_inventory.php">GSAT BOX STOCK INVENTORY</a>
				<a href="#">OFFICE TOOLS STOCK INVENTORY</a>
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
	<!---THIS IS FOR THE RIGHT SPACE OF THE PAGE! -->
	<div class = "main">
		<div class='pageTitle'><i class="fa fa-gears"></i>WELCOME TO GENSERV EMPLOYEES PORTAL</div>
		<div class='box'>
		<?php
			//$from = new DateTime('1994-01-27');
			//$to   = new DateTime('today');
			
			//echo $from->diff($to)->y;
		?>
		<?php
		//$date = date('Y-m-d-h-i-sa');
		//echo $date;
		?>
		<h1 style='text-align:center; font-size:4.5em; color: red;'>SORRY! THIS PAGE IS UNDER DEVELOPMENT!</h1>
		<?php
			$num = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
			foreach($num as $n){
				if ($n % 5 == 0 && $n % 3 == 0){
					echo "fizz buzz ";
				}
				elseif($n % 3 == 0){
					echo "fizz ";
				}
				elseif ($n % 5 == 0){
					echo "buzz ";
				}
				
				else{
					echo $n . " ";
				}
			}
		?>
		////THIS IS FOR SAMPLE OF INSERTING MULTIPLE RECORDS
		<?php
		/*
			echo "</br>";
			$fromNo = 1;
			$toNo = 10;
			include "conn.php";
			for($x = $fromNo; $x <= $toNo; $x++){
				$sql = "INSERT INTO try_table SET no = '$x'";
				$conn->query($sql);
			}
		*/
		?>
		</div>
	</div>
</div>
<script>
function home() {
	document.getElementById('home').style.backgroundColor = "#f8f8ff";
	document.getElementById('home').style.color = "#006400";
	document.getElementById('home').style.cursor = "default";
}
</script>
</body>
</html>