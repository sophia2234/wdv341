<?php
	$validForm = false;
$validForm = false;
	$customerName = "";
	$customerPreferredName = NULL;
	$customerPhone = "";
	$customerEmail = "";
	$registrationType = "";
	$badgeHolderType = "";
	$providedMealSelection1 = NULL;
	$providedMealSelection2 = NULL;
	$providedMealSelection3 = NULL;
	$specialRequests = "";
	$customerNameErrorMessage = "";
	$customerPhoneErrorMessage = "";
	$customerEmailErrorMessage = "";
	$registrationTypeErrorMessage = "";
	$badgeHolderTypeErrorMessage = "";
	$providedMealSelectionErrorMessage = "";
	$specialRequestsErrorMessage = "";
	if( isset($_POST['submitButton']) ) {
		if( isset($customerPreferredName) ) {
			header("Location: http://www.google.com");
		};
		
		//Get values from form
		$customerName = $_POST['customerName'];
		$customerPreferredName = $_POST['$customerPreferredName'];
		$customerPhone = $_POST['customerPhone'];
		$customerEmail = $_POST['customerEmail'];
		$registrationType = $_POST['registrationType'];
		$badgeHolderType = $_POST['badgeHolderType'];
		$providedMealSelection1 = $_POST['providedMealSelection1'];
		$providedMealSelection2 = $_POST['providedMealSelection2'];
		$providedMealSelection3 = $_POST['providedMealSelection3'];
		$specialRequests = $_POST['specialRequests'];
		
		//Clear error messages
		$customerNameErrorMessage = "";
		$customerPhoneErrorMessage = "";
		$customerEmailErrorMessage = "";
		$registrationTypeErrorMessage = "";
		$badgeHolderTypeErrorMessage = "";
		$providedMealSelectionErrorMessage = "";
		$specialRequestsErrorMessage = "";
		
		//Set flag
		$validForm = true;
		
		//Run Validations
		include("classValidations.php");
		$formValidations = new validations();
		
		$customerName = $formValidations->filterSpecialCharacters($customerName);
		$specialRequests = $formValidations->filterSpecialCharacters($specialRequests);
		
		if( $formValidations->cannotBeEmpty($customerName) ) {
			$validForm = false;
			$customerNameErrorMessage = "Please enter your Name";
		}
		if( $formValidations->cannotBeNullOrUndefined($customerName) ) {
			$validForm = false;
			$customerNameErrorMessage = "Invalid entry, please enter your name";
		}
		
		if( $formValidations->isNumber($customerPhone) ) {
			$validForm = false;
			$customerPhoneErrorMessage = "Invalid entry, phone must be numbers only";
		} elseif ( $formValidations->validatePhoneCharacters($customerPhone) ) {
			$validForm = false;
			$customerPhoneErrorMessage = "Invalid entry, please do not use hyphens or parentheses";		
		} elseif ( $formValidations->validatePhoneLength($customerPhone) ) {
			$validForm = false;
			$customerPhoneErrorMessage = "Phone number must be at least 10 numbers";	
		}
		
		if( $formValidations->validateEmail($customerEmail) ) {
			$validForm = false;
			$customerEmailErrorMessage = "Invalid entry, please enter your email";
		}
		
		if( $formValidations->selectionRequired($registrationType) ) {
			$validForm = false;
			$registrationTypeErrorMessage = "Please select a Registration Type";
		}
		
		if( $formValidations->selectionRequired($badgeHolderType) ) {
			$validForm = false;
			$badgeHolderTypeErrorMessage = "Please select a Badge Type";
		}
		
		if( $formValidations->characterLengthLessThan200($specialRequests) ) {
			$validForm = false;
			$specialRequestsErrorMessage = "Message must be less than 200 characters";
		}
	};
?>

<!DOCTYPE html>
<html >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>WDV341 Intro PHP - Form Validation Assignment</title>
	
	<style>
		#orderArea	{
			background-color: cornsilk;
			width:600px;
			border:thin solid black;
			margin: auto auto;
			padding-left: 25px;
		}
		#orderArea h3	{
			text-align:center;	
		}
		.customerPreferredNameDisplay {
			display: none;
		}
		.error	{
			color:red;
			font-style:italic;	
		}
	</style>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(document).ready( function() {
			$("#resetButton").click( function() {
				$(".error").html("");
			});
		});
	</script>
</head>

<body>
	<h1>WDV341 Intro PHP</h1>
	<h2> Form Validation Assignment</h2>
	<p>&nbsp;</p>
	
<?php
if($validForm) {
?>
	
	<h3>Thank You!</h3>
	<p>Your order has been processed. A confirmation email has been sent to <?php echo $customerEmail; ?> for your records.</p>
	
<?php
}
else {
?>

	<div id="orderArea">
	<form name="orderAreaForm" method="post" action="formValidationAssignment.php">
	  <h3>Customer Registration Form</h3>

		  <p class="customerNameDisplay">
			<label for="customerName">Name:</label>
			<input type="text" name="customerName" id="customerName" value="<?php echo $customerName; ?>">
			<span class="error"> <?php echo $customerNameErrorMessage; ?> </span>
		  </p>
		  <p class="customerPreferredNameDisplay">
			<label for="customerPreferredName">Preferred Name:</label>
			<input type="text" name="customerPreferredName" id="customerPreferredName" value="<?php echo $customerPreferredName; ?>">
			<span class="error"> <?php echo $customerPreferredNameErrorMessage; ?> </span>
		  </p>
		  <p class="customerPhoneDisplay">
			<label for="customerPhone">Phone Number:</label>
			<input type="text" name="customerPhone" id="customerPhone" value="<?php echo $customerPhone; ?>">
			<span class="error"> <?php echo $customerPhoneErrorMessage; ?> </span>
		  </p>
		  <p class="customerEmailDisplay">
			<label for="customerEmail">Email Address: </label>
			<input type="text" name="customerEmail" id="customerEmail" value="<?php echo $customerEmail; ?>">
			<span class="error"> <?php echo $customerEmailErrorMessage; ?> </span>
		  </p>
		  <p class="registrationTypeDisplay">
			<label for="registrationType">Registration: </label>
			<select name="registrationType" id="registrationType">
			  <option value="">Choose Type</option>
			  <option value="attendee" <?php if (isset($registrationType) && $registrationType=="attendee") echo "selected";?> >Attendee</option>
			  <option value="presenter" <?php if (isset($registrationType) && $registrationType=="presenter") echo "selected";?> >Presenter</option>
			  <option value="volunteer" <?php if (isset($registrationType) && $registrationType=="volunteer") echo "selected";?> >Volunteer</option>
			  <option value="guest" <?php if (isset($registrationType) && $registrationType=="guest") echo "selected";?> >Guest</option>
			</select>
			<span class="error"> <?php echo $registrationTypeErrorMessage; ?> </span>
		  </p>
		  <p class="badgeHolderTypeDisplay">Badge Holder: <span class="error"> <?php echo $badgeHolderTypeErrorMessage; ?> </span> </p>
		  <p>
			<input type="radio" name="badgeHolderType" id="badgeClip" value="badgeClip" 
				   <?php if (isset($badgeHolderType) && $badgeHolderType=="badgeClip") echo "checked";?> >
			<label for="badgeClip">Clip</label> <br>
			<input type="radio" name="badgeHolderType" id="badgeLanyard" value="badgeLanyard" 
				   <?php if (isset($badgeHolderType) && $badgeHolderType=="badgeLanyard") echo "checked";?> >
			<label for="badgeLanyard">Lanyard</label> <br>
			<input type="radio" name="badgeHolderType" id="badgeMagnet" value="badgeMagnet" 
				   <?php if (isset($badgeHolderType) && $badgeHolderType=="badgeMagnet") echo "checked";?> >
			<label for="badgeMagnet">Magnet</label>
		  </p>
		  <p class="providedMealSelectionDisplay">Provided Meals (Select all that apply):
			<span class="error"> <?php echo $providedMealSelectionErrorMessage; ?> </span>
		  </p>
		  <p>
			<input type="checkbox" name="providedMealSelection1" id="mealFridayDinner" value="mealFridayDinner" 
				   <?php if (isset($providedMealSelection1)) echo "checked";?> >
			<label for="mealFridayDinner">Friday Dinner</label><br>
			<input type="checkbox" name="providedMealSelection2" id="mealSaturdayLunch" value="mealSaturdayLunch" 
				   <?php if (isset($providedMealSelection2)) echo "checked";?> >
			<label for="mealSaturdayLunch">Saturday Lunch</label><br>
			<input type="checkbox" name="providedMealSelection3" id="mealSundayAwardBrunch" value="mealSundayAwardBrunch" <?php if (isset($providedMealSelection3)) echo "checked";?> >
			<label for="mealSundayAwardBrunch">Sunday Award Brunch</label>
		  </p>
		  <p class="specialRequestsDisplay">
			<label for="specialRequests">Special Requests/Requirements: (Limit 200 characters)<br/>
			<span class="error"> <?php echo $specialRequestsErrorMessage; ?> </span><br/>
			</label>
			<textarea name="specialRequests" cols="40" rows="5" id="specialRequests"><?php echo $specialRequests; ?></textarea>
		  </p>

	  <p>
		<input type="submit" name="submitButton" id="submitButton" value="Submit">
		<input type="reset" name="resetButton" id="resetButton" value="Reset">
	  </p>
	</form>
	</div>

<?php
}
?>
	
</body>
</html>