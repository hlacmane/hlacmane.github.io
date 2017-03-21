<?php
	require "./sqlconnect.php";
	
	$email = $mysqli->real_escape_string($_POST['email']);
	
	$stmt = $mysqli->prepare("SELECT EXISTS(SELECT * FROM `candidateDetails` WHERE (`email`=?))");
	
	$stmt->bind_param("s", $email);
	
	$stmt->execute();

    $stmt->bind_result($result);

    $stmt->fetch();

    $stmt->close();
	
	$mysqli->close();
	
	echo $result;

	die();
?>