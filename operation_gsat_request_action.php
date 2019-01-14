<?php
	session_start();
	include 'conn.php';
	if($_SESSION["access"] != true){
		header("Location: /index.php");
	}
	$employeeFullName = $_SESSION["userCompleteName"];
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['requestNow'])){
			/*<input type='date' name='requestDate' required></br>
				<input type='text' id= 'requestName' name='requestName' class='upperCase' placeholder='CLIENT NAME *' required></br>
				<span>CARD TYPE *: </span></br>
				<select name='requestCardType' required>*/
			$reqDate = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['requestDate']))));
			$reqCardType = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['requestCardType']))));
			$reqQuant = mysqli_real_escape_string($conn,(textToUpper(test_input($_POST['requestQuant']))));
			$requestCardSql = "INSERT INTO operation_request_card_table(request_date,request_quantity,request_card_type,employee_user)
			VALUES('$reqDate','$reqQuant','$reqCardType','$employeeFullName')";
			if($conn->query($requestCardSql)===TRUE){
				?>
					<script>
						alert("Request successfully sent to accounting!");
						window.location.href = 	'operation_gsat_request_cards.php';
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