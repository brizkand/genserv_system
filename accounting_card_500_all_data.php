<?php
include 'conn.php';
if(!empty($_POST['searchClient'])){
	echo "<h2>Searched data results of GSat cards</h2>";
		$dataSearch = $_POST['searchClient'];
		$sql = "SELECT * FROM gsat_cards_table WHERE po_no LIKE '$dataSearch%'OR reference_no LIKE '$dataSearch%'OR 
		card_no LIKE '$dataSearch%'OR box_no LIKE '$dataSearch%'OR clients_name LIKE '$dataSearch%'OR 
		date_get LIKE '$dataSearch%'OR date_released LIKE '$dataSearch%' OR date_loaded LIKE '$dataSearch%'OR 
		card_package LIKE '$dataSearch%'OR request_by LIKE '$dataSearch%'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			echo "<table class='employee_table'><caption>Search result of GSat Cards</caption>
				<tr>
					<th colspan='2'>Operations</th>
					<th>Purchase Order</th>
					<th>Reference No.</th>
					<th>Card No.</th>
					<th>Box No.</th>
					<th>Date Get</th>
					<th>Date Released</th>
					<th>Date Loaded</th>
					<th>Card Package</th>
					<th>Card For Client</th>
				</tr>";
				while($row = $result->fetch_assoc()){
?>
				<tr>
					<?php echo "<td>" . "<a href = 'accounting_cards_monitoring_edit.php?id3=$row[id]''>Edit" . "</a>" . "</td>";?>
					<td><a onclick="return confirm('Are you sure you want to delete this record?')" href='accounting_cards_monitoring_edit.php?delID=<?php echo $row["id"];?>'>Delete</a></td>
					<td><?php echo $row['po_no'];?></td>
					<td><?php echo $row['reference_no'];?></td>
					<td><?php echo $row['card_no'];?></td>
					<td><?php echo $row['box_no'];?></td>
					<td><?php echo $row['date_get'];?></td>
					<td><?php echo $row['date_released'];?></td>
					<td><?php echo $row['date_loaded'];?></td>
					<td><?php echo $row['card_package'];?></td>
					<td><?php echo $row['clients_name'];?></td>
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
	$sql="SELECT * FROM gsat_cards_table WHERE card_package = 'PACKAGE 500' AND date_released = 0 ORDER BY id";
	$result=$conn->query($sql);
	if($result->num_rows > 0){
		echo "<table class='employee_table'><caption>Available GSat Card Package 500 </caption><tr>
						<th colspan='2'>Controls</th>
						<th>Date Get</th>
						<th>Purchase Order</th>
						<th>Reference Number</th>
						<th>Card Number</th>
					</tr>";
					while($row=$result->fetch_assoc()){
						?>	
					<tr>
						<?php echo "<td>" . "<a href='accounting_cards_monitoring_edit.php?id=$row[id]'>Edit" . "</a>" . "</td>"; ?>
						<td><a onclick='return confirm("Are you sure you want to delete this record?")' href='accounting_cards_monitoring_edit.php?delID=<?php echo $row['id'];?>'>Delete</a></td>
						<td><?php echo $row["date_get"]?></td>
						<td><?php echo $row["po_no"]?></td>
						<td><?php echo $row["reference_no"]?></td>
						<td><?php echo $row["card_no"]?></td>
					<?php 
					} 
					?>
					</table>
					<?php
		//THIS IS TO COUNT THE TOTAL RECORDS OF GSAT PACKAGE 500
			$sql1 = "select count(*) as totalCards from gsat_cards_table WHERE card_package = 'PACKAGE 500'";
			$result1 = $conn->query($sql1);
			if($result1->num_rows > 0){
				$row1 = $result1->fetch_assoc();
				$totalCardsNo = $row1['totalCards'];
			}
	//THIS IS FOR GETTING THE TOTAL REMAINING BALANCE OF GSAT CARD 500
			$sql2 = "select count(*) as totalReleased from gsat_cards_table WHERE card_package = 'PACKAGE 500' AND date_released != 0";
			$result2 = $conn->query($sql2);
			if($result2->num_rows>0){
				$row2 = $result2->fetch_assoc();
				$totalReleased = $row2['totalReleased'];
				$balance = $totalCardsNo - $totalReleased;
				echo "<p class='total'>" . "Total numbers of remaining GSat 500 package card: " .  "<b class='value'>" . $balance . "</b>" . "</p>";
				echo "</br>";
				echo "</br>";
			}
	}
	else{
		echo"There is no data of receiving cards!" . "</br>";
	}
	//THIS IS FOR CARDS THAT RELEASED TO OPERATIONS THAT IS NOT LOADED
	$sql="SELECT * FROM gsat_cards_table WHERE card_package = 'PACKAGE 500' AND date_released != 0 AND date_loaded = 0 ORDER BY id";
	$result=$conn->query($sql);
	if($result->num_rows > 0){
		echo "<table class='employee_table'><caption>Released GSat Card Package 500 to Operation that is not loaded</caption><tr>
						<th colspan='2'>Controls</th>
						<th>Date Get</th>
						<th>Date Released</th>
						<th>Date Loaded</th>
						<th>Card Number</th>
						<th>Clients Name</th>
					</tr>";
					while($row=$result->fetch_assoc()){
						?>	
					<tr>
						<?php echo "<td>" . "<a href='accounting_cards_monitoring_edit.php?id2=$row[id]'>Edit" . "</a>" . "</td>"; ?>
						<td><a onclick='return confirm("Are you sure you want to delete this record?")' href='accounting_cards_monitoring_edit.php?delID=<?php echo $row['id'];?>'>Delete</a></td>
						<td><?php echo $row["date_get"]?></td>
						<td><?php echo $row["date_released"]?></td>
						<td><?php echo $row["date_loaded"]?></td>
						<td><?php echo $row["card_no"]?></td>
						<td><?php echo $row["clients_name"]?></td>
					<?php 
					} 
					?>
					</table>
<?php
	//THIS IS FOR GETTING THE TOTAL REMAINING BALANCE OF GSAT CARD 500
			$sql2 = "select count(*) as totalReleased from gsat_cards_table WHERE card_package = 'PACKAGE 500' AND date_released != 0 AND date_loaded = 0";
			$result2 = $conn->query($sql2);
			if($result2->num_rows>0){
				$row2 = $result2->fetch_assoc();
				$totalReleased = $row2['totalReleased'];
				echo "<p class='total'>" . "Total number of GSat 500 package cards that is not yet loaded by the operation: " .  "<b class='value'>" . $totalReleased . "</b>" . "</p>";
				echo "</br>";
			}
	}
	else{
		echo"All cards in operations are loaded!" . "</br>";
	}
}
?>