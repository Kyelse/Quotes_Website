<!-- 
This is the home page for Final Project, Quotation Service. 
It is a PHP file because later on you will add PHP code to this file.

File name quotes.php 
    
Authors: Rick Mercer and Quan Nguyen
-->
<!DOCTYPE html>
<html>
<head>
<title>Quotation Service</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body onload="showQuotes()">
	<h1>Quotations</h1>
	<?php
    session_start();
    echo '&nbsp; <a href="./register.php" ><button>Register</button></a>';
    echo '&nbsp; <a href="./login.php" ><button>Login</button></a>';
    echo '&nbsp; <a href="./addQuote.php" ><button>Add Quote</button></a>';
    if (isset($_SESSION['user'])) { 
        echo '&nbsp; <a href="./logout.php" ><button>Logout</button></a>';
        echo "<br><h3>Hello " . $_SESSION['user'] . "</h3>" ;
    }
   
  
    ?>
    
	<div id="quotes"></div>


	<script>
var element = document.getElementById("quotes");
function showQuotes() {
    // TODO 6: Due Sunday 20-Nov
    // Complete this function using an AJAX call to controller.php
  	// You will need query parameter "?todo=getQuotes" in the open message.
  	// Echo back one big string to here that has all styled quotations.
  	// Write all of the complex code to layout the array of quotes 
  	// inside function getQuotesAsHTML inside controller.php 
	let ajax = new XMLHttpRequest();
	ajax.open("GET", "controller.php?todo=getQuotes", true);
	ajax.send();
	ajax.onreadystatechange = function() {
		if (ajax.readyState == 4 && ajax.status == 200) {
			  element.innerHTML = ajax.responseText; 
			
		}
	}
}
</script>

</body>
</html>