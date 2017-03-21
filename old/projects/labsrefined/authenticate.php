<?php
  require 'sqlconnect.php';
//  session_start();
  //$username = $_POST['username'];
  $username = $mysqli->real_escape_string($_POST['username']);
//  echo $username;
//  echo "<br>";
  $password = $_POST['pass'];
//  echo $password;
//  echo "<br>";
  $encrypass = hash ( 'sha256' , $password);
//  echo $encrypass;
//  echo "<br>";
//  $row = $db->prepare("SELECT * FROM users WHERE username=:username");
  
  $row = $mysqli->prepare("SELECT `userid`, `password`, `salt` FROM `users` WHERE username=?");
//  echo "1 <br>";
  $row->bind_param("s", $username);

  //$row->bindValue(':username', $username, SQLITE3_TEXT);
//  echo "2 <br>";
  $row->execute();
//  echo "3 <br>";
  $row->bind_result($resultid, $resultpass, $resultsalt);
//  echo "4 <br>";
  $row->fetch();
//  echo "5<br>";
/*
  $encrypass = hash ( 'sha256' , $pass1);
  $salt = hash('sha256', time());
  $readypass = hash ( 'sha256' , $salt."--".$encrypass);
*/
  $fullpass = $encrypass. "--" .$resultsalt;
//  echo $fullpass ."<br>";
  $dbpass = $resultpass. "--" .$resultsalt;
//  echo $dbpass ."<br>";
  if(hash('sha256', $fullpass) == hash('sha256' , $dbpass))
  {
    session_start();
    $_SESSION['userid'] = $resultid;
//    echo $_SESSION['userid'];
    header('Location:managelist.php');
  }
  else
  {
    header('Location:index.php');
  }

?>