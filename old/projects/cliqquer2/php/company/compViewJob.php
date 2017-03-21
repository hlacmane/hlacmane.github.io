<?php
  include "../checkloggedincomp.php";
  include "../shortfunctions.php";
?>
<?php 

  //SELECT `jobid`, `compid`, `company`, `jobtitle`, `department`, `sector`, `location`, `description`, `salary`, `dateposted`, `deadline`, `corereqs`, `additionalreqs`, `tags` FROM `jobs` WHERE 1
  //$receivedJID = $mysqli->mysql_real_escape_string($_POST['hInputJID']);
  $receivedJID = $mysqli->real_escape_string($_POST['hInputJID']);
  //echo "$receivedJID here".$_POST['hInputJID'];
  $stmt = $mysqli->prepare("SELECT `compid`, `company`, `jobtitle`, `department`, `sector`, `location`, `description`, `salary`, `dateposted`, `deadline`, `corereqs`, `additionalreqs`, `tags` FROM `jobs` WHERE `jobid`=?");
  $stmt->bind_param("i", $receivedJID);
  $stmt->execute();
  $stmt->bind_result($resultJCompID, $resultJCompName, $resultJTitle, $resultJCDept, $resultJSector, $resultJLoc, $resultJDesc, $resultJSalary, $resultJDatePosted, $resultJDeadline, $resultJCoreReqs, $resultJAddReqs, $resultJTags);
  $stmt->fetch();
  $stmt->close();
  $compid = $_SESSION['compid'];
  if ($_SESSION['compid'] != $resultJCompID)
  {
    //echo "not your comps job, fix pls";
    //use js to stop them getting here from previous 
    //form button, then display msg and autorefresh
    header('Location: mycompjobs.php');
  }
  
?>
<!DOCTYPE html>

<html>

  <head>
    <?php include 'compheader.php'; ?>
    <title>Cliqquer 2.0 WIP cand view job</title>
    <?php 
      error_reporting(E_ALL);
      ini_set("display_errors", 1);
    ?>
    <script src='../../js/applicantQAns.js' type='text/javascript' charset='utf-8'></script>
  </head>  

  <body class="nav-on-header smart-nav">
    
    <!-- nav bar -->
    <?php include 'comppagestop.php'; ?>
    <!-- END of nav bar -->
    
    <!-- Page header -->
    <header class="page-header bg-img size-lg" style="background-image: url(assets/img/bg-banner2.jpg)">
      <div class="container">
        <div class="header-detail">
          <img class="logo" src="assets/img/logo-google.jpg" alt="">
          <div class="hgroup">
            <h1><?php echo $resultJTitle; ?> <br>maybe have search options saved when sending back</h1>
            <h3><a href="#"><?php echo $resultJCompName; ?></a></h3>
          </div>
          <time datetime="2016-03-03 20:00">2 days ago</time>
          <hr>
          <p class="lead"><?php echo $resultJDesc; ?></p>

          <ul class="details cols-3">
            <li>
              <i class="fa fa-map-marker"></i>
              <span><?php echo $resultJLoc; ?></span>
            </li>

            <li>
              <i class="fa fa-briefcase"></i>
              <span>Full time</span>
            </li>

            <li>
              <i class="fa fa-money"></i>
              <span><?php echo $resultJSalary; ?></span>
            </li>

            <li>
              <i class="fa fa-clock-o"></i>
              <span>40h / week</span>
            </li>

            <li>
              <i class="fa fa-flask"></i>
              <span>2+ years experience</span>
            </li>

            <li>
              <i class="fa fa-certificate"></i>
              <a href="#">Master or Bachelor</a>
            </li>
          </ul>

          <div class="button-group">
            <ul class="social-icons">
              <li class="title">Share on</li>
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>

            <div class="action-buttons">
              <!--<a class="btn btn-primary" href="#">Apply with linkedin</a>-->
              <!--<a class="btn btn-success" href="job-apply.html">Apply now</a>-->
<!--
  edit btton?
-->
            </div>
          </div>

        </div>
      </div>
    </header>
    <!-- END Page header -->


    <!-- Main container -->
    <main>

      <!-- Job detail -->
      <section>
        <div class="container">
          
          <div id="jobApplicantsHolder">
          
          <div id="jobApplicantsTable">
            <div class="columnFNames" id="columnFNamesHeader">First Name:</div>
            <div class="columnCultMatch" id="columnCultMatchHeader">Culture Match:</div>
            
            <?php
            //SELECT `jobID`, `candID`, `compID`, `cultureMatch`, `QID1`, `AID1`, `AID1Match`, `QID2`, `AID2`, `AID2Match`, `QID3`, `AID3`, `AID3Match`, `QID4`, `AID4`, `AID4Match`, `QID5`, `AID5`, `AID5Match`, `QID6`, `AID6`, `AID6Match`, `QID7`, `AID7`, `AID7Match`, `QID8`, `AID8`, `AID8Match`, `QID9`, `AID9`, `AID9Match`, `QID10`, `AID10`, `AID10Match` FROM `applicants` WHERE 1
            
            //SELECT `candID`, `cultureMatch`, `QID1`, `AID1`, `AID1Match`, `QID2`, `AID2`, `AID2Match`, `QID3`, `AID3`, `AID3Match`, `QID4`, `AID4`, `AID4Match`, `QID5`, `AID5`, `AID5Match`, `QID6`, `AID6`, `AID6Match`, `QID7`, `AID7`, `AID7Match`, `QID8`, `AID8`, `AID8Match`, `QID9`, `AID9`, `AID9Match`, `QID10`, `AID10`, `AID10Match` FROM `applicants` WHERE (`jobID`=?) AND (`compID`=?)
            
            //SELECT `candID`, `cultureMatch`, `QID1`, `AID1`, `AID1Match`, `QID2`, `AID2`, `AID2Match`, `QID3`, `AID3`, `AID3Match`, `QID4`, `AID4`, `AID4Match`, `QID5`, `AID5`, `AID5Match`, `QID6`, `AID6`, `AID6Match`, `QID7`, `AID7`, `AID7Match`, `QID8`, `AID8`, `AID8Match`, `QID9`, `AID9`, `AID9Match`, `QID10`, `AID10`, `AID10Match` FROM `applicants` WHERE (`jobID`=?) AND (`compID`=?)
              
              $stmt4 = $mysqli->prepare("SELECT `candID`, `cultureMatch`, `QID1`, `AID1`, `AID1Match`, `QID2`, `AID2`, `AID2Match`, `QID3`, `AID3`, `AID3Match`, `QID4`, `AID4`, `AID4Match`, `QID5`, `AID5`, `AID5Match`, `QID6`, `AID6`, `AID6Match`, `QID7`, `AID7`, `AID7Match`, `QID8`, `AID8`, `AID8Match`, `QID9`, `AID9`, `AID9Match`, `QID10`, `AID10`, `AID10Match` FROM `applicants` WHERE (`jobID`=?) AND (`compID`=?)");
              $stmt4->bind_param("ii", $receivedJID, $compid);
              $stmt4->execute();
              $stmt4->bind_result($candid, $cultureMatch, $appQID1, $appAID1, $appAIDMatch1, $appQID2, $appAID2, $appAIDMatch2, $appQID3, $appAID3, $appAIDMatch3, $appQID4, $appAID4, $appAIDMatch4, $appQID5, $appAID5, $appAIDMatch5, $appQID6, $appAID6, $appAIDMatch6, $appQID7, $appAID7, $appAIDMatch7, $appQID8, $appAID8, $appAIDMatch8, $appQID9, $appAID9, $appAIDMatch9, $appQID10, $appAID10, $appAIDMatch10);
              $count=1;
              while($stmt4->fetch())
              {
                echo '<div class="applicantRows">
                      <div class="columnFNames" id="candid'.$candid.'">'. getCandName($candid) .'</div>
                      <div class="columnCultMatch" id="candidMatch'.$candid.'">'. $cultureMatch .'</div>
                      <div class="applicantInfoContainer" id="appInf'.$candid.'">
                        '.qMatchedVal($count, $appAIDMatch1, $appAIDMatch2, $appAIDMatch3, $appAIDMatch4, $appAIDMatch5, $appAIDMatch6, $appAIDMatch7, $appAIDMatch8, $appAIDMatch9, $appAIDMatch10).'
                      </div></div>';
              }
              $stmt4->close();
              /*
              echo $receivedJID."receivedJIDdownhere<br>";
              echo $resultJCompID."receivedcompdownhere<br>";
              */
            ?>
            <div id="jobCultQSet">
            Questions and answers set are:<br>
            <?php
              
              //SELECT `jobID`, `companyID`, `QID1`, `AID1`, `QID2`, `AID2`, `QID3`, `AID3`, `QID4`, `AID4`, `QID5`, `AID5`, `QID6`, `AID6`, `QID7`, `AID7`, `QID8`, `AID8`, `QID9`, `AID9`, `QID10`, `AID10` FROM `jobPrefCulture` WHERE 1
              //SELECT `QID1`, `AID1`, `QID2`, `AID2`, `QID3`, `AID3`, `QID4`, `AID4`, `QID5`, `AID5`, `QID6`, `AID6`, `QID7`, `AID7`, `QID8`, `AID8`, `QID9`, `AID9`, `QID10`, `AID10` FROM `jobPrefCulture` WHERE (`jobID`=?) AND (`companyID`=?)
              $stmt1 = $mysqli->prepare("SELECT `QID1`, `AID1`, `QID2`, `AID2`, `QID3`, `AID3`, `QID4`, `AID4`, `QID5`, `AID5`, `QID6`, `AID6`, `QID7`, `AID7`, `QID8`, `AID8`, `QID9`, `AID9`, `QID10`, `AID10` FROM `jobPrefCulture` WHERE (`jobID`=?) AND (`companyID`=?)");
              $stmt1->bind_param("ii", $receivedJID, $compid);
              $stmt1->execute();
              $stmt1->bind_result($qid1, $qaid1, $qid2, $qaid2, $qid3, $qaid3, $qid4, $qaid4, $qid5, $qaid5, $qid6, $qaid6, $qid7, $qaid7, $qid8, $qaid8, $qid9, $qaid9, $qid10, $qaid10);
              $stmt1->fetch();
              $stmt1->close();
              /*
              echo $compid."compid<br>";
              echo $receivedJID."receivedJID<br>";
              echo $qid1."qid1<br>";
              */
              
              //SELECT `cqid`, `category`, `question`, `countofans` FROM `cultureQuestions` WHERE 1
              //SELECT `answerID`, `QID`, `ANO`, `answer` FROM `cultureQAnswers` WHERE 1

              $count1 = 1;
              while ($count1 <= 10)
              {
                switch ($count1)
                {
                  case 1: echo '<div id="someInfo">First 5 questions are competency based</div>';
                    getQandA($count1, $qid1, $qaid1);
                    break;
                  case 2: getQandA($count1, $qid2, $qaid2);
                    break;
                  case 3: getQandA($count1, $qid3, $qaid3);
                    break;
                  case 4: getQandA($count1, $qid4, $qaid4);
                    break;
                  case 5: echo '<div id="someInfo">Next 5 questions are self bla based</div>';
                    getQandA($count1, $qid5, $qaid5);
                    break;
                  case 6: getQandA($count1, $qid6, $qaid6);
                    break;
                  case 7: getQandA($count1, $qid7, $qaid7);
                    break;
                  case 8: getQandA($count1, $qid8, $qaid8);
                    break;
                  case 9: getQandA($count1, $qid9, $qaid9);
                    break;
                  case 10: getQandA($count1, $qid10, $qaid10);
                    break;
                  
                }
                $count1++;
              }
            ?>

            
          </div><!--q set all end-->
            

          </div><!--jobApplicantsTable-->
          
        </div><!--jobApplicantsHolder-->
        
         <br>maybe have search options saved when sending back<br>
        <div id="showApplicants">Click here to see all applicants</div>
          
          <p>Google is and always will be an engineering company. We hire people with a broad set of technical skills who are ready to tackle some of technology's greatest challenges and make an impact on millions, if not billions, of users. At Google, engineers not only revolutionize search, they routinely work on massive scalability and storage solutions, large-scale applications and entirely new platforms for developers around the world. From AdWords to Chrome, Android to YouTube, Social to Local, Google engineers are changing the world one technological achievement after another.</p>

          <br>
          <h4>Responsibilities</h4>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non.</p>
          <ul>
            <li>Build next-generation web applications with a focus on the client side.</li>
            <li>Redesign UI's, implement new UI's, and pick up Java as necessary.</li>
            <li>Explore and design dynamic and compelling consumer experiences.</li>
            <li>Design and build scalable framework for web applications.</li>
          </ul>

          <br>
          <h4>Minimum qualifications</h4>
          <ul>
            <li>BA/BS degree in a technical field or equivalent practical experience.  </li>
            <li>2 years of relevant work experience in software development.</li>
            <li>Programming experience in C, C++ or Java.</li>
            <li>Experience with AJAX, HTML and CSS.</li>
          </ul>

          <br>
          <h4>Preferred qualifications</h4>
          <ul>
            <li>Interest in user interface design.</li>
            <li>Web application development experience.</li>
            <li>Experience working on cross-browser platforms.</li>
            <li>Development experience designing object-oriented JavaScript.</li>
            <li>Experience with user interface frameworks such as XUL, Flex and XAML.</li>
            <li>Knowledge of user interface design.</li>
          </ul>

        </div>
      </section>
      <!-- END Job detail -->

    </main>
    <!-- END Main container -->
    
    <!-- bot page comp all -->
    <?php include 'comppagesbot.php'; ?>
    <!-- End of bot page comp all -->
    
  </body>
<?php
function qMatchedVal($count, $match1, $match2, $match3, $match4, $match5, $match6, $match7, $match8, $match9, $match10)
{
  $htmltoecho = "";
  while ($count <= 10)
  {
    $htmltoecho .= '<div class="aInfoQno'.$count.'">'.$count.'</div><div class="aInfoQMatch">';
    switch ($count)
    {
      case 1: 
        if ($match1 == 1) 
        {
          $htmltoecho .= "True";
        } else {
          $htmltoecho .= "False";
        }
        break;
      case 2: 
        if ($match2 == 1) 
        {
          $htmltoecho .= "True";
        } else {
          $htmltoecho .= "False";
        }
        break;
      case 3: 
        if ($match3 == 1) 
        {
          $htmltoecho .= "True";
        } else {
          $htmltoecho .= "False";
        }
        break;
      case 4: 
        if ($match4 == 1) 
        {
          $htmltoecho .= "True";
        } else {
          $htmltoecho .= "False";
        }
        break;
      case 5: 
        if ($match5 == 1) 
        {
          $htmltoecho .= "True";
        } else {
          $htmltoecho .= "False";
        }
        break;
      case 6: 
        if ($match6 == 1) 
        {
          $htmltoecho .= "True";
        } else {
          $htmltoecho .= "False";
        }
        break;
      case 7: 
        if ($match7 == 1) 
        {
          $htmltoecho .= "True";
        } else {
          $htmltoecho .= "False";
        }
        break;
      case 8: 
        if ($match8 == 1) 
        {
          $htmltoecho .= "True";
        } else {
          $htmltoecho .= "False";
        }
        break;
      case 9: 
        if ($match9 == 1) 
        {
          $htmltoecho .= "True";
        } else {
          $htmltoecho .= "False";
        }
        break;
      case 10: 
        if ($match10 == 1) 
        {
          $htmltoecho .= "True";
        } else {
          $htmltoecho .= "False";
        }
        break;
      //end of cases
    }//end of switch
    
    $htmltoecho .= '</div>';
    $count++;
  }
  echo $htmltoecho;
}

function getCandName($candid)
{
  require '../../sqlconnect.php';
  //SELECT `candidateid`, `email`, `password`, `salt`, `title`, `firstname`, `lastname`, `age`, `gender`, `location`, `website`, `phonenumber`, `prefrole`, `prefsalary`, `linkedin` FROM `candidateDetails` WHERE 1
  //SELECT `firstname` FROM `candidateDetails` WHERE (`candidateid`=?)
  $stmt5 = $mysqli->prepare("SELECT `firstname` FROM `candidateDetails` WHERE (`candidateid`=?)");
  $stmt5->bind_param("i", $candid);
  $stmt5->execute();
  $stmt5->bind_result($fname);
  $stmt5->fetch();
  $stmt5->close();
  echo $fname;
}
function getQandA($count1, $questionID, $answerID)
{
  require '../../sqlconnect.php';
  $stmt2 = $mysqli->prepare("SELECT `category`, `question`, `countofans` FROM `cultureQuestions` WHERE (`cqid`=?)");
  $stmt2->bind_param("i", $questionID);
  $stmt2->execute();
  $stmt2->bind_result($qcateg, $theQuestion, $countofAs);
  $stmt2->fetch();
  $stmt2->close();
  
  $stmt3 = $mysqli->prepare("SELECT `QID`, `ANO`, `answer` FROM `cultureQAnswers` WHERE (`answerID`=?)");
  $stmt3->bind_param("i", $answerID);
  $stmt3->execute();
  $stmt3->bind_result($aQID, $aNO, $theAnswer);
  $stmt3->fetch();
  $stmt3->close();
  
  $finaloutput = '<div class="jCultQAHolder" id="'.$count1.'">
    <div class="jCultQAHolder" id="">
    '.$theQuestion.'
    </div>
    <div class="jCultQAHolder" id="">
      '.$theAnswer.'
    </div>
  </div>';
  echo $finaloutput;
  //cant use h() as straight from database and need to 
  //escpae characters in it somehow?
  //echo $theQuestion;
}
?>
</html>