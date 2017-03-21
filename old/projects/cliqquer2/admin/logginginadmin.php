<?php
  require '../sqlconnect.php';
  
  $email = $mysqli->real_escape_string($_POST['email']);
  
  $password = $_POST['pass'];
  $encrypass = hash ( 'sha256' , $password);
  
  //SELECT `adminid`, `email`, `fname`, `lname`, `pass`, `salt`, `datecreated` FROM `admins` WHERE 1
  //SELECT `adminid`, `pass`, `salt` FROM `admins` WHERE (`email`=?)
  $stmt = $mysqli->prepare("SELECT `adminid`, `pass`, `salt` FROM `admins` WHERE (`email`=?)");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($resultid, $resultpass, $resultsalt);
  $stmt->fetch();
  
  
  $fullpass = $encrypass. "--" .$resultsalt;
  $dbpass = $resultpass. "--" .$resultsalt;
  if(hash('sha256', $fullpass) == hash('sha256' , $dbpass))
  {
    session_start();
    $_SESSION['adminid'] = $resultid;
    //echo $_SESSION['adminid'];
    header('Location:adminmain.php');
  }
  else
  {
    header('Location: index.php');
  }
?>