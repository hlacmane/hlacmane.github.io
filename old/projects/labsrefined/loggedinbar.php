<?php 
  $accbarid = $_SESSION['userid'];

  $stmt = $mysqli->prepare("SELECT `username`,`firstname`,`lastname`,`title` from `users` WHERE (`userid`=?)");
  $stmt->bind_param("i", $accbarid);
  $stmt->execute();
  $stmt->bind_result($resultuname, $resultfname, $resultlname, $resulttitle);
  $stmt->fetch();
  $stmt->close();

  echo 'You are logged in as: '.$resultuname.' ( '.$resulttitle. ' '.$resultfname. ' ' .$resultlname.' ) ';
?>
<a href="settings.php">Settings</a> <a href="logout.php">Logout</a>


