<?php
  require '../sqlconnect.php';
  
  $email = $mysqli->real_escape_string($_POST['email']);
  
  $password = $_POST['pass'];
  $encrypass = hash ( 'sha256' , $password);
  
  //SELECT `candidateid`, `password`, `salt` FROM `candidateDetails` WHERE 1
  //SELECT `candidateid`, `password`, `salt` FROM `candidateDetails` WHERE `email`=?
  $stmt = $mysqli->prepare("SELECT `candidateid`, `password`, `salt` FROM `candidateDetails` WHERE `email`=?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($resultid, $resultpass, $resultsalt);
  $stmt->fetch();
  
  
  $fullpass = $encrypass. "--" .$resultsalt;
  $dbpass = $resultpass. "--" .$resultsalt;
  if(hash('sha256', $fullpass) == hash('sha256' , $dbpass))
  {
    session_start();
    $_SESSION['candid'] = $resultid;
//    echo $_SESSION['userid'];
    header('Location:dashboardtemp.php');
  }
  else
  {
    header('Location: ../index.php');
  }
?>