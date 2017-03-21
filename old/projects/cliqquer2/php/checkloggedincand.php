<?php
  /* check connection */
  require '../sqlconnect.php';
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }
  
  session_start();
  //echo $_SESSION['candid'];
  //echo "lvl1<br>";

  $theuserid = $_SESSION['candid']; 
  //echo $theuserid;

  if(!isset($_SESSION['candid']))
  {
    header('Location: ../index.php');
    //echo "fail";
  }
  
?>