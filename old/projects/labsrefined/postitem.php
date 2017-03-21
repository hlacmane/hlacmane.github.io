<?php
    session_start();
    require "sqlconnect.php";
    $theuserid = $mysqli->real_escape_string($_SESSION['userid']);
//    echo $theuserid. "<br>";
    $listid = $mysqli->real_escape_string($_POST['listid']);
    $item1 = $mysqli->real_escape_string($_POST['list_item_1']);
//    echo $item1. "<br>";
//    echo $listid. "<br>";
    $done = $mysqli->real_escape_string("no");
    /*
    $stmt2 = $db->prepare("INSERT INTO listitems VALUES(:n1, :theuserid1, :n2, :listid, :item1, :done, Datetime('now'));");
    echo "0 <br>";
    $stmt2->bindValue(':n1', NULL, SQLITE3_NULL);
    echo "1 <br>";
    $stmt2->bindValue(':theuserid1', $theuserid, SQLITE3_INTEGER);
    echo "2 <br>";
    $stmt2->bindValue(':n2', NULL, SQLITE3_NULL);
    echo "3 <br>";
    $stmt2->bindValue(':listid', $listid, SQLITE3_INTEGER);
    echo "4 <br>";
    $stmt2->bindValue(':item1', $item1, SQLITE3_TEXT);
    echo "5 <br>";
    $stmt2->bindValue(':done', $done, SQLITE3_TEXT);
    echo "6 <br>";
    $results2 = $stmt2->execute();
    echo "7 <br>";
    */
    
    //INSERT INTO `listitems`(`userid`, `listid`, `itemtext`, `doneornot`) VALUES ([value-2],[value-4],[value-5],[value-6])
    $stmt = $mysqli->prepare("INSERT INTO `listitems`(`userid`, `listid`, `itemtext`, `doneornot`) VALUES (?,?,?,?)");
    $stmt->bind_param($theuserid, $listid, $item1, $done);
    $stmt->execute();
    $stmt->close();
    header('Location:pageoflist.php');
?>