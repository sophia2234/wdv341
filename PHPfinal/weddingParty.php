<?php

// Bridesmaids

	// Taylor
	$maidObject->title = "Maid of Honor";
	$maidObject->maid_name = "Taylor Richards";
	$maidObject->maid_time = "Friend (Met Bride in 1st grade)";
	$maidObject->maid_img = "images/velvet.jpg";
		
	$myJSON = json_encode($maidObject);
	
	$my_file = $maidObject->title . ".js";
	$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
	$data = $myJSON;
	fwrite($handle, $data);
	
	// Brookelyn
	$maidObject->title = "Bridesmaid";
	$maidObject->maid_name = "Brookelyn Kippel";
	$maidObject->maid_time = "Friend (Met Bride and Groom at previous job)";
	$maidObject->maid_img = "images/choco.jpg";
		
	$myJSON = json_encode($maidObject);
	
	$my_file = $maidObject->title . ".js";
	$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
	$data = $myJSON;
	fwrite($handle, $data);

	// Shrae
	$maidObject->title = "Bridesmaid2";
	$maidObject->maid_name = "Shrae Garrigan";
	$maidObject->maid_time = "Friend (Met Bride in 1st grade)";
	$maidObject->maid_img = "images/vin.jpg"; // Cupcakes a cupcake_img object directing to the jpg file 
		
	$myJSON = json_encode($maidObject);

	$my_file = $maidObject->title . ".js";
	$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
	$data = $myJSON;
	fwrite($handle, $data);

// Groomsmen

	// Michael
	$manObject->title = "BestMan";
	$manObject->man_name = "Michael Gundacker";
	$manObject->man_time = "Cousin of Groom";
	$manObject->man_img = "images/michael.jpg";
		
	$myJSON = json_encode($manObject);

	$my_file = $manObject->title . ".js";
	$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
	$data = $myJSON;
	fwrite($handle, $data);

	// Cyrus
	$manObject->title = "Groomsman";
	$manObject->man_name = "Cyrus Brucker";
	$manObject->man_time = "Brother of Bride";
	$manObject->man_img = "images/cyrus.jpg";
		
	$myJSON = json_encode($manObject);

	$my_file = $manObject->title . ".js";
	$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
	$data = $myJSON;
	fwrite($handle, $data);

	// Rusty
	$manObject->title = "Groomsman2";
	$manObject->man_name = "Rusty Shackleford";
	$manObject->man_time = "Friend";
	$manObject->man_img = "images/rusty.jpg";
		
	$myJSON = json_encode($manObject);

	$my_file = $manObject->title . ".js";
	$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
	$data = $myJSON;
	fwrite($handle, $data);

	
	
?>