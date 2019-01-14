<?php
	include 'conn.php';
	$sql="SELECT * FROM gsat_table ORDER BY id DESC LIMIT 10";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		echo "<table class='employee_table'><caption>GSat Inventory Table</caption><tr>
						<th>Product Name</th>
						<th>Date</th>
						<th>Client Name</th>
						<th>Delivery Receipt</th>
						<th>Incoming</th>
						<th>Outgoing</th>
						<th>Total Released</th>
						<th>Balance</th>
						</tr>";
		while($row = $result->fetch_assoc()){
		?>
			<tr>
				<td><?php echo $row['product_name'];?></td>
				<td><?php echo $row['date'];?></td>
				<td><?php echo $row['client'];?></td>
				<td><?php echo $row['delivery_receipt'];?></td>
				<td><?php echo $row['incoming'];?></td>
				<td><?php echo $row['outgoing'];?></td>
				<td><?php echo $row['total_released'];?></td>
				<td><?php echo $row['balance'];?></td>
			</tr>
		<?php
		}
		?>
		</table>
	<?php
		}
	?>
	
	