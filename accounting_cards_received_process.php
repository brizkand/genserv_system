<?php
	session_start();
	include 'conn.php';
	$employeeFullName = $_SESSION["userCompleteName"];
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_POST['gsatCardsReceivedSubmit'])){
			$inDate	 = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['gsatCardsReceivedDate']))));
			$inCardPO	 = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['gsatCardsReceivedPO']))));
			$inCardRF	 = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['gsatCardsReceivedRF']))));
			$inCardType	 = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['gsatCardsReceivedCardType']))));
			$inCardQuant = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['gsatCardsReceivedQuant']))));
			$inCardNoFrom = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['gsatCardsReceivedCardNoFrom']))));
			$inCardNoTo = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['gsatCardsReceivedCardNoTo']))));
			if($inCardQuant == ($inCardNoTo - $inCardNoFrom)+ 1){
				$cardLenghtNo = strlen($inCardNoFrom);
				for($x = $inCardNoFrom; $x <= $inCardNoTo; $x++){
					$inCardSql = "INSERT INTO gsat_cards_table(date_get, po_no, reference_no, card_package, card_no, emp_user)VALUES
					('$inDate','$inCardPO','$inCardRF','$inCardType','$x','$employeeFullName')";
					if($conn->query($inCardSql)===TRUE){
						if($x == $inCardNoTo){
							?>
							<script>
								alert("Successfully inserted GSat Incomming records!");
								window.location.href = 'accounting_view_request_cards.php';
							</script>
							<?php
						}
					}
					else{
						?>
						<script>
							alert("Failed to insert records!");
							window.location.href = 'accounting_view_request_cards.php';
						</script>
						<?php
					}
				}
			}
			else{
				?>
				<script>
					alert("Failed to insert records! Quantity and cards number is not equal!");
					window.location.href = 'accounting_view_request_cards.php';
				</script>
				<?php
			}
		}
	}
	//FOR VALIDATION OF DATA
		function test_input($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		//TO MAKE DATA UPPERCASE
		function textToUpper($text){
			$text = strtoupper($text);
			return $text;
		}
?>