<?php
	if(!empty($_POST['searchClient'])){
		echo "<h2>Searched data results in ceiling fan!</h2>";
		include 'conn.php';
		$client = $_POST['searchClient'];
		$sql="SELECT * FROM ceiling_fan_table where client_name LIKE '$client%' OR date_released LIKE '$client%'
		OR delivery_receipt LIKE '$client%' OR received LIKE '$client%' OR released LIKE '$client%' OR employee_user LIKE '$client%'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			echo "<table class='employee_table'><caption>Ceiling Fan Inventory Table</caption>
				<tr>
					<th colspan='2'>Actions</th>
					<th>Product Name</th>
					<th>Date</th>
					<th>Client Name</th>
					<th>Delivery Receipt</th>
					<th>In</th>
					<th>Out</th>
					<th>Process By </th>
				</tr>";
				while($row = $result->fetch_assoc()){
?>
				<tr>
					<?php echo "<td>" . "<a href = 'edit_ceiling_fan_record.php?id=$row[product_id]&pn=$row[product_name]&dr=$row[date_released]&cn=$row[client_name]&dr2=$row[delivery_receipt]&r=$row[received]&r2=$row[released]&eu=$row[employee_user]'>Edit" . "</a>" . "</td>";?>
					<td><a onclick="return confirm('Are you sure you want to delete this record?')" href='ceiling_fan_table_jquery.php?deleteID=<?php echo $row["product_id"];?>'>Delete</a></td>
					<td><?php echo $row['product_name'];?></td>
					<td><?php echo $row['date_released'];?></td>
					<td><?php echo $row['client_name'];?></td>
					<td><?php echo $row['delivery_receipt'];?></td>
					<td><?php echo $row['received'];?></td>
					<td><?php echo $row['released'];?></td>
					<td><?php echo $row['employee_user'];?></td>
				</tr>
<?php
				}
?>
			</table>
<?php
		}
		else{
			echo "No records found!";
		}
	}
	else{
		echo "<h2>These are all data of ceiling fan!</h2>";
		include 'conn.php';
		$sql="SELECT * FROM ceiling_fan_table ORDER BY date_released desc";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			echo "<table class='employee_table'><caption>Ceiling Fan Inventory Table</caption>
				<tr>
					<th colspan='2'>Actions</th>
					<th>Product Name</th>
					<th>Date</th>
					<th>Client Name</th>
					<th>Delivery Receipt</th>
					<th>In</th>
					<th>Out</th>
					<th>Process By </th>
				</tr>";
			while($row = $result->fetch_assoc()){
?>
				<tr>
					<?php echo "<td>" . "<a href = 'edit_ceiling_fan_record.php?id=$row[product_id]&pn=$row[product_name]&dr=$row[date_released]&cn=$row[client_name]&dr2=$row[delivery_receipt]&r=$row[received]&r2=$row[released]&eu=$row[employee_user]'>Edit" . "</a>" . "</td>";?>
					<td><a onclick="return confirm('Are you sure you want to delete this record?')" href='edit_ceiling_fan_record.php?deleteID=<?php echo $row["product_id"];?>'>Delete</a></td>
					<td><?php echo $row['product_name'];?></td>
					<td><?php echo $row['date_released'];?></td>
					<td><?php echo $row['client_name'];?></td>
					<td><?php echo $row['delivery_receipt'];?></td>
					<td><?php echo $row['received'];?></td>
					<td><?php echo $row['released'];?></td>
					<td><?php echo $row['employee_user'];?></td>
				</tr>
<?php
			}
?>
			</table>
			</br>
<?php
		}	
			//THIS IS TO GET THE SUM OF TOTAL RELEASED CEILING FAN!
			$sql1 = "select sum(released) as totalReleased from ceiling_fan_table ";
			$result1 = $conn->query($sql1);
			if($result1->num_rows > 0){
				$row1 = $result1->fetch_assoc();
				$totalReleased = $row1['totalReleased'];
				echo "<p class='total'>" . "Total numbers of ceiling fan released: " . "<b class='value'>" . $totalReleased . "</b>" . "</p>" . "</br>";
			}
			//THIS IS FOR GETTING THE TOTAL REMAINING BALANCE OF CEILING FAN
			$sql2 = "select sum(received) as totalReceived from ceiling_fan_table";
			$result2 = $conn->query($sql2);
			if($result2->num_rows>0){
				$row2 = $result2->fetch_assoc();
				$totalReceived = $row2['totalReceived'];
				$balance = $totalReceived - $totalReleased;
				echo "<p class='total'>" . "Total numbers of remaining ceiling fan: " .  "<b class='value'>" . $balance . "</b>" . "</p>";
			}
	}
?>
	