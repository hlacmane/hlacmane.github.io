<?php
  require 'database.php';
  $db = new Database();
  session_save_path("/tmp");
  session_start();
  $uid = $_SESSION['userid'];
  echo $uid. "uid <br>";
  $title = $_POST['title'];
  echo $title. "<br>";
  $firstname = $_POST['firstname'];
  echo $firstname. "<br>";
  $lastname = $_POST['lastname'];
  echo $lastname. "<br>";

  $stmt = $db->prepare("UPDATE users SET firstname=:fname lastname=:lname title=:title WHERE userid=:uid1");
echo "bla0<br>";
  $stmt->bindValue(':fname', $firstname, SQLITE3_TEXT);
echo "bla1<br>";
  $stmt->bindValue(':lname', $lastname, SQLITE3_TEXT);
echo "bla2<br>";
  $stmt->bindValue(':title', $title, SQLITE3_TEXT);
echo "bla3<br>";
  $stmt->bindValue(':uid1', $uid, SQLITE3_INTEGER);
echo "bla4<br>";
  $res1 = $stmt->execute();

  header('Location:home.php');
?>

