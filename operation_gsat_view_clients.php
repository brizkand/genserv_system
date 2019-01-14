<?php
	include 'conn.php';
	$gsatClientSelect = 'SELECT * FROM gsat_clients_table order by id desc';
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
					<!--<th>Box Quantity</th>-->
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
?>