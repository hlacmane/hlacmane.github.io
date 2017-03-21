<?php
  /* check connection */
  require '../sqlconnect.php';
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }
  
  session_start();
  //echo $_SESSION['compid'];
  //echo "lvl1<br>";

  $thecompid = $_SESSION['compid']; 
  //echo $thecompid;

  if(!isset($_SESSION['compid']))
  {
    header('Location: ../index.php');
    //echo "fail";
  }
  
?>