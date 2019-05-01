<?php
	session_start();
	header("Content-Type: text/plain ");
	$mysqli = new mysqli("localhost", "root", "", "mess");
	$data_arr = array();
	if ($mysqli->connect_errno)
		die("Connect failed: ".$mysqli->connect_error);
	$query = "SELECT word, rating FROM words";
	if ($result = $mysqli->query($query)) {
		while ($row = $result->fetch_assoc())
			$data_arr[] = array(
				'word' => $row['word'],
				'rating' => $row['rating']
			);
		$result->free();
	} else die("Error in query: ".$mysqli->error);
	$mysqli->close();
	$feedback="";
	$mysqli2 = new mysqli("localhost", "root", "", "mess");
	$rating = (float)0.0;
	$count = (int)0;
	$feedback = $_POST['feedback'];
	$feedback = strtolower($feedback);
	$word="";
	for ($i=(int)0;$i<strlen($feedback);$i++)
		if(!ctype_alnum($feedback[$i]))
			$feedback[$i]=" ";
	$token = strtok($feedback, " ");

	while ($token !== false) {
		for($j=0;$j<sizeof($data_arr, COUNT_NORMAL);$j++){
			if($token===$data_arr[$j]['word']){
				$rating = (float)$rating + (float)$data_arr[$j]['rating'];
				$count = $count + 1;
			}
		}
	$token = strtok(" ");
	} 
	if ($count == 0)
		$rating = 5;
	else
		$rating = (float)$rating / $count;
	
	if ($mysqli2->connect_errno)
		die("Connect failed: ".$mysqli2->connect_error);
	$stmt = $mysqli2->prepare("insert into feedbacks (feedback, rating, username, mess) values( ? , ? , ? , ? )");
	$stmt->bind_param("sdss", $_POST['feedback'], $rating, $_SESSION['username'], $_SESSION['mess']);
	if ($result = $stmt->execute()) {
		header("location: student_new_Feedback.php");
		die();
	} else die("Error in query: ".$mysqli2->error);
?>