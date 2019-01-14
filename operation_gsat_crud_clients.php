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
		$('#showGsatClients').click(function(){
			$('#gsatClientsContainer').load('operation_gsat_view_clients.php');
			$('#gsatClientsContainer').fadeIn(500);
			$(this).fadeOut(500);
			$('#hideGsatClients').fadeIn(1000);
		});
		$('#hideGsatClients').click(function(){
			$(this).fadeOut(500);
			$('#gsatClientsContainer').fadeOut(500);
			$('#showGsatClients').fadeIn(1000);
		});
	});
</script>
</head>
<body onload="operation(), checked_position();">
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
		 <li class="dropdown"><a href="#" class="dropbtn" id='operation'>OPERATION</a>
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
		 <li class='dropdown' id="adminControls"><a href="#" class="dropbtn" >ADMIN CONTROLS</a>
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
		<div class='pageTitle'><i class="fa fa-gears"></i> CREATE NEW GSAT CLIENT</div>
		<div class="box">
			<?php
				$employeeFullName = $_SESSION["userCompleteName"];
				$gsatSOErr = $gsatClientNameErr = $gsatEmailErr = '';
				if($_SERVER["REQUEST_METHOD"] == "POST"){
					if(isset($_POST['gsatSubmit'])){
						$insertClientSO = $_POST['gsatSONumber'];
						$insertDateInstalled = $_POST['gsatDateInstalled'];
						$insertClientName = $_POST['gsatClientName'];
						$insertClientAddress = $_POST['gsatClientAddress'];
						$insertClientNumber = $_POST['gsatClientNumber'];
						$insertClientEmail = $_POST['gsatClientEmail'];
						$insertClientBoxNumber = $_POST['gsatClientBoxNumber'];
						$insertClientSubscription = $_POST['gsatClientSubscription'];
						//$insertQuantity = $_POST['gsatQuantity'];
						$insertDateLoaded = $_POST['gsatDateLoaded'];
						$insertCardNumber = $_POST['gsatClientCardNo'];
						$insertExpiretionDate = $_POST['gsatExpirationDate'];
						$insertAdvancePayment = $_POST['gsatAdvancePayment'];
						$insertHandle = $_POST['gsatHandle'];
						$insertTechnician = $_POST['gsatTechnician'];
						$insertRemarks = $_POST['gsatRemarks'];
						//STABLISH CONNECTION
						include 'conn.php';
						$selectGsatData = "SELECT * FROM gsat_clients_table WHERE so_no = '$insertClientSO'";
						$selectGsatResult = $conn->query($selectGsatData);
						if($selectGsatResult->num_rows > 0){
							$gsatSOErr = 'This S.O. Number already exist!';
							$selectGsatRow = $selectGsatResult->fetch_assoc();
							$existID = $selectGsatRow['id'];
							$existSO =$selectGsatRow['so_no'];
							$existDateInstalled = $selectGsatRow['date_installed'];
							$existName = $selectGsatRow['clients_name'];
							$existAddress = $selectGsatRow['address'];
							$existNumber = $selectGsatRow['contact_no'];
							$existEmail = $selectGsatRow['email'];
							$existBoxNumber = $selectGsatRow['box_no'];
							$existSubscription = $selectGsatRow['subscription'];
							//$existQuantity = $selectGsatRow['quantity'];
							$existDateLoaded = $selectGsatRow['date_loaded'];
							$existExpirationDate = $selectGsatRow['expiration_date'];
							$existAdvancePayment = $selectGsatRow['advance'];
							$existHandle = $selectGsatRow['customer_of'];
							$existTechnician = $selectGsatRow['technician'];
							$existRemarks = $selectGsatRow['remarks'];
							$existStatus = $selectGsatRow['status'];
							$existEmployeeUser = $selectGsatRow['emp_user'];
							$existTimeStamp = $selectGsatRow['time_stamp'];
							echo "<script>alert('You already inserted this data!');</script>";
						}
						else{
							//THIS IS FOR CLIENT SO NUMBER
							$gsatSOValue = test_input($insertClientSO);
							//THIS IS FOR CLIENT NAME
							$gsatName = test_input($insertClientName);
							if(!preg_match("/^[a-zA-Z ]*$/",$gsatName)){
								$gsatClientNameErr = 'Only letters are allowed in client name!';
							}
							else{
								$gsatClientNameValue = textToUpper($gsatName);
							}
							//THIS IS FOR CLIENT ADDRESS
							$gsatClientAddressValue = textToUpper(test_input($insertClientAddress));
							//THIS IS FOR CLIENT NUMBER
							$gsatClientNumberValue = textToUpper(test_input($insertClientNumber));
							if(!empty($insertClientEmail)){
								if(!filter_var($insertClientEmail, FILTER_VALIDATE_EMAIL)){
									$gsatEmailErr = "Email is invalid format!";
								}
								else{
									$gsatClientEmailValue = test_input($insertClientEmail);
								}
							}
							else{
								$gsatClientEmailValue = '';
							}
							//THIS IS FOR CLIENT BOX NUMBER
							$gsatClientBoxNumberValue = textToUpper(test_input($insertClientBoxNumber));
							//THIS IS FOR THE TYPE OF SUBSCRIPTION
							$gsatClientSubscriptionValue = test_input($insertClientSubscription);
							//THIS IS FOR BOX QUANTITY
							//$gsatClientBoxQuantityValue = test_input($insertQuantity);
							//THIS IS FOR CARD NUMBER
							if(!empty($insertCardNumber)){
								$gsatClientCardNumber = test_input($insertCardNumber);
							}else{
								$gsatClientCardNumber = '';
							}
							//THIS IS FOR WHO HANDLE THE CLIENT
							$gsatClientHandleValue = textToUpper(test_input($insertHandle));
							//THIS IS FOR TECHNICIAN ASSIGNED
							$gsatTechnicianValue = textToUpper(test_input($insertTechnician));
							// THIS IS FOR REMARKS
							$gsatRemarksValue = textToUpper(test_input($insertRemarks));
							//FOR STATUS
							$gsatStatusValue = "ACTIVE";
							if(empty($gsatSOErr)&&empty($gsatClientNameErr)&&empty($gsatEmailErr)){
								$insertGsatClient = "INSERT INTO gsat_clients_table(so_no, date_installed, clients_name,
								address, contact_no, email, box_no, subscription, date_loaded, card_no, expiration_date,
								advance, customer_of, remarks, status, technician, emp_user)VALUES('$gsatSOValue','$insertDateInstalled',
								'$gsatClientNameValue','$gsatClientAddressValue', '$gsatClientNumberValue','$gsatClientEmailValue',
								'$gsatClientBoxNumberValue','$gsatClientSubscriptionValue', '$insertDateLoaded', '$gsatClientCardNumber',
								'$insertExpiretionDate','$insertAdvancePayment','$gsatClientHandleValue',
								'$gsatRemarksValue','$gsatStatusValue','$gsatTechnicianValue','$employeeFullName')";
								if($conn->query($insertGsatClient)===TRUE){
									echo "<script>alert('You successfully inserted new GSat client data');</script>";
								}
								else{
									echo "Error: " . $insertGsatClient . "<br>" . $conn->error;
								}
							}
							else{
								echo "<script>alert('Please fill-out the form properly!');</script>";
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
			<form method='POST' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>'>
				<h2>Please fill-out the form to add new Gsat client!</h2>
				<p><i><b>NOTE: </b>Fields with <b>asterisk(*) </b>are required!</p></i></br>
				<input type="number" name='gsatSONumber' placeholder='SO NUMBER *' required><span class='error'><?php echo $gsatSOErr; ?></span></br>
				<span>DATE INSTALLED *: </span></br>
				<input type="date" name="gsatDateInstalled" required></br>
				<input type="text" name='gsatClientName' placeholder='CLIENT NAME *' class="upperCase" required><span class='error'><?php echo $gsatClientNameErr; ?></span></br>
				<input type="text" name='gsatClientAddress' placeholder='CLIENT ADDRESS *' class="upperCase" required></br>
				<input type="text" name='gsatClientNumber' placeholder='CLIENT NUMBER *' required></br>
				<input type="text" name='gsatClientEmail' placeholder='CLIENT EMAIL'><span class='error'><?php echo $gsatEmailErr; ?></span></br>
				<input type="text" name='gsatClientBoxNumber' placeholder='CLIENT BOX NUMBER *' required></br>
				<span>SUBSCRIPTION PACKAGE *: </span></br>
				<select name='gsatClientSubscription' required>
					<option value='PACKAGE 500'>PACKAGE 500</option>
					<option value='PACKAGE 300'>PACKAGE 300</option>
					<option value='PACKAGE 200'>PACKAGE 200</option>
					<option value='PACKAGE 99'>PACKAGE 99</option>
				</select></br>
				<!--<input type="number" name='gsatQuantity' placeholder='QUANTITY' required></br>-->
				<span>DATE LOADED *: </span></br>
				<input type="date" name="gsatDateLoaded" required></br>
				<input type="text" name='gsatClientCardNo' placeholder='CARD NUMBER'></br>
				<span>EXPIRATION DATE *: </span></br>
				<input type="date" name="gsatExpirationDate" required></br>
				<span>ADVANCE PAYMENT: </span></br>
				<select name='gsatAdvancePayment' placeholder='ADVANCE PAYMENT'>
					<option value='0'>NO ADVANCE</option>
					<option value='1'>1 MONTH</option>
					<option value='2'>2 MONTHS</option>
					<option value='3'>3 MONTHS</option>
					<option value='4'>4 MONTHS</option>
					<option value='5'>5 MONTHS</option>
					<option value='6'>6 MONTHS</option>
					<option value='7'>7 MONTHS</option>
					<option value='8'>8 MONTHS</option>
					<option value='9'>9 MONTHS</option>
					<option value='10'>10 MONTHS</option>
					<option value='11'>11 MONTHS</option>
					<option value='12'>1 YEAR</option>
				</select></br>
				<span>HANDLE OF *: </span></br>
				<select name='gsatHandle' required>
					<option value='HEAD OFFICE'>HEAD OFFICE</option>
					<option value='SANTA CRUZ MANILA'>SANTA CRUZ MANILA</option>
				</select></br>
				<span>TECHNICIAN ASSIGNED *: </span></br>
				<select name='gsatTechnician' required>
					<option value=''>SELECT TECHNICIAN</option>
					<option value='RONIE GRABRIEL'>RONIE GRABRIEL</option>
					<option value='EDGAR TOMAS ENERIO'>EDGAR TOMAS ENERIO</option>
					<option value='DENNIS DEL ROSARIO'>DENNIS DEL ROSARIO</option>
				</select></br>
				<textarea name="gsatRemarks" class="upperCase" placeholder="REMARKS HERE!...."></textarea></br>
				<input type='submit' name='gsatSubmit' value='ADD NEW CLIENT'>
			</form>
		</div>
		<div class='box'>
			<a href="#hideGsatClients" id='showGsatClients' class="hideAndShow">Show all clients</a>
			<a href="#showGsatClients" id='hideGsatClients' class="hideAndShow" style="display:none;">Hide all clients</a>
			<!--THIS IS WHERE ALL CLIENTS DISPLAY WHEN THE USER CLICK SHOW CLIENTS-->
			<div style="display:none; overflow-x:auto;" id='gsatClientsContainer'>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
function operation() {
	document.getElementById('operation').style.backgroundColor = "#f8f8ff";
	document.getElementById('operation').style.color = "#006400";
	document.getElementById('operation').style.cursor = "default";
	}
</script>
</body>
</html>