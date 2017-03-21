<?php
  include "../checkloggedincand.php";
?>
<!-- Template from Register page and reg nava dded -->
<!DOCTYPE html>

<html>

  <head>
    <?php include 'candheader.php'; ?>
    <title>Cliqquer 2.0 WIP cand view job</title>
    <?php 
      error_reporting(E_ALL);
      ini_set("display_errors", 1);
    ?>
  </head>  

  <body class="nav-on-header smart-nav">
    
    <!-- nav bar -->
    <?php include 'candpagestop.php'; ?>
    <!-- END of nav bar -->
    
    <!-- Page header -->
    <header class="page-header bg-img size-lg" id="FIXMEHEIGHTPLS" style="background-image: url(assets/img/bg-banner1.jpg)">
      <div class="container no-shadow">
        <h1 class="text-center">Clut Q's, FIX ME HEIGHT PLS</h1>
        <p class="lead text-center">nice desc pls.</p>
      </div>
    </header>
    <!-- END Page header -->
    <div class="container no-shadow" id="cand-ans-job-cult-qs">
    <div class="login-block" id="cand-ans-job-cult-qs">
    <img src="assets/img/logo.png" alt="">
    <h1>Culture Questions:</h1>
    
    <?php
          $theQHolderFinal1 = '';
          $theQHolderFinal2 = '';
          $theQHolderFinal3 = '';
          $theQHolderFinal4 = '';
          $theQHolderFinal5 = '';
          $theQHolderFinal6 = '';
          $theQHolderFinal7 = '';
          $theQHolderFinal8 = '';
          $theQHolderFinal9 = '';
          $theQHolderFinal10 = '';
          $answerSet1 = '';
          $answerSet2 = '';
          $answerSet3 = '';
          $answerSet4 = '';
          $answerSet5 = '';
          $answerSet6 = '';
          $answerSet7 = '';
          $answerSet8 = '';
          $answerSet9 = '';
          $answerSet10 = '';
          echo $_POST['hiddenInputJID'].'recievedJID<br>';
          //$receivedJID = $mysqli->real_escape_string($_POST['hiddenInputJID']);
          $receivedJID = $_POST['hiddenInputJID'];
          //take job title as well to say you are applying for bla
          
          //SELECT `jobID`, `companyID`, `QID1`, `AID1`, `QID2`, `AID2`, `QID3`, `AID3`, `QID4`, `AID4`, `QID5`, `AID5`, `QID6`, `AID6`, `QID7`, `AID7`, `QID8`, `AID8`, `QID9`, `AID9`, `QID10`, `AID10` FROM `jobPrefCulture` WHERE 1
          //SELECT `companyID`, `QID1`, `AID1`, `QID2`, `AID2`, `QID3`, `AID3`, `QID4`, `AID4`, `QID5`, `AID5`, `QID6`, `AID6`, `QID7`, `AID7`, `QID8`, `AID8`, `QID9`, `AID9`, `QID10`, `AID10` FROM `jobPrefCulture` WHERE (`jobID`=?)
          
          $stmt = $mysqli->prepare("SELECT `companyID`, `QID1`, `AID1`, `QID2`, `AID2`, `QID3`, `AID3`, `QID4`, `AID4`, `QID5`, `AID5`, `QID6`, `AID6`, `QID7`, `AID7`, `QID8`, `AID8`, `QID9`, `AID9`, `QID10`, `AID10` FROM `jobPrefCulture` WHERE (`jobID`=?)");
          $stmt->bind_param("i", $receivedJID);
          $stmt->execute();
          $stmt->bind_result($resultJCompID, $resultQID1, $resultAID1, $resultQID2, $resultAID2, $resultQID3, $resultAID3, $resultQID4, $resultAID4, $resultQID5, $resultAID5, $resultQID6, $resultAID6, $resultQID7, $resultAID7, $resultQID8, $resultAID8, $resultQID9, $resultAID9, $resultQID10, $resultAID10);
          $stmt->fetch();
          $stmt->close();
          echo $resultAID1 . 'aid1?<br>';
          
          //SELECT `cqid`, `type`, `category`, `question`, `countofans` FROM `cultureQuestions` WHERE 1
          //SELECT `type`, `category`, `question`, `countofans` FROM `cultureQuestions` WHERE (`cqid`=?) OR (`cqid`=?) OR (`cqid`=?) OR (`cqid`=?) OR (`cqid`=?) OR (`cqid`=?) OR (`cqid`=?) OR (`cqid`=?) OR (`cqid`=?) OR (`cqid`=?)
          $stmt1 = $mysqli->prepare("SELECT `question`, `countofans` FROM `cultureQuestions` WHERE (`cqid`=?) OR (`cqid`=?) OR (`cqid`=?) OR (`cqid`=?) OR (`cqid`=?) OR (`cqid`=?) OR (`cqid`=?) OR (`cqid`=?) OR (`cqid`=?) OR (`cqid`=?)");
          $stmt1->bind_param("iiiiiiiiii", $resultQID1, $resultQID2, $resultQID3, $resultQID4, $resultQID5, $resultQID6, $resultQID7, $resultQID8, $resultQID9, $resultQID10);
          $stmt1->execute();
          $testing1 = 1;
          $stmt1->bind_result($question, $countofans);
          while($stmt1->fetch())
          {
            //echo '<div class="banter" id="'.$testing1.'">'.$question.'</div>';
            switch ($testing1)
            {
              case 1: $swag=1;
                $cqid1 = $resultQID1;
                $theQ1 = $question;
                $cq1ACount = $countofans;
                $theQHolderFinal1 = questionSetUp($resultQID1, $question);
                break;
              case 2: $swag=1;
                $cqid2 = $resultQID2;
                $theQ2 = $question;
                $cq2ACount = $countofans;
                $theQHolderFinal2 = questionSetUp($resultQID2, $question);
                break;
              case 3: $swag=1;
                $cqid3 = $resultQID3;
                $theQ3 = $question;
                $cq3ACount = $countofans;
                $theQHolderFinal3 = questionSetUp($resultQID3, $question);
                break;
              case 4: $swag=1;
                $cqid4 = $resultQID4;
                $theQ4 = $question;
                $cq4ACount = $countofans;
                $theQHolderFinal4 = questionSetUp($resultQID4, $question);
                break;
              case 5: $swag=1;
                $cqid5 = $resultQID5;
                $theQ5 = $question;
                $cq5ACount = $countofans;
                $theQHolderFinal5 = questionSetUp($resultQID5, $question);
                break;
              case 6: $swag=1;
                $cqid6 = $resultQID6;
                $theQ6 = $question;
                $cq6ACount = $countofans;
                $theQHolderFinal6 = questionSetUp($resultQID6, $question);
                break;
              case 7: $swag=1;
                $cqid7 = $resultQID7;
                $theQ7 = $question;
                $cq7ACount = $countofans;
                $theQHolderFinal7 = questionSetUp($resultQID7, $question);
                break;
              case 8: $swag=1;
                $cqid8 = $resultQID8;
                $theQ8 = $question;
                $cq8ACount = $countofans;
                $theQHolderFinal8 = questionSetUp($resultQID8, $question);
                break;
              case 9: $swag=1;
                $cqid9 = $resultQID9;
                $theQ9 = $question;
                $cq9ACount = $countofans;
                $theQHolderFinal9 = questionSetUp($resultQID9, $question);
                break;
              case 10: $swag=1;
                $cqid10 = $resultQID10;
                $theQ10 = $question;
                $cq10ACount = $countofans;
                $theQHolderFinal10 = questionSetUp($resultQID10, $question);
                break;
              
            }
            
            $testing1++;
          }
          $stmt1->close();
          
          
          //SELECT `answerID`, `QID`, `ANO`, `answer` FROM `cultureQAnswers` WHERE 1
          //SELECT `QID`, `answer` FROM `cultureQAnswers` WHERE (`answerID`=?) OR (`answerID`=?) OR (`answerID`=?) OR (`answerID`=?) OR (`answerID`=?) OR (`answerID`=?) OR (`answerID`=?) OR (`answerID`=?) OR (`answerID`=?) OR (`answerID`=?)
          $stmt2 = $mysqli->prepare("SELECT `answerID`, `answer`, `ANO` FROM `cultureQAnswers` WHERE (`QID`=?) OR (`QID`=?) OR (`QID`=?) OR (`QID`=?) OR (`QID`=?) OR (`QID`=?) OR (`QID`=?) OR (`QID`=?) OR (`QID`=?) OR (`QID`=?)");
          $stmt2->bind_param("iiiiiiiiii", $resultQID1, $resultQID2, $resultQID3, $resultQID4, $resultQID5, $resultQID6, $resultQID7, $resultQID8, $resultQID9, $resultQID10);
          $stmt2->execute();
          $stmt2->bind_result($AIDwAns, $theAnswer, $theANO);
          $countforanswers = 1;//track q
          
          while ($stmt2->fetch())
          {
            switch ($countforanswers)
            {
              case 1: $swag1 = 1;
                //call function with qid, aid, givenAns, maxcount, ano, 
                if ($theANO == $cq1ACount)
                {
                  $countforanswers++;
                }
                $answerSet1 .= checkAnowithCount($resultQID1, $AIDwAns, $theAnswer, $cq1ACount, $theANO, $countforanswers);
                //echo 'here1<rb>';
                break;
              case 2: $swag1 = 1;
                //call function with qid, aid, givenAns, maxcount, ano, 
                if ($theANO == $cq2ACount)
                {
                  $countforanswers++;
                }
                $answerSet2 .= checkAnowithCount($resultQID2, $AIDwAns, $theAnswer, $cq2ACount, $theANO, $countforanswers);
                //echo 'here1<rb>';
                break;
              case 3: $swag1 = 1;
                //call function with qid, aid, givenAns, maxcount, ano, 
                if ($theANO == $cq3ACount)
                {
                  $countforanswers++;
                }
                $answerSet3 .= checkAnowithCount($resultQID3, $AIDwAns, $theAnswer, $cq3ACount, $theANO, $countforanswers);
                //echo 'here1<rb>';
                break;
              case 4: $swag1 = 1;
                //call function with qid, aid, givenAns, maxcount, ano, 
                if ($theANO == $cq4ACount)
                {
                  $countforanswers++;
                }
                $answerSet4 .= checkAnowithCount($resultQID4, $AIDwAns, $theAnswer, $cq4ACount, $theANO, $countforanswers);
                //echo 'here1<rb>';
                break;
              case 5: $swag1 = 1;
                //call function with qid, aid, givenAns, maxcount, ano, 
                if ($theANO == $cq5ACount)
                {
                  $countforanswers++;
                }
                $answerSet5 .= checkAnowithCount($resultQID5, $AIDwAns, $theAnswer, $cq5ACount, $theANO, $countforanswers);
                //echo 'here1<rb>';
                break;
              case 6: $swag1 = 1;
                //call function with qid, aid, givenAns, maxcount, ano, 
                if ($theANO == $cq6ACount)
                {
                  $countforanswers++;
                }
                $answerSet6 .= checkAnowithCount($resultQID6, $AIDwAns, $theAnswer, $cq6ACount, $theANO, $countforanswers);
                //echo 'here1<rb>';
                break;
              case 7: $swag1 = 1;
                //call function with qid, aid, givenAns, maxcount, ano, 
                if ($theANO == $cq7ACount)
                {
                  $countforanswers++;
                }
                $answerSet7 .= checkAnowithCount($resultQID7, $AIDwAns, $theAnswer, $cq7ACount, $theANO, $countforanswers);
                //echo 'here1<rb>';
                break;
              case 8: $swag1 = 1;
                //call function with qid, aid, givenAns, maxcount, ano, 
                if ($theANO == $cq8ACount)
                {
                  $countforanswers++;
                }
                $answerSet8 .= checkAnowithCount($resultQID8, $AIDwAns, $theAnswer, $cq8ACount, $theANO, $countforanswers);
                //echo 'here1<rb>';
                break;
              case 9: $swag1 = 1;
                //call function with qid, aid, givenAns, maxcount, ano, 
                if ($theANO == $cq9ACount)
                {
                  $countforanswers++;
                }
                $answerSet9 .= checkAnowithCount($resultQID9, $AIDwAns, $theAnswer, $cq9ACount, $theANO, $countforanswers);
                //echo 'here1<rb>';
                break;
              case 10: $swag1 = 1;
                //call function with qid, aid, givenAns, maxcount, ano, 
                if ($theANO == $cq10ACount)
                {
                  $countforanswers++;
                }
                $answerSet10 .= checkAnowithCount($resultQID10, $AIDwAns, $theAnswer, $cq10ACount, $theANO, $countforanswers);
                //echo 'here1<rb>';
                break;
              
            }
            
          }
          $stmt2->close();
          
          //echo '<form>'.$answerSet1 . $answerSet2. $answerSet3. $answerSet4. $answerSet5. $answerSet6. $answerSet7. $answerSet8. $answerSet9. $answerSet10.'</form>';
                    echo '<form id="candApplyJobCult" name="candApplyJobCult" method="post" action="candApplying.php">
                    <input type="hidden" id="cultQJobID" name="cultQJobID" value="'.$receivedJID.'"></input>
                    <input type="hidden" id="cultQJobCompID" name="cultQJobCompID" value="'.$resultJCompID.'"></input>'
                    . sendHiddenIDs($resultQID1, $resultQID2, $resultQID3, $resultQID4, $resultQID5, $resultQID6, $resultQID7, $resultQID8, $resultQID9, $resultQID10, $resultAID1, $resultAID2, $resultAID3, $resultAID4, $resultAID5, $resultAID6, $resultAID7, $resultAID8, $resultAID9, $resultAID10)
                    . $theQHolderFinal1
                    . $answerSet1 
                    . $theQHolderFinal2
                    . $answerSet2
                    . $theQHolderFinal3
                    . $answerSet3
                    . $theQHolderFinal4
                    . $answerSet4
                    . $theQHolderFinal5
                    . $answerSet5
                    . $theQHolderFinal6
                    . $answerSet6
                    . $theQHolderFinal7
                    . $answerSet7
                    . $theQHolderFinal8
                    . $answerSet8
                    . $theQHolderFinal9
                    . $answerSet9
                    . $theQHolderFinal10
                    . $answerSet10
                    . '<input class="formSubmit" id="candApplyJobSubmit" type="submit" name="candApplyJobCultSubmit"></input>
                    </form>';
          
          
          function questionSetUp($givenQID, $givenQuestion)
          {
            //$completedFunc='';
            $completedFunc = '<div class="candJSelectQHolder" id="candJSelectQHolderQ'.$givenQID.'">
              <label class="candJSelectQHolderLabel">
              '.$givenQuestion.'
              </label>
            </div>';
            return $completedFunc;
          }
          
          //--------------------------------------------------------------------------------------------------
          
          function checkAnowithCount($givenQID, $givenAID, $givenAns, $maxcount, $givenANO, $currQNO)
          {
            
            //$completedFunc = "";
            if ($maxcount == $givenANO)
            {
              $currQNO--;
              $completedFunc = '<option class="candJSelectAnsOpts" value="'.$givenAID.'">'. $givenAns .'</option>
              </select></div>';
              if ($currQNO == 1)
              {
                $completedFunc .= '<div class="QchangerButtonHolder" id="QchangerButtonHolder'.$currQNO.'">
                <div class="QChangerNextButton" id="QChangerNextButton'.$currQNO.'">Next button</div>
                </div>';
              }
              else if ($currQNO == 10)
              {
                $completedFunc .= '<div class="QchangerButtonHolder" id="QchangerButtonHolder'.$currQNO.'">
                <div class="QChangerPrevButton" id="QChangerPrevButton'.$currQNO.'">Prev button</div>
                </div>';
              }
              else
              {
                $completedFunc .= '<div class="QchangerButtonHolder" id="QchangerButtonHolder'.$currQNO.'">
                <div class="QChangerPrevButton" id="QChangerPrevButton'.$currQNO.'">Prev button</div>
                <div class="QChangerNextButton" id="QChangerNextButton'.$currQNO.'">Next button</div>
                </div>';
              }
              //$countforanswers++;
            }
            else if ($givenANO == 1)
            {
              $completedFunc = '<div class="candJSelectAnsHolder"><select class="candJSelectAns" name="candQ'.$currQNO.'" required>
              <option class="candJSelectAnsOpts" disabled selected value> -- select an option -- </option>
              <option class="candJSelectAnsOpts" value="'.$givenAID.'">'. $givenAns .'</option>';
            }
            else
            {
              //maybe give id of selec seperate
              $completedFunc = '<option class="candJSelectAnsOpts" value="'.$givenAID.'">'. $givenAns .'</option>';
            }
            
            return $completedFunc;
          }
          
          //--------------------------------------------------------------------------------------------------
          
          function sendHiddenIDs($resultQID1, $resultQID2, $resultQID3, $resultQID4, $resultQID5, $resultQID6, $resultQID7, $resultQID8, $resultQID9, $resultQID10, $resultAID1, $resultAID2, $resultAID3, $resultAID4, $resultAID5, $resultAID6, $resultAID7, $resultAID8, $resultAID9, $resultAID10)
          {
            $countQNO = 1;
            $finalhtml = '';
            //<input type="hidden" class="candcultQIDs" id="cultQNo1" name="cultQJobID" value="'.$resultQID1.'"></input>
            while ($countQNO <= 10)
            {
              $finalhtml .= '<input type="hidden" class="candcultQIDs" id="cultQNo'.$countQNO.'" name="cultQNOtoID'.$countQNO.'" value="'
              .switchforQNOtoID($countQNO, $resultQID1, $resultQID2, $resultQID3, $resultQID4, $resultQID5, $resultQID6, $resultQID7, $resultQID8, $resultQID9, $resultQID10, $resultAID1, $resultAID2, $resultAID3, $resultAID4, $resultAID5, $resultAID6, $resultAID7, $resultAID8, $resultAID9, $resultAID10).
              '"></input>';
              
              $finalhtml .= '<input type="hidden" class="candcultAIDs" id="cultANo'.$countQNO.'" name="cultANOtoID'.$countQNO.'" value="'
              .switchforANOtoID($countQNO, $resultQID1, $resultQID2, $resultQID3, $resultQID4, $resultQID5, $resultQID6, $resultQID7, $resultQID8, $resultQID9, $resultQID10, $resultAID1, $resultAID2, $resultAID3, $resultAID4, $resultAID5, $resultAID6, $resultAID7, $resultAID8, $resultAID9, $resultAID10).
              '"></input>';
              $countQNO++;
            }
            
            return $finalhtml;
          }
          
          function switchforQNOtoID($givenQNO, $resultQID1, $resultQID2, $resultQID3, $resultQID4, $resultQID5, $resultQID6, $resultQID7, $resultQID8, $resultQID9, $resultQID10, $resultAID1, $resultAID2, $resultAID3, $resultAID4, $resultAID5, $resultAID6, $resultAID7, $resultAID8, $resultAID9, $resultAID10)
          {
            switch($givenQNO)
            {
              case 1:
                return $resultQID1;
                break;
              case 2:
                return $resultQID2;
                break;
              case 3:
                return $resultQID3;
                break;
              case 4:
                return $resultQID4;
                break;
              case 5:
                return $resultQID5;
                break;
              case 6:
                return $resultQID6;
                break;
              case 7:
                return $resultQID7;
                break;
              case 8:
                return $resultQID8;
                break;
              case 9:
                return $resultQID9;
                break;
              case 10:
                return $resultQID10;
                break;
            }
          }
          
          function switchforANOtoID($givenANO, $resultQID1, $resultQID2, $resultQID3, $resultQID4, $resultQID5, $resultQID6, $resultQID7, $resultQID8, $resultQID9, $resultQID10, $resultAID1, $resultAID2, $resultAID3, $resultAID4, $resultAID5, $resultAID6, $resultAID7, $resultAID8, $resultAID9, $resultAID10)
          {
            
            switch($givenANO)
            {
              case 1:
                return $resultAID1;
                break;
              case 2:
                return $resultAID2;
                break;
              case 3:
                return $resultAID3;
                break;
              case 4:
                return $resultAID4;
                break;
              case 5:
                return $resultAID5;
                break;
              case 6:
                return $resultAID6;
                break;
              case 7:
                return $resultAID7;
                break;
              case 8:
                return $resultAID8;
                break;
              case 9:
                return $resultAID9;
                break;
              case 10:
                return $resultAID10;
                break;
            }
          }
        ?>
        
        </div></div>
    
    <!-- bot page cand all -->
    <?php include 'candpagesbot.php'; ?>
    <!-- End of bot page cand all -->
    
  </body>

</html>