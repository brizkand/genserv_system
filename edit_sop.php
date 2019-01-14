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
	$employeeFullName = $_SESSION["userCompleteName"];
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
		<div class='pageTitle'><i class="fa fa-gears"></i> EDIT SUMMARY OF PURCHASES</div>
		<div class='box'>
			<?php
				error_reporting(0);
				if(isset($_POST['update'])){
					$updateID = $_POST['ID'];
					$updateDatePurchased = $_POST['datePurchased'];
					$updatePurchasedOrder = $_POST['purchasedOrder'];
					$updateMRRNumber = $_POST['mrrNumber'];
					$updateVendor = $_POST['vendor'];
					$updateTINNumber = $_POST['tinNumber'];
					$updateAddress = $_POST['address'];
					$updateDescription = $_POST['description'];
					$updateQuantity = $_POST['quantity'];
					$updateRate = $_POST['rate'];
					$updateAmount = $_POST['amount'];
					$updatePayment = $_POST['payment'];
					$updateDateReceived = $_POST['dateReceived'];
					if(!empty($updateDatePurchased) && !empty($updatePurchasedOrder) && !empty($updateMRRNumber) && 
					!empty($updateVendor) && !empty($updateTINNumber) && !empty($updateAddress) && 
					!empty($updateDescription) && !empty($updateRate) && 
					!empty($updateAmount) && !empty($updatePayment)){
						include 'conn.php';
						$sql = "SELECT * FROM summary_of_purchases_table WHERE id != '$updateID' and (mrr_number = '$updateMRRNumber' or purchase_order = '$updatePurchasedOrder') LIMIT 1";
						$result = $conn->query($sql);
						if($result->num_rows > 0){
							?>
								<script>
									alert('The MRR Number or Purchased Order Number that you entered is already exist!');
									document.location.href='summary_of_purchases.php';
								</script>
							<?php
							//echo"<script>window.alert('The MRR Number or Purchased Order Number that you entered is already exist!');</script>";
						}
						else{
							$checkedDatePurch = substr($updateDatePurchased,5,2);
							$checkedPurchOrder = substr($updatePurchasedOrder,0,2);
							$checkedMRRNumber = substr($updateMRRNumber,2,2);
							if(($checkedDatePurch != $checkedPurchOrder) || ($checkedDatePurch != $checkedMRRNumber)){
							?>
								<script>
									alert('Failed to update record! Please checked the Date Purchased , Purchased Order and MRR Number!');
									document.location.href='summary_of_purchases.php';
								</script>
							<?php
								//echo"<script>window.alert('Failed to update record! Please checked the Date Purchased , Purchased Order and MRR Number!');</script>";
							}
							else{
								$sopYear = substr($updateDatePurchased,0,4);
								$poAuto = substr($updateMRRNumber, 7, 2);
								$sql1 = "UPDATE summary_of_purchases_table set date_purchased = '$updateDatePurchased', purchase_order = '$updatePurchasedOrder',
								mrr_number = '$updateMRRNumber', vendor = '$updateVendor', tin_number = '$updateTINNumber',
								address = '$updateAddress', description = '$updateDescription', quantity = '$updateQuantity',
								rate = '$updateRate', amount = '$updateAmount', payment = '$updatePayment', month_now = '$checkedDatePurch',
								po_number_auto = '$poAuto', year = '$sopYear', date_received = '$updateDateReceived', employee_user = '$employeeFullName' where id = '$updateID'";
								if($conn->query($sql1) === true){
							?>
								<script>
									alert('Records successfully updated!');
									document.location.href='summary_of_purchases.php';
								</script>
							<?php
									//echo"<script>window.alert('Records successfully updated!');</script>";
								}
								else{
									?>
								<script>
									alert('Failed to update records!');
									document.location.href='summary_of_purchases.php';
								</script>
							<?php
									//echo"<script>window.alert('Failed to update records!');</script>";
								}
							}
						}
					}
					else{
						?>
								<script>
									alert('Please fill-out all required input fields!');
									document.location.href='summary_of_purchases.php';
								</script>
							<?php
						//echo"<script>window.alert('All input fields are required');</script>";
					}
				}
			?>
			<form method='POST' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>'>
				<span>SOP I.D: </span><input type='text' class='readonlyText' name='ID' value='<?php echo $_GET['id'];?>' readonly='readonly'></br>
				<span>Date Purchased: </span><input type='date' name='datePurchased' value='<?php echo $_GET['dt'];?>' required></br>
				<span>Purchased Order: </span><input type='text' name='purchasedOrder' value='<?php echo $_GET['po'];?>' required></br>
				<span>MRR Number: </span><input type='text' name='mrrNumber' value='<?php echo $_GET['mrr'];?>' required></br>
				<span>Vendor: </span><input type='text' name='vendor' value='<?php echo $_GET['ven'];?>' required></br>
				<span>TIN Number: </span><input type='text' name='tinNumber' value='<?php echo $_GET['tin'];?>' required></br>
				<span>Address</span><input type='text' name='address' value='<?php echo $_GET['add'];?>' required></br>
				<span>Description: </span><input type='text' name='description' value='<?php echo $_GET['des'];?>' required></br>
				<span>Quantity: </span><input type='number' name='quantity' value='<?php echo $_GET['qua'];?>' required></br>
				<span>Rate: </span><input type='number' name='rate' value='<?php echo $_GET['rat'];?>' required></br>
				<span>Amount: </span><input type='number' name='amount' value='<?php echo $_GET['amo'];?>' required></br>
				<span>Payment: </span><input type='number' name='payment' value='<?php echo $_GET['pay'];?>' required></br>
				<span>Date Received: </span><input type='date' name='dateReceived' value='<?php echo $_GET['dr'];?>'></br>
				<input type='submit' value='Update' name='update'></br></br>
				<span>Click <a href="summary_of_purchases.php">here </a>to go back!</span>
			</form>
		</div>
	</div>
</div>
<script>
	function accountingSummaryOfPurchase(){
		document.getElementById('summaryOfPurchase').style.backgroundColor = "#f8f8ff";
		document.getElementById('summaryOfPurchase').style.color = "#006400";
		document.getElementById('summaryOfPurchase').style.cursor = "default";
	}
</script>
</body>
</html>