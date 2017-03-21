<?php
  /* check connection */
  require '../sqlconnect.php';
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }
  
  session_start();
  //echo $_SESSION['adminid'];
  //echo "lvl1<br>";

  $theadminid = $_SESSION['adminid']; 
  //echo $theadminid;

  if(!isset($_SESSION['adminid']))
  {
    header('Location: index.php');
    echo "fail";
  }
  
?>