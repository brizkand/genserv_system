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
		});
		 checked_position();
	</script>
</head>
<body onload="admin()">
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
				<a href="ceiling_fan_inventory.php">CEILING FAN INVENTORY</a>
				<a href="gsat_inventory.php">GSAT BOX INVENTORY</a>
				<a href="#">OFFICE TOOLS INVENTORY</a>
			</div>
		 </li>
		 <li><a href="account setting.php" class="mainbtn">ACCOUNT SETTINGS</a></li>
		 <li class='dropdown' id="adminControls"><a href="#" class="dropbtn" id="admin">ADMIN CONTROLS</a>
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
		<?php 
			error_reporting(0);
			if(isset($_POST['submitLeave'])){
				$status = $_POST['leaveStatus'];
				$consideration = $_POST['leaveConsideration'];
				$empID = $_POST['empid'];
				$leaveId = $_POST['leaveId'];
				include 'conn.php';
				$sql = "UPDATE leave_table SET status='$status', payment='$consideration' WHERE empid='$empID' AND id='$leaveId'";
				if($conn->query($sql)===TRUE){
					?>
						<script>
							alert("Leave successfully process!");
							window.location.href = 'admin_controls_leave.php';
						</script>
					<?php
				}
				else{
					echo "Record failed to update " . $conn->error;
				}
			}
		?>
		<form class='box' method='POST' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
			<span>LEAVE I.D. </span><input type='number' class='readonly' name='leaveId' value='<?php echo $_GET["idd"];?>' readonly='readonly'></br>
			<span>Employee I.D. </span><input type='number' class='readonly' name='empid' value='<?php echo $_GET["id"];?>' readonly='readonly'></br>
			<span>Full name: </span><input type='text' class='readonlyText' name='fname' value='<?php echo $_GET["fn"];?>' readonly='readonly'></br>
			<span>Position: </span><input type='text' class='readonlyText' name='position' value='<?php echo $_GET["pos"];?>' readonly='readonly'></br>
			<span>Date Filed: </span><input type='text' class='readonlyText' name='dateFiled' value='<?php echo $_GET["dFiled"];?>' readonly='readonly'></br>
			<span>Type of leave: </span><input type='text' class='readonlyText' name='typeLeave' value='<?php echo $_GET["reason"];?>' readonly='readonly'></br>
			<span>Reasons: </span><input type='text' class='readonlyText' name=reason' value='<?php echo $_GET["reasonText"];?>' readonly='readonly'></br>
			<span>From date: </span><input type='text' class='readonlyText' name='fromDate' value='<?php echo $_GET["dFrom"];?>' readonly='readonly'></br>
			<span>To date: </span><input type='text' class='readonlyText' name='toDate' value='<?php echo $_GET["dTo"];?>' readonly='readonly'></br>
			<span>Status: </span>
			<select name="leaveStatus" onclick="leaveStat()">
				<option value="<?php echo $_GET['status'];?>"><?php echo $_GET['status'];?></option>
				<option id='approved' value="APPROVED">APPROVED</option>
				<option id='disapproved' value="DISAPPROVED">DISAPPROVED</option>
				<option id='pending' value="PENDING">PENDING</option>
			</select></br>
			<span>Consideration: </span>
			<select name="leaveConsideration" onclick='cons()'>
				<option value="<?php echo $_GET['payment'];?>"><?php echo $_GET['payment'];?></option>
				<option id='paid' value="PAID">PAID</option>
				<option id='notPaid' value="NOT PAID">NOT PAID</option>
				<option id='pending2' value="PENDING">PENDING</option>
			</select></br>
			<input type="submit" name="submitLeave" value="Process"></br></br>
			<span>Click <a href="admin_controls_leave.php">here </a>to go back!</span>
		</form>

	</div>
</div>
<script>
	function admin(){
		document.getElementById('admin').style.backgroundColor = "#f8f8ff";
	    document.getElementById('admin').style.color = "#006400";
	    document.getElementById('admin').style.cursor = "default";
	}
	function leaveStat(){
		var stat = "<?php echo $_GET['status'];?>";
		if(stat == "PENDING"){
			document.getElementById('pending').style.display = "none";
		}
		else if(stat == "APPROVED"){
			document.getElementById('approved').style.display = "none";
		}
		else if(stat == "DISAPPROVED"){
			document.getElementById('disapproved').style.display = "none";
		}
	}
	function cons(){
		var consideration = "<?php echo $_GET['payment'];?>";
		if(consideration == "PENDING"){
			document.getElementById('pending2').style.display = "none";
		}
		else if(consideration == "PAID"){
			
			document.getElementById('paid').style.display = "none";
		}
		else if(consideration == "NOT PAID"){
			document.getElementById('notPaid').style.display = "none";
		}
	}
</script>
</body>
</html>