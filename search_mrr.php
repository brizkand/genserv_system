<?php
	include 'conn.php';
	$m = $_POST['searchM'];
	$y = $_POST['searchY'];
	$sql="SELECT * FROM summary_of_purchases_table where month_now = '".$m."' AND year='".$y."' AND date_received != 'NULL' ORDER BY id ";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		switch($y){
			case "2013":
				$currentYear =  "2013";
				break;
			case "2014":
				$currentYear =  "2014";
				break;
			case "2015":
				$currentYear =  "2015";
				break;
			case "2016":
				$currentYear =  "2016";
				break;
			case "2017":
				$currentYear =  "2017";
				break;
			case "2018":
				$currentYear =  "2018";
				break;
			case "2019":
				$currentYear =  "2019";
				break;
			case "2020":
				$currentYear =  "2020";
				break;
			case "2021":
				$currentYear =  "2021";
				break;
			case "2022":
				$currentYear =  "2022";
				break;
			case "2023":
				$currentYear =  "2023";
				break;
			case "2024":
				$currentYear =  "2024";
				break;
			default:
				$currentYear =  "No year";
		}
		switch($m){
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
		echo "<table class='employee_table'><caption>Materials Received for the Month of " . $currentMonth   . " " . $currentYear  ."</caption><tr>
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
	
	