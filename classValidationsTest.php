<?php
	include("classValidations.php");
	$formValidations = new validations();	//create new validations object
?>

<!DOCTYPE html>
<html>
<head>
	<title>Intro to PHP Form Validation Assignment </title>
    
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta charset="UTF-8" />
	
	<style>
		* {
			box-sizing: border-box;
			font-family: "Tahoma", "Verdana", "Segoe", sans-serif;
		}
		
		@media only screen and (min-width: 480px) and (max-width: 767px) {
		}
		@media only screen and (min-width: 768px) {
		}
	</style>
</head>
	
<body>
	<main>
		<h1> PHP Validations </h1>
		<h2> Test Page </h2>

		<hr/>
		
		<h4>Cannot Be Empty</h4>
		<p>0 is <?php echo $formValidations->cannotBeEmpty(0); ?> </p>
		<p>"" is <?php echo $formValidations->cannotBeEmpty(""); ?> </p>
		<p>0.0 is <?php echo $formValidations->cannotBeEmpty(0.0); ?> </p>
		<p>"     " is <?php echo $formValidations->cannotBeEmpty("     "); ?> </p>
		<p>"Danny" is <?php echo $formValidations->cannotBeEmpty("Danny"); ?> </p>
		<p>null is <?php echo $formValidations->cannotBeEmpty(null); ?> </p>

		<hr/>
		
		<h4>Cannot Be Null or Undefined</h4>
		<p>null is <?php echo $formValidations->cannotBeNullOrUndefined("null"); ?> </p>
		<p>undefined is <?php echo $formValidations->cannotBeNullOrUndefined("undefined"); ?> </p>

		<hr/>
		
		<h4>Is Number</h4>
		<p>12345 is <?php echo $formValidations->isNumber(12345); ?> </p>
		<p>qwerty is <?php echo $formValidations->isNumber("qwerty"); ?> </p>
		<p>12345qwerty is <?php echo $formValidations->isNumber("12345qwerty"); ?> </p>
		
		<hr/>
		
		<h4>Validate Phone Characters</h4>
		<p>1234567 is <?php echo $formValidations->validatePhoneCharacters(1234567); ?> </p>
		<p>(123)4567890 is <?php echo $formValidations->validatePhoneCharacters("(123)4567890"); ?> </p>
		<p>123-456-7890 is <?php echo $formValidations->validatePhoneCharacters("123-456-7890"); ?> </p>
		<p>(123) 456-7890 is <?php echo $formValidations->validatePhoneCharacters("(123) 456-7890"); ?> </p>

		<hr/>

		<h4>Validate Phone Length</h4>
		<p>"" is <?php echo $formValidations->validatePhoneLength(""); ?> </p>	
		<p>1234567 is <?php echo $formValidations->validatePhoneLength(1234567); ?> </p>
		<p>1234567890 is <?php echo $formValidations->validatePhoneLength(1234567890); ?> </p>
		
		<hr/>
		
		<h4>Email Validation</h4>
		<p> minslo5@yahoo.com is <?php echo $formValidations->validateEmail("minslo5@yahoo.com"); ?> </p>
		<p> minslo5@yaho is <?php echo $formValidations->validateEmail("minslo5@yaho"); ?> </p>

		<hr/>
		
		<h4>Selection Required</h4>
		<p>"" is <?php echo $formValidations->selectionRequired(""); ?> </p>
		<p>"value" is <?php echo $formValidations->selectionRequired("value"); ?> </p>
		
		<hr/>		

		<h4>Validate Message Length</h4>
		<p>"" is <?php echo $formValidations->characterLengthLessThan200(""); ?> </p>
		<p>"Lorem ipsum dolor sit..." is <?php echo $formValidations->characterLengthLessThan200("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pulvinar mattis hendrerit. Nunc lobortis egestas mauris id tristique. Ut in scelerisque lorem. Aliquam sodales diam sed felis fermentum, vel suscipit nibh molestie. In elementum rutrum tempus. Aliquam quis diam eget mi dignissim sollicitudin. Donec eleifend pellentesque erat, sed condimentum magna ultricies sed. Integer posuere dignissim varius. Mauris eget nulla velit. Suspendisse potenti.
		Vivamus volutpat nulla ut convallis blandit. Maecenas nulla lacus, fringilla a condimentum non, consectetur in turpis. Proin volutpat, turpis sit amet eleifend rhoncus, arcu sapien sollicitudin ligula, ut tincidunt risus risus et ex. Nam ac diam posuere, aliquet nunc et, cursus mi. In fringilla arcu id leo commodo, sed sodales metus iaculis. Praesent eu mauris eget augue dapibus venenatis vel eget ligula. Proin consectetur rutrum sem, nec suscipit odio condimentum a. In mollis odio non felis suscipit, sed ultrices nulla sollicitudin. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed a erat aliquet, blandit odio id, bibendum est."); ?> </p>

		
	</main>
</body>
</html>