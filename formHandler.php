<?php

	$tableBody = "";		
	
	foreach($_POST as $key => $value)		
	{
		$tableBody .= "<tr>";				
		$tableBody .= "<td>$key</td>";		
		$tableBody .= "<td>$value</td>";	
		$tableBody .= "</tr>";				
	} 
	

	
	$inFirstName = $_POST["firstName"];		
	$inLastName = $_POST["lastName"];		
	$inSchool = $_POST["school"];			
	$inPHP = $_POST["php"];
	$inWhichClass = $_POST["whichClass"];

?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV 341 Intro PHP - Code Example</title>
	<style>
		
	</style>

</head>

<body>
<h1>WDV341 Intro PHP</h1>
<h2>Form Handler</h2>
<p>This page displays the results of the Server side processing. </p>
<h3>Display the values:</h3>
<p>
	<table border='a'>
    <tr>
    	<th>Field Name</th>
        <th>Value of Field</th>
    </tr>
	<?php echo $tableBody;  ?>
	</table>
</p>
<h3>Display the values from the form.</h3>
<p>School: <?php echo $inSchool; ?></p>
<p>First Name: <?php echo $inFirstName; ?></p>
<p>Last Name: <?php echo $inLastName; ?></p>
<p>Relationship with PHP: <?php echo $inPHP; ?></p>
<p>Which Class: <?php echo $inWhichClass; ?></p>



</body>
</html>