<?php
  require "sqlconnect.php";
  
  $username = $_POST['username'];
//  echo $username. "<br>";
  $pass1 = $_POST['password1'];
//  echo $pass1. "<br>";
//  $salt = sha1(time());
//  echo $salt. "<br>";

/*  $encrypass = sha1($pass1);
//  echo $encrypass. "<br>";
  $readypass = sha1($salt. "--" .$encrypass);
*/

//hash ( string $algo , string $data [, bool $raw_output = false ] )
  $encrypass = hash ( 'sha256' , $pass1);
  $salt = hash('sha256', time());
  $readypass = hash ( 'sha256' , $salt."--".$encrypass);
  //echo $readypass. "<br>";
  $pass2 = $_POST['password2'];
//  echo $pass2. "<br>";
  $title = $_POST['title'];
//  echo $title. "<br>";
  $firstname = $_POST['firstname'];
//  echo $firstname. "<br>";
  $lastname = $_POST['lastname'];
//  echo $lastname. "<br>";
  $email = $_POST['email'];
//  echo $email. "<br>";
  $promo = $_POST['promo_emails'];
//  echo $promo. "<br>";
/*
INSERT INTO  `users` (  `username` ,  `password` ,  `title` ,  `firstname` ,  `lastname` ,  `email` ,  `promoemails` ,  `salt` ) 
VALUES (
'check1',  'check1',  'Mr',  'check1',  'check1',  'check1',  'on',  'check1'
)
*/
//  $stmt = $mysqli->prepare("INSERT INTO `users` (`username`, `password`, `title`, `firstname`, `lastname`, `email`, `promoemails`, `salt`) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
//  $stmt = $mysqli->prepare("INSERT INTO  `users` (  `username` ,  `password` ,  `title` ,  `firstname` ,  `lastname` ,  `email` ,  `promoemails` ,  `salt` ) VALUES ('check1',  'check1',  'Mr',  'check1',  'check1',  'check1',  'on',  'check1')");
  $username = $mysqli->real_escape_string($username);
  $encrypass = $mysqli->real_escape_string($encrypass);
  $title = $mysqli->real_escape_string($title);
  $firstname = $mysqli->real_escape_string($firstname);
  $lastname = $mysqli->real_escape_string($lastname);
  $email = $mysqli->real_escape_string($email);
  $promo = $mysqli->real_escape_string($promo);
  $salt = $mysqli->real_escape_string($salt);
  $stmt = $mysqli->prepare("INSERT INTO  `users` (  `username` ,  `password` ,  `title` ,  `firstname` ,  `lastname` ,  `email` ,  `promoemails` ,  `salt` ) VALUES (?,  ?,  ?,  ?,  ?,  ?,  ?,  ?)");
//  $stmt = $mysqli->prepare("INSERT INTO  `users` (  `username` ,  `password` ,  `title` ,  `firstname` ,  `lastname` ,  `email` ,  `promoemails` ,  `salt` ) VALUES ($username, $encrypass, $title, $firstname, $lastname, $email, $promo, $salt);");
  $stmt->bind_param("ssssssss", $username, $encrypass, $title, $firstname, $lastname, $email, $promo, $salt);
  $stmt->execute();
  $stmt->close();
  //$mysqli->close();
//  echo "swag0<br>";
/*
INSERT INTO `users`(
`userid`, 
`shareduserid`, 
`username`, 
`password`, 
`title`, 
`firstname`, 
`lastname`, 
`email`, 
`promoemails`, 
`salt`) 
VALUES (
  [value-1],
  [value-2],
  [value-3],
  [value-4],
  [value-5],
  [value-6],
  [value-7],
  [value-8],
  [value-9],
  [value-10])

*/

//new one added
  session_start();
/*
SELECT `userid`, `shareduserid`, `username`, `password`, `title`, `firstname`, `lastname`, `email`, `promoemails`, `salt` FROM `users` WHERE 1
 add end here*/
//$stmt = $mysqli->prepare("INSERT INTO users VALUES(:n1, :n2, :username, :encrypass, :title, :firstname, :lastname, :email, :promo, :salt);");
  $username = $mysqli->real_escape_string($username);
  $regis = $mysqli->prepare("SELECT `userid` FROM `users` WHERE username=?");
  $regis->bind_param("s", $username);
//  echo "swag1 <br>";
//  echo "swag2 <br>";
  $regis->execute();
//  echo "swag3 <br>";
  $regis->bind_result($loginid);
//  echo "swag3.5 <br>";
  $regis->fetch();
//  echo "swag4 <br>";

//  echo $loginid;
//  echo "<br>";
  $_SESSION['userid'] = $loginid;
  
//  echo $_SESSION['userid'];
//  echo "<br>";

$mysqli->close();
  header('Location: managelist.php');
  
  die();
//  echo "dafuq<br>";



?>


