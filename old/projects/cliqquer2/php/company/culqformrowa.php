<?php
//echo 'pls';
/*if($_POST['qid'])
{
  echo "check1";
}
else
{
  echo "check2";
}*/
  require '../../sqlconnect.php';
  session_start();
  $divtopost = '<div class="formRowLeftSide"><label class="cjobLabel">Select desired culture Q ANS: </label></div>';
  $divtopost .= '<div class="formRowRightSide">';
    $divtopost .= '<select class="cJobCQA" id="cJobCultAnsSelect1a" name="cultQ" required>;';

        //$postedqid = $mysqli->real_escape_string($_POST['qid']);
        $postedqid = $_POST['qid'];
        //echo $_SESSION['compid'];
        
        //echo $_POST['qid'];
        $stmt1 = $mysqli->prepare("SELECT `answerID`, `QID`, `ANO`, `answer` FROM `cultureQAnswers` WHERE `QID`=?");
        //bind param
        $stmt1->bind_param("i", $postedqid);
        $stmt1->execute();
        $stmt1->bind_result($resultCQAID, $resultCAQID, $resultANO, $resultAnswer);
        //while fetch
        $divtopost .= '<option class="cJobSalaryOpts" disabled selected value> -- select an option -- </option>';
        while ($stmt1->fetch())
        {
          $divtopost .= '<option class="cultQOpts" value="'.$resultCQAID.'">'. $resultAnswer .'</option>';
        }
        $stmt1->close();

    $divtopost .= '</select></div>';
  echo $divtopost;
?>