
<?php
	if(!empty($_POST['searchGsatClients'])){
		$searchGSatInfo = $_POST['searchGsatClients'];
		include 'conn.php';
		$gsatClientSelect = "SELECT * FROM gsat_clients_table where so_no LIKE '$searchGSatInfo%' OR date_installed LIKE '$searchGSatInfo%' OR 
		clients_name LIKE '$searchGSatInfo%' OR address LIKE '$searchGSatInfo%' OR contact_no LIKE '$searchGSatInfo%' OR email LIKE '$searchGSatInfo%' OR
		box_no LIKE '$searchGSatInfo%' OR subscription LIKE '$searchGSatInfo%' OR
		date_loaded LIKE '$searchGSatInfo%' OR expiration_date LIKE '$searchGSatInfo%' OR advance LIKE '$searchGSatInfo%' OR
		customer_of LIKE '$searchGSatInfo%' OR remarks LIKE '$searchGSatInfo%' OR status LIKE '$searchGSatInfo%' OR technician LIKE '$searchGSatInfo%'";
		$resultSelect = $conn->query($gsatClientSelect);
		if($resultSelect->num_rows > 0){
			echo "<h2>SEARCHED DATA INFORMATION!</h2>";
?>
			<table class='employee_table'><caption>GSAT Clients Information</caption>
				<tr>
					<th colspan='2'>Controls</th>
					<th>SO Number</th>
					<th>Date Installed</th>
					<th>Clients Name</th>
					<th>Address</th>
					<th>Contact Number</th>
					<th>Email Address</th>
					<th>Box Number</th>
					<th>Mode of Subscription</th>
					<th>Date Loaded</th>
					<th>Card Number</th>
					<th>Expiration Date</th>
					<th>Advance Payment</th>
					<th>Process By</th>
					<th>Remarks</th>
					<th>Status</th>
					<th>Technician Assigned</th>
					</tr>
<?php
			while($rowGsat = $resultSelect->fetch_assoc()){
?>
				<tr>
					<td><a href='operation_gsat_edit_clients.php?id=<?php echo $rowGsat['id'];?>'>Edit</a></td>
					<td><a onclick = 'return confirm("Are you sure you want to delete this GSat client?")'href='operation_gsat_edit_clients.php?idToDel=<?php echo $rowGsat['id'];?>'>Delete</a></td>
					<td><?php echo $rowGsat['so_no'];?></td>
					<td><?php echo $rowGsat['date_installed'];?></td>
					<td><?php echo $rowGsat['clients_name'];?></td>
					<td><?php echo $rowGsat['address'];?></td>
					<td><?php echo $rowGsat['contact_no'];?></td>
					<td><?php echo $rowGsat['email'];?></td>
					<td><?php echo $rowGsat['box_no'];?></td>
					<td><?php echo $rowGsat['subscription'];?></td>
					<td><?php echo $rowGsat['date_loaded'];?></td>
					<td><?php echo $rowGsat['card_no'];?></td>
					<td><?php echo $rowGsat['expiration_date'];?></td>
					<td><?php echo $rowGsat['advance'];?></td>
					<td><?php echo $rowGsat['customer_of'];?></td>
					<td><?php echo $rowGsat['remarks'];?></td>
					<td><?php echo $rowGsat['status'];?></td>
					<td><?php echo $rowGsat['technician'];?></td>
				</tr>
<?php
			}
?>
			</table>
<?php
		}
		else{
			echo "No results found!";
		}
	}
	else{
		echo "<h2>THIS ARE CLIENTS THAT WILL EXPIRED WITHIN 15 DAYS!</h2>";
		include 'conn.php';
		$gsatClientSelect = 'SELECT * FROM gsat_clients_table where expiration_date BETWEEN NOW() - INTERVAL 1 DAY AND NOW() + INTERVAL 15 DAY';
		$resultSelect = $conn->query($gsatClientSelect);
		if($resultSelect->num_rows > 0){
?>
			<table class='employee_table'><caption>GSAT Clients Information</caption>
				<tr>
					<th colspan='2'>Controls</th>
					<th>SO Number</th>
					<th>Date Installed</th>
					<th>Clients Name</th>
					<th>Address</th>
					<th>Contact Number</th>
					<th>Email Address</th>
					<th>Box Number</th>
					<th>Mode of Subscription</th>
					<th>Date Loaded</th>
					<th>Card Number</th>
					<th>Expiration Date</th>
					<th>Advance Payment</th>
					<th>Process By</th>
					<th>Remarks</th>
					<th>Status</th>
					<th>Technician Assigned</th>
					</tr>
<?php
			while($rowGsat = $resultSelect->fetch_assoc()){
?>
				<tr>
					<td><a href='operation_gsat_edit_clients.php?id=<?php echo $rowGsat['id'];?>'>Edit</a></td>
					<td><a onclick = 'return confirm("Are you sure you want to delete this GSat client?")'href='operation_gsat_edit_clients.php?idToDel=<?php echo $rowGsat['id'];?>'>Delete</a></td>
					<td><?php echo $rowGsat['so_no'];?></td>
					<td><?php echo $rowGsat['date_installed'];?></td>
					<td><?php echo $rowGsat['clients_name'];?></td>
					<td><?php echo $rowGsat['address'];?></td>
					<td><?php echo $rowGsat['contact_no'];?></td>
					<td><?php echo $rowGsat['email'];?></td>
					<td><?php echo $rowGsat['box_no'];?></td>
					<td><?php echo $rowGsat['subscription'];?></td>
					<td><?php echo $rowGsat['date_loaded'];?></td>
					<td><?php echo $rowGsat['card_no'];?></td>
					<td><?php echo $rowGsat['expiration_date'];?></td>
					<td><?php echo $rowGsat['advance'];?></td>
					<td><?php echo $rowGsat['customer_of'];?></td>
					<td><?php echo $rowGsat['remarks'];?></td>
					<td><?php echo $rowGsat['status'];?></td>
					<td><?php echo $rowGsat['technician'];?></td>
				</tr>
<?php
			}
?>
			</table>
<?php
		}
	}
?>