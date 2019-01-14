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
		 <li class="dropdown"><a href="#inventory.php" class="dropbtn">INVENTORY</a>
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
<div class='pageTitle'><i class="fa fa-gears"></i> UPDATE EMPLOYEE ACCOUNT</div>
<div class='box'>
	<?php
		error_reporting(0);
		include "conn.php";
		$ID = $_GET['id'];
		$selectAcc = "SELECT * FROM emp_table WHERE id = $ID LIMIT 1";
		$selectResultAcc = $conn->query($selectAcc);
		if($selectResultAcc->num_rows > 0){
			$selectRowAcc = $selectResultAcc->fetch_assoc();
			$empNoID = $selectRowAcc['id'];
			$empID = $selectRowAcc['empid'];
			$empFName = $selectRowAcc['fname'];
			$empLName = $selectRowAcc['lname'];
			$empMName = $selectRowAcc['mname'];
			$empAddress = $selectRowAcc['address'];
			$empAge = $selectRowAcc['age'];
			$empBDate = $selectRowAcc['bdate'];
			$empGender = $selectRowAcc['gender'];
			$empCStatus = $selectRowAcc['cstatus'];
			$empCNum = $selectRowAcc['cnum'];
			$empEAdd = $selectRowAcc['eadd'];
			$empNameInCase = $selectRowAcc['nameincase'];
			$empNumInCase = $selectRowAcc['numincase'];
			$empDepartment = $selectRowAcc['department'];
			$empPosition = $selectRowAcc['position'];
			$empDHired = $selectRowAcc['dhired'];
			$empStatus = $selectRowAcc['empstatus'];
			$empUserName = $selectRowAcc['uname'];
			$empPWord = $selectRowAcc['pword'];
			$empRPWord = $selectRowAcc['rpword'];
		}
		$editFirstNameErr = $editLastNameErr = $editMiddleNameErr = $editAddressErr = $editAgeErr = 
		$editBirthDateErr = $editGenderErr = $editCivilStatusErr = $editContactNumberErr = $editEmailAddressErr = 
		$editNameEmerErr = $editNumEmerErr = $editDepartmentErr = $editPositionErr = $editDateHiredErr = 
		$editStatusErr = $editUserNameErr = $editPasswordErr = $editRePasswordErr = "";
		include 'conn.php';
		//THIS IS THE QUERY FOR UPDATING THE EMPLOYEE RECORDS!
		if(isset($_POST['update'])){
			$editID = $_POST['editID'];
			$editEmpID = $_POST['editEmpID'];
			$editFirstName = $_POST['editFirstName'];
			$editLastName = $_POST['editLastName'];
			$editMiddleName = $_POST['editMiddleName'];
			$editAddress = $_POST['editAddress'];
			$editAge = $_POST['editAge'];
			$editBirthDate = $_POST['editBirthDate'];
			$editGender = textToUpper($_POST['editGender']);
			$editCivilStatus = textToUpper($_POST['editCivilStatus']);
			$editContactNumber = $_POST['editContactNumber'];
			$editEmailAddress = $_POST['editEmailAddress'];
			$editNameEmer = $_POST['editNameEmer'];
			$editNumEmer = $_POST['editNumEmer'];
			$editDepartment = textToUpper($_POST['editDepartment']);
			$editPosition = textToUpper($_POST['editPosition']);
			$editDateHired = $_POST['editDateHired'];
			$editStatus = textToUpper($_POST['editStatus']);
			$editUserName = $_POST['editUserName'];
			$editPassword = $_POST['editPassword'];
			$editRePassword = $_POST['editRePassword'];
			if(!empty($editFirstName)&&!empty($editLastName)&&!empty($editMiddleName)&&!empty($editAddress)&&
			!empty($editAge)&&!empty($editBirthDate)&&!empty($editGender)&&!empty($editCivilStatus)&&
			!empty($editContactNumber)&&!empty($editNameEmer)&&!empty($editNumEmer)&&!empty($editDepartment)&&
			!empty($editPosition)&&!empty($editDateHired)&&!empty($editStatus)&&!empty($editUserName)&&
			!empty($editPassword)&&!empty($editRePassword)){
				//FOR FIRST NAME
				$firstName = test_input($editFirstName);
				if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
					$editFirstNameErr = "Only letters and white space are allowed in first name input field!";
				}
				else{
					$updatedFirstName = textToUpper($firstName);
				}
				//FOR LAST NAME
				$lastName = test_input($editLastName);
				if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
					$editLastNameErr = "Only letters and white space are allowed in last name input field!"; 
				}
				else{
				$updatedLastName = textToUpper($lastName);
				}
				// FOR MIDDLE NAME
				$middleName = test_input($editMiddleName);
				if (!preg_match("/^[a-zA-Z ]*$/",$middleName)) {
					$editMiddleNameErr = "Only letters and white space are allowed in middle name input field!";
				}
				else{
					$updatedMiddleName = textToUpper($middleName);
				}
				//FOR ADDRESS
				$updatedAddress = textToUpper(test_input($editAddress));
				//FOR AGE
				$age = test_input($editAge);
				if(!preg_match("/^[0-9]*$/",$age)){
					$editAgeErr = "Age required only numbers!";
				}
				else{
					$updatedAge = $age;
				}
				//FOR CONTACT NUMBER
				$contactNumber = test_input($editContactNumber);
				if(!preg_match("/^[0-9]*$/",$contactNumber)){
					$editContactNumberErr = "Contact number of person in case of emergency required only numbers!";
				}
				else{
					$updatedContactNumber = $contactNumber;
				}
				// FOR EMAIL ADDRESS
				if(!empty($editEmailAddress)){
					if(!filter_var($editEmailAddress, FILTER_VALIDATE_EMAIL)){
						$editEmailAddressErr = "Email is invalid format!";
					}
					else{
						$updatedEmailAddress = $editEmailAddress;
					}
				}
				else{
					$updatedEmailAddress = NULL;
				}
				// FOR CONTACT PERSON IN CASE OF EMERGENCY
				$nameEmer = test_input($editNameEmer);
				if(!preg_match("/^[a-zA-Z ]*$/",$nameEmer)){
					$editNameEmerErr = "Only letters are allowed on name in case of emergency input field!";
				}
				else{
					$updatedNameEmer = textToUpper($nameEmer);
				}
				//FOR CONTACT NUMBER IN CASE OF EMERGENCY
				$numEmer = test_input($editNumEmer);
				if(!preg_match("/^[0-9]*$/",$numEmer)){
					$editNumEmerErr = "Contact number of person in case of emergency required only numbers!";
				}
				else{
					$updatedNumEmer = $numEmer;
				}
				//FOR USERNAME
				$userName = test_input($editUserName);
				if(strlen($userName) <=7){
					$editUserNameErr = "User name must be 8 characters and above!";
				}
				else{
					$updatedUserName = $userName;
				}
				//FOR PASSWORD
				$password = test_input($editPassword);
				if(strlen($password) <= 7){
					$editPasswordErr = "Password must be 8 characters!";
					$updatedPassword = $password;
				}
				else{
					$updatedPassword = $password;
				}
				// FOR RETYPE PASSWORD
					$retypePass = test_input($editRePassword);
					if($updatedPassword != $retypePass){
						$editRePasswordErr = "Password is not matched";
					}
					else{
						$updatedRePassword = $retypePass;
					}
				if(empty($editFirstNameErr)&&empty($editLastNameErr)&&empty($editMiddleNameErr)&&empty($editAgeErr)&&
				empty($editContactNumberErr)&&empty($editEmailAddressErr)&&empty($editNameEmerErr)&&empty($editNumEmerErr)&&
				empty($editUserNameErr)&&empty($editPasswordErr)&&empty($editRePasswordErr)){
					$insertEditAccount = "UPDATE emp_table SET fname = '$updatedFirstName', lname = '$updatedLastName',
					mname = '$updatedMiddleName', address = '$updatedAddress', age = '$updatedAge', bdate = '$editBirthDate',
					gender = '$editGender', cstatus = '$editCivilStatus', cnum = '$updatedContactNumber', eadd = '$updatedEmailAddress',
					nameincase = '$updatedNameEmer', numincase = '$updatedNumEmer', department = '$editDepartment',
					position = '$editPosition', dhired = '$editDateHired', empstatus = '$editStatus', uname = '$updatedUserName',
					pword = '$updatedPassword', rpword = '$updatedRePassword' where id = '$editID'";
					if($conn->query($insertEditAccount)===true){
						?>
							<script>
								alert("Successfully updated employee account!");
								window.location.href = 'employees_account.php';
							</script>
						<?php
					}
					else{
						?>
							<script>
								alert("Error in updating record!");
								window.location.href = 'employees_account.php';
							</script>
						<?php
					}
				}
				else{
					?>
						<script>
							alert("Record not update! Please properly fill-out the form!");
						</script>
					<?php
				}
			}
			else{
				?>
					<script>
						alert("Please fill-out all required fields!");
						window.location.href = 'employees_account.php';
					</script>
				<?php
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
<?php
	if(isset($_GET['ei'])){
		$empid = $_GET['ei'];
		@require("conn.php");
		$sql = "Delete from emp_table where empid = '$empid'";
		$result=$conn->query($sql);
		if($result){
			?>
			<script>
				alert("Success to delete record");
				window.location.href = 'employees_account.php';
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
<!--
$updatedFirstName
$updatedLastName
$updatedMiddleName
$updatedAddress
$updatedAge
$editBirthDate
$editGender
$editCivilStatus
$updatedContactNumber
$updatedEmailAddress
$updatedNameEmer
$updatedNumEmer
$editDepartment
$editPosition
$editDateHired
$editStatus
$updatedUserName
$updatedPassword
$updatedRePassword
-->
<form class="box" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<span>ID : </span><input type="number" name="editID" class="readonly"value="<?php echo $empNoID;?>" readonly="readonly"></br>
	<span>EMPLOYEE ID NUMBER: </span><input type="number" name="editEmpID" class="readonly" value="<?php echo $empID;?>" readonly="readonly"></input></br>
	<span>FIRST NAME: </span><input type="text" name="editFirstName" value="<?php echo $empFName;?>" required><span class="error"><?php echo $editFirstNameErr;?></span></br>
	<span>LAST NAME: </span><input type="text" name="editLastName" value="<?php echo $empLName;?>" required><span class="error"><?php echo $editLastNameErr;?></span></br>
	<span>MIDDLE NAME: </span><input type="text" name="editMiddleName" value="<?php echo $empMName;?>" required><span class="error"><?php echo $editMiddleNameErr;?></span></br>
	<span>ADDRESS: </span><input type="text" name="editAddress" value="<?php echo $empAddress;?>" required><span class="error"><?php echo $editAddressErr;?></span></br>
	<span>AGE: </span><input type="number" name="editAge" value="<?php echo $empAge;?>" required><span class="error"><?php echo $editAgeErr;?></span></br>
	<span>BIRTHDATE: </span><input type="date" name="editBirthDate" value="<?php echo $empBDate;?>" required></br>
	<span>GENDER: </span>
	<select name="editGender" required>
		<option value="<?php echo $empGender;?>"><?php echo $empGender;?></option>
		<option value="<?php $x=$empGender;if($x=="MALE"){echo "FEMALE";}else{echo "MALE";}?>">
			<?php $x=$_GET['gender'];if($x=="MALE"){echo "FEMALE";}else{echo "MALE";}?>
	</option>
	</select></br>
	<span>CIVIL STATUS: </span>
	<select name="editCivilStatus" required>
<?php 
		if($empCStatus == "SINGLE"){
?>
			<option value="SINGLE">SINGLE</option>
			<option value="MARRIED">MARRIED</option>
<?PHP
		}
		else{
?>
			<option value="MARRIED">MARRIED</option>
			<option value="SINGLE">SINGLE</option>
<?php
		}
?>
	</select></br>
	<span>CONTACT NUMBER: </span><input type="text" name="editContactNumber" value="<?php echo $empCNum;?>" required><span class="error"><?php echo $editContactNumberErr;?></span></br>
	<span>EMAIL ADDRESS: </span><input type="text" name="editEmailAddress" value="<?php echo $empEAdd;?>"><span class="error"><?php echo $editEmailAddressErr;?></span></br>
	<span>NAME OF PERSON IN CASE OF EMERGENCY: </span><input type="text" name="editNameEmer" value="<?php echo $empNameInCase;?>" required><span class="error"><?php echo $editNameEmerErr;?></span></br>
	<span>NUMBER OF PERSON IN CASE OF EMERGENCY: </span><input type="text" name="editNumEmer" value="<?php echo $empNumInCase;?>" required><span class="error"><?php echo $editNumEmerErr;?></span></br>
	<!--THIS IS FOR DEPARTMENT INPUT FIELD!-->
	<span>DEPARTMENT: </span>
		<select id="editDepartment" onclick="dep()" name="editDepartment" required>
		<!--THIS IS THE CURRENT DEPARTMENT VALUE-->
			<option value="<?php echo $empDepartment;?>">
<?php 
				$dept=$empDepartment;
				switch($dept){
					case "HR":
						echo "HR DEPARTMENT";
					break;
					case "SALES":
						echo "SALES DEPARTMENT";
						break;
					case "ACCOUNTING":
						echo "ACCOUNTING DEPARTMENT";
						break;
					case "IT":
						echo "IT DEPARTMENT";
						break;
					case "OPERATION":
						echo "OPERATION DEPARTMENT";
						break;
					case "OTHERS":
						echo "OTHERS";
						break;
					default:
						echo"Choose Department!";
				}
?>			</option>
			<option id="HR" value="HR">HR DEPARTMENT</option>
			<option id="SALES" value="SALES">SALES DEPARTMENT</option>
			<option id="ACCOUNTING" value="ACCOUNTING">ACCOUNTING DEPARTMENT</option>
			<option id="IT" value="IT">IT DEPARTMENT</option>
			<option id="OPERATION" value="OPERATION">OPERATION DEPARTMENT</option>
			<option id="OTHERS" value="OTHERS">OTHERS</option>
		</select></br>
	<span>POSITION: </span>
		<select onclick="position()" name="editPosition" id = 'posChecked' required>
			<option value='<?php echo $empPosition;?>'><?php echo $empPosition;?></option>
			<option value='HR REPRESENTATIVE' id='HR REPRESENTATIVE' class='doNotDisplay'>HR REPRESENTATIVE</option>
			<option value='HR SUPERVISOR' id='HR SUPERVISOR' class='doNotDisplay'>HR SUPERVISOR</option>
			<option value='SALES REPRESENTATIVE' id='SALES REPRESENTATIVE'class='doNotDisplay'>SALES REPRESENTATIVE</option>
			<option value='SALES SUPERVISOR' id='SALES SUPERVISOR'class='doNotDisplay'>SALES SUPERVISOR</option>
			<option value='ACCOUNTING REPRESENTATIVE' id='ACCOUNTING REPRESENTATIVE'class='doNotDisplay'>ACCOUNTING REPRESENTATIVE</option>
			<option value='ACCOUNTING SUPERVISOR' id='ACCOUNTING SUPERVISOR'class='doNotDisplay'>ACCOUNTING SUPERVISOR</option>
			<option value='IT PERSONNEL' id='I.T. PERSONNEL'class='doNotDisplay'>IT PERSONNEL</option>
			<option value='IT SUPERVISOR' id='I.T. SUPERVISOR'class='doNotDisplay'>IT SUPERVISOR</option>
			<option value='TECHNICIAN' id='TECHNICIAN'class='doNotDisplay'>TECHNICIAN</option>
			<option value='OPERATION REPRESENTATIVE' id='OPERATION REPRESENTATIVE'class='doNotDisplay'>OPERATION REPRESENTATIVE</option>
			<option value='OPERATION SUPERVISOR' id='OPERATION SUPERVISOR'class='doNotDisplay'>OPERATION SUPERVISOR</option>
			<option value='DRIVER' id='DRIVER'class='doNotDisplay'>DRIVER</option>
		</select></br>
	<span>DATE HIRED: </span><input type="date" name="editDateHired" value="<?php echo $empDHired;?>" required></br>
	<!--THIS IS FOR THE EMPLOYEE STATUS -->
	<span>EMPLOYEE STATUS: </span>
	<select onclick="func_empstatus()" name="editStatus" required>
		<!--THIS IS FOR THE CURRENT EMPLOYEE STATUS-->
		<option value="<?php echo $empStatus;?>">
<?php
	$estatus = $empStatus;
	switch($estatus){
		case "TRAINEE":
			echo "TRAINEE";
			break;
		case "REGULAR":
			echo "REGULAR";
			break;
		case "CONTRACTUAL":
			echo "CONTRACTUAL";
			break;
		default:
			echo "PLEASE SELECT EMPLOYEE STATUS!";
	}
?>
		</option>
		<!--THIS IS FOR TRAINEE STATUS-->
		<option id="TRAINEE" value="TRAINEE">TRAINEE</option>
		<!--THIS IS FOR REGULAR STATUS-->
		<option id="REGULAR" value="REGULAR">REGULAR</option>
		<!--THIS IS FOR CONTRACTUAL STATUS-->
		<option id="CONTRACTUAL" value="CONTRACTUAL">CONTRACTUAL</option>
		</select></br>
	<span>USERNAME: </span><input type="text" name="editUserName" value="<?php echo $empUserName;?>" required><span class="error"><?php echo $editUserNameErr;?></span></br>
	<span>PASSWORD: </span><input type="text" name="editPassword" value="<?php echo $empPWord;?>" required><span class="error"><?php echo $editPasswordErr;?></span></br>
	<span>RE-TYPE PASSWORD: </span><input type="text" name="editRePassword" value="<?php echo $empRPWord;?>" required><span class="error"><?php echo $editRePasswordErr;?></span></br>
	<input type="submit" name="update" value="Update"></br></br>
	<span>Click <a href="employees_account.php">here </a>to go back!</span>
</form>
</div>
</div>
<!--START OF THE SCRIPT-->
<script>
	function admin(){
		document.getElementById('admin').style.backgroundColor = "#f8f8ff";
	    document.getElementById('admin').style.color = "#006400";
	    document.getElementById('admin').style.cursor = "default";
	}
	function dep(){
		var pos="<?php echo $empDepartment;?>";
		if(pos == "HR"){
			document.getElementById('HR').style.display = "none";
		}
		else if(pos == "SALES"){
			document.getElementById('SALES').style.display = "none";
		}
		else if(pos == "ACCOUNTING"){
			document.getElementById('ACCOUNTING').style.display = "none";
		}
		else if(pos == "IT"){
			document.getElementById('IT').style.display = "none";
		}
		else if(pos == "OPERATION"){
			document.getElementById('OPERATION').style.display = "none";
		}
		else if(pos == "OTHERS"){
			document.getElementById('OTHERS').style.display = "none";
		}
	}
	function position(){
		var pos = document.getElementById('editDepartment').value;
		var checkPos = document.getElementById('posChecked').value;
		if(pos == "HR"){
			document.getElementById('HR REPRESENTATIVE').style.display = "block";
			document.getElementById('HR SUPERVISOR').style.display = "block";
			document.getElementById('SALES REPRESENTATIVE').style.display = "none";
			document.getElementById('SALES SUPERVISOR').style.display = "none";
			document.getElementById('ACCOUNTING REPRESENTATIVE').style.display = "none";
			document.getElementById('ACCOUNTING SUPERVISOR').style.display = "none";
			document.getElementById('I.T. PERSONNEL').style.display = "none";
			document.getElementById('I.T. SUPERVISOR').style.display = "none";
			document.getElementById('TECHNICIAN').style.display = "none";
			document.getElementById('OPERATION REPRESENTATIVE').style.display = "none";
			document.getElementById('OPERATION SUPERVISOR').style.display = "none";
			document.getElementById('DRIVER').style.display = "none";
		}
		else if(pos == "SALES"){
			document.getElementById('SALES REPRESENTATIVE').style.display = "block";
			document.getElementById('SALES SUPERVISOR').style.display = "block";
			document.getElementById('HR REPRESENTATIVE').style.display = "none";
			document.getElementById('HR SUPERVISOR').style.display = "none";
			document.getElementById('ACCOUNTING REPRESENTATIVE').style.display = "none";
			document.getElementById('ACCOUNTING SUPERVISOR').style.display = "none";
			document.getElementById('I.T. PERSONNEL').style.display = "none";
			document.getElementById('I.T. SUPERVISOR').style.display = "none";
			document.getElementById('TECHNICIAN').style.display = "none";
			document.getElementById('OPERATION REPRESENTATIVE').style.display = "none";
			document.getElementById('OPERATION SUPERVISOR').style.display = "none";
			document.getElementById('DRIVER').style.display = "none";
		}
		else if(pos == "ACCOUNTING"){
			document.getElementById('ACCOUNTING REPRESENTATIVE').style.display = "block";
			document.getElementById('ACCOUNTING SUPERVISOR').style.display = "block";
			document.getElementById('HR REPRESENTATIVE').style.display = "none";
			document.getElementById('HR SUPERVISOR').style.display = "none";
			document.getElementById('SALES REPRESENTATIVE').style.display = "none";
			document.getElementById('SALES SUPERVISOR').style.display = "none";
			document.getElementById('I.T. PERSONNEL').style.display = "none";
			document.getElementById('I.T. SUPERVISOR').style.display = "none";
			document.getElementById('TECHNICIAN').style.display = "none";
			document.getElementById('OPERATION REPRESENTATIVE').style.display = "none";
			document.getElementById('OPERATION SUPERVISOR').style.display = "none";
			document.getElementById('DRIVER').style.display = "none";
		}
		else if(pos == "IT"){
			document.getElementById('I.T. PERSONNEL').style.display = "block";
			document.getElementById('I.T. SUPERVISOR').style.display = "block";
			document.getElementById('HR REPRESENTATIVE').style.display = "none";
			document.getElementById('HR SUPERVISOR').style.display = "none";
			document.getElementById('SALES REPRESENTATIVE').style.display = "none";
			document.getElementById('SALES SUPERVISOR').style.display = "none";
			document.getElementById('ACCOUNTING REPRESENTATIVE').style.display = "none";
			document.getElementById('ACCOUNTING SUPERVISOR').style.display = "none";
			document.getElementById('TECHNICIAN').style.display = "none";
			document.getElementById('OPERATION REPRESENTATIVE').style.display = "none";
			document.getElementById('OPERATION SUPERVISOR').style.display = "none";
			document.getElementById('DRIVER').style.display = "none";
		}
		else if(pos == "OPERATION"){
			document.getElementById('TECHNICIAN').style.display = "block";
			document.getElementById('OPERATION REPRESENTATIVE').style.display = "block";
			document.getElementById('OPERATION SUPERVISOR').style.display = "block";
			document.getElementById('HR REPRESENTATIVE').style.display = "none";
			document.getElementById('HR SUPERVISOR').style.display = "none";
			document.getElementById('ACCOUNTING REPRESENTATIVE').style.display = "none";
			document.getElementById('ACCOUNTING SUPERVISOR').style.display = "none";
			document.getElementById('I.T. PERSONNEL').style.display = "none";
			document.getElementById('I.T. SUPERVISOR').style.display = "none";
			document.getElementById('SALES REPRESENTATIVE').style.display = "none";
			document.getElementById('SALES SUPERVISOR').style.display = "none";
			document.getElementById('DRIVER').style.display = "none";
		}
		else if(pos == "OTHERS"){
			document.getElementById('DRIVER').style.display = "block";
			document.getElementById('TECHNICIAN').style.display = "none";
			document.getElementById('OPERATION REPRESENTATIVE').style.display = "none";
			document.getElementById('OPERATION SUPERVISOR').style.display = "none";
			document.getElementById('HR REPRESENTATIVE').style.display = "none";
			document.getElementById('HR SUPERVISOR').style.display = "none";
			document.getElementById('ACCOUNTING REPRESENTATIVE').style.display = "none";
			document.getElementById('ACCOUNTING SUPERVISOR').style.display = "none";
			document.getElementById('I.T. PERSONNEL').style.display = "none";
			document.getElementById('I.T. SUPERVISOR').style.display = "none";
			document.getElementById('SALES REPRESENTATIVE').style.display = "none";
			document.getElementById('SALES SUPERVISOR').style.display = "none";
		}
	}
/////////
	function func_empstatus(){
		var emps = "<?php echo $empStatus;?>";
		if(emps == "TRAINEE"){
			document.getElementById('TRAINEE').style.display = "none";
		}
		else if(emps == "REGULAR"){
			document.getElementById('REGULAR').style.display = "none";
		}
		else if(emps == "CONTRACTUAL"){
			document.getElementById('CONTRACTUAL').style.display = "none";
		}
	}
</script>
</body>
</html>