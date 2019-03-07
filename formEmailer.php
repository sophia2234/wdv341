<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV101 Form Emailer Example</title>
<style type="text/css">
body{
font-size: 1em;
font-family: Arial, Helvetica, Sans-serif;
color: black;
background-color: lightblue;
}
header {
  text-align: center;
  margin: 6px;
}  

footer {
  clear: both;
  text-align: center;
  margin-top: 20px;
  padding: 6px;
  font-size: .5em;
 }

.colorRed {
	color: #F00;
}
</style>
</head>

<body>
<h1>Your Email has been Sent!</h1>
<h2>What you have entered is shown below:</h2>
<hr />
<p>&nbsp;</p>

<?php

echo "<p class='colorRed'>This page was created with PHP ^_^ </p>";

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