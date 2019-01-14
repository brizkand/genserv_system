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
  
<div class = "main">
	<div class='pageTitle'><i class="fa fa-gears"></i> PROCESS CARD REQUEST</div>
	<div class='box'>
		<?php
			$proID = $proDate = $proName = $proType = $proEmpUser = "";
			$employeeFullName = $_SESSION["userCompleteName"];
			include 'conn.php';
			if(isset($_GET['id'])){
				$proID = $_GET['id'];
				$proSelectSql = "SELECT * FROM operation_request_card_table WHERE id = '$proID' LIMIT 1";
				$proData = $conn->query($proSelectSql);
				if($proData->num_rows > 0){
					$proRowData = $proData->fetch_assoc();
					$proID = $proRowData['id'];
					$proDate = $proRowData['request_date'];
					$proQuant = $proRowData['request_quantity'];
					$proType = $proRowData['request_card_type'];
					$proEmpUser = $proRowData['employee_user'];
					//THIS IS FOR SELECTING THE 1ST CARDS AVAILABLE TO USE
					$selCard = "SELECT card_no FROM gsat_cards_table WHERE date_released = 0 AND card_package = '$proType' ORDER BY card_no LIMIT 1";
					$selCardData = $conn->query($selCard);
					if($selCardData->num_rows > 0){
						$cardNoRow = $selCardData->fetch_assoc();
						$cardNo = $cardNoRow['card_no'];		
					}
					//THIS IS FOR COUNTING THE TOTAL AVAILABLE CARDS AND TYPE!
					$selCardAvail = "SELECT count(*) as totCardsAvail FROM gsat_cards_table WHERE date_released = 0 AND card_package = '$proType'";
						$resultCount = $conn->query($selCardAvail);
						if($resultCount->num_rows > 0){
						$rowCount = $resultCount->fetch_assoc();
						$totalCardsAvail = $rowCount['totCardsAvail'];
						}
					//THIS IS FOR COUNTING THE LAST CARD NUMBER FOR QUANTITY THAT OPERATION REQUESTED!
					$selCardLast = "SELECT card_no FROM gsat_cards_table ORDER BY card_no DESC LIMIT $proQuant";
						$resultSelLast = $conn->query($selCardLast);
						if($resultSelLast->num_rows > 0){
							$rowLastSel = $resultSelLast->fetch_assoc();
							$lastCard = $rowLastSel['card_no'];
						}
						//
					//else{
						//$cardNo = "No available card stocks!";
					//}
				}
			}
		?>
		<?php
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				if(isset($_POST['proCardRequest'])){
					$pID = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['proID']))));
					$pDateRel = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['proDateRel']))));
					//$pPO = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['proPO']))));
					//$pCardN = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['proCardN']))));
					$pClientN = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['proClientN']))));
					$pCardNo = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['proCardNo']))));
					$pType = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['proCardType']))));
					$pReqBy = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['proReqBy']))));
					//$pQuant = 1;
					$pUpdate = "UPDATE gsat_cards_table SET date_released = '$pDateRel', clients_name= '$pClientN',
					request_by = '$pReqBy' where card_no = '$pCardNo'";
					if($conn->query($pUpdate)===TRUE){
						$sqlRequestUpdate = "UPDATE operation_request_card_table SET status=0 WHERE id='$pID'";
						$conn->query($sqlRequestUpdate);
						?>
						<script type='text/javascript'>
							alert("Successfully process card request!");
							window.location.href = 'accounting_view_request_cards.php';
						</script>
						<?php
					}
				}
			}
			if(isset($_GET['idToDel'])){
				$idToDelete = $_GET['idToDel'];
				include("conn.php");
				$sql3 = "delete from operation_request_card_table where id = '$idToDelete'";
				$result=$conn->query($sql3);
				if($result){
			?>
					<script>
						alert("Successfully deleted a record!");
						window.location.href = 'accounting_view_request_cards.php';
					</script>
			<?php
				}
			}
		?>
		<?php
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
		<form class='box' method='POST' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>'>
			<span>REQUEST I.D: </span><input type='text' class='readonlyText' name='proID' value='<?php echo $proID;?>' readonly='readonly'></br>
			<!--<span>CARD NO: </span><input type="text" name="proCardN" required></br>-->
			<span>REQUEST QUANTITY: </span><input type="number" name="proQuantity" class='readonly' readonly='readonly' value="<?php echo $proQuant;?>" required></br>
			<span>CARD TYPE: </span><input type="text" name="proCardType" class='readonlyText' readonly='readonly' value="<?php echo $proType;?>" required></br>
			<span>REQUESTED BY: </span><input type="text" name="proReqBy" class='readonlyText' readonly='readonly' value="<?php echo $proEmpUser;?>" required></br>
			<span>DATE RELEASED: </span><input type="date" name="proDateRel" value="<?php echo $today = date('Y-m-d');?>" required></br>
			<span>CARD NUMBER FROM: </span><input type="text" name="proCardNoFrom" value="<?php if($totalCardsAvail >= $proQuant){echo $cardNo;}else{echo 'NOT ENOUGH CARDS!';}?>" required> 
			<span>TO </span><input type="text" name="proCardNoTo" value="<?php if($totalCardsAvail >= $proQuant){echo $lastCard;/*$cardNo + $proQuant - 1;*/}else{echo 'NOT ENOUGH CARDS!';}?>" required></br>
			<input type='submit' name='proCardRequest' value='PROCESS'></br>
			<!--THE NEXT CODE IS IF TOTAL AVAILABLE CARDS MINUS QUANTITY IS NOT EQUAL ZERO!!!! :D  $totalCardsAvail-->
		</form>
	</div>
</div>
</div>
<script type='text/javascript'>
function accountingSummaryOfPurchase() {
	document.getElementById('summaryOfPurchase').style.backgroundColor = "#f8f8ff";
	document.getElementById('summaryOfPurchase').style.color = "#006400";
	document.getElementById('summaryOfPurchase').style.cursor = "default";
}
</script>
</body>
</html>