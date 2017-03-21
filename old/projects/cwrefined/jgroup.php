<?php
  session_save_path("/tmp");
  session_start();
  require 'database.php';
  $db = new Database();

  $uid = $_SESSION['userid'];
  $gname1 = $_POST['joingname'];
  echo $gname1;
  echo "<br>";
  $gpass1 = $_POST['gpass1'];
  echo $gpass1;
  echo "<br>";
  $gpass2 = $_POST['gpass2'];
  echo $gpass2;
  echo "<br>";
  
  if ($gpass1 != $gpass2)
  {
    header('Location:home.php');
  }

  $encpass = sha1($gpass1);
  echo $encpass;
  echo "<br>";

  $row = $db->prepare("SELECT * FROM bgroups WHERE groupname=:gname1");
  echo "1 <br>";
  $row->bindValue(':gname1', $gname1, SQLITE3_TEXT);
  echo "2 <br>";
  $results = $row->execute();
  echo "3 <br>";
  $results1 = $results->fetchArray();
  echo "4 <br>";
  echo "swag1 " .$encpass. "<br>";
  echo "swag2 " .$results1['gsalt']. "<br>";
  echo "swag3 " .$results1['gpass']. "<br>";
  echo "swag4 " .$results1['gsalt']. "<br>";
  echo sha1($encpass. "--" .$results1['gsalt'])." swag5 <br>";
  echo sha1($results1['gpass']. "--" .$results1['gsalt'])." swag6 <br>";


  if(sha1($encpass. "--" .$results1['gsalt']) == sha1($results1['gpass']. "--" .$results1['gsalt']))
  {
  echo "5 <br>";
    $gid1 = $results1['groupid'];
  echo "6 <br>";
    $gsize1 = $results1['groupsize'];
    echo $gsize1. "swaghereagain<br>";
    $gsize1 += 1;
    echo $gsize1. "swaghere<br>";
  echo "7 <br>";
//get group id
    $stmt = $db->prepare("SELECT * from users WHERE userid= :theuserid");
  echo "8 <br>";
  echo $uid. "bam<br> ";
    $stmt->bindValue(':theuserid', $uid, SQLITE3_INTEGER);
  echo "9 <br>";
    $res1 = $stmt->execute();
  echo "10 <br>";
    $res2 = $res1->fetchArray();
  echo "11 <br>";
    $uname = $res2['username'];
  echo "12 <br>";
//inert user into group
    $stmt1 = $db->prepare("INSERT into utog VALUES(:uid1, :uname1, :gid1, :gname1);");
  echo "13 <br>";
    $stmt1->bindValue(':uid1', $uid, SQLITE3_INTEGER);
  echo "14 <br>";
    $stmt1->bindValue(':uname1', $uname, SQLITE3_TEXT);
  echo "15 <br>";
    $stmt1->bindValue(':gid1', $gid1, SQLITE3_INTEGER);
  echo "16 <br>";
    $stmt1->bindValue(':gname1', $gname1, SQLITE3_TEXT);
  echo "17 <br>";
    $res3 = $stmt1->execute();

//update after insert
  echo "18 <br>";
    $stmt3 = $db->prepare("UPDATE bgroups SET groupsize=:gsize1 WHERE groupid=:gid2");
  echo "19 <br>";
    $stmt3->bindValue(':gsize1', $gsize1, SQLITE3_INTEGER);
    $stmt3->bindValue(':gid2', $gid1, SQLITE3_INTEGER);
  echo "20 <br>";
    $res4 = $stmt3->execute();
  echo "21 <br>";
    header('Location:home.php');
  }
  else
  {
    echo "swag";
    header('Location:home.php');
  }
?>