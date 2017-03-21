<?php
  require 'database.php';
  $db = new Database();
  session_save_path("/tmp");
  session_start();

  $userid = $_SESSION['userid'];
  echo $userid. "<br>";
  $gname = $_POST['gname'];
  echo $gname. "<br>";
  $gpass1 = $_POST['gpass1'];
  echo $gpass1. "<br>";
  $gpass2 = $_POST['gpass2'];
  echo $gpass2. "<br>";

  if ($gpass1 != $gpass2)
  {
    echo "gpasses arent equal <br>";
    //header('Location:creategroup.php');
  }

  $gsalt = sha1(time());
  echo $gsalt. "<br>";
  $encrypass = sha1($gpass1);
  echo $encrypass. "<br>";

  $stmt1 = $db->prepare("SELECT * from users WHERE userid=:uid1");
  $stmt1->bindValue(':uid1', $userid, SQLITE3_INTEGER);
  $stmt2 = $stmt1->execute();
  $stmt3 = $stmt2->fetchArray();
  $username = $stmt3['username'];

  $stmt = $db->prepare("INSERT INTO bgroups VALUES(:n1, :gname, :gownerid, :gownername, :gsize, :gpass, :gsalt);");
  $stmt->bindValue(':n1', NULL, SQLITE3_NULL);			//null 1
  $stmt->bindValue(':gname', $gname, SQLITE3_TEXT);		//gname
//by default group size is 1 as they are the only suer till they add people
  $stmt->bindValue(':gownerid', $userid, SQLITE3_INTEGER);
  $stmt->bindValue(':gownername', $username, SQLITE3_TEXT);	//gownderid
  $defaultgsize = 1;
  $stmt->bindValue(':gsize', $defaultgsize, SQLITE3_INTEGER);	//gsize
  $stmt->bindValue(':gpass', $encrypass, SQLITE3_TEXT);		//gpass
  $stmt->bindValue(':gsalt', $gsalt, SQLITE3_TEXT);		//gsalt
  $results = $stmt->execute();
  echo "swag0 <br>";
//bgroups(groupid integer primary key, groupname varchar(30), gownername integer, groupsize integer, gpass varchar(255), gsalt varchar(255));

  $stmt4 = $db->prepare("SELECT * from bgroups WHERE groupname=:gname2");
  $stmt4->bindValue(':gname2', $gname, SQLITE3_TEXT);
  $stmt5 = $stmt4->execute();
  $stmt6 = $stmt5->fetchArray();
  $newgid = $stmt6['groupid'];
  $newgname = $stmt6['groupname'];

  $stmt7 = $db->prepare("INSERT INTO utog VALUES(:uid2, :uname1, :gid1, :gname1);");
  $stmt7->bindValue(':uid2', $userid, SQLITE3_INTEGER);
  $stmt7->bindValue(':uname1', $username, SQLITE3_TEXT);
  $stmt7->bindValue(':gid1', $newgid, SQLITE3_INTEGER);
  $stmt7->bindValue(':gname1', $newgname, SQLITE3_TEXT);
  $stmt8 = $stmt7->execute();
  header('Location:home.php');
//utog(uid, uname, gid, gname)
?>

