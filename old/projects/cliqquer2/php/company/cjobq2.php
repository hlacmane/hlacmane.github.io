<?php
  require '../../sqlconnect.php';
  session_start();
  $countarr = count($_POST);
  
  //$divtosend = '<div class="formRow" id="q">';
      $divtosend = '<div class="formRowLeftSide"><label class="cjobLabel">Select a culture Q: </label></div>';
      $divtosend .= '<div class="formRowRightSide">';
      $divtosend .= '<select class="cJobCQ" id="cJobCultSelect2" name="cultQ2" required>';
  echo 'thisiscountarr'.$countarr;
  switch ($countarr)
  {
    case 1: echo "bigchek";
      $usedqid1 = $_POST['qid1'];
      
      $stmt = $mysqli->prepare("SELECT `cqid`, `category`, `question`, `countofans` FROM `cultureQuestions` WHERE (`type`='Competency') AND (`cqid`<>?)");
      //bind param
      $stmt->bind_param("i", $usedqid1);

      break;
      
    case 2: echo "bigchek2";
      $usedqid1 = $_POST['qid1'];
      $usedqid2 = $_POST['qid2'];
      
      $stmt = $mysqli->prepare("SELECT `cqid`, `category`, `question`, `countofans` FROM `cultureQuestions` WHERE (`type`='Competency') AND (`cqid`<>?) AND (`cqid`<>?)");
      //bind param
      $stmt->bind_param("ii", $usedqid1, $usedqid2);

      break;
      
    case 3: echo "bigchek3";
      $usedqid1 = $_POST['qid1'];
      $usedqid2 = $_POST['qid2'];
      $usedqid3 = $_POST['qid3'];
      
      $stmt = $mysqli->prepare("SELECT `cqid`, `category`, `question`, `countofans` FROM `cultureQuestions` WHERE (`type`='Competency') AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?)");
      //bind param
      $stmt->bind_param("iii", $usedqid1, $usedqid2, $usedqid3);

      break;
      
    case 4: echo "bigchek4";
      $usedqid1 = $_POST['qid1'];
      $usedqid2 = $_POST['qid2'];
      $usedqid3 = $_POST['qid3'];
      $usedqid4 = $_POST['qid4'];
      
      $stmt = $mysqli->prepare("SELECT `cqid`, `category`, `question`, `countofans` FROM `cultureQuestions` WHERE (`type`='Competency') AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?)");
      //bind param
      $stmt->bind_param("iiii", $usedqid1, $usedqid2, $usedqid3, $usedqid4);

      break;
    case 5: echo "bigchek5";
      $usedqid1 = $_POST['qid1'];
      $usedqid2 = $_POST['qid2'];
      $usedqid3 = $_POST['qid3'];
      $usedqid4 = $_POST['qid4'];
      $usedqid5 = $_POST['qid5'];
      
      $stmt = $mysqli->prepare("SELECT `cqid`, `category`, `question`, `countofans` FROM `cultureQuestions` WHERE (`type`='SelfBla') AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?)");
      //bind param
      $stmt->bind_param("iiiii", $usedqid1, $usedqid2, $usedqid3, $usedqid4, $usedqid5);
      
      break;
    case 6: echo "bigchek6";
      $usedqid1 = $_POST['qid1'];
      $usedqid2 = $_POST['qid2'];
      $usedqid3 = $_POST['qid3'];
      $usedqid4 = $_POST['qid4'];
      $usedqid5 = $_POST['qid5'];
      $usedqid6 = $_POST['qid6'];
      
      $stmt = $mysqli->prepare("SELECT `cqid`, `category`, `question`, `countofans` FROM `cultureQuestions` WHERE (`type`='SelfBla') AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?)");
      //bind param
      $stmt->bind_param("iiiiii", $usedqid1, $usedqid2, $usedqid3, $usedqid4, $usedqid5, $usedqid6);
      
      break;
    case 7: echo "bigchek7";
      $usedqid1 = $_POST['qid1'];
      $usedqid2 = $_POST['qid2'];
      $usedqid3 = $_POST['qid3'];
      $usedqid4 = $_POST['qid4'];
      $usedqid5 = $_POST['qid5'];
      $usedqid6 = $_POST['qid6'];
      $usedqid7 = $_POST['qid7'];
      
      $stmt = $mysqli->prepare("SELECT `cqid`, `category`, `question`, `countofans` FROM `cultureQuestions` WHERE (`type`='SelfBla') AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?)");
      //bind param
      $stmt->bind_param("iiiiiii", $usedqid1, $usedqid2, $usedqid3, $usedqid4, $usedqid5, $usedqid6, $usedqid7);
      
      break;
    case 8: echo "bigchek8";
      $usedqid1 = $_POST['qid1'];
      $usedqid2 = $_POST['qid2'];
      $usedqid3 = $_POST['qid3'];
      $usedqid4 = $_POST['qid4'];
      $usedqid5 = $_POST['qid5'];
      $usedqid6 = $_POST['qid6'];
      $usedqid7 = $_POST['qid7'];
      $usedqid8 = $_POST['qid8'];
      
      $stmt = $mysqli->prepare("SELECT `cqid`, `category`, `question`, `countofans` FROM `cultureQuestions` WHERE (`type`='SelfBla') AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?)");
      //bind param
      $stmt->bind_param("iiiiiiii", $usedqid1, $usedqid2, $usedqid3, $usedqid4, $usedqid5, $usedqid6, $usedqid7, $usedqid8);
      
      break;
    case 9: echo "bigchek9";
      $usedqid1 = $_POST['qid1'];
      $usedqid2 = $_POST['qid2'];
      $usedqid3 = $_POST['qid3'];
      $usedqid4 = $_POST['qid4'];
      $usedqid5 = $_POST['qid5'];
      $usedqid6 = $_POST['qid6'];
      $usedqid7 = $_POST['qid7'];
      $usedqid8 = $_POST['qid8'];
      $usedqid9 = $_POST['qid9'];
      
      $stmt = $mysqli->prepare("SELECT `cqid`, `category`, `question`, `countofans` FROM `cultureQuestions` WHERE (`type`='SelfBla') AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?) AND (`cqid`<>?)");
      //bind param
      $stmt->bind_param("iiiiiiiii", $usedqid1, $usedqid2, $usedqid3, $usedqid4, $usedqid5, $usedqid6, $usedqid7, $usedqid8, $usedqid9);
      
      break;
  }
  
  $stmt->execute();
  $stmt->bind_result($resultCQID, $resultCateg, $resultQuestion, $resultCofA);
  //while fetch
  $divtosend .= '<option class="cultQOpts" disabled selected value> -- select an option -- </option>';
  while ($stmt->fetch())
  {
    $divtosend .= '<option class="cultQOpts" value="'.$resultCQID.'">'. $resultQuestion .'</option>';
  }
  $stmt->close();
  $divtosend .= '</select></div>';
  echo $divtosend;

?>