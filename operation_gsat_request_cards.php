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
		<div class='pageTitle'><i class="fa fa-gears"></i> REQUEST CARDS</div>
		<!--THIS IS FOR CLIENT THAT EXPIRE WITHIN 15 DAYS-->
		<div class='box'>
			<form action='operation_gsat_request_action.php' method='post'>
				<h2>Please fill-out the following!</h2>
				<p><i><b>NOTE: </b>Fields with <b>asterisk(*) </b>are required!</p></i></br>
				<span>Select Date *: </span></br>
				<input type='date' value='<?php echo $today = date("Y-m-d");?>' name='requestDate' required></br>
				<span>CARD TYPE *: </span></br>
				<select name='requestCardType' required>
					<option value='PACKAGE 500'>PACKAGE 500</option>
					<option value='PACKAGE 300'>PACKAGE 300</option>
					<option value='PACKAGE 200'>PACKAGE 200</option>
					<option value='PACKAGE 99'>PACKAGE 99</option>
				</select></br>
				<input type='number' id= 'requestQuant' name='requestQuant' placeholder='QUANTITY *' required></br>
				<input type='submit' id='requestNow' name='requestNow' value='Request Now'></br>
			</form>
		</div>
		<div class='box'>
			<?php
				//THIS IS FOR TABLE RELEASED
				include 'conn.php';
				$sql="SELECT * FROM gsat_cards_table WHERE date_released != 0 AND date_loaded = 0 ORDER BY id";
				$result=$conn->query($sql);
				if($result->num_rows > 0){
					echo "<table class='employee_table'><caption>Released GSat Cards to Load</caption><tr>
						<th colspan='2'>Controls</th>
						<th>Date Released</th>
						<th>Date Loaded</th>
						<th>Card Number</th>
						<th>Clients Name</th>
					</tr>";
					while($row=$result->fetch_assoc()){
			?>	
					<tr>
						<?php echo "<td>" . "<a href='operation_load_process.php?id=$row[id]'>LOAD" . "</a>" . "</td>"; ?>
						<td><a onclick='return confirm("Are you sure you want to delete this record?")' href='operation_load_process.php?delID=<?php echo $row['id'];?>'>Delete</a></td>
						<td><?php echo $row["date_released"]?></td>
						<td><?php echo $row["date_loaded"]?></td>
						<td><?php echo $row["card_no"]?></td>
						<td><?php echo $row["clients_name"]?></td>
			<?php 
					} 
			?>
					</table>
			<?php
				}
				else{
					echo "All cards is loaded!";
				}
			?>
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