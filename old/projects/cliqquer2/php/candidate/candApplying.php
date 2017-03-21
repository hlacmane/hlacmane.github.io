<?php
  require '../../sqlconnect.php';
  session_start();
  
  $receivedJID = $_POST['cultQJobID'];
  $receivedJCompID = $_POST['cultQJobCompID'];
  $candid = $_SESSION['candid'];
  //qno to qid matching
  $qid1 = $_POST['cultQNOtoID1'];
  $qid2 = $_POST['cultQNOtoID2'];
  $qid3 = $_POST['cultQNOtoID3'];
  $qid4 = $_POST['cultQNOtoID4'];
  $qid5 = $_POST['cultQNOtoID5'];
  $qid6 = $_POST['cultQNOtoID6'];
  $qid7 = $_POST['cultQNOtoID7'];
  $qid8 = $_POST['cultQNOtoID8'];
  $qid9 = $_POST['cultQNOtoID9'];
  $qid10 = $_POST['cultQNOtoID10'];
  //echo $qid10.'qid10<br>';
  //expect ans
  $expAID1 = $_POST['cultANOtoID1'];
  $expAID2 = $_POST['cultANOtoID2'];
  $expAID3 = $_POST['cultANOtoID3'];
  $expAID4 = $_POST['cultANOtoID4'];
  $expAID5 = $_POST['cultANOtoID5'];
  $expAID6 = $_POST['cultANOtoID6'];
  $expAID7 = $_POST['cultANOtoID7'];
  $expAID8 = $_POST['cultANOtoID8'];
  $expAID9 = $_POST['cultANOtoID9'];
  $expAID10 = $_POST['cultANOtoID10'];
  //echo $expAID10.'expAID10<br>';
  //for selected values
  $qaid1 = $_POST['candQ1'];
  $qaid2 = $_POST['candQ2'];
  $qaid3 = $_POST['candQ3'];
  $qaid4 = $_POST['candQ4'];
  $qaid5 = $_POST['candQ5'];
  $qaid6 = $_POST['candQ6'];
  $qaid7 = $_POST['candQ7'];
  $qaid8 = $_POST['candQ8'];
  $qaid9 = $_POST['candQ9'];
  $qaid10 = $_POST['candQ10'];
  //echo $qaid10.'qaid10<br>';
  
  
  $cultMatchVal = 0;
  $AIDMatch1 = 0;
  $AIDMatch2 = 0;
  $AIDMatch3 = 0;
  $AIDMatch4 = 0;
  $AIDMatch5 = 0;
  $AIDMatch6 = 0;
  $AIDMatch7 = 0;
  $AIDMatch8 = 0;
  $AIDMatch9 = 0;
  $AIDMatch10 = 0;
  
  if ($expAID1 == $qaid1)
  {
    $cultMatchVal += 10;
    $AIDMatch1 = 1;
  }
  if ($expAID2 == $qaid2)
  {
    $cultMatchVal += 10;
    $AIDMatch2 = 1;
  }
  if ($expAID3 == $qaid3)
  {
    $cultMatchVal += 10;
    $AIDMatch3 = 1;
  }
  if ($expAID4 == $qaid4)
  {
    $cultMatchVal += 10;
    $AIDMatch4 = 1;
  }
  if ($expAID5 == $qaid5)
  {
    $cultMatchVal += 10;
    $AIDMatch5 = 1;
  }
  if ($expAID6 == $qaid6)
  {
    $cultMatchVal += 10;
    $AIDMatch6 = 1;
  }
  if ($expAID7 == $qaid7)
  {
    $cultMatchVal += 10;
    $AIDMatch7 = 1;
  }
  if ($expAID8 == $qaid8)
  {
    $cultMatchVal += 10;
    $AIDMatch8 = 1;
  }
  if ($expAID9 == $qaid9)
  {
    $cultMatchVal += 10;
    $AIDMatch9 = 1;
  }
  if ($expAID10 == $qaid10)
  {
    $cultMatchVal += 10;
    $AIDMatch10 = 1;
  }
  //echo $cultMatchVal.'finalpercent<br>';
  
  //INSERT INTO `applicants`(`jobID`, `candID`, `compID`, `cultureMatch`, `QID1`, `AID1`, `AID1Match`, `QID2`, `AID2`, `AID2Match`, `QID3`, `AID3`, `AID3Match`, `QID4`, `AID4`, `AID4Match`, `QID5`, `AID5`, `AID5Match`, `QID6`, `AID6`, `AID6Match`, `QID7`, `AID7`, `AID7Match`, `QID8`, `AID8`, `AID8Match`, `QID9`, `AID9`, `AID9Match`, `QID10`, `AID10`, `AID10Match`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18],[value-19],[value-20],[value-21],[value-22],[value-23],[value-24],[value-25],[value-26],[value-27],[value-28],[value-29],[value-30],[value-31],[value-32],[value-33],[value-34])
  //INSERT INTO `applicants`(`jobID`, `candID`, `compID`, `cultureMatch`, `QID1`, `AID1`, `AID1Match`, `QID2`, `AID2`, `AID2Match`, `QID3`, `AID3`, `AID3Match`, `QID4`, `AID4`, `AID4Match`, `QID5`, `AID5`, `AID5Match`, `QID6`, `AID6`, `AID6Match`, `QID7`, `AID7`, `AID7Match`, `QID8`, `AID8`, `AID8Match`, `QID9`, `AID9`, `AID9Match`, `QID10`, `AID10`, `AID10Match`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?)
  //34
  
  $stmt = $mysqli->prepare("INSERT INTO `applicants`(`jobID`, `candID`, `compID`, `cultureMatch`, `QID1`, `AID1`, `AID1Match`, `QID2`, `AID2`, `AID2Match`, `QID3`, `AID3`, `AID3Match`, `QID4`, `AID4`, `AID4Match`, `QID5`, `AID5`, `AID5Match`, `QID6`, `AID6`, `AID6Match`, `QID7`, `AID7`, `AID7Match`, `QID8`, `AID8`, `AID8Match`, `QID9`, `AID9`, `AID9Match`, `QID10`, `AID10`, `AID10Match`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?)");
  //"iiidi iiiii iiiii iiiii iiiii iiiii iiii"
  $stmt->bind_param("iiidiiiiiiiiiiiiiiiiiiiiiiiiiiiiii", $receivedJID, $candid, $receivedJCompID, $cultMatchVal, $qid1, $qaid1, $AIDMatch1, $qid2, $qaid2, $AIDMatch2, $qid3, $qaid3, $AIDMatch3, $qid4, $qaid4, $AIDMatch4, $qid5, $qaid5, $AIDMatch5, $qid6, $qaid6, $AIDMatch6, $qid7, $qaid7, $AIDMatch7, $qid8, $qaid8, $AIDMatch8, $qid9, $qaid9, $AIDMatch9, $qid10, $qaid10, $AIDMatch10);
  $stmt->execute();
  $stmt->close();
  
  $mysqli->close();
  $_SESSION['AppliedJID'] = $receivedJID;
  header('Location: candViewJob.php');
  //header('Location: candAllJobs.php');
  die();
?>