<?php
	include 'conn.php';
	$sql="SELECT * FROM summary_of_purchases_table where month_now = MONTH(CURDATE()) AND date_received != 'NULL' ORDER BY id";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		$monthToday = date('m');
		$yearToday = date('Y');
		switch($monthToday){
			case "01":
				$currentMonth =  "January";
				break;
			case "02":
				$currentMonth =  "February";
				break;
			case "03":
				$currentMonth =  "March";
				break;
			case "04":
				$currentMonth =  "April";
				break;
			case "05":
				$currentMonth =  "May";
				break;
			case "06":
				$currentMonth =  "June";
				break;
			case "07":
				$currentMonth =  "July";
				break;
			case "08":
				$currentMonth =  "August";
				break;
			case "09":
				$currentMonth =  "September";
				break;
			case "10":
				$currentMonth =  "October";
				break;
			case "11":
				$currentMonth =  "November";
				break;
			case "12":
				$currentMonth =  "December";
				break;
			default:
				$currentMonth =  "No month";
		}
		echo "<table class='employee_table'><caption>Materials Received for the Month of " . $currentMonth . " ". $yearToday . "</caption><tr>
						<th colspan='2'>Actions</th>
						<th>Date Purchased</th>
						<th>Purchased Order</th>
						<th>Materials Receiving Report No.</th>
						<th>Vendor</th>
						<th>TIN No.</th>
						<th>Address</th>
						<th>Description</th>
						<th>Quantity</th>
						<th>Rate</th>
						<th>Amount</th>
						<th>Payment</th>
						<th>Date Received</th>
						</tr>";
		while($row = $result->fetch_assoc()){
		?>
			<tr>
				<?php echo "<td>" . "<a href = 'edit_sop.php?id=$row[id]&dt=$row[date_purchased]&po=$row[purchase_order]&mrr=$row[mrr_number]&ven=$row[vendor]&tin=$row[tin_number]&add=$row[address]&des=$row[description]&qua=$row[quantity]&rat=$row[rate]&amo=$row[amount]&pay=$row[payment]&mon=$row[month_now]&poa=$row[po_number_auto]&dr=$row[date_received]'>EDIT" . "</a>" . "</td>";?>
				<td><a onclick='return confirm("Are you sure?")' href='mrr_jquery.php?ei=<?php echo $row['id'];?>'>DELETE</a></td>
				<td><?php echo $row['date_purchased'];?></td>
				<td><?php echo $row['purchase_order'];?></td>
				<td><?php echo $row['mrr_number'];?></td>
				<td><?php echo $row['vendor'];?></td>
				<td><?php echo $row['tin_number'];?></td>
				<td><?php echo $row['address'];?></td>
				<td><?php echo $row['description'];?></td>
				<td><?php echo $row['quantity'];?></td>
				<td><?php echo $row['rate'];?></td>
				<td><?php echo $row['amount'];?></td>
				<td><?php echo $row['payment'];?></td>
				<td><?php if($row['date_received'] == null){echo "Not yet received!";}else{echo $row['date_received'];}?></td>
			</tr>
		<?php
		}
		?>
		</table>
	<?php
		}
		else{
			echo "No records found this month!";
		}
	?>
	<?php
	if(isset($_GET['ei'])){
		$sopid = $_GET['ei'];
		@require("conn.php");
		$sql = "Delete from summary_of_purchases_table where id = '$sopid'";
		$result=$conn->query($sql);
		if($result){
			?>
			<script>
				alert("Success to delete record");
				window.location.href = 'materials_receiving_report.php';
			</script>
			<?php
		}
		else{
			?>
			<script>
				alert("Record not deleted!");
				window.location.href = 'materials_receiving_report.php';
			</script>
				<?php
		}
	}
	?>
	
	