<?php
session_start();

		$first_name = "";
		$last_name = "";
		$robotest = "";
		$subject = "WDV341 Self Posting";	
		$fromEmail = "sabrucker@dmacc.edu";		
		$toEmail = "sabrucker@dmacc.edu";		
		$emailBody = "";
		$emailMessage ="";
		$headers = "";				
 		
			
	
		//error messages
		$firstNameErrMsg = "";
		$lastNameErrMsg = "";
		$phoneNumberErrMsg="";
		$emailAddressErrMsg="";
		
		
		$validForm = false;
				
	if(isset($_POST["submit"]))
	{	
		//The form has been submitted and needs to be processed
		
		$first_name = $_POST['inFirstName'];
		$last_name = $_POST['inLastName'];
		$robotest = $_POST['inRobotest'];
		
		// Email form
		$emailBody = "Form Data\n\n ";			
		foreach($_POST as $key => $value)									
		{
			$emailBody.= $key."=".$value."\n";	
		} 
		$headers = "From: $fromEmail" . "\r\n";				
 		
		
		//VALIDATION FUNCTIONS		Use functions to contain the code for the field validations.  
			function validateFirstName($inName)
			{
				global $validForm, $firstNameErrMsg;		
				$firstNameErrMsg = "";
				
				if($inName == "")
				{
					$validForm = false;
					$firstNameErrMsg = "First name cannot be spaces";
				}
			}//end validateName()
			function validateLastName($inName)
			{
				global $validForm, $lastNameErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
				$lastNameErrMsg = "";
				
				if($inName == "")
				{
					$validForm = false;
					$lastNameErrMsg = "Last name cannot be spaces";
				}
			}//end validateName()			
		
		//VALIDATE FORM DATA  using functions defined above
		$validForm = true;		//switch for keeping track of any form validation errors
		
		validateFirstName($first_name);
		validateLastName($last_name);
		
		if($validForm)
		{
			//$message = "All good";	
			$message = "";
			
			// Send email if form is valid
			if (mail($toEmail,$subject,$emailBody,$headers)) 	
			{
   				$emailMessage = "Message successfully sent!";
  			} 
			else 
			{
   				$emailMessage = "Message delivery failed...";
  			}
		}
		else
		{
			$message = "Something went wrong";
		}
		
		// validate not robot
		if($robotest)
		{
			$message = "No bots allowed!";
		}
		
	}
	else
	{
		//Form has not been seen by the user.  display the form
	}
	
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Intro PHP - Self Posting Form</title>
<style>
#orderArea	{
	width:600px;
	background-color:#ffc40c;
	padding: 25px;
}
.error	{
	color:red;
	font-style:italic;	
}
.robotic{
	display: none;
}
</style>

</head>

<body>
<h1>WDV341 Intro PHP</h1>
<h2>Self Posting Form
</h2>
<p id="emailMsg"><?php echo($emailMessage);?> </p>
<div id="orderArea">
  <form id="form1" name="form1" method="post" action="customerRegistrationForm(1).php">
  <h3>Registration Form</h3>
  <table width="587" border="0">
    <tr>
      <td width="117">First Name:</td>
      <td width="246"><input type="text" name="inFirstName" id="inFirstName" size="40" value=""/></td>
		<td width="210" class="error" style="color:red;"><?php echo $firstNameErrMsg; ?></td>
    </tr>
    <tr>
      <td width="117">Last Name:</td>
      <td width="246"><input type="text" name="inLastName" id="inLastName" size="40" value=""/></td>
		<td width="210" class="error" style="color:red;"><?php echo $lastNameErrMsg; ?></td>
    </tr>
	  <tr>
       <td width="117">Phone Number:</td>
         <td width="246"><input type="text" name="inLastName" id="inLastName" size="40" value=""/></td>
		<td width="210" class="error" style="color:red;"><?php echo $phoneNumberErrMsg; ?></td>
      </tr>
      <tr>
        <td width="117">Email Address: </td>
        <td width="246"><input type="text" name="textfield3" id="textfield3"></td><td width="210" class="error" style="color:red;"><?php echo $emailAddressErrMsg; ?></td>
      </tr>
      <tr>
        <td><label for="select">Registration: </label>
        <select name="select" id="select">
          <option value="">Choose Type</option>
          <option value="evt01">Attendee</option>
          <option value="evt02">Presenter</option>
          <option value="evt03">Volunteer</option>
          <option value="evt04">Guest</option>
        </select></td>
      </tr>
	  <tr>
		  <td>
      <p>Badge Holder:</p>
      <p>
        <input type="radio" name="radio" id="radio" value="radio">
        <label for="radio">Clip</label> <br>
        <input type="radio" name="radio2" id="radio2" value="radio2">
        <label for="radio2">Lanyard</label> <br>
        <input type="radio" name="radio3" id="radio3" value="radio3">
        <label for="radio3">Magnet</label>
      </p></td></tr>
	  <tr>
		  <td>
      <p>Provided Meals (Select all that apply):</p>
      <p>
        <input type="checkbox" name="checkbox" id="checkbox">
        <label for="checkbox">Friday Dinner</label><br>
        <input type="checkbox" name="checkbox2" id="checkbox2">
        <label for="checkbox2">Saturday Lunch</label><br>
        <input type="checkbox" name="checkbox3" id="checkbox3">
        <label for="checkbox3">Sunday Award Brunch</label>
      </p></td>
	  </tr>
	  <tr>
		  <td>
      <p>
        <label for="textarea">Special Requests/Requirements: (Limit 200 characters)<br>
        </label>
        <textarea name="textarea" cols="40" rows="5" id="textarea"></textarea>
      </p>
			  </td>
	  </tr>
	<tr>
      <!-- The following field is for robots only, beep boop boop beep -->
    <p class="robotic" id="pot">
      <label>If you're human leave this blank:</label>
      <input name="inRobotest" type="text" id="inRobotest" class="inRobotest" />
    </p>
    </tr>
  </table>
  <p>
    <input type="submit" name="submit" id="button" value="Register" />
    <input type="reset" name="reset" id="reset" value="Clear Form"/>
  </p>
  
</form>
</div>

</body>
</html>
