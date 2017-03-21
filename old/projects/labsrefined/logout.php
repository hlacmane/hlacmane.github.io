<?php
  session_start();
  session_unset();
  session_destroy();
  //echo $_SESSION['userid'];
  //$mysqli->close();
  header('Location:index.php');
  die();
  
?>