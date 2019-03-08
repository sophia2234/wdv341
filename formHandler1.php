<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Intro to PHP - Form Handler</title>
	   <script src="https://www.google.com/recaptcha/api.js?render=YOUR_RECAPTCHA_SITE_KEY"></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('YOUR_RECAPTCHA_SITE_KEY', { action: 'contact' }).then(function (token) {
                var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
            });
        });
    </script>
</head>

<body>
<h1>WDV341 Intro to PHP</h1>
<h2>Form Handler</h2>
	<?php // Check if form was submitted:
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {
                        // Build POST request:
                        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
                        $recaptcha_secret = '6LefapYUAAAAAKBTdQXxOeQgdiqETbssctUIBBJX';
                        $recaptcha_response = $_POST['recaptcha_response'];
                        // Make and decode POST request:
                        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
                        $recaptcha = json_decode($recaptcha);
                        // Take action based on the score returned:
                        if ($recaptcha->score >= 0.5) {
                            // Verified - send email
                        } else {
                            // Not verified - show form error
                        }
                    } ?>

<form id="form1" name="form1" method="post" action="formHandler.php">
  <p>First Name: 
    <input type="text" name="firstName" id="firstName" />
</p>
  <p>Last Name: 
    <input type="text" name="lastName" id="lastName" />
  </p>
  <p>School: 
    <input type="text" name="school" id="school" />
  </p>
  
    <h3>Do You like PHP?</h3>
  <p>
  <input type="radio" name="php" id="phpYes" value ="Love PHP"> I Love PHP!<br />
  <input type="radio" name="php" id="phpNo" value ="Do Not Like PHP">I Don't Like PHP.<br />
  <input type="radio" name="php" id="phpWhat" value ="What is PHP?">What is PHP?
  </p>
  
  <h3>Click all that apply:</h3>
 <p>
	<input type="checkbox" name="likeDesign" value="design">I like Web Design<br />
	<input type="checkbox" name="likeProgramming" value="programming">I like in Programming<br />
 </p>
  
  <h3>What class would you like to take?</h3>
  <p>
	<select name="whichClass">
		<option value="Intro to Programming Robots">Intro to Programming Robots</option>
		<option value="Intro to Designing Web Pages for Cooks">Intro to Designing Web Pages for Cooks</option>
		<option value="Intro to Hacking FAX Machines">Intro to Hacking FAX Machines</option>
		<option value="Intro to Adobe Kuler Only">Intro to Adobe Kuler Only</option>
	</select>
  </p>
  
 
  <p>
    <input type="submit" name="button" id="button" value="Submit" />
    <input type="reset" name="button2" id="button2" value="Reset" />
  </p>
	 <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
</form>

<p>&nbsp;</p>
</body>

</html>