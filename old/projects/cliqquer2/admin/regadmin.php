<?php
  require "../sqlconnect.php";
  $codecheck = "%adminMaker648%";
  if ($_POST['code'] != $codecheck)
  {
    header('Location: index.php');
  }
  /*
  echo $_POST['email'].'email<br>';
  echo $_POST['pass'].'pass<br>';
  echo $_POST['fname'].'fname<br>';
  echo $_POST['lname'].'lname<br>';
  echo $_POST['code'].'code<br>';
  */
  $email = $mysqli->real_escape_string($_POST['email']);
  
  $pass1 = $mysqli->real_escape_string($_POST['pass']);
  $encrypass = hash ('sha256' , $pass1);
  $salt = $mysqli->real_escape_string(hash('sha256', time()));
  $readypass = $mysqli->real_escape_string(hash ('sha256' , $encrypass."--".$salt));
  
  $firstname = $mysqli->real_escape_string($_POST['fname']);
  
  $lastname = $mysqli->real_escape_string($_POST['lname']);
  $now = new DateTime();
  $datetime = $now->format('Y-m-d H:i:s');
  //echo $now->format('Y-m-d H:i:s');    // MySQL datetime format
  
  //$stmt = $mysqli->prepare("INSERT INTO  `users` (  `username` ,  `password` ,  `title` ,  `firstname` ,  `lastname` ,  `email` ,  `promoemails` ,  `salt` ) VALUES (?,  ?,  ?,  ?,  ?,  ?,  ?,  ?)");
  //INSERT INTO `admins`(`adminid`, `email`, `fname`, `lname`, `pass`, `salt`, `datecreated`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])
  //INSERT INTO `admins`(`email`, `fname`, `lname`, `pass`, `salt`, `datecreated`) VALUES (?,?,?,?,?,?)
  $stmt = $mysqli->prepare("INSERT INTO `admins`(`email`, `fname`, `lname`, `pass`, `salt`, `datecreated`) VALUES (?,?,?,?,?,?)");
  $stmt->bind_param("ssssss", $email, $firstname, $lastname, $encrypass, $salt, $datetime);
  $stmt->execute();
  $stmt->close();
  
  session_start();
  
  //$stmt2 = $mysqli->prepare("SELECT `userid` FROM `users` WHERE username=?");
  //SELECT `adminid`, `email`, `fname`, `lname`, `pass`, `salt`, `datecreated` FROM `admins` WHERE 1
  //SELECT `adminid` FROM `admins` WHERE (`email`=?)
  $stmt2 = $mysqli->prepare("SELECT `adminid` FROM `admins` WHERE (`email`=?)");
  $stmt2->bind_param("s", $email);
  $stmt2->execute();
  $stmt2->bind_result($loginid);
  $stmt2->fetch();
  $stmt2->close();
  $_SESSION['adminid'] = $loginid;
  echo $loginid.'loginidmadting<br>';
  
  $mysqli->close();
  header('Location: adminmain.php');
  die();
?>