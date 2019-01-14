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
				error_reporting(0);
				$gsatEditID = $_GET['id'];
				include 'conn.php';
				$selectEdit = "SELECT * FROM gsat_clients_table WHERE id = '$gsatEditID' LIMIT 1";
				$selectEditResult = $conn->query($selectEdit);
				if($selectEditResult->num_rows > 0){
					$selectEditRow = $selectEditResult->fetch_assoc();
					$editID = $selectEditRow['id'];
					$editSO = $selectEditRow['so_no'];
					$editDateInstalled = $selectEditRow['date_installed'];
					$editName = $selectEditRow['clients_name'];
					$editAddress = $selectEditRow['address'];
					$editNumber = $selectEditRow['contact_no'];
					$editEmail = $selectEditRow['email'];
					$editBoxNumber = $selectEditRow['box_no'];
					$editSubscription = $selectEditRow['subscription'];
					//$editQuantity = $selectEditRow['quantity'];
					$editDateLoaded = $selectEditRow['date_loaded'];
					$editCardNumber = $selectEditRow['card_no'];
					$editExpirationDate = $selectEditRow['expiration_date'];
					$editAdvancePayment = $selectEditRow['advance'];
					$editHandle = $selectEditRow['customer_of'];
					$editTechnician = $selectEditRow['technician'];
					$editRemarks = $selectEditRow['remarks'];
					$editStatus = $selectEditRow['status'];
					$editEmployeeUser = $selectEditRow['emp_user'];
					$editTimeStamp = $selectEditRow['time_stamp'];
				}
			?>
			<?php
				$updSOErr = $updNameErr = $updEmailErr = "";
				if($_SERVER['REQUEST_METHOD']== "POST"){
					if(isset($_POST['gsatUpdateSubmit'])){
						$gsatUpdID = $_POST['gsatUpdateIDNumber'];
						$gsatUpdSO = $_POST['gsatUpdateSONumber'];
						$gsatUpdDateIns = $_POST['gsatUpdateDateInstalled'];
						$gsatUpdCName = $_POST['gsatUpdateClientName'];
						$gsatUpdCAddress = $_POST['gsatUpdateClientAddress'];
						$gsatUpdCNumber = $_POST['gsatUpdateClientNumber'];
						$gsatUpdCEmail = $_POST['gsatUpdateClientEmail'];
						$gsatUpdCClientBox = $_POST['gsatUpdateClientBoxNumber'];
						$gsatUpdCSubscription = $_POST['gsatUpdateClientSubscription'];
						//$gsatUpdCQuantity = $_POST['gsatUpdateQuantity'];
						$gsatUpdCDateLoaded = $_POST['gsatUpdateDateLoaded'];
						$gsatUpdCCardNum = $_POST['gsatUpdateCardNumber'];
						$gsatUpdCExpDate = $_POST['gsatUpdateExpirationDate'];
						$gsatUpdCAdvPay = $_POST['gsatUpdateAdvancePayment'];
						$gsatUpdCHandle = $_POST['gsatUpdateHandle'];
						$gsatUpdCTech = $_POST['gsatUpdateTechnician'];
						$gsatUpdCRem = $_POST['gsatUpdateRemarks'];
						$gsatUpdCStat = $_POST['gsatUpdateStatus'];
						$checkSO = "SELECT * FROM gsat_clients_table WHERE so_no = '$gsatUpdSO' AND id != '$gsatUpdID' LIMIT 1";
						$checkSOResult = $conn->query($checkSO);
						if($checkSOResult->num_rows > 0){
							$updSOErr = "THIS SO ALREADY EXIST!";
							?>
								<script>
									alert('Failed to update client information. Input Client S.O. alredy exist!');
								</script>
							<?php
						}
						else{
							//FOR S.O.
							$updSOVal = test_input($gsatUpdSO);
							//FOR NAME
							$updCName = test_input($gsatUpdCName);
							if(!preg_match("/^[a-zA-Z ]*$/",$gsatUpdCName)){
								$updNameErr = 'Only letters are allowed in client name!';
							}
							else{
								$updNameVal = textToUpper($updCName);
							}
							//FOR ADDRESS
							$updAddVal = textToUpper(test_input($gsatUpdCAddress));
							//FOR NUMBER
							$updNumVal = test_input($gsatUpdCNumber);
							//THIS IS FOR EMAIL
							if(!empty($gsatUpdCEmail)){
								if(!filter_var($gsatUpdCEmail, FILTER_VALIDATE_EMAIL)){
									$updEmailErr = "Email is invalid format!";
								}
								else{
									$updEmailVal = test_input($gsatUpdCEmail);
								}
							}
							else{
								$updEmailVal = '';
							}
							//THIS IS FOR CLIENT BOX NUMBER
							$updBoxNumVal = test_input($gsatUpdCClientBox);
							//THIS IS FOR THE CLIENT SUBSCRIPTION
							$updSubsVal = textToUpper(test_input($gsatUpdCSubscription));
							//THIS IS FOR QUANTITY
							//$updQuantVal = test_input($gsatUpdCQuantity);
							//THIS IS FOR CARD NUMBER
							if(!empty($gsatUpdCCardNum)){
								$updCardNumVal = test_input($gsatUpdCCardNum);
							}else{
								$updCardNumVal = "";
							}
							//THIS IS FOR ADVANCE PAYMENT
							$updAdvPayVal = test_input($gsatUpdCAdvPay);
							//THIS IS FOR HANDLE
							$updHandleVal = textToUpper(test_input($gsatUpdCHandle));
							//THIS IS FOR TECHNICIAN ASSIGNED
							$updTechVal = textToUpper(test_input($gsatUpdCTech));
							//THIS IS FOR REMARKS
							$updRemVal = textToUpper(test_input($gsatUpdCRem));
							//THIS IS FOR STATUS
							$updStatVal = textToUpper(test_input($gsatUpdCStat));
							if(empty($updSOErr) && empty($updNameErr) && empty($updEmailErr)){
									/*
								$updSOVal
								$gsatUpdDateIns
								$updNameVal
								$updAddVal
								$updNumVal
								$updEmailVal
								$updBoxNumVal
								$updSubsVal
								$updQuantVal
								$updAdvPayVal
								$updHandleVal
								$updTechVal
								$updRemVal
								$updStatVal
								$gsatUpdCDateLoaded
								$gsatUpdCExpDate
								$employeeFullName
							*/
								$updGsatClient = "UPDATE gsat_clients_table SET so_no = '$updSOVal', date_installed = '$gsatUpdDateIns',
								clients_name = '$updNameVal', address = '$updAddVal', contact_no = '$updNumVal', email = '$updEmailVal',
								box_no = '$updBoxNumVal', subscription = '$updSubsVal', date_loaded = '$gsatUpdCDateLoaded',
								card_no = '$updCardNumVal', expiration_date = '$gsatUpdCExpDate', advance = '$updAdvPayVal', customer_of = '$updHandleVal',
								remarks = '$updRemVal', technician = '$updTechVal', status = '$updStatVal', emp_user = '$employeeFullName', time_stamp = now() WHERE id = '$gsatUpdID'";
								if($conn->query($updGsatClient)===TRUE){
									?>
										<script>
											alert("You successfully updated GSat client information!");
											window.location.href = 'operation_gsat_crud_clients.php';
										</script>
									<?php
								}
								else{
									echo "Error: " . $updGsatClient . "<br>" . $conn->error;
								}
							}
							else{
								?>
									<script>
										alert('Please fill-out the form properly!');
									</script>
								<?php
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
				<h2>Please fill-out the form properly to update Gsat client!</h2>
				<p><i><b>NOTE: </b>Fields with <b>asterisk(*) </b>are required!</p></i></br>
				<span>ID: </span><input type="number" name='gsatUpdateIDNumber' value = '<?php echo $editID;?>' class = "readonly" readonly = 'readonly'></br>
				<span>SO NUMBER *: </span><input type="number" name='gsatUpdateSONumber' value = '<?php echo $editSO;?>' placeholder='SO NUMBER' required><span class='error'><?php echo $updSOErr; ?></span></br>
				<span>DATE INSTALLED *: </span>
				<input type="date" name="gsatUpdateDateInstalled" value = '<?php echo $editDateInstalled;?>' required></br>
				<span>CLIENT NAME *: </span><input type="text" name='gsatUpdateClientName' value = '<?php echo $editName;?>' placeholder='CLIENT NAME' class="upperCase" required><span class='error'><?php echo $updNameErr; ?></span></br>
				<span>CLIENT ADDRESS *: </span><input type="text" name='gsatUpdateClientAddress' value = '<?php echo $editAddress;?>' placeholder='CLIENT ADDRESS' class="upperCase" required></br>
				<span>CLIENT NUMBER *: </span><input type="text" name='gsatUpdateClientNumber' value = '<?php echo $editNumber;?>' placeholder='CLIENT NUMBER' required></br>
				<span>CLIENT EMAIL: </span><input type="text" name='gsatUpdateClientEmail' value = '<?php echo $editEmail;?>' placeholder='CLIENT EMAIL'><span class='error'><?php echo $updEmailErr; ?></span></br>
				<span>CLIENT BOX NUMBER *: </span><input type="text" name='gsatUpdateClientBoxNumber' value = '<?php echo $editBoxNumber;?>' placeholder='CLIENT BOX NUMBER' required></br>
				<span>CLIENT SUBSCRIPTION *: </span>
				<select id='pack_value'name='gsatUpdateClientSubscription' onchange='pack_def()' onclick='pack()'required>
					<option value='<?php echo $editSubscription;?>' id='pack_default'><?php echo $editSubscription;?></option>
					<option value='PACKAGE 500' id='PACK_500'>PACKAGE 500</option>
					<option value='PACKAGE 300' id='PACK_300'>PACKAGE 300</option>
					<option value='PACKAGE 200' id='PACK_200'>PACKAGE 200</option>
					<option value='PACKAGE 99' id= 'PACK_99' >PACKAGE 99</option>
				</select></br>
				<!--<span>BOX QUANTITY: </span>
				<input type="number" name='gsatUpdateQuantity' value = '<?php echo $editQuantity;?>' placeholder='QUANTITY' required></br>-->
				<span>CARD NUMBER: </span><input type="text" name='gsatUpdateCardNumber' value = '<?php echo $editCardNumber;?>' placeholder='CLIENT CARD NUMBER' class="upperCase"></br>
				<span>DATE LOADED *: </span>
				<input type="date" name="gsatUpdateDateLoaded" value = '<?php echo $editDateLoaded;?>' required></br>
				<span>EXPIRATION DATE *: </span>
				<input type="date" name="gsatUpdateExpirationDate" value = '<?php echo $editExpirationDate;?>' required></br>
				<span>ADVANCE PAYMENT: </span>
				<select id='advanceVal' name='gsatUpdateAdvancePayment' onclick='ad()' onchange='adchange()'>
					<option id='advanceDef' value='<?php echo $editAdvancePayment;?>'><?php
						switch($editAdvancePayment){
							case '0':
								echo'NO ADVANCE';
								break;
							case "1":
								echo "1 MONTH";
								break;
							case "2":
								echo "2 MONTHS";
								break;
							case "3":
								echo "3 MONTHS";
								break;
							case "4":
								echo "4 MONTHS";
								break;
							case "5":
								echo "5 MONTH";
								break;
							case "6":
								echo "6 MONTH";
								break;
							case "7":
								echo "7 MONTH";
								break;
							case "8":
								echo "8 MONTH";
								break;
							case "9":
								echo "9 MONTH";
								break;
							case "10":
								echo "10 MONTH";
								break;
							case "11":
								echo "11 MONTH";
								break;
							case "12":
								echo "1 YEAR";
								break;
							default:
								echo"SELECT ADVANCE SUBSCRIPTION!";
						}
					?></option>
					<option id='noAdv' value='0'>NO ADVANCE</option>
					<option id='ad1' value='1'>1 MONTH</option>
					<option id='ad2' value='2'>2 MONTHS</option>
					<option id='ad3' value='3'>3 MONTHS</option>
					<option id='ad4' value='4'>4 MONTHS</option>
					<option id='ad5' value='5'>5 MONTHS</option>
					<option id='ad6' value='6'>6 MONTHS</option>
					<option id='ad7' value='7'>7 MONTHS</option>
					<option id='ad8' value='8'>8 MONTHS</option>
					<option id='ad9' value='9'>9 MONTHS</option>
					<option id='ad10' value='10'>10 MONTHS</option>
					<option id='ad11' value='11'>11 MONTHS</option>
					<option id='ad12' value='12'>1 YEAR</option>
				</select></br>
				<span>HANDLE BY *: </span>
				<select name='gsatUpdateHandle' id='handleVal' onclick='handle()' onchange='handle2()' required>
					<option value='<?php echo $editHandle;?>' id='handleDef'><?php echo $editHandle;?></option>
					<option value='HEAD OFFICE' id='headOffice'>HEAD OFFICE</option>
					<option value='SANTA CRUZ MANILA' id='santaCruz'>SANTA CRUZ MANILA</option>
				</select></br>
				<span>TECHNICIAN ASSIGNED *: </span>
				<select id='techVal' onclick='tech()' onchange='tech2()' name='gsatUpdateTechnician' required>
					<option id='techDef' value='<?php echo $editTechnician;?>'><?php echo $editTechnician;?></option>
					<option id='techRonie' value='RONIE GRABRIEL'>RONIE GRABRIEL</option>
					<option id='techEdgar' value='EDGAR TOMAS ENERIO'>EDGAR TOMAS ENERIO</option>
					<option id='techDennis' value='DENNIS DEL ROSARIO'>DENNIS DEL ROSARIO</option>
				</select></br>
				<span>REMARKS: </span></br>
				<textarea name="gsatUpdateRemarks" value='<?php echo $editRemarks;?>' class="upperCase" placeholder="REMARKS HERE!...."><?php echo $editRemarks;?></textarea></br>
				<span>STATUS *: </span>
				<select id='statVal' onclick='stat()' onchange='stat2()' name='gsatUpdateStatus' required>
					<option id='statDef' value='<?php echo $editStatus;?>'><?php echo $editStatus;?></option>
					<option id='statActive' value='ACTIVE'>ACTIVE</option>
					<option id='statNotActive' value='NOT ACTIVE'>NOT ACTIVE</option>
				</select></br>
				<input type='submit' name='gsatUpdateSubmit' value='UPDATE CLIENT'>
				</br></br><span>Click <a href="operation_gsat_crud_clients.php">here </a>to go back!</span>
			</form>
		</div>
	</div>
</div>
<?php
	if(isset($_GET['idToDel'])){
		$delThis = $_GET['idToDel'];
		@require("conn.php");
		$sql = "Delete from gsat_clients_table where id = '$delThis'";
		$result=$conn->query($sql);
		if($result){
			?>
			<script>
				alert("Success to delete record");
				window.location.href = 'operation_gsat_crud_clients.php';
			</script>
			<?php
		}
		else{
			?>
			<script>
				alert("Record deleted");
				window.location.href = 'employees_account.php';
			</script>
				<?php
		}
	}
?>

<script type="text/javascript">
function operation() {
	document.getElementById('operation').style.backgroundColor = "#f8f8ff";
	document.getElementById('operation').style.color = "#006400";
	document.getElementById('operation').style.cursor = "default";
	}
//THIS IS FOR PACKAGE
function pack(){
	document.getElementById('PACK_500').style.display = 'block';
	document.getElementById('PACK_300').style.display = 'block';
	document.getElementById('PACK_200').style.display = 'block';
	document.getElementById('PACK_99').style.display = 'block';
	document.getElementById('pack_default').style.display = 'none';
	var package = document.getElementById('pack_value').value;
	switch(package){
		case "PACKAGE 500":
			document.getElementById('PACK_500').style.display = 'none';
			break;
		case "PACKAGE 300":
			document.getElementById('PACK_300').style.display = 'none';
			break;
		case "PACKAGE 200":
			document.getElementById('PACK_200').style.display = 'none';
			break;
		case "PACKAGE 99":
			document.getElementById('PACK_99').style.display = 'none';
			break;
		default:
			document.getElementById(pack_value).value = 'PLEASE SELECT PACKAGE!';
	}
}
function pack_def(){
	document.getElementById('pack_default').style.display = 'none';
}
//THIS IS FOR ADVANCE
function ad(){
	document.getElementById('noAdv').style.display = 'block';
	document.getElementById('ad1').style.display = 'block';
	document.getElementById('ad2').style.display = 'block';
	document.getElementById('ad3').style.display = 'block';
	document.getElementById('ad4').style.display = 'block';
	document.getElementById('ad5').style.display = 'block';
	document.getElementById('ad6').style.display = 'block';
	document.getElementById('ad7').style.display = 'block';
	document.getElementById('ad8').style.display = 'block';
	document.getElementById('ad9').style.display = 'block';
	document.getElementById('ad10').style.display = 'block';
	document.getElementById('ad11').style.display = 'block';
	document.getElementById('ad12').style.display = 'block';
	document.getElementById('advanceDef').style.display = 'none';
	var adv = document.getElementById('advanceVal').value;
	switch(adv){
		case '0':
			document.getElementById('noAdv').style.display = 'none';
			break;
		case "1":
			document.getElementById('ad1').style.display = 'none';
			break;
		case "2":
			document.getElementById('ad2').style.display = 'none';
			break;
		case "3":
			document.getElementById('ad3').style.display = 'none';
			break;
		case "4":
			document.getElementById('ad4').style.display = 'none';
			break;
		case "5":
			document.getElementById('ad5').style.display = 'none';
			break;
		case "6":
			document.getElementById('ad6').style.display = 'none';
			break;
		case "7":
			document.getElementById('ad7').style.display = 'none';
			break;
		case "8":
			document.getElementById('ad8').style.display = 'none';
			break;
		case "9":
			document.getElementById('ad9').style.display = 'none';
			break;
		case "10":
			document.getElementById('ad10').style.display = 'none';
			break;
		case "11":
			document.getElementById('ad11').style.display = 'none';
			break;
		case "12":
			document.getElementById('ad12').style.display = 'none';
			break;
		default:
			document.getElementById('advanceVal').html = 'SELECT ADVANCE PAYMENT!';
	}
}
function adchange(){
	document.getElementById('advanceDef').style.display = 'none';
}
//THIS IS FOR GSAT CLIENT HANDLE
function handle(){
	document.getElementById('headOffice').style.display = 'block';
	document.getElementById('santaCruz').style.display = 'block';
	document.getElementById('handleDef').style.display = 'none';
	var hand = document.getElementById('handleVal').value;
	switch(hand){
		case 'HEAD OFFICE':
			document.getElementById('headOffice').style.display = 'none';
			break;
		case 'SANTA CRUZ MANILA':
			document.getElementById('santaCruz').style.display = 'none';
			break;
		default:
			document.getElementById().value = 'PLEASE SELECT OPTIONS HERE!';
	}
}
function handle2(){
	document.getElementById('handleDef').style.display = 'none';
}
//THIS IS FOR TECHNICIAN
function tech(){
	document.getElementById('techDef').style.display = 'none';
	document.getElementById('techRonie').style.display = 'block';
	document.getElementById('techEdgar').style.display = 'block';
	document.getElementById('techDennis').style.display = 'block';
	var tec = document.getElementById('techVal').value;
	switch(tec){
		case 'RONIE GRABRIEL':
			document.getElementById('techRonie').style.display = 'none';
			break;
		case 'EDGAR TOMAS ENERIO':
			document.getElementById('techEdgar').style.display = 'none';
			break;
		case 'DENNIS DEL ROSARIO':
			document.getElementById('techDennis').style.display = 'none';
			break;
		default:
			document.getElementById(techVal).value = '';
	}
}
function tech2(){
	document.getElementById('techDef').style.display = 'none';
}
//THIS IS FOR STATUS
function stat(){
	document.getElementById('statDef').style.display = 'none';
	document.getElementById('statActive').style.display = 'block';
	document.getElementById('statNotActive').style.display = 'block';
	var sta = document.getElementById('statVal').value;
	switch(sta){
		case 'ACTIVE':
			document.getElementById('statActive').style.display = 'none';
			break;
		case 'NOT ACTIVE':
			document.getElementById('statNotActive').style.display = 'none';
			break;
		default:
			document.getElementById(statVal).value = '';
	}
}
function stat2(){
	document.getElementById().style.display = 'none';
}
</script>
</body>
</html>