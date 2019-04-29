<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV101 Form Emailer Example</title>
<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../../wedding.css">
<style type="text/css">
header {
  text-align: center;
  margin: 6px;
}  
.colorRed {
	color: #F00;
}
	table{
		background-color: white;
	}
</style>
</head>

<body>
	<div class="headerArea">
			<div class="headerArea">
				<div class="topnav" id="myTopnav">
					  <a href="../index.php" class="active">Home</a>
					  <a href="" class="active">Day of Events</a>
					<a href="../events.php" class="active">Events</a>
					 <a href="formEmailer.html" class="active">Contact Us!</a>
					<a href="../logout.php" class="active">Logout</a>
					  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
				</div>
			</div>
<h1>Your Email has been Sent!</h1>
	
<h2>What you have entered is shown below:</h2>
<hr />
<p>&nbsp;</p>

<?php

echo "<p>We get back to you as soon as we can!</p>";

//It will create a table and display one set of name value pairs per row
	echo "<table border='1'>";
	echo "<tr><th>Field Name</th><th>Value of field</th></tr>";
	foreach($_POST as $key => $value)
	{
		echo '<tr class=colorRow>';
		echo '<td>',$key,'</td>';
		echo '<td>',$value,'</td>';
		echo "</tr>";
	} 
	echo "</table>";
	echo "<p>&nbsp;</p>";


	$toEmail = "sabrucker@dmacc.edu";				
	
	$subject = "Project Emailer";	

	$fromEmail = "contactsophia@sophiabrucker.com";		
	$emailBody = "Form Data\n\n ";			
	foreach($_POST as $key => $value)										
	{
		$emailBody.= $key."=".$value."\n";	//Adds the name value pairs to the body of the email, each one on their own line
	} 
	
	$headers = "From: $fromEmail" . "\r\n";				//Creates the From header with the appropriate address

 	if (mail($toEmail,$subject,$emailBody,$headers)) 	//puts pieces together and sends the email to your hosting account's smtp (email) server
	{
   		echo("<p>Message successfully sent!</p>");
  	} 
	else 
	{
   		echo("<p>Message delivery failed...</p>");
  	}

?>

</body>
</html>