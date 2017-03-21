<?php
  require 'database.php';
  $db = new Database();
  session_save_path("/tmp");
  session_start();

  $userid = $_SESSION['userid'];
  echo $userid. "<br>";
  $bname = $_POST['the_new_bill'];
  echo $bname. "<br>";
  $gid = $_POST['gid'];
  echo $gid. "<br>";
  $bcateg = $_POST['bcateg'];
  echo $bcateg. "<br>";
  $totalcost1 = $_POST['totalcost'];
  echo $totalcost1. "<br>";
  $duedate = $_POST['duedate'];
  echo $duedate. "<br>";

  $paid="no";
  //prevent dup bills
  $stmt4 = $db->prepare("SELECT * FROM bills WHERE billname=:bname1");
  $stmt4->bindValue(':bname1', $bname, SQLITE3_TEXT);
  $res5 = $stmt4->execute();
  $res6 = $res5->fetchArray();
  if ($res6['billname'] == $bname)
  {
    echo "stop trygin to insert dups dipshit <br>";
    header('Location:pageofgroup.php');
  }
  $totalcost = ($totalcost1*100);

//insert into bills
  $stmt1 = $db->prepare("INSERT INTO bills VALUES(:n1, :bname, :tcost, :ownerid, :gid, :paid, :categ, Datetime('now'), Datetime('now'), :due);");
  $stmt1->bindValue(':n1', NULL, SQLITE3_NULL);
  $stmt1->bindValue(':bname', $bname, SQLITE3_TEXT);
  $stmt1->bindValue(':tcost', $totalcost, SQLITE3_INTEGER);
  $stmt1->bindValue(':ownerid', $userid, SQLITE3_INTEGER);
  $stmt1->bindValue(':gid', $gid, SQLITE3_INTEGER);
  $stmt1->bindValue(':paid', $paid, SQLITE3_TEXT);
  $stmt1->bindValue(':categ', $bcateg, SQLITE3_TEXT);
  $stmt1->bindValue(':due', $duedate, SQLITE3_TEXT);
  $res1 = $stmt1->execute();

//bills(billid integer, billname varchar(30), totalcost double, ownerid integer, groupid integer, 
//paid varchar(3), categ varchar(20), created datetime, lastedited datetime, due datetime);
  $stmt3 = $db->prepare("SELECT * FROM bgroups WHERE groupid=:gid1");
  $stmt3->bindValue(':gid1', $gid, SQLITE3_INTEGER);
  $res2 = $stmt3->execute();
  $res3 = $res2->fetchArray();
  $gsize = $res3['groupsize'];


  $ecost = ($totalcost/$gsize);
  echo $ecost. "<br>";
  echo $gsize. " size<br>";

  $stmt5 = $db->prepare("SELECT * FROM bills WHERE billname=:bname1");
  $stmt5->bindValue(':bname1', $bname, SQLITE3_TEXT);
  $res7 = $stmt5->execute();
  $res8 = $res7->fetchArray();
  $bid1 = $res8['billid'];


//get g size, from groups tabel, then use to get each cost.
//utob
  $stmt2 = $db->prepare("INSERT INTO utob VALUES(:uid1, :bid1, :eachcost, :paid1);");
  $stmt2->bindValue(':uid1', $userid, SQLITE3_INTEGER);
  $stmt2->bindValue('bid1', $bid1, SQLITE3_INTEGER);
  $stmt2->bindValue(':eachcost', $ecost, SQLITE3_INTEGER);
  $stmt2->bindValue(':paid1', $paid, SQLITE3_TEXT);
  $res4 = $stmt2->execute();
//utob(userid integer, billid integer, eachcost double, paid varchar(3));

  header('Location:pageofgroup.php');

?>

