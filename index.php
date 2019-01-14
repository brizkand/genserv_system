<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="shortcut icon" type="image/x-icon" href="new_genserv_logo.png"/>
<link rel="stylesheet" type="text/css" href="css/genserv_login_style.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
</head>
<body>
<?php
	session_unset();
	session_destroy();
?>
<div class = "login-box">
<img src="images/avatar.png" class="avatar">
	<h1>Welcome to Genserv Employee Portal</h1>
	   <form action="login.php "method="POST">
	   <p>Username: </p>
	   <input type="text" id='userName' name="username">
	   <p>Password: </p>
	   <input type="password" id='userPass' name="pass">
	   <input type="submit" name="login" value="Login">
	   </form>
</div>
</body>
</html>