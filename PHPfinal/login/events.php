<?php
	//Get the Event data from the server.
	include 'connectPDO copy.php';
		$stmt = $conn->prepare("SELECT * FROM wedding_event_timeline");
		$stmt->execute();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Events</title>
	<link rel="stylesheet" href="https://use.typekit.net/nts2seq.css">
	<link rel="stylesheet" href="../wedding.css">
    <style>
		.eventBlock{
			width:500px;
			margin-left:auto;
			margin-right:auto;
			background-color:#CCC;
		}
		
		.displayEvent{
			text_align:left;
			font-size:18px;
			margin-top: 50px;
		}
		
		.displayDescription {
			margin-left:100px;
		}
		td{
			background-color: teal;
			color: white;
		}
	</style>
</head>

<body>
    <h1>Events</h1>
    <h2></h2>
	<div class="headerArea">
				<div class="topnav" id="myTopnav">
					  <a href="index.php" class="active">Home</a>
					  <a href="#home" class="active">Day of Events</a>
					<a href="events.php" class="active">Events</a>
					<a href="emailer copy/formEmailer.html" class="active">Contact Us!</a>
					<a href="logout.php" class="active">Logout</a>
					  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
				</div>
			</div>
<table border="1"
		<tr>
			<td>Event Name</td>
			<td>Description</td>
			<td>Host</td>
			<td>Date</td>
			<td>Time</td>
		</tr>
	      
 	<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		echo "<tr>";
			echo "<td>".$row['event_name']."</td>";
			echo "<td>".$row['event_description']."</td>";
			echo "<td>".$row['event_presenter']."</td>";
			echo "<td>".$row['event_date']."</td>";	
			echo "<td>".$row['event_time']."</td>";
		 "</tr>";
	}
		
		   ?>
	</table>
</body>
</html>