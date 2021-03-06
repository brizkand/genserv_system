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
<div class='pageTitle'><i class="fa fa-gears"></i> EMPLOYEES LEAVE PROCESSING</div>
	<!--THIS IS TO DISPLAY DATA OF EMPLOYEES LEAVE!-->
	<div class='box'>
		<div id="leaveSchedule" style="overflow-x:auto;">
			<?php
				include 'conn.php';
				$sql = "SELECT * FROM leave_table where status = 'PENDING' AND payment = 'PENDING'";
				$result = $conn->query($sql);
				if($result->num_rows > 0){
					echo "<table class='employee_table'><caption>Employees Leave Schedule</caption><tr>
						<th id='leaveControl'>Controls</th>
						<th>Employee Id</th>
						<th>Name</th>
						<th>Position</th>
						<th>Date Filed</th>
						<th>Leave From Date</th>
						<th>Leave To Date</th>
						<th>Type of Leave</th>
						<th>Reasons</th>
						<th>Status</th>
						<th>Paid Status</th>
						</tr>";
						while($row=$result->fetch_assoc()){
						?>
						<tr>
							<?php echo "<td>" . "<a href='leave_process.php?idd=$row[id]&id=$row[empid]&fn=$row[full_name]&
							pos=$row[position]&dFiled=$row[date_filed]&dFrom=$row[date_from]&dTo=$row[date_to]&
							reason=$row[reason]&reasonText=$row[reason_text]&status=$row[status]&
							payment=$row[payment]'>Process Now" . "</a>" . "</td>"; ?>
							<td><?php echo $row["empid"];?></td>
							<td><?php echo $row["full_name"];?></td>
							<td><?php echo $row["position"];?></td>
							<td><?php echo $row["date_filed"];?></td>
							<td><?php echo $row["date_from"];?></td>
							<td><?php echo $row["date_to"];?></td>
							<td><?php echo $row["reason"];?></td>
							<td><?php echo $row["reason_text"];?></td>
							<td><?php echo $row["status"];?></td>
							<td><?php echo $row["payment"];?></td>
						</tr>
						<?php
						}
						?>
						</table>
						
				<?php
				}
			?>
			</div>
		</div>
</div>
</div>

<script>
function admin() {
	document.getElementById('admin').style.backgroundColor = "#f8f8ff";
	document.getElementById('admin').style.color = "#006400";
	document.getElementById('admin').style.cursor = "default";
}
</script>
</body>
</html>