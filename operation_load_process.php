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
		<div class='pageTitle'><i class="fa fa-gears"></i> LOADING CARDS</div>
		<?php 
			include 'conn.php';
			$resID = $resDateRel = $resCardPack = $resCardNo = $resClientsName ="";
			if(isset($_GET['id'])){
				$editID = $_GET['id'];
				$selectID = "SELECT * FROM gsat_cards_table WHERE id = '$editID'";
				$selectRes = $conn->query($selectID);
				if($selectRes->num_rows > 0){
					$selectRow = $selectRes->fetch_assoc();
					$resID = $selectRow['id'];
					$resDateRel = $selectRow['date_released'];
					$resCardPack = $selectRow['card_package'];
					$resCardNo = $selectRow['card_no'];
					$resClientsName = $selectRow['clients_name'];
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
		<div class='box'>
			<?php
				//FOR UPDATING THE DATE LOADED
				if($_SERVER['REQUEST_METHOD']=="POST"){
					if(isset($_POST['submitLoad'])){
						$iD = mysqli_real_escape_string($conn,test_input($_POST['editID']));
						$dateLoaded = mysqli_real_escape_string($conn,test_input($_POST['editDateLoaded']));
						$boxNo = mysqli_real_escape_string($conn,test_input($_POST['editBoxNo']));
						$sql = "UPDATE gsat_cards_table SET date_loaded = '$dateLoaded', box_no = '$boxNo' WHERE id = '$iD'";
						if($conn->query($sql)===TRUE)
						?>
						<script>
							alert('Cards loaded successfully!');
							window.location.href = "operation_gsat_request_cards.php";
						</script>
						<?php
					}
				}	
			?>
			<form method='post' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>'>
				<span>CLIENTS ID : </span><input type="number" name="editID" class="readonly" value="<?php echo $resID;?>" readonly="readonly" required></br>
				<span>DATE RELEASED: </span><input type="text" name="editDateRel" class="readonlyText" value="<?php echo $resDateRel;?>" readonly="readonly" required></br>
				<span>CARD PACKAGE: </span><input type="text" name="editCardPack" class='readonlyText' value="<?php echo $resCardPack;?>" readonly='readonly' required></br>
				<span>CARD NUMBER: </span><input type="text" name="editCardNo" class='readonlyText' value="<?php echo $resCardNo;?>" readonly='readonly' required></br>
				<span>CLIENTS NAME: </span><input type="text" name="editClientName" class='readonlyText' value="<?php echo $resClientsName;?>" readonly='readonly' required></br>
				<span>DATE LOADED: </span><input type="date" name="editDateLoaded" value="<?php echo $now = date("Y-m-d");?>" required></br>
				<span>BOX NUMBER: </span><input type="text" name="editBoxNo" required></br>
				<input type='submit' name='submitLoad' value='PROCESS'></br>
			</form>
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