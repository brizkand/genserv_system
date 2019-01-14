<?php
	include 'conn.php';
	$sql="SELECT * FROM summary_of_purchases_table where month_now = MONTH(CURDATE())ORDER BY id";
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
		echo "<table class='employee_table'><caption>Summary of Monthly Purchases for the Month of " . $currentMonth . " " . $yearToday . "</caption><tr>
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
				<td><a onclick='return confirm("Are you sure?")' href='summary_of_purchases_table_jquery.php?ei=<?php echo $row['id'];?>'>DELETE</a></td>
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
		$monthNow = date("m");
		$sql2 = "SELECT SUM(amount) AS total_amount FROM summary_of_purchases_table WHERE month_now = '$monthNow'";
		$result2 = $conn->query($sql2);
		if($result2->num_rows > 0){
			$row2 = $result2->fetch_assoc();
			$totalAmount = $row2['total_amount'];
			echo "</br>" . "The total amount for this month is: " . "<b style='color: red'>" . "&#8369;". $totalAmount . "</b>" . "</br>";
		}
		
		$sql1 = "SELECT SUM(payment) AS total_payment FROM summary_of_purchases_table WHERE month_now = '$monthNow'";
		$result1 = $conn->query($sql1);
		if($result1->num_rows > 0){
			$row1 = $result1->fetch_assoc();
			$totalPayment = $row1['total_payment'];
			echo "</br>" . "The total payment for this month is: " . "<b style='color: red'>" . "&#8369;". $totalPayment . "</b>";
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
				window.location.href = 'summary_of_purchases.php';
			</script>
			<?php
		}
		else{
			?>
			<script>
				alert("Record deleted");
				window.location.href = 'admin controls.php';
			</script>
				<?php
		}
	}
	?>
	
	