<?php
	//Get the Event data from the server.
	include("connectPDO copy.php");
	try {	
		$db = "SELECT ";
		$db .= "event_name, ";
		$db .= "event_description, ";
		$db .= "event_presenter, ";
		$db .= "event_date, ";
		$db .= "event_time ";
		$db .= "FROM wdv341_events2 ";
		$db .= "ORDER BY event_id DESC";
		
		$stmt = $conn->prepare($db);
		
		$stmt->execute();		
    }
	catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> WDV341 Intro PHP  - Display Events Example </title>
	
    <style>
		.eventBlock{
			width: 500px;
			margin-left: auto;
			margin-right: auto;
			background-color: #CCC;	
			padding: 10px;
		}
		
		.displayEvent{
			text-align: left;
			font-size: 18px;
		}
		
/*
		.displayDescription {
			margin-left:100px;
		}
*/
		
		.futureDate {
			font-style: italic;
		}
		
		.currentMonthDate {
			font-weight: bold;
			color: red;
		}
		
		.displayEventName {
			margin-bottom: 7px;
		}
	</style>
</head>

<body>
    <h1> WDV341 Intro PHP </h1>
    <h2> Example Code - Display Events as formatted output blocks </h2>   
    <h3> ??? Events are available today. </h3>

<?php	
	//Display each row as formatted output in the div below
	while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
		
	$eventDate = $row['event_date'];
	$eventDateObject = date_create($eventDate);
	$formattedEventDate = date_format($eventDateObject, "l, jS \of F Y");
	$eventMonth = date_format($eventDateObject, "m");		
//	echo "Event Date: $eventDate <br/>";
		
	$todayDate = date("Y-m-d");
	$todayMonth = date("m");
//	echo "Today Date: $todayDate <br/>";
		
	//For testing
	$todayDate = "2018-10-10";
	$todayMonth = "10";
//	echo "Test Date: $todayDate <br/>";
?>
	
	<p>
        <div class="eventBlock">	
            <div class="displayEventName">
            	<span class="displayEvent<?php
					if ($eventDate > $todayDate) {
						echo " futureDate";
					}
					if ($eventMonth == $todayMonth) {
						echo " currentMonthDate";
					}
				?>"> Event: <?php  echo $row['event_name']; ?> </span>
			</div>
			<hr/>
			<div>
                <span> Presenter: <?php echo $row['event_presenter']; ?> </span>
            </div>
            <div>
            	<span class="displayDescription"> Description: <?php echo $row['event_description']; ?> </span>
            </div>
            <div>
            	<span class="displayTime"> Time: <?php echo $row['event_time']; ?> </span>
            </div>
            <div>
            	<span class="displayDate"> Date: <?php echo $formattedEventDate ?> </span>
            </div>
        </div>
    </p>

<?php
	//Close the database connection
	}
?>
</body>
</html>