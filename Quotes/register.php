<!-- 
This is the home page for Final Project, Quotation Service. 
It is a PHP file because later on you will add PHP code to this file.

File name register.php 
    
Authors: Quan Nguyen
-->
<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
<title>Quotation Service</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<h1>Register</h1>	
		<div class="container2" style="width: fit-content; padding-right:40px">
			<form action="controller.php" method="post">
				<input type="text" id="usernameReg" name="usernameReg" placeholder="Username" required> <br><br>
				<input type="password" id="passwordReg" name="passwordReg" placeholder="Password" required><br><br>
				<input type="submit" value="Register" name="register"> <br><br>
				<?php
				if (isset($_SESSION["invalid"])) {
				    unset($_SESSION["invalid"]);
				    echo "User name taken"; 
				}
				?>
			</form>
		</div>
	
</body>
</html>
