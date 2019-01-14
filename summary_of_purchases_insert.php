<?php
	session_start();
	$employeeFullName = $_SESSION["userCompleteName"];
	include 'conn.php';
	$sql = "SELECT * FROM summary_of_purchases_table ORDER BY id DESC LIMIT 1";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		$lastID = $row['id'];
		$lastDatePurchased = $row['date_purchased'];
		$lastPurchasedOrder = $row['purchase_order'];
		$lastMRRNo = $row['mrr_number'];
		$lastVendor = $row['vendor'];
		$lastTINNo = $row['tin_number'];
		$lastAddress = $row['address'];
		$lastDescription = $row['description'];
		$lastQuantity = $row['quantity'];
		$lastRate = $row['rate'];
		$lastAmount = $row['amount'];
		$lastPayment = $row['payment'];
		$lastMonthNow = $row['month_now'];
		$lastPONumberAuto = $row['po_number_auto'];
	}
	else {
		echo "No records found!";
	}
	if(isset($_POST['sopSubmit'])){
		$sopDate = $_POST['sopDate'];
		$sopPO = $_POST['sopPurchaseOrder'];
		$sopMRR = $_POST['sopMRR'];
		$sopVendor = $_POST['sopVendor'];
		$sopTIN = $_POST['sopTIN'];
		$sopAddress = $_POST['sopAddress'];
		$sopDescription = $_POST['sopDescription'];
		$sopQuantity = $_POST['sopQuantity'];
		$sopRate = $_POST['sopRate'];
		$sopAmount = $_POST['sopAmount'];
		$sopPayment = $_POST['sopPayment'];
		if(!empty($sopMRR)){
			$sopMonthNow = substr($sopMRR, 2, 2);
			$sopPONumberAuto = substr($sopMRR, 7, 2);
			$sopYear = substr($sopDate,0,4);
		}
		if(!empty($sopDate) && !empty($sopPO) && !empty($sopMRR) && !empty($sopVendor) && !empty($sopTIN) &&
			!empty($sopAddress) && !empty($sopDescription) && !empty($sopQuantity) && !empty($sopRate) && 
			!empty($sopAmount) && !empty($sopPayment)){
			if($sopMRR === $lastMRRNo){
				?>
				<script>
					alert('Your MRR number is already used!');
					window.location.href='summary_of_purchases.php';
				</script>
				<?php
				//echo"<script>window.alert('You already inserted this data on database!');</script>";
			}
			else{
				$sql1 = "SELECT * FROM summary_of_purchases_table WHERE mrr_number = '$sopMRR'";
				$result1 = $conn->query($sql1);
				if($result1->num_rows > 0){
					?>
					<script>
						alert('Your MRR number is already used!');
						window.location.href='summary_of_purchases.php';
					</script>
				<?php
					//echo"<script>window.alert('You already inserted this data on database!');</script>";
				}
				else{
					$sql2 = "INSERT INTO summary_of_purchases_table(date_purchased, purchase_order, mrr_number, 
					vendor, tin_number, address, description, quantity, rate, amount, payment, month_now, po_number_auto, year, employee_user)VALUES
					('$sopDate','$sopPO','$sopMRR','$sopVendor','$sopTIN','$sopAddress','$sopDescription','$sopQuantity',
					'$sopRate','$sopAmount','$sopPayment','$sopMonthNow','$sopPONumberAuto', '$sopYear', '$employeeFullName')";
					if($conn->query($sql2)===TRUE){
				?>
						<script>
							alert('Successfully inserted new summary of purchases record!');
							window.location.href='summary_of_purchases.php';
						</script>
				<?php
						//echo"<script>window.alert('You successfully inserted a records!');</script>";
					}
					else{
						?>
						<script>
							alert('Failed to insert record!');
							window.location.href='summary_of_purchases.php';
						</script>
						<?php
						//echo"<script>window.alert('Failed to insert records!');</script>";
					}
				}
			}
		}
		else{
			?>
				<script>
					alert('You must fill-out all required text box!');
					window.location.href='summary_of_purchases.php';
				</script>
			<?php
			//echo"<script>window.alert('You must fill-out all required text box!');</script>";
			}
	}
?>