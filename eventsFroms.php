<?php
	$validForm = false;
	$event_name = "";
	$event_description = "";
	$event_presenter = "";
	$event_setting = null;
	$event_date = "";
	$event_time = "";
	$event_name_errorMessage = "";
	$event_description_errorMessage = "";
	$event_presenter_errorMessage = "";
	$event_setting_errorMessage = "";
	$event_date_errorMessage = "";
	$event_time_errorMessage = "";
	if( isset($_POST["submitButton"]) ) {
		
		if( isset($event_setting) ) {
			//echo "Event Setting is: " . $event_setting;
			header("Location: http://www.google.com");
		};
		
		$event_name = $_POST["eventName"];
		$event_description = $_POST["eventDescription"];
		$event_presenter = $_POST["eventPresenter"];
		$event_setting = $_POST["eventSetting"];
		$event_date = $_POST["eventDate"];
		$event_time = $_POST["eventTime"];
		//echo $event_date . "<br/>" . $event_time;
		
		$event_name_errorMessage = "";
		$event_description_errorMessage = "";
		$event_presenter_errorMessage = "";
		$event_setting_errorMessage = "";
		$event_date_errorMessage = "";
		$event_time_errorMessage = "";
		
		$validForm = true;
		
		include("classValidations2.php");
		$formValidations = new validations();
		
		$event_name = $formValidations->filterSpecialCharacters($event_name);
		$event_description = $formValidations->filterSpecialCharacters($event_description);
		$event_presenter = $formValidations->filterSpecialCharacters($event_presenter);
		
		//Validate Event Name
		if ( $formValidations->cannotBeEmpty($event_name) ) {
			$validForm = false;
			$event_name_errorMessage = "-Please enter an Event Name";		
		}
		if( $formValidations->cannotBeNullOrUndefined($event_name) ) {
			$validForm = false;
			$event_name_errorMessage = "-Invalid entry, please enter an Event Name";
		}
		
		//Validate Event Description
		if ( $formValidations->cannotBeEmpty($event_description) ) {
			$validForm = false;
			$event_description_errorMessage = "-Please enter an Event Description";		
		}
		if( $formValidations->cannotBeNullOrUndefined($event_description) ) {
			$validForm = false;
			$event_description_errorMessage = "-Invalid entry, cannot contain text 'null' or 'undefined' ";
		}
		//Validate Presenter
		if ( $formValidations->cannotBeEmpty($event_presenter) ) {
			$validForm = false;
			$event_presenter_errorMessage = "-Please enter a Presenter";		
		}
		if( $formValidations->cannotBeNullOrUndefined($event_presenter) ) {
			$validForm = false;
			$event_presenter_errorMessage = "-Invalid entry, please enter a Presenter";
		}
		
		//Validate Event Date
		if ( $formValidations->cannotBeEmpty($event_date) ) {
			$validForm = false;
			$event_date_errorMessage = "-Please enter an Event Date";		
		}
		
		//Validate Event Time
		if ( $formValidations->cannotBeEmpty($event_time) ) {
			$validForm = false;
			$event_time_errorMessage = "-Please enter an Event Time";		
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> PHP Event Form </title>
    
	<meta name="description" content="." />
	<meta name="keywords" content="" />
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<style>
		* {
			box-sizing: border-box;
			font-family: "Tahoma", "Verdana", "Segoe", sans-serif;
		}
		
		body {
			background-color: #FFF7A0;
		}
		
		main {
			text-align: center;
		}
		
		.eventFormSubmitContainer {
			align-items: center;
			margin-top: 200px;
		}
		
		.eventFormContainer {
			background-color: #94E6EB;
			border-radius: 5%;
			color: black;
			width: 70%;
		}

		
		
		label[for=eventSetting], #eventSetting {
			display: none;
		}
	
		.errorMessage	{
			color: #66ccff;
			font-size: .9em;
			font-style: italic;
			margin-bottom: 5px;
		}

	</style>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(document).ready( function() {
			$("#resetButton").click( function() {
				$(".errorMessage").html("");
			});
		});
	</script>
</head>
	
<body>
	<main>

<?php
if($validForm) {
	
	//IF VALID DATA insert into Database
	include("connectPDO.php");
	try {
		$sql = "INSERT INTO wdv341_events2 (event_id, event_name, event_description, event_presenter, event_date, event_time)
		VALUES (NULL, :evtName, :evtDescription, :evtPresenter, :evtDate, :evtTime)";
				
		$statementObject = $conn->prepare($sql);
		
		$statementObject->bindParam(':evtName', $event_name);
		$statementObject->bindParam(':evtDescription', $event_description);
		$statementObject->bindParam(':evtPresenter', $event_presenter);
		$statementObject->bindParam(':evtDate', $event_date);
		$statementObject->bindParam(':evtTime', $event_time);
		
		$statementObject->execute();	
    }
	catch(PDOException $e) {
		echo $sql . "<br>" . $e->getMessage();
	}
?>
		
	<div class="eventFormSubmitContainer">
		<h1>Thank You!</h1>
		<h3>Your event has been submitted.</h3>
		<p><?php echo $sql ?></p>
	</div>

<?php
}
else {
?>
	<div class="eventFormContainer">
		<form action="eventsFroms.php" method="post">
			<label for="eventName"> Event Name <span class="errorMessage"><?php echo $event_name_errorMessage ?></span> </label>
			<input id="eventName" name="eventName" placeholder="Ex. Birthday Bash" type="text" value="<?php echo $event_name ?>" /> <br>

			<label for="eventDescription"> Event Description -- (Limit 200 characters)</label> <br>
			<span class="errorMessage"><?php echo $event_description_errorMessage ?></span>
			<textarea id="eventDescription" maxlength="200" name="eventDescription" placeholder="Description of Your Event"><?php echo $event_description ?></textarea> <br>
			
			<label for="eventPresenter"> Host's Name <span class="errorMessage"><?php echo $event_presenter_errorMessage ?></span> </label>
			<input id="eventPresenter" name="eventPresenter" placeholder="Ex. Jane Doe" type="text" value="<?php echo $event_presenter ?>" />
			
			<label for="eventSetting"> Event Setting <span class="errorMessage"><?php echo $event_setting_errorMessage ?></span> </label>
			<input id="eventSetting" name="eventSetting" placeholder="Ex. Inside or Outside?" type="text" value="<?php echo $event_setting ?>" />			

			<div>
				<div>
					<label for="eventDate"> Event Date </label>
					<input id="eventDate" name="eventDate" type="date" value="<?php echo $event_date ?>" />		
				</div>
				<div>
					<label for="eventTime"> Event Time </label>
					<input id="eventTime" name="eventTime" type="time" value="<?php echo $event_time ?>" />
				</div>
				<div>
					<span class="errorMessage"><?php echo $event_date_errorMessage ?></span>
					<span class="errorMessage"><?php echo $event_time_errorMessage ?></span>				
				</div>
			</div>
			<div>
				<input type="submit" name="submitButton" id="submitButton" value="Submit">
				<input type="reset" name="resetButton" id="resetButton" value="Reset">
			</div>
		</form>
	</div>
<?php
}
?>		
	</main>
</body>
</html>