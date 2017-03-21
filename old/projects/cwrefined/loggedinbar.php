<?php 
  $accbarid = $_SESSION['userid'];
  $stmt = $db->prepare("SELECT * from users WHERE userid=:accbarid");
  $stmt->bindValue(":accbarid", $accbarid , SQLITE3_TEXT);
  $results = $stmt->execute();
  $userrow = $results->fetchArray();
  $accbaruser = $userrow['username'];
  $accbarname1 = $userrow['firstname'];
  $accbarname2 = $userrow['lastname'];
  echo 'You are logged in as: '.htmlspecialchars($accbaruser).' ( '.htmlspecialchars($accbarname1). ' ' .htmlspecialchars($accbarname2).' ) ';

?>

<a href="settings.php">Settings</a> 
<a href="logout.php">Logout</a>
