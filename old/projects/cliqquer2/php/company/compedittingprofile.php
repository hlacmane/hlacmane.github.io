<?php
	require '../../sqlconnect.php';
	session_start();
	$cregno = $mysqli->real_escape_string($_POST['cregno']);
	$sector = $mysqli->real_escape_string($_POST['sector']);
	$location = $mysqli->real_escape_string($_POST['location']);
	$description = $mysqli->real_escape_string($_POST['desc']);
	$website = $mysqli->real_escape_string($_POST['website']);
	$contactno = $mysqli->real_escape_string($_POST['contactno']);
	$empcount = $mysqli->real_escape_string($_POST['empcount']);
	$twitter = $mysqli->real_escape_string($_POST['twitter']);
	$facebook = $mysqli->real_escape_string($_POST['fb']);
	$linkedin = $mysqli->real_escape_string($_POST['linkedin']);
	$userid = $_SESSION['compid'];
	
	//echo $dob . ' ' . $gender . ' ' . $location . ' ' . $website . ' ' . $phoneno . ' ' . $prefrole;
	//echo ' ' . $prefsalary . ' ' . $linkedin . ' ' . $userid;
	$stmt = $mysqli->prepare("UPDATE `companyDetails` SET `compregno`=?, `sector`=?, `location`=?, `description`=? ,`website`=?, `contactno`=?, `employeecount`=?, `twitter`=?, `facebook`=? ,`linkedin`=? WHERE (`companyid`=?)");
	
	$stmt->bind_param('isssssssssi', $cregno, $sector, $location, $description, $website, $contactno, $empcount, $twitter,  $facebook, $linkedin, $userid);
	
	$stmt->execute();

	$stmt->close();
	
	$mysqli->close();

	header('Location: compprof.php');
	
	die();
	
?>	