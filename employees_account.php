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
		/*THIS IS FOR USER ACCOUNTS FORM DISPLAY*/
		$("#showFormAccounts").click(function(){
			$(".table_content").fadeIn(500);
			$(this).fadeOut(500);
			$('#hideFormAccounts').fadeIn(1000);
		});
		$('#hideFormAccounts').click(function(){
			$(this).fadeOut(500);
			$(".table_content").fadeOut(1000);
			$("#showFormAccounts").fadeIn(500);
		});
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
		 <li class='dropdown' id="adminControls"><a href="#" class="dropbtn" id='admin'>ADMIN CONTROLS</a>
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
	<div class='pageTitle'><i class="fa fa-gears"></i> EMPLOYEES ACCOUNT</div>


<div class="box">
<?php
	/*
	$id_value
	$first_name_value
	$last_name_value
	$middle_name_value
	$address
	$inAge
	$birth_date
	$gender
	$civil_status
	$contact_number_value
	$email_add_value
	$name_emer_value
	$num_emer_value
	$department
	$position
	$date_hired
	$employee_status
	$user_name_value
	$password_value
	$retype_pass_value
	*/
	$id = $first_name = $last_name = $middle_name = $address = $age = $birth_date = $gender = $civil_status = "";
	$contact_number = $email_add = $name_emer = $num_emer = $department = $position = $date_hired = $user_name = "";
	$password = $retype_pass = $employee_status = "";
///////////////////////
	$id_err = $first_name_err = $last_name_err = $middle_name_err = $address_err = $age_err = $birth_date_err = $gender_err = $civil_status_err = "";
	$contact_number_err = $email_add_err = $name_emer_err = $num_emer_err = $department_err = $position_err = $date_hired_err = $user_name_err = "";
	$password_err = $retype_pass_err = $employee_status_err = "";
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST["add"])){
			$inID = $_POST["id"];
			$inFirstName = $_POST["first_name"];
			$inLastName = $_POST["last_name"];
			$inMiddleName = $_POST["middle_name"];
			$inAddress = $_POST["address"];
			$inBirthDate = $_POST["birth_date"];
				$from = new DateTime($inBirthDate);
				$to   = new DateTime('today');
				$inAge = $from->diff($to)->y;
			$inGender = $_POST["gender"];
			$inCivilStatus = $_POST["civil_status"];
			$inContactNumber = $_POST["contact_number"];
			$inEmailAdd = $_POST["email_add"];
			$inNameEmer = $_POST["name_emer"];
			$inNumEmer = $_POST["num_emer"];
			$inDepartment = $_POST["department"];
			$inPosition = $_POST["position"];
			$inDateHired = $_POST["date_hired"];
			$inEmployeeStatus = $_POST["employee_status"];
			$inUserName = $_POST["user_name"];
			$inPassword = $_POST["password"];
			$inRetypePass = $_POST["retype_pass"];
			//FOR ID
			if(!empty($inID) && !empty($inFirstName) && !empty($inLastName) && !empty($inMiddleName) && 
			!empty($inAddress) && !empty($inBirthDate) && !empty($inGender) && 
			!empty($inCivilStatus) && !empty($inContactNumber) && !empty($inNameEmer) && !empty($inNumEmer) && 
			!empty($inDepartment) && !empty($inPosition) && !empty($inDateHired) && !empty($inEmployeeStatus) && 
			!empty($inUserName) && !empty($inPassword) && !empty($inRetypePass)){
				include 'conn.php';
				$sql1 = "SELECT * FROM emp_table WHERE empid = '$inID' OR uname = '$inUserName' OR pword = '$inPassword' LIMIT 1";
				$result1 = $conn->query($sql1);
				if($result1->num_rows > 0){
					$row1 = $result1->fetch_assoc();
					$existID = $row1['empid'];
					$existUsername = $row1['uname'];
					$existPassword = $row1['pword'];
					if($existID === $inID){
						$id_err = "This ID already exist!";
					}
					if($existUsername === $inUserName){
						$user_name_err = "This Username already exist!";
					}
					if($existPassword === $inPassword){
						$password_err = "This Password already exist!";
					}
					echo "<script>alert('Failed to insert record! Maybe employee I.D, Username or Password you entered already exist!');</script>";
				}
				else{
					//FOR ID
					$id = test_input($inID);
					if (!preg_match('/^[0-9]*$/', $id)) {
						$id_err = "Only numbers are allowed in employee I.D. input field!";
					}
					else{
						$id_value = $id;
					}
					//FOR FIRST NAME
					$first_name = test_input($inFirstName);
					if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
						$first_name_err = "Only letters and white space are allowed in first name input field!";
					}
					else{
						$first_name_value = textToUpper($first_name);
					}
					//FOR LAST NAME
					$last_name = test_input($inLastName);
					if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
						$last_name_err = "Only letters and white space are allowed in last name input field!"; 
					}
					else{
					$last_name_value = textToUpper($last_name);
					}
					// FOR MIDDLE NAME
					$middle_name = test_input($inMiddleName);
					if (!preg_match("/^[a-zA-Z ]*$/",$middle_name)) {
						$middle_name_err = "Only letters and white space are allowed in middle name input field!";
					}
					else{
						$middle_name_value = textToUpper($middle_name);
					}
					//FOR ADDRESS
					$address = textToUpper(test_input($inAddress));
					// FOR BIRTHDATE
					$birth_date = $inBirthDate;
					//FOR GENDER
					$gender = textToUpper($inGender);
					//FOR CIVIL STATUS
					$civil_status = textToUpper($inCivilStatus);
					// FOR CONTACT NUMBER
					$contact_number = test_input($inContactNumber);
					if (!preg_match('/^[0-9]*$/', $contact_number)) {
						$contact_number_err = "Only numbers are allowed in contact number input field!";
					}
					else{
						$contact_number_value = $contact_number;
					}
					// FOR EMAIL ADDRESS
					if(!empty($inEmailAdd)){
						if(!filter_var($inEmailAdd, FILTER_VALIDATE_EMAIL)){
							$email_add_err = "Email is invalid format!";
						}
						else{
							$email_add_value = $inEmailAdd;
						}
					}
					else{
						$email_add_value = NULL;
					}
					// FOR CONTACT PERSON IN CASE OF EMERGENCY
					$name_emer = test_input($inNameEmer);
					if(!preg_match("/^[a-zA-Z ]*$/",$name_emer)){
						$name_emer_err = "Only letters are allowed on name in case of emergency input field!";
					}
					else{
						$name_emer_value = textToUpper($name_emer);
					}
					//FOR CONTACT NUMBER IN CASE OF EMERGENCY
					$num_emer = test_input($inNumEmer);
					if(!preg_match("/^[0-9]*$/",$num_emer)){
						$num_emer_err = "Contact number of person in case of emergency required only numbers!";
					}
					else{
						$num_emer_value = $num_emer;
					}
					//FOR DEPARTMENT
					if(empty($inDepartment)){
						$department_err = "Department required!";
					}
					else{
						$department = test_input($inDepartment);
					}
					//FOR POSITION
					if(empty($inPosition)){
						$position_err = "Position required!";
					}
					else{
						$position = test_input($inPosition);
					}
					//FOR DATE HIRED
					$date_hired = $inDateHired;
					//FOR EMPLOYEE STATUS
					$employee_status = $inEmployeeStatus;
					//FOR USERNAME
					$user_name = test_input($inUserName);
					if(strlen($user_name) <=7){
						$user_name_err = "User name must be 8 characters and above!";
					}
					else{
						$user_name_value = $user_name;
					}
					//FOR PASSWORD
					$password = test_input($inPassword);
					if(strlen($password) <= 7){
						$password_err = "Password must be 8 characters!";
						$password_value = $password;
					}
					else{
						$password_value = $password;
					}
					// FOR RETYPE PASSWORD
					$retype_pass = test_input($inRetypePass);
					if($password_value != $retype_pass){
						$retype_pass_err = "Password is not matched";
					}
					else{
						$retype_pass_value = $retype_pass;
					}
					/////////////////CONDITION TO RUN INSERT QUERY
					if(empty($id_err) && empty($first_name_err) &&  empty($last_name_err) && empty($middle_name_err) && empty($address_err) &&  
						empty($email_add_err) && empty($civil_status_err) &&  empty($contact_number_err) &&  empty($name_emer_err) &&  
						empty($num_emer_err) && empty($department_err) &&  empty($position_err) &&  empty($date_hired_err) &&  
						empty($employee_status_err) && empty($user_name_err) && empty($password_err) && empty($retype_pass_err)){
						$sql = "INSERT INTO emp_table(empid, fname, lname, mname, address, age, bdate, gender, cstatus, cnum, eadd,
							nameincase, numincase, department, position, dhired, empstatus, uname, pword, rpword) 
							VALUES('$id_value','$first_name_value','$last_name_value','$middle_name_value','$address',
							'$inAge','$birth_date','$gender','$civil_status','$contact_number_value','$email_add_value',
							'$name_emer_value','$num_emer_value','$department','$position','$date_hired','$employee_status',
							'$user_name_value','$password_value','$retype_pass_value')";
						if($conn->query($sql) === TRUE){
							echo "<script>window.alert('New employees account created successfully!'); </script>";
						} 
						else {
							echo "Error: " . $sql . "<br>" . $conn->error;
						}
					}
					else{
						echo "<script>window.alert('Please fill-out the form properly!'); </script>";
					}
				}
			}
			else{
				////////
				////////
				///////
				//FOR ID
					$id = test_input($inID);
					if (!preg_match('/^[0-9]*$/', $id)) {
						$id_err = "Only numbers are allowed in employee I.D. input field!";
					}
					else{
						$id_value = $id;
					}
					//FOR FIRST NAME
					$first_name = test_input($inFirstName);
					if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
						$first_name_err = "Only letters and white space are allowed in first name input field!";
					}
					else{
						$first_name_value = textToUpper($first_name);
					}
					//FOR LAST NAME
					$last_name = test_input($inLastName);
					if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
						$last_name_err = "Only letters and white space are allowed in last name input field!"; 
					}
					else{
					$last_name_value = textToUpper($last_name);
					}
					// FOR MIDDLE NAME
					$middle_name = test_input($inMiddleName);
					if (!preg_match("/^[a-zA-Z ]*$/",$middle_name)) {
						$middle_name_err = "Only letters and white space are allowed in middle name input field!";
					}
					else{
						$middle_name_value = textToUpper($middle_name);
					}
					//FOR ADDRESS
					$address = textToUpper(test_input($inAddress));
					// FOR BIRTHDATE
					$birth_date = $inBirthDate;
					//FOR GENDER
					$gender = textToUpper($inGender);
					//FOR CIVIL STATUS
					$civil_status = textToUpper($inCivilStatus);
					// FOR CONTACT NUMBER
					$contact_number = test_input($inContactNumber);
					if (!preg_match('/^[0-9]*$/', $contact_number)) {
						$contact_number_err = "Only numbers are allowed in contact number input field!";
					}
					else{
						$contact_number_value = $contact_number;
					}
					// FOR EMAIL ADDRESS
					if(!empty($inEmailAdd)){
						if(!filter_var($inEmailAdd, FILTER_VALIDATE_EMAIL)){
							$email_add_err = "Email is invalid format!";
						}
						else{
							$email_add_value = $inEmailAdd;
						}
					}
					else{
						$email_add_value = NULL;
					}
					// FOR CONTACT PERSON IN CASE OF EMERGENCY
					$name_emer = test_input($inNameEmer);
					if(!preg_match("/^[a-zA-Z ]*$/",$name_emer)){
						$name_emer_err = "Only letters are allowed on name in case of emergency input field!";
					}
					else{
						$name_emer_value = textToUpper($name_emer);
					}
					//FOR CONTACT NUMBER IN CASE OF EMERGENCY
					$num_emer = test_input($inNumEmer);
					if(!preg_match("/^[0-9]*$/",$num_emer)){
						$num_emer_err = "Contact number of person in case of emergency required only numbers!";
					}
					else{
						$num_emer_value = $num_emer;
					}
					//FOR DEPARTMENT
					if(empty($inDepartment)){
						$department_err = "Department required!";
					}
					else{
						$department = test_input($inDepartment);
					}
					//FOR POSITION
					if(empty($inPosition)){
						$position_err = "Position required!";
					}
					else{
						$position = test_input($inPosition);
					}
					//FOR DATE HIRED
					$date_hired = $inDateHired;
					//FOR EMPLOYEE STATUS
					$employee_status = $inEmployeeStatus;
					//FOR USERNAME
					$user_name = test_input($inUserName);
					if(strlen($user_name) <=7){
						$user_name_err = "User name must be 8 characters and above!";
					}
					else{
						$user_name_value = $user_name;
					}
					//FOR PASSWORD
					$password = test_input($inPassword);
					if(strlen($password) <= 7){
						$password_err = "Password must be 8 characters!";
						$password_value = $password;
					}
					else{
						$password_value = $password;
					}
					// FOR RETYPE PASSWORD
					$retype_pass = test_input($inRetypePass);
					if($password_value != $retype_pass){
						$retype_pass_err = "Password is not matched";
					}
					else{
						$retype_pass_value = $retype_pass;
					}
				echo "<script>window.alert('Please fill-out all required fields!'); </script>";
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
				window.location.href = 'admin controls.php';
			</script>
			<?php
		}
		else{
			?>
			<script>
				alert("Record deleted");
				window.location.href = 'admin controls.php';
			</script>
				<?php
		}
	}
	?>
<form method="POST" class="box" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	<h2>Please fill-out the form to add employee account!</h2>
	<i><b>NOTE:</b><p>All fields are required except for email address!</p></i></br>
	<input type="text" name="id" id='inputID' placeholder="EMPLOYEE ID" required><span id="id_err_mess" class="error"><?php echo $id_err ?></span></br>                                                    
	<input type="text" name="first_name" id='inputFirstName' class="upperCase" placeholder="FIRST NAME" id="first_name" required><span class="error"><?php echo $first_name_err ?></span>
	<input type="text" name="last_name" id='inputLastName' class="upperCase" placeholder="LAST NAME" required><span class="error"><?php echo $last_name_err ?></span>
	<input type="text" name="middle_name" id='inputMiddleName' class="upperCase" placeholder="MIDDLE NAME" required><span class="error"><?php echo $middle_name_err ?></span></br>
	<input type="text" name="address" id='inputAddress' class="upperCase" placeholder="ADDRESS" required><span class="error"><?php echo $address_err ?></span></br>
	<span>BIRTHDAY: </span></br>
	<input type="date" name="birth_date" id='inputBirthDate' required><span class="error"><?php echo $birth_date_err ?></span></br>
	<span>MALE </span>
	<input type="radio" name="gender" id='inputGender1' value="MALE" required>
	<span>FEMALE </span>
	<input type="radio" name="gender" id='inputGender2' value="FEMALE" required><span class="error"><?php echo $gender_err ?></span></br>
	<span>SINGLE </span><input type="radio" name="civil_status" id='inputCivilStatus1' value="SINGLE" required>
	<span>MARRIED </span><input type="radio" name="civil_status" id='inputCivilStatus2' value="MARRIED" required><span class="error"><?php echo $civil_status_err ?></span></br>
	<input type="text" name="contact_number" id='inputContactNumber' placeholder="CONTACT NUMBER" required><span class="error"><?php echo $contact_number_err ?></span></br>
	<input type="text" name="email_add" id='inputEmailAdd' placeholder="EMAIL ADDRESS"><span class="error"><?php echo $email_add_err ?></span></br>
	<input type="text" name="name_emer" id='inputNameEmer' class="upperCase" placeholder="PERSON IN CASE OF EMERGENCY" required><span class="error"><?php echo $name_emer_err ?></span></br>
	<input type="text" name="num_emer" id='inputNumEmer' placeholder="NUMBER IN CASE OF EMERGENCY" required><span class="error"><?php echo $num_emer_err ?><span></br>
	<span>DEPARTMENT: </span></br>
	<select name="department" id="inputDep" onchange = "viewPosition()">
		<option value="">PLEASE SELECT DEPARTMENT HERE!</option>
		<option value="HR">HR DEPARTMENT</option>
		<option value="SALES">SALES DEPARTMENT</option>
		<option value="ACCOUNTING">ACCOUNTING DEPARTMENT</option>
		<option value="IT">IT DEPARTMENT</option>
		<option value="OPERATION">OPERATION DEPARTMENT</option>
		<option value="OTHERS">OTHERS</option>
	</select><span class="error"><?php echo $department_err ?><span></br>
	<span>POSITION: </span></br>
	<select name="position" id='inputPosition'>
		<option value="">PLEASE SELECT POSITION HERE!</option>
		<option value='HR REPRESENTATIVE' id='hrRepPos'>HR REPRESENTATIVE</option>
		<option value='HR SUPERVISOR' id='hrSupPos'>HR SUPERVISOR</option>
		<option value='SALES REPRESENTATIVE' id='salesRepPos'>SALES REPRESENTATIVE</option>
		<option value='SALES SUPERVISOR' id='salesSupPos'>SALES SUPERVISOR</option>
		<option value='ACCOUNTING REPRESENTATIVE' id='accRepPos'>ACCOUNTING REPRESENTATIVE</option>
		<option value='ACCOUNTING SUPERVISOR' id='accSupPos'>ACCOUNTING SUPERVISOR</option>
		<option value='IT PERSONNEL' id='itPerPos'>IT PERSONNEL</option>
		<option value='IT SUPERVISOR' id='itSupPos'>IT SUPERVISOR</option>
		<option value='TECHNICIAN' id='techPos'>TECHNICIAN</option>
		<option value='OPERATION REPRESENTATIVE' id='opeRepPos'>OPERATION REPRESENTATIVE</option>
		<option value='OPERATION SUPERVISOR' id='opeSupPos'>OPERATION SUPERVISOR</option>
		<option value='DRIVER' id='driverPos'>DRIVER</option>
	</select><span class="error"><?php echo $position_err ?><span></br>
	<span>DATE HIRED: </span></br>
	<input type="date" id='inputDateHired' name="date_hired" required><span class="error"><?php echo $date_hired_err ?></span></br>
	<span>EMPLOYEE STATUS: </span></br>
	<select name="employee_status" id='inputEmpStat'>
	<option value= "TRAINEE">TRAINEE</option>
	<option value= "REGULAR">REGULAR</option>
	<option value= "CONTRACTUAL">CONTRACTUAL</option>
	</select></br>
	<input type="text" name="user_name" id='inputUserName' placeholder="USERNAME" required><span class="error"><?php echo $user_name_err ?></span></br>
	<input type="password" name="password" id='inputPass' placeholder="PASSWORD" required><span class="error"><?php echo $password_err ?></span></br>
	<input type="password" name="retype_pass" id='inputRePass' placeholder="RE-TYPE PASSWORD" required><span class="error"><?php echo $retype_pass_err ?></span></br>
	<input type = "submit" value = "Add new employee" id='addNewEmployee' name="add"></br></br>
	
	<!--THIS IS FOR TIME EXAMPLE CODE :D
	<?php
	echo"</br>";
	echo"</br>";
	date_default_timezone_set("Singapore");
	echo date("h:i:sa");
	?>-->
	
</form>
</div>
<!--/////////////////////////////////THIS IS FOR HIDING AND SWOWING THE EMPLOYEES ACCOUNTS-->
<div class="box" id="employeesRecord">
	<a href="#hideFormAccounts" id='showFormAccounts' class="hideAndShow">Show Employees Accounts</a>
	<a href="#showFormAccounts" id='hideFormAccounts' class="hideAndShow" style="display:none;">Hide Employees Accounts</a>
<div class="table_content" style="display:none;">
<?php 
	//THIS IS TO VIEW ALL DATA OR ACCOUNTS INFORMATION IN emp_table
	@require("conn.php");
	$sql="SELECT * FROM emp_table";
	$result=$conn->query($sql);
	if($result->num_rows > 0){
		echo "<table class='employee_table'><caption>Employees Records</caption><tr>
						<th colspan='2'>CONTROLS</th>
						<th>EMPLOYEE I.D. NUMBER</th>
						<th>FIRST NAME</th>
						<th>LAST NAME</th>
						<th>MIDDLE NAME</th>
						<th>ADDRESS</th>
						<th>Age</th>
						<th>BIRTHDATE</th>
						<th>GENDER</th>
						<th>CIVIL STATUS</th>
						<th>CONTACT NUMBER</th>
						<th>EMAIL ADDRESS</th>
						<th>CONTACT PERSON IN CASE OF EMERGENCY</th>
						<th>NUMBER OF CONTACT PERSON IN CASE OF EMERGENCY</th>
						<th>DEPARTMENT</th>
						<th>POSITION</th>
						<th>DATE HIRED</th>
						<th>EMPLOYEE STATUS</th>
						<th>USERNAME</th>
						<th>PASSWORD</th>
					</tr>";
					while($row=$result->fetch_assoc()){
						?>	
					<tr>
						<?php echo "<td>" . "<a href='edit_account.php?id=$row[id]'>Edit" . "</a>" . "</td>"; ?>
						<td><a onclick='return confirm("Are you sure you want to delete this account?")' href='edit_account.php?ei=<?php echo $row['empid'];?>'>Delete</a></td>
						<td><?php echo $row["empid"]?></td>
						<td><?php echo $row["fname"]?></td>
						<td><?php echo $row["lname"]?></td>
						<td><?php echo $row["mname"]?></td>
						<td><?php echo $row["address"]?></td>
						<td><?php echo $row["age"]?></td>
						<td><?php echo $row["bdate"]?></td>
						<td><?php echo $row["gender"]?></td>
						<td><?php echo $row["cstatus"]?></td>
						<td><?php echo $row["cnum"]?></td>
						<td><?php echo $row["eadd"]?></td>
						<td><?php echo $row["nameincase"]?></td>
						<td><?php echo $row["numincase"]?></td>
						<td><?php echo $row["department"]?></td>
						<td><?php echo $row["position"]?></td>
						<td><?php echo $row["dhired"]?></td>
						<td><?php echo $row["empstatus"]?></td>
						<td><?php echo $row["uname"]?></td>
						<td><?php echo $row["pword"]?></td>
						</tr>
					<?php } ?>
					</table>
<?php
	}
	else{
		echo"There is no User Account exist!";
	}
?>
</div>
</div>	
</div>

<script type="text/javascript">
function admin() {
	document.getElementById('admin').style.backgroundColor = "#f8f8ff";
	document.getElementById('admin').style.color = "#006400";
	document.getElementById('admin').style.cursor = "default";
	}
</script>
<script type="text/javascript">
	function viewPosition(){
		document.getElementById('hrRepPos').style.display = 'block';
		document.getElementById('hrSupPos').style.display = 'block';
		document.getElementById('salesRepPos').style.display = 'block';
		document.getElementById('salesSupPos').style.display = 'block';
		document.getElementById('accRepPos').style.display = 'block';
		document.getElementById('accSupPos').style.display = 'block';
		document.getElementById('itPerPos').style.display = 'block';
		document.getElementById('itSupPos').style.display = 'block';
		document.getElementById('techPos').style.display = 'block';
		document.getElementById('opeRepPos').style.display = 'block';
		document.getElementById('opeSupPos').style.display = 'block';
		document.getElementById('driverPos').style.display = 'block';
	var xxx = document.getElementById('inputDep').value;
	switch(xxx){
		case "HR":
			document.getElementById('salesRepPos').style.display = 'none';
			document.getElementById('salesSupPos').style.display = 'none';
			document.getElementById('accRepPos').style.display = 'none';
			document.getElementById('accSupPos').style.display = 'none';
			document.getElementById('itPerPos').style.display = 'none';
			document.getElementById('itSupPos').style.display = 'none';
			document.getElementById('techPos').style.display = 'none';
			document.getElementById('opeRepPos').style.display = 'none';
			document.getElementById('opeSupPos').style.display = 'none';
			document.getElementById('driverPos').style.display = 'none';
			break;
		case "SALES":
			document.getElementById('hrRepPos').style.display = 'none';
			document.getElementById('hrSupPos').style.display = 'none';
			document.getElementById('accRepPos').style.display = 'none';
			document.getElementById('accSupPos').style.display = 'none';
			document.getElementById('itPerPos').style.display = 'none';
			document.getElementById('itSupPos').style.display = 'none';
			document.getElementById('techPos').style.display = 'none';
			document.getElementById('opeRepPos').style.display = 'none';
			document.getElementById('opeSupPos').style.display = 'none';
			document.getElementById('driverPos').style.display = 'none';
			break;
		case "ACCOUNTING":
			document.getElementById('hrRepPos').style.display = 'none';
			document.getElementById('hrSupPos').style.display = 'none';
			document.getElementById('salesRepPos').style.display = 'none';
			document.getElementById('salesSupPos').style.display = 'none';
			document.getElementById('itPerPos').style.display = 'none';
			document.getElementById('itSupPos').style.display = 'none';
			document.getElementById('techPos').style.display = 'none';
			document.getElementById('opeRepPos').style.display = 'none';
			document.getElementById('opeSupPos').style.display = 'none';
			document.getElementById('driverPos').style.display = 'none';
			break;
		case "IT":
			document.getElementById('hrRepPos').style.display = 'none';
			document.getElementById('hrSupPos').style.display = 'none';
			document.getElementById('salesRepPos').style.display = 'none';
			document.getElementById('salesSupPos').style.display = 'none';
			document.getElementById('accRepPos').style.display = 'none';
			document.getElementById('accSupPos').style.display = 'none';
			document.getElementById('techPos').style.display = 'none';
			document.getElementById('opeRepPos').style.display = 'none';
			document.getElementById('opeSupPos').style.display = 'none';
			document.getElementById('driverPos').style.display = 'none';
			break;
		case "OPERATION":
			document.getElementById('hrRepPos').style.display = 'none';
			document.getElementById('hrSupPos').style.display = 'none';
			document.getElementById('salesRepPos').style.display = 'none';
			document.getElementById('salesSupPos').style.display = 'none';
			document.getElementById('accRepPos').style.display = 'none';
			document.getElementById('accSupPos').style.display = 'none';
			document.getElementById('itPerPos').style.display = 'none';
			document.getElementById('itSupPos').style.display = 'none';
			document.getElementById('driverPos').style.display = 'none';
			break;
		case "OTHERS":
			document.getElementById('hrRepPos').style.display = 'none';
			document.getElementById('hrSupPos').style.display = 'none';
			document.getElementById('salesRepPos').style.display = 'none';
			document.getElementById('salesSupPos').style.display = 'none';
			document.getElementById('accRepPos').style.display = 'none';
			document.getElementById('accSupPos').style.display = 'none';
			document.getElementById('itPerPos').style.display = 'none';
			document.getElementById('itSupPos').style.display = 'none';
			document.getElementById('techPos').style.display = 'none';
			document.getElementById('opeRepPos').style.display = 'none';
			document.getElementById('opeSupPos').style.display = 'none';
			break;
		default:
			document.getElementById('inputPosition').html = 'Please select position!';
		}	
	}
</script>
</body>
</html>