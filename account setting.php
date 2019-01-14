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
		$("#showFormPass").click(function(){
			$(this).fadeOut(500);
			$("#accountForm").fadeIn(500);
			$("#hideFormPass").fadeIn(2000);
		});
		$("#hideFormPass").click(function(){
			$(this).fadeOut(500);
			$("#accountForm").fadeOut(500);
			$("#showFormPass").fadeIn(2000);
		});
	});
</script>
</head>
<body onload="account(), checked_position()">
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
		 <li><a href="account setting.php" class="mainbtn" id="account">ACCOUNT SETTINGS</a></li>
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
	<!--THIS IS FOR LEFT SPACE-->
	<div class="personal_info">
		<!--THIS IS WHERE THE LEFT INFORMATION DISPLAY-->
	</div>
	<!--THIS IS FOR RIGHT SPACE-->
	<div class = "main">
		<div class='pageTitle'><i class="fa fa-gears"></i> ACCOUNT SETTINGS</div>
		<!--CONTAINER FOR RIGHT SPACE-->
		<div class="box">
			<?php 
				$empId = $_SESSION['employeeId'];
				if(isset($_POST['changeAccount'])){
					$account_username = $_POST['username'];
					$account_password = $_POST['password'];
					$account_retype = $_POST['retype'];
					if($account_username == "" ||$account_password == "" || $account_retype == ""){
						echo "<script>window.alert('Username, password and retype password are required!');</script>";
					}
					else{
						if(strlen($account_username)<= 7 ||strlen($account_password) <= 7){
						echo "<script>window.alert('Username and password must be 8 characters');</script>";
						}
						else{
							if($account_password != $account_retype){
								echo "<script>window.alert('Password mismatch!');</script>";
							}
							else{
								include 'conn.php';
								$sql = "UPDATE emp_table SET uname = '$account_username', pword = '$account_password', rpword='$account_retype' WHERE empid='$empId'";
								if($conn->query($sql)===TRUE){
								echo "<script>window.alert('Successfully change your user account!');</script>";
								$conn->close();
								}
							}
						}
			
					}
				}
			?>
			
			<form action="upload.php" method="POST" enctype="multipart/form-data">
			<h2>Profile Picture</h2>
			<?php
				$empId = $_SESSION['employeeId'];
				include 'conn.php';
				$sql = "Select * from emp_table where empid = '$empId'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$pathx = "uploads/";
					$profile = $row['profile'];
					echo '<img src="'.$pathx.$profile.'" style="display: block; width:150px; border-radius:5px; margin-bottom:3px;">';
				}
				$conn->close();
			?>
			
				<input type="file" name="file"></br>
				<input type="submit" value="Upload" name="submit">
			</form>
		</div>
		<div class="box">
			<?php
				//@require("conn.php");
				include 'conn.php';
				error_reporting(0);
				$empId = $_SESSION['employeeId'];
				$sql = "Select * from emp_table where empid='$empId'";
				$result = $conn->query($sql);
				if($result->num_rows > 0) {
					$row = $result->fetch_assoc();
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
		<form>
		<h2>Personal Informations</h2>
		<span>FULLNAME: </span><p><?php echo strtoupper($firstName . " " . $middleName . " "  . $lastName);?></p></br>
		<span>HOME ADDRESS: </span><p><?php echo strtoupper($address);?></p></br>
		<span>EMAIL ADDRESS: </span><p><?php echo $emailAdd;?></p></br>
		<span>CONTACT NUMBER: </span><p><?php echo $contactNumber;?></p></br>
		<span>DEPARTMENT: </span><p><?php echo strtoupper($department);?></p></br>
		<span>POSITION: </span><p><?php echo strtoupper($position);?></p></br>
		<span>AGE: </span><p><?php echo $age;?></p></br>
		<span>GENDER: </span><p><?php echo strtoupper($gender);?></p></br>
		</form>
		</div>
		<div class = "box">
			<a href="#hideFormPass" id='showFormPass' class="hideAndShow">Show Change Username and Password</a>
			<a href="#showFormPass" id='hideFormPass' class="hideAndShow" style="display:none;">Hide Change Username and Password</a>
			<div style="display:none;" id="accountForm">
					<form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="POST">
						<h2>User Account Informations</h2>
						<span>Username: </span><input type="text" value='<?php echo $username;?>' name='username'></br>
						<span>Password: </span><input type="text" value='<?php echo $password;?>' name='password'></br>
						<span>Re-type Password: </span><input type="text" value='' name='retype'></br>
						<input type='submit' value='Change' name='changeAccount'>
					</form>
			</div>
		</div>
	</div>
</div>
<script>
function account() {
	document.getElementById('account').style.backgroundColor = "#f8f8ff";
	document.getElementById('account').style.color = "#006400";
	document.getElementById('account').style.cursor = "default";
}
</script>
</body>
</html>