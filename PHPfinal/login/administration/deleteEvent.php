<?php
//connect to database
include "connectPDO copy.php";
//retrieve record id (eventId) from $_GET;
$eventId = $_GET["id"];
//create SQL DELETE query with record id
$sql = "DELETE FROM wedding_event_timeline WHERE event_id = $eventId";
//run DELETE query
$result = $conn->query($sql);
//if the query runs successfully print  message telling the event was deleted
if($result)
{
	$msg = "<h3> The event associated with Event ID ".$eventId." has been deleted.</h3>";
}
else
{
	$msg = "<h3>Uh-oh, we weren't able to delete the event associated with Event ID  ".$eventId." Please try again.</h3>";
}
?>
<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
	<link rel="stylesheet" type="text/css" href="../../wedding.css">
<style>
#container {
	width: 75%;
	margin: 2% 10%;
	border: 2px solid black;
	text-align: center;
	background-color: rgba(195,119,0,.5);
	padding: 25px;
}
.tableFormat {
	border: 1px solid black;
	margin: 0 auto;
	background-color: rgba(195,119,0,.5);
	
}
th {
	border: 1px solid black;
	padding: 10px;
	background-color: #FFC15E;
	
}
td {
	border: 1px solid black;
	padding: 10px;
	text-align: center;
	background-color: #ffffcc;
	
}
h1 {
	text-align: center;
	text-decoration: underline;
}
p {
	text-align: center;
}
</style>
</head>
<body>
<div id="container">
<h1>Event DELETE Page</h1>
<?php echo $msg; ?>
<p><a href="selectEvents.php">Return to the list of events.</a></p>
	<p><a href="logout.php">Logout</a></p>
</div>

</body>
</html>