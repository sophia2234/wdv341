<!DOCTYPE HTML>
<head>
<title>PHP Functions</title>
	
<?php
function dateFMT($inDate){
  return date("D/M/Y",$inDate);
}
function dateInternational($inDate){
  return date("M/D/Y",$inDate);
}
$fullName="ShaggyRogers@DMACC.edu";
function characterCount($inString) {
	return 	strlen($inString);
}

function formatNum($inString){
return number_format($inString);
}
function formatCur($inNum){
return  money_format('$%i', $inNum);
}
?>
</head>
<body>
<h1>PHP Functions</h1>
<p><b>String used:</b> <?php echo $fullName;?></p>
<p><b>Trim whitespace:</b> <?php echo trim($fullName); ?></p>
<p><b>Lowercase characters</b>: <?php echo strtolower($fullName);?></p>
<p><b>Contains DMACC:</b> <?php echo strpos("$fullName","DMACC"); ?></p>
<p><b>Number of Characters:</b> <?php echo characterCount($fullName);?></p>
<p><b>Today's day, month and year:</b>
<?php
echo dateFMT(time())." <br />";?>
	<p><b>Today's month, day and year:</b>
<?php
echo dateInternational(time())." <br />";?></p>
	<p><b>Formated with Commas:</b>
	<?php
echo formatNum(1234567890)." <br />";?></p>
	<p><b>Money Format:</b>
	<?php
echo formatCur(123456)." <br />";
?></p>
	</body>
</html>