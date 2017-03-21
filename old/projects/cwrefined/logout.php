<?php
  session_save_path("/tmp");
  require 'database.php';
  $db = new Database();
  session_start();
  session_destroy();
  echo $_SESSION['userid'];
  header('Location:index.php');
?>