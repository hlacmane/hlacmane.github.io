<?php
  session_save_path("/tmp");
  require 'database.php';
  $db = new Database();
  session_start();
//   echo $_SESSION['userid'];
//   echo "<br>";

  $theuserid = $_SESSION['userid']; 
//   echo $theuserid;
  if(!isset($_SESSION['userid']))
  {
    header('Location:index.php');
    echo "fail";
  }
?>