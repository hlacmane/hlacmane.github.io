<?php
  require "../sqlconnect.php";
  
  $email = $mysqli->real_escape_string($_POST['email1']);
  
  $pass1 = $mysqli->real_escape_string($_POST['password1']);
  $encrypass = hash ('sha256' , $pass1);
  $salt = $mysqli->real_escape_string(hash('sha256', time()));
  $readypass = $mysqli->real_escape_string(hash ('sha256' , $encrypass."--".$salt));
  
  
  $companyname = $mysqli->real_escape_string($_POST['companyname']);
  
  //INSERT INTO `companyDetails`(`email`, `password`, `salt`, `companyName`) VALUES ([value-2],[value-3],[value-4],[value-5])
  //INSERT INTO `companyDetails`(`email`, `password`, `salt`, `companyName`) VALUES (?, ?, ?, ?)
  $stmt = $mysqli->prepare("INSERT INTO `companyDetails`(`email`, `password`, `salt`, `companyName`) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $email, $encrypass, $salt, $companyname);
  $stmt->execute();
  $stmt->close();
  
  session_start();
  
  //SELECT `companyid` FROM `companyDetails` WHERE 1
  //SELECT `companyid` FROM `companyDetails` WHERE `email`=?
  $stmt2 = $mysqli->prepare("SELECT `companyid` FROM `companyDetails` WHERE `email`=?");
  $stmt2->bind_param("s", $email);
  $stmt2->execute();
  $stmt2->bind_result($loginid);
  $stmt2->fetch();
  $stmt2->close();
  $_SESSION['compid'] = $loginid;
  
  $mysqli->close();
  header('Location: dashboardtemp2.php');
  die();
  
?>