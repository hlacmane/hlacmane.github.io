<?php
  require "sqlconnect.php";
  session_start();
//  echo "ham1<br>";
  $listname = $mysqli->real_escape_string($_POST['the_new_list']);
//  echo $listname. "<br>";
  $priority = $mysqli->real_escape_string($_POST['priolist']);
//  echo $priority. "<br>";
  $category = $mysqli->real_escape_string($_POST['categlist']);
//  echo $category. "<br>";
  $theuserid = $mysqli->real_escape_string($_SESSION['userid']);
//  echo $theuserid. "<br>";
  //add list name ot list tables and lsit items to list items table
  /*
  $stmt1 = $db->prepare("INSERT INTO lists VALUES(:n1, :theuserid, :n2, :listname, :priority, :category, Datetime('now'));");
  $stmt1->bindValue(':n1', NULL, SQLITE3_NULL);
  $stmt1->bindValue(':n2', NULL, SQLITE3_NULL);
  $stmt1->bindValue(':theuserid', $theuserid, SQLITE3_INTEGER);
  $stmt1->bindValue(':listname', $listname, SQLITE3_TEXT);
  $stmt1->bindValue(':priority', $priority, SQLITE3_TEXT);
  $stmt1->bindValue(':category', $category, SQLITE3_TEXT);
  $results1 = $stmt1->execute();
  */
  
  /*
  INSERT INTO `lists`( `userid`, `listname`, `priority`, `listcategory`) VALUES ([value-2],[value-4],[value-5],[value-6])
  */
  
  $stmt1 = $mysqli->prepare("INSERT INTO `lists`( `userid`, `listname`, `priority`, `listcategory`) VALUES (?,?,?,?)");
//  echo "1 <br>";  
  $stmt1->bind_param("isss", $theuserid, $listname, $priority, $category);
  $stmt1->execute();
  
  $stmt1->close();
  //list id, user id, share suerid, name fo lsit, priority, category, lastedited
  //$db->exec("INSERT INTO lists VALUES(NULL, '$theuserid', NULL, '$listname', '$priority', '$category', Datetime('now'));");
    
/*
    $newlistid = $db->prepare("SELECT listid from lists WHERE listname=:listname1");
    $newlistid->bindValue(':listname1', $listname, SQLITE3_TEXT);
    echo "2 <br>";
    $results2 = $newlistid->execute();

    echo "3 <br>";
    $item1 = $_POST['list_item_1'];
    echo $item1. "<br>";
    $newlistid1 = $results2->fetchArray();

    //var_dump($newlistid1);

    echo $newlistid1['listid']. "<br>";
    $newlistid2 = $newlistid1['listid'];
    echo $newlistid2. "<br>";
*/


//SELECT `listid` FROM `lists` WHERE 1
  $stmt2 = $mysqli->prepare("SELECT `listid` FROM `lists` WHERE userid=? AND listname=?");
  $stmt2->bind_param("is", $theuserid, $listname);
  $stmt2->execute();
  $stmt2->bind_result($newlistid);
  $stmt2->fetch();
  $stmt2->close();
//  echo $newlistid ."idpls<br>";
  
  $item1 = $mysqli->real_escape_string($_POST['list_item_1']);
//  echo $item1. "<br>";
//
//

  /*
  $done = "no";
  $stmt2 = $db->prepare("INSERT INTO listitems VALUES(:n3, :theuserid1, :n4, :newlistid1, :item1, :done, Datetime('now'));");
  $stmt1->bindValue(':n3', NULL, SQLITE3_NULL);
  $stmt1->bindValue(':n4', NULL, SQLITE3_NULL);
  $stmt2->bindValue(':theuserid1', $theuserid, SQLITE3_INTEGER);
  $stmt2->bindValue(':newlistid1', $newlistid2, SQLITE3_INTEGER);
  $stmt2->bindValue(':item1', $item1, SQLITE3_TEXT);
  $stmt2->bindValue(':done', $done, SQLITE3_TEXT);
  $results2 = $stmt2->execute();
  echo "4 <br>";
  */
  
  //$db->exec("INSERT INTO listitems VALUES(NULL, '$theuserid', NULL, " . $newlistid1['listid'] . ", '$item1', 0, Datetime('now'));");
  //listitemid, userid, shareduserid, listid, itemtext, doneornotdone, lastediteditem

/*
INSERT INTO `listitems`(`listitemid`, `userid`, `shareduserid`, `listid`, `itemtext`, `doneornot`, `lastediteditem`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])

INSERT INTO `listitems`( `userid`, `listid`, `itemtext`, `doneornot`) VALUES ([value-2],[value-4],[value-5],[value-6])
*/
//echo "here1";
//echo $newlistid."<br>";
  $done = $mysqli->real_escape_string("no");
  $stmt3 = $mysqli->prepare("INSERT INTO `listitems`( `userid`, `listid`, `itemtext`, `doneornot`) VALUES (?,?,?,?)");
  $stmt3->bind_param("iiss", $theuserid, $newlistid, $item1, $done);
  $stmt3->execute();
  $stmt3->close();
//  echo "here2";
  $mysqli->close();
  header("Location:managelist.php");
?>