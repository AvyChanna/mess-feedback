<?php
	session_start();
	$mysqli = new mysqli("localhost", "root", "", "mess");
	$data_arr = array();
	if ($mysqli->connect_errno)
		die("Connect failed: ".$mysqli->connect_error);
	$query = "SELECT word FROM words";
	if ($result = $mysqli->query($query)) {
		while ($row = $result->fetch_assoc())
			array_push($data_arr,$row['word']);
		$result->free();
	} else die("Error in query: ".$mysqli->error);
	$mysqli->kill();
	$mysqli->close();

	$mysqli2 = new mysqli("localhost", "root", "", "mess");
	$rating = (float)0.0;
	$count = (int)0;
	$feedback = $_POST['feedback'];
	$feedback = strtolower($feedback);
	$word="";
	for ($i=(int)0;$i<strlen($feedback);$i++)
	{
		if(!ctype_alpha($feedback[i]))
			$feedback[i]=" ";
	}
	if ($mysqli2->connect_errno)
		die("Connect failed: ".$mysqli2->connect_error);
	$query = "SELECT word FROM words";
	if ($result = $mysqli2->query($query)) {
		while ($row = $result->fetch_assoc())
			array_push($data_arr,$row['word']);
		$result->free();
	} else die("Error in query: ".$mysqli2->error);
	$mysqli2->kill();
	$mysqli2->close();


?>