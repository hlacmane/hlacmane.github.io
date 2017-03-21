<?php
  $mysqli = new mysqli("localhost", "Moderator1", "hamish123", "Cliqquer2Beta1");
//localhost, user, pass, db
  /* check connection */
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }
?>