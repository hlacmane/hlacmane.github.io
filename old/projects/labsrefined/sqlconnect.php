<?php
  $mysqli = new mysqli("localhost", "todoReg", "register01", "todoNew");

  /* check connection */
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }
?>