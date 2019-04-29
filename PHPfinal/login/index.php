<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>S&T</title>
	<link rel="stylesheet" href="https://use.typekit.net/nts2seq.css">
	<link rel="stylesheet" href="../wedding.css">
	<script>


	</script>
	<style>
		#countDownTimer{
			text-align: center;
		}
		@media screen and (min-width: 601px){
			#countDownTimer{
				font-size: 5em;
			}
		}
		@media screen and (max-width: 600px){
			#countDownTimer{
				font-size: 3em;
			}
		}

	</style>
</head>
	

<body>
	<img src="../images/lights.png" class="waterColorsFlowers" alt="Water Color flowers">
	
	<div class="container">
		
		<div class="soYouCanSee">
			
		<h1>Sophia and Thomas</h1>
		<h2>August 8th, 2020</h2></div>
			<div class="headerArea">
				<div class="topnav" id="myTopnav">
					  <a href="index.php" class="active">Home</a>
					  <a href="" class="active">Day of Events</a>
					<a href="events.php" class="active">Events</a>
					 <a href="emailer copy/formEmailer.html" class="active">Contact Us!</a>
					<a href="logout.php" class="active">Logout</a>
					  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
				</div>
			</div>
		<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong>!</p>
    	<p> <a href="index.php?logout='1'" style="color: red; ">logout</a> </p>
    <?php endif ?>
	
		<img src="../images/us.jpg" class="usImg" alt="">
	
	</div>	
	<div class="parallax"></div>

	<div class="divArea1">
		<h1>The Adventure Begins</h1>
<p id="countDownTimer"></p>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Aug 8, 2020 12:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="countDownTimer"
  document.getElementById("countDownTimer").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countDownTimer").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
		
	</div>
	
	<div class="parallax2"></div>

	<div class="divArea2">
		
		</div>

</body>
</html>
