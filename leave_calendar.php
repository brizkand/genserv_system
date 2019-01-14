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
		$("#leaveFillout").click(function(){
			$("#disable").fadeIn(500);
			$(this).fadeOut(500);
			$('#hideForm').fadeIn(1000);
		});
		$('#hideForm').click(function(){
			$(this).fadeOut(500);
			$("#leaveFillout").fadeIn(1000);
			$("#disable").fadeOut(500);
		});
		$("#leaveData").load("leave_table.php");
		$('.personal_info').load('left_info.php');
	});
</script>
</head>
<body onload="employee_services(), checked_position()">
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
		 <li class="dropdown"><a href="#" class="dropbtn" id="employee">EMPLOYEES SERVICES</a>
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
   <!--THIS IS THE PART OF RIGHT STAGE SPACE!-->
	<div class = "main">
		<div class='pageTitle'><i class="fa fa-gears"></i> LEAVE CALENDAR & FILING</div>
		
<!--THIS DIV ELEMENT WAS THE CONTAINER OF LEAVE TABLE USING JQUERY AJAX OR LOAD-->
		<div id='leaveData' class = 'box' style="overflow-x:auto;"></div>
		
		<!--THIS IS THE CONTAINER FOR LEAVE FORM-->
		<div class="box" id='leaveList'>
			<a href="#leaveList" id='leaveFillout' class="hideAndShow">Show leave form</a>
			<a href="#leaveList" id='hideForm' class="hideAndShow" style="display:none;">Hide leave form</a>
			<div id="disable" style="display:none;">
				<?php
				//@require("conn.php");
				include 'conn.php';
				//error_reporting(0);
				$empId = $_SESSION['employeeId'];
				$sql = "Select * from emp_table where empid='$empId'";
				$result = $conn->query($sql);
				if($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$employeeId = $row['empid'];
					$firstName = $row['fname'];
					$middleName = $row['mname'];
					$lastName = $row['lname'];
					$address = $row['address'];
					$age = $row['age'];
					$birthDate = $row['bdate'];
					$gender = $row['gender'];
					$civiStatus = $row['cstatus'];
					$contactNumber = $row['cnum'];
					$emailAdd = $row['eadd'];
					$nameInCase = $row['nameincase'];
					$numInCase = $row['numincase'];
					$department = $row['department'];
					$position = $row['position'];
					$dateHired = $row['dhired'];
					$empStatus = $row['empstatus'];
					$username = $row['uname'];
					$password = $row['pword'];
				}
			?>
			<?php
				if(isset($_POST['fileLeave'])){
					$leaveId = $_POST['leaveEmployeeId'];
					$leaveName = textToUpper($_POST['leaveUsername']);
					$leave_position = textToUpper($_POST['leavePosition']);
					$leaveDateFrom = $_POST['dateFrom'];
					$leaveDateTo = $_POST['dateTo'];
					$leaveReason = test_input(textToUpper($_POST['reason']));
					$leaveSomeText = test_input(textToUpper($_POST['someText']));
					$leaveFileDate = date("Y/m/d");
					if(empty($leaveName) || empty($leave_position) || empty($leaveDateFrom) || empty($leaveDateTo) || empty($leaveReason) || empty($leaveSomeText)){
						echo "<script>window.alert('Please fill out all fields!');</script>";
					}
					else{
						include 'conn.php';
						$sql = "SELECT * FROM leave_table WHERE empid='$leaveId' AND full_name='$leaveName' AND
						position='$leave_position' AND date_filed='$leaveFileDate' AND reason='$leaveReason' AND
						reason_text='$leaveSomeText' AND date_from='$leaveDateFrom' AND date_to='$leaveDateTo' ";
						$result = $conn->query($sql);
							if($result->num_rows > 0){
								echo "<script>window.alert('Leave data already exist!');</script>";
							}
							else{
								include 'conn.php';
								$sql = "INSERT INTO leave_table(empid, full_name, position, date_filed, date_from, date_to, reason, reason_text) VALUES
								('$leaveId', '$leaveName', '$leave_position', '$leaveFileDate', '$leaveDateFrom', '$leaveDateTo', '$leaveReason', '$leaveSomeText')";
								if($conn->query($sql)===TRUE){
									echo "<script>window.alert('Successfully filed a leave!');</script>";
								}
								else{
									echo "Error: " . $sql . "<br>" . $conn->error;
									//echo "<script>window.alert('Failed to file a leave!');</script>";
								}
							}
						
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
				<form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="POST">
					<h2>Please fill-out the form!</h2>
					<span>Employee Id: </span><input type="number"
					class="readonly" readonly="readonly" value='<?php echo $employeeId;?>' name='leaveEmployeeId'></br>
					<span>Full name: </span><input type="text" class="readonlyText" readonly="readonly" value='<?php echo strtoupper($firstName . " " . $lastName);?>' name='leaveUsername'></br>
					<span>Position: </span><input type="text" class="readonlyText" readonly="readonly" value='<?php echo strtoupper($position);?>' name='leavePosition'></br>
					<span>Date from: </span><input type="date" name='dateFrom'></br>
					<span>Date to: </span><input type="date" name='dateTo'></br>
					<span>Type of leave: </span>
					<select name="reason">
						<option value="SICK LEAVE">SICK LEAVE</option>
						<option value="VACATION LEAVE">VACATION LEAVE</option>
						<option value="EMERGENCY LEAVE">EMERGENCY LEAVE</option>
						<option value="MATERNITY/PATERNITY LEAVE">MATERNITY/PATERNITY LEAVE</option>
						<option value="OTHERS">OTHERS</option>
					</select></br>
					<textarea name="someText" class="upperCase" placeholder="Some text here...."></textarea></br>
					<input type='submit' value='File now' name='fileLeave' id='submitLeave'>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	function employee_services(){
		document.getElementById('employee').style.backgroundColor = "#f8f8ff";
		document.getElementById('employee').style.color = "#006400";
		document.getElementById('employee').style.cursor = "default";
	}
</script>
</body>
</html>