<?php
  //session_save_path("/tmp");
  //require 'database.php';
  //$db = new Database();
  /*$mysqli = new mysqli("localhost", "todoReg", "register01", "todoNew");

  /* check connection */
  require 'sqlconnect.php';
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }
  
  session_start();
  echo $_SESSION['userid'];
  //echo "lvl1<br>";

  $theuserid = $_SESSION['userid']; 
  echo $theuserid;

  if(!isset($_SESSION['userid']))
  {
    header('Location:index.php');
    //echo "fail";
  }
?>