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
	<div class='pageTitle'><i class="fa fa-gears"></i>UPDATE GSAT CARDS RECORDS</div>
	<div class='box'>
		<?php
			//$idData = $poData = $cardNoData = $clientsNameData = $dateGetData = "";
			include 'conn.php';
			if(isset($_GET['id'])){
				$invID = $_GET['id'];
				$invSelectData = "SELECT * FROM gsat_cards_table WHERE id = '$invID'";
				$resInvData = $conn->query($invSelectData);
				if($resInvData->num_rows > 0){
					$invRowData = $resInvData->fetch_assoc();
					$idData = $invRowData['id'];
					$poData = $invRowData['po_no'];
					$cardNoData = $invRowData['card_no'];
					$refNo = $invRowData['reference_no'];
					$dateGetData = $invRowData['date_get'];
					$cardPackage = $invRowData['card_package'];
				}
		?>
				<form class='box' method='POST' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>'>
					<span>ID : </span><input type="number" name="editID" class="readonly"value="<?php echo $idData;?>" readonly="readonly" required></br>
					<span>DATE GET: </span><input type="date" name="editDateGet" value="<?php echo $dateGetData;?>" required></br>
					<span>PURCHASE ORDER NO: </span><input type="text" name="editPO" value="<?php echo $poData;?>" required></br>
					<span>REFERENCE NO: </span><input type="text" name="editRN" value="<?php echo $refNo;?>" required></br>
					<span>CARD NO: </span><input type="text" name="editCardNo" value="<?php echo $cardNoData;?>" required></br>
					<span>CARDS PACKAGE: </span>
					<select onchange='cardRemoveDef()' onclick='cardCheck()' id='card' name='editCardType' required>
						<option id='cDef' value='<?php echo $cardPackage;?>'><?php echo $cardPackage;?></option>
						<option id='c500' value='PACKAGE 500'>PACKAGE 500</option>
						<option id='c300' value='PACKAGE 300'>PACKAGE 300</option>
						<option id='c200' value='PACKAGE 200'>PACKAGE 200</option>
						<option id='c99' value='PACKAGE 99'>PACKAGE 99</option>
					</select></br>
					<input type='submit' name='updateMonitoring1' value='UPDATE'></br>
				</form>
		<?php
			}
			if(isset($_GET['id2'])){
				$invID = $_GET['id2'];
				$invSelectData = "SELECT * FROM gsat_cards_table WHERE id = '$invID'";
				$resInvData = $conn->query($invSelectData);
				if($resInvData->num_rows > 0){
					$invRowData = $resInvData->fetch_assoc();
					$idData = $invRowData['id'];
					$poData = $invRowData['po_no'];
					$cardNoData = $invRowData['card_no'];
					$refNo = $invRowData['reference_no'];
					$dateGetData = $invRowData['date_get'];
					$cardPackage = $invRowData['card_package'];
					$clientName = $invRowData['clients_name'];
				}
		?>
			<form class='box' method='POST' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>'>
					<span>ID : </span><input type="number" name="editID" class="readonly"value="<?php echo $idData;?>" readonly="readonly" required></br>
					<span>DATE GET: </span><input type="date" name="editDateGet" value="<?php echo $dateGetData;?>" required></br>
					<span>PURCHASE ORDER NO: </span><input type="text" name="editPO" value="<?php echo $poData;?>" required></br>
					<span>REFERENCE NO: </span><input type="text" name="editRN" value="<?php echo $refNo;?>" required></br>
					<span>CARD NO: </span><input type="text" name="editCardNo" value="<?php echo $cardNoData;?>" required></br>
					<span>CARDS PACKAGE: </span>
					<select onchange='cardRemoveDef()' onclick='cardCheck()' id='card' name='editCardType' required>
						<option id='cDef' value='<?php echo $cardPackage;?>'><?php echo $cardPackage;?></option>
						<option id='c500' value='PACKAGE 500'>PACKAGE 500</option>
						<option id='c300' value='PACKAGE 300'>PACKAGE 300</option>
						<option id='c200' value='PACKAGE 200'>PACKAGE 200</option>
						<option id='c99' value='PACKAGE 99'>PACKAGE 99</option>
					</select></br>
					<span>FOR CLIENT: </span><input type="text" class='upperCase' name="editClientName" value="<?php echo $clientName;?>" required></br>
					<input type='submit' name='updateMonitoring2' value='UPDATE'></br>
				</form>
		<?php
			}
			//THIS IS FOR UPDATING RECORDS IN SEARCH DATA OF GSAT CARDS
			if(isset($_GET['id3'])){
				$invID = $_GET['id3'];
				$invSelectData = "SELECT * FROM gsat_cards_table WHERE id = '$invID'";
				$resInvData = $conn->query($invSelectData);
				if($resInvData->num_rows > 0){
					$invRowData = $resInvData->fetch_assoc();
					$idData = $invRowData['id'];
					$poData = $invRowData['po_no'];
					$cardNoData = $invRowData['card_no'];
					$refNoData = $invRowData['reference_no'];
					$boxNoData = $invRowData['box_no'];
					$dateGetData = $invRowData['date_get'];
					$dateRelData = $invRowData['date_released'];
					$dateLoadData = $invRowData['date_loaded'];
					$cardPackageData = $invRowData['card_package'];
					$clientNameData = $invRowData['clients_name'];
					$requestNameData = $invRowData['request_by'];
				}
		?>
				<form class='box' method='POST' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>'>
					<span>ID : </span><input type="number" name="editID" class="readonly"value="<?php echo $idData;?>" readonly="readonly" required></br>
					<span>PURCHASE ORDER NO: </span><input type="text" name="editPO" value="<?php echo $poData;?>" required></br>
					<span>REFERENCE NO: </span><input type="text" name="editRN" value="<?php echo $refNoData;?>" required></br>
					<span>CARD NO: </span><input type="text" name="editCardNo" value="<?php echo $cardNoData;?>" required></br>
					<span>BOX NO: </span><input type="text" name="editBoxNo" value="<?php echo $boxNoData;?>"></br>
					<span>DATE RECIEVED: </span><input type="date" name="editDateGet" value="<?php echo $dateGetData;?>" required></br>
					<span>DATE RELEASED: </span><input type="date" name="editDateRel" value="<?php echo $dateRelData;?>"></br>
					<span>DATE LOADED: </span><input type="date" name="editDateLoad" value="<?php echo $dateLoadData;?>"></br>
					<span>CARDS PACKAGE: </span>
					<select onchange='cardRemoveDef()' onclick='cardCheck()' id='card' name='editCardType' required>
						<option id='cDef' value='<?php echo $cardPackageData;?>'><?php echo $cardPackageData;?></option>
						<option id='c500' value='PACKAGE 500'>PACKAGE 500</option>
						<option id='c300' value='PACKAGE 300'>PACKAGE 300</option>
						<option id='c200' value='PACKAGE 200'>PACKAGE 200</option>
						<option id='c99' value='PACKAGE 99'>PACKAGE 99</option>
					</select></br>
					<span>LOADED TO CLIENT: </span><input type="text" name="editClientName" value="<?php echo $clientNameData;?>"></br>
					<span>REQUESTED BY: </span><input type="text" name="editRequestBy" value="<?php echo $requestNameData;?>"></br>
					<input type='submit' name='updateMonitoring3' value='UPDATE'></br>
				</form>
		<?php
			}
			//THIS IS FOR THE UPDATING THE AVALABLE CARDS
			if($_SERVER['REQUEST_METHOD']=="POST"){
				if(isset($_POST['updateMonitoring1'])){
					$updID = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editID']))));
					$updPO = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editPO']))));
					$updRN = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editRN']))));
					$updCO = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editCardNo']))));
					$updCP = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editCardType']))));
					$updDG = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editDateGet']))));
					//THIS IS QUERY FOR UPDATING RECEIVED RECORDS OF GSAT CARDS
					$invUpdate = "UPDATE gsat_cards_table SET po_no = '$updPO', reference_no = '$updRN',
					card_no='$updCO', card_package = '$updCP', date_get='$updDG'
					WHERE id = '$updID'";
					if($conn->query($invUpdate)===TRUE){
						?>
						<script>
							alert("Successfully updated record!");
							//window.location.href = 'accounting_card_500_monitoring.php';
						</script>
						<?php
						if($updCP == "PACKAGE 500"){
							?>
							<script>
								window.location.href = 'accounting_card_500_monitoring.php';
							</script>
							<?php
						}
						elseif($updCP == "PACKAGE 300"){
							?>
							<script>
								window.location.href = 'accounting_card_300_monitoring.php';
							</script>
							<?php
						}
						elseif($updCP == "PACKAGE 200"){
							?>
							<script>
								window.location.href = 'accounting_card_200_monitoring.php';
							</script>
							<?php
						}
						elseif($updCP == "PACKAGE 99"){
							?>
							<script>
								window.location.href = 'accounting_card_99_monitoring.php';
							</script>
							<?php
						}
					}
				}
			}
			//THIS IS FOR THE UPDATING THE RELEASED CARDS IN OPERATIONS THAT IS NOT LOADED
			if($_SERVER['REQUEST_METHOD']=="POST"){
				if(isset($_POST['updateMonitoring2'])){
					$updID = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editID']))));
					$updPO = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editPO']))));
					$updRN = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editRN']))));
					$updCO = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editCardNo']))));
					$updCP = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editCardType']))));
					$updDG = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editDateGet']))));
					$updCN = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editClientName']))));
					//THIS IS QUERY FOR UPDATING RECEIVED RECORDS OF GSAT CARDS
					$invUpdate = "UPDATE gsat_cards_table SET po_no = '$updPO', reference_no = '$updRN',
					card_no='$updCO', card_package = '$updCP', date_get='$updDG', clients_name = '$updCN'
					WHERE id = '$updID'";
					if($conn->query($invUpdate)===TRUE){
						?>
						<script>
							alert("Successfully updated record!");
							//window.location.href = 'accounting_card_500_monitoring.php';
						</script>
						<?php
						if($updCP == "PACKAGE 500"){
							?>
							<script>
								window.location.href = 'accounting_card_500_monitoring.php';
							</script>
							<?php
						}
						elseif($updCP == "PACKAGE 300"){
							?>
							<script>
								window.location.href = 'accounting_card_300_monitoring.php';
							</script>
							<?php
						}
						elseif($updCP == "PACKAGE 200"){
							?>
							<script>
								window.location.href = 'accounting_card_200_monitoring.php';
							</script>
							<?php
						}
						elseif($updCP == "PACKAGE 99"){
							?>
							<script>
								window.location.href = 'accounting_card_99_monitoring.php';
							</script>
							<?php
						}
					}
				}
			}
			//THIS IS FOR THE UPDATING THE RELEASED CARDS IN OPERATIONS THAT IS NOT LOADED
			if($_SERVER['REQUEST_METHOD']=="POST"){
				if(isset($_POST['updateMonitoring3'])){
					$updID = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editID']))));
					$updPO = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editPO']))));
					$updRN = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editRN']))));
					$updCO = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editCardNo']))));
					$updBN = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editBoxNo']))));
					$updDG = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editDateGet']))));
					$updDR = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editDateRel']))));
					$updDL = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editDateLoad']))));
					$updCP= mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editCardType']))));
					$updCN = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editClientName']))));
					$updRQ = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['editRequestBy']))));
					//THIS IS QUERY FOR UPDATING GSAT ALL CARDS RECORDS
					$invUpdate = "UPDATE gsat_cards_table SET po_no = '$updPO', reference_no = '$updRN',
					card_no='$updCO', box_no='$updBN', clients_name='$updCN', date_get='$updDG', date_released='$updDR',
					date_loaded='$updDL', card_package='$updCP', request_by='$updRQ' WHERE id = '$updID'";
					if($conn->query($invUpdate)===TRUE){
						?>
						<script>
							alert("Successfully updated record!");
							//window.location.href = 'accounting_card_500_monitoring.php';
						</script>
						<?php
						if($updCP == "PACKAGE 500"){
							?>
							<script>
								window.location.href = 'accounting_card_500_monitoring.php';
							</script>
							<?php
						}
						elseif($updCP == "PACKAGE 300"){
							?>
							<script>
								window.location.href = 'accounting_card_300_monitoring.php';
							</script>
							<?php
						}
						elseif($updCP == "PACKAGE 200"){
							?>
							<script>
								window.location.href = 'accounting_card_200_monitoring.php';
							</script>
							<?php
						}
						elseif($updCP == "PACKAGE 99"){
							?>
							<script>
								window.location.href = 'accounting_card_99_monitoring.php';
							</script>
							<?php
						}
					}
				}
			}
			?>
			<?php
			if(isset($_GET['delID'])){
				$idToDelete = $_GET['delID'];
				include("conn.php");
				//SELECT DATA OF DELETING RECORDS
				$selDataDel = "SELECT * FROM gsat_cards_table WHERE id = '$idToDelete'";
				$resSelDataDel = $conn->query($selDataDel);
				if($resSelDataDel->num_rows > 0){
					$rowDataDel = $resSelDataDel->fetch_assoc();
					$cardPackageDel = $rowDataDel['card_package'];
				}
				$sql3 = "delete from gsat_cards_table where id = '$idToDelete'";
				$result=$conn->query($sql3);
				if($result){
			?>
					<script>
						alert("Successfully deleted a record!");
					</script>
					<?php
					if($cardPackageDel == "PACKAGE 500"){
					?>
						<script>
							window.location.href = 'accounting_card_500_monitoring.php';
						</script>
					<?php
					}
					elseif($cardPackageDel == "PACKAGE 300"){
					?>
						<script>
							window.location.href = 'accounting_card_300_monitoring.php';
						</script>
					<?php
					}
					elseif($cardPackageDel == "PACKAGE 200"){
					?>
						<script>
							window.location.href = 'accounting_card_200_monitoring.php';
						</script>
					<?php
					}
					elseif($cardPackageDel == "PACKAGE 99"){
					?>
						<script>
							window.location.href = 'accounting_card_99_monitoring.php';
						</script>
					<?php
					}
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
	</div>
</div>
</div>
<script>
function accountingSummaryOfPurchase() {
	document.getElementById('summaryOfPurchase').style.backgroundColor = "#f8f8ff";
	document.getElementById('summaryOfPurchase').style.color = "#006400";
	document.getElementById('summaryOfPurchase').style.cursor = "default";
}
function cardCheck(){
	document.getElementById('c500').style.display = 'block';
	document.getElementById('c300').style.display = 'block';
	document.getElementById('c200').style.display = 'block';
	document.getElementById('c99').style.display = 'block';
	var cardVal = document.getElementById('card').value;
	switch(cardVal){
		case "PACKAGE 500":
			document.getElementById('c500').style.display = 'none';
			break;
		case "PACKAGE 300":
			document.getElementById('c300').style.display = 'none';
			break;
		case "PACKAGE 200":
			document.getElementById('c200').style.display = 'none';
			break;
		case "PACKAGE 99":
			document.getElementById('c99').style.display = 'none';
			break;
		default:
			document.getElementById('cDef').innerHTML = 'Please select package!';
	}
}
function cardRemoveDef(){
	document.getElementById('cDef').style.display = 'none';
}
</script>
</body>
</html>