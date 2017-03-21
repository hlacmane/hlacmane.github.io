<?php
	require '../../sqlconnect.php';
	session_start();
	$age = $mysqli->real_escape_string($_POST['age']);
	$gender = $mysqli->real_escape_string($_POST['gender']);
	$location = $mysqli->real_escape_string($_POST['location']);
	$website = $mysqli->real_escape_string($_POST['website']);
	$phoneno = $mysqli->real_escape_string($_POST['phoneno']);
	$prefrole = $mysqli->real_escape_string($_POST['prefrole']);
	$prefsalary = $mysqli->real_escape_string($_POST['prefsalary']);
	$linkedin = $mysqli->real_escape_string($_POST['linkedin']);
	$userid = $_SESSION['candid'];
	
	//echo $dob . ' ' . $gender . ' ' . $location . ' ' . $website . ' ' . $phoneno . ' ' . $prefrole;
	//echo ' ' . $prefsalary . ' ' . $linkedin . ' ' . $userid;
	$stmt = $mysqli->prepare("UPDATE `candidateDetails` SET `age`=?, `gender`=?, `location`=?, `website`=?, `phonenumber`=?, `prefrole`=?, `prefsalary`=?, `linkedin` =? WHERE (`candidateid`=?)");
	
	$stmt->bind_param('isssssssi', $age, $gender, $location, $website, $phoneno, $prefrole, $prefsalary, $linkedin, $userid);
	
	$stmt->execute();

	$stmt->close();
	
	$mysqli->close();
	
	$result = true;
	echo $result;
	
	die();

	
?>