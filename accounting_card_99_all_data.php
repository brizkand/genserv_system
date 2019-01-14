<?php
@require("conn.php");
	$sql="SELECT * FROM gsat_cards_table WHERE card_package = 'PACKAGE 99' ORDER BY id desc";
	$result=$conn->query($sql);
	if($result->num_rows > 0){
		echo "<table class='employee_table'><caption>GSat Card Package 99 Monitoring</caption><tr>
						<th colspan='2'>Controls</th>
						<th>Purchase Order</th>
						<th>Card Number</th>
						<th>Clients Name</th>
						<th>Date Get</th>
						<th>Card Out-going Quantity</th>
						<th>Card Received Quantity</th>
					</tr>";
					while($row=$result->fetch_assoc()){
						?>	
					<tr>
						<?php echo "<td>" . "<a href='accounting_cards_monitoring_edit.php?id=$row[id]'>Edit" . "</a>" . "</td>"; ?>
						<td><a onclick='return confirm("Are you sure you want to delete this record?")' href='accounting_cards_monitoring_edit.php?delID=<?php echo $row['id'];?>'>Delete</a></td>
						<td><?php echo $row["po_no"]?></td>
						<td><?php echo $row["card_no"]?></td>
						<td><?php echo $row["clients_name"]?></td>
						<td><?php echo $row["date_get"]?></td>
						<td><?php echo $row["outgoing_quantity"]?></td>
						<td><?php echo $row["remaining_balance"]?></td>
					<?php 
					} 
					?>
					</table>
					<?php
	//THIS IS TO GET THE SUM OF TOTAL RELEASED CEILING FAN!
	$sql1 = "select sum(outgoing_quantity) as totalReleased from gsat_cards_table WHERE card_package = 'PACKAGE 99'";
	$result1 = $conn->query($sql1);
	if($result1->num_rows > 0){
		$row1 = $result1->fetch_assoc();
		$totalReleased = $row1['totalReleased'];
	}
	//THIS IS FOR GETTING THE TOTAL REMAINING BALANCE OF GSAT CARD 99
	$sql2 = "select sum(remaining_balance) as totalReceived from gsat_cards_table WHERE card_package = 'PACKAGE 99'";
	$result2 = $conn->query($sql2);
	if($result2->num_rows>0){
		$row2 = $result2->fetch_assoc();
		$totalReceived = $row2['totalReceived'];
		$balance = $totalReceived - $totalReleased;
		echo "<p class='total'>" . "Total numbers of remaining GSat 99 package card: " .  "<b class='value'>" . $balance . "</b>" . "</p>";
	}
	}
	else{
		echo"There is no data!";
	}
?>