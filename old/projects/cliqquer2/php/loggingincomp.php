<?php
  require '../sqlconnect.php';
  
  $email = $mysqli->real_escape_string($_POST['email']);
  
  $password = $_POST['pass'];
  $encrypass = hash ( 'sha256' , $password);
  
  //SELECT `companyid`, `password`, `salt` FROM `companyDetails` WHERE 1
  //SELECT `companyid`, `password`, `salt` FROM `companyDetails` WHERE `email`=?
  $stmt = $mysqli->prepare("SELECT `companyid`, `companyName`, `password`, `salt` FROM `companyDetails` WHERE `email`=?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($resultid, $resultcompname, $resultpass, $resultsalt);
  $stmt->fetch();
  $stmt->close();
  
  
  $fullpass = $encrypass. "--" .$resultsalt;
  $dbpass = $resultpass. "--" .$resultsalt;
  if(hash('sha256', $fullpass) == hash('sha256' , $dbpass))
  {
    session_start();
    $_SESSION['compid'] = $resultid;
    $_SESSION['compname'] = $resultcompname;
//    echo $_SESSION['userid'];
    header('Location:dashboardtemp2.php');
  }
  else
  {
    header('Location: ../index.php');
  }
?>