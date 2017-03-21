<?php
  require "../sqlconnect.php";
  
  $email = $mysqli->real_escape_string($_POST['email1']);
  
  $pass1 = $mysqli->real_escape_string($_POST['password1']);
  $encrypass = hash ('sha256' , $pass1);
  $salt = $mysqli->real_escape_string(hash('sha256', time()));
  $readypass = $mysqli->real_escape_string(hash ('sha256' , $encrypass."--".$salt));
  
  $title = $mysqli->real_escape_string($_POST['title']);
  
  $firstname = $mysqli->real_escape_string($_POST['firstname']);
  
  $lastname = $mysqli->real_escape_string($_POST['lastname']);
  
  
  //$stmt = $mysqli->prepare("INSERT INTO  `users` (  `username` ,  `password` ,  `title` ,  `firstname` ,  `lastname` ,  `email` ,  `promoemails` ,  `salt` ) VALUES (?,  ?,  ?,  ?,  ?,  ?,  ?,  ?)");
  //INSERT INTO `candidateDetails`(`email`, `password`, `salt`, `title`, `firstname`, `lastname`) VALUES ([value-2],[value-3],[value-4],[value-5],[value-6],[value-7])
  //INSERT INTO `candidateDetails`(`email`, `password`, `salt`, `title`, `firstname`, `lastname`) VALUES (?,?,?,?,?,?)
  $stmt = $mysqli->prepare("INSERT INTO `candidateDetails`(`email`, `password`, `salt`, `title`, `firstname`, `lastname`) VALUES (?,?,?,?,?,?)");
  $stmt->bind_param("ssssss", $email, $encrypass, $salt, $title, $firstname, $lastname);
  $stmt->execute();
  $stmt->close();
  
  session_start();
  
  //$stmt2 = $mysqli->prepare("SELECT `userid` FROM `users` WHERE username=?");
  //SELECT `candidateid` FROM `candidateDetails` WHERE 1
  //SELECT `candidateid` FROM `candidateDetails` WHERE `email`=?
  $stmt2 = $mysqli->prepare("SELECT `candidateid` FROM `candidateDetails` WHERE `email`=?");
  $stmt2->bind_param("s", $email);
  $stmt2->execute();
  $stmt2->bind_result($loginid);
  $stmt2->fetch();
  $stmt2->close();
  $_SESSION['candid'] = $loginid;
  
  $mysqli->close();
  header('Location: dashboardtemp.php');
  die();
?>