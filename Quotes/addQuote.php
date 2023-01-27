<!-- 
This is the home page for Final Project, Quotation Service. 
It is a PHP file because later on you will add PHP code to this file.

File name AddQuote.php 
    
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
	<h1>Add a Quote</h1>	
		<div class="container2">
			<form action="controller.php" method="post">
				<textarea rows="5" cols="60" name="quote" placeholder="Enter new Quote" required></textarea> <br><br>
				<input type="text" id="author" name="author" placeholder="Author" required><br><br>
				<input type="submit" value="Add a quote" name="add">
			</form>
		</div>
	


</body>
</html>
