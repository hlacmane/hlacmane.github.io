<?php
  include "checkloggedincand.php";
?>
<!DOCTYPE html>

<html>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Cliqquer 2.0 WIP cand view job</title>
    <?php 
      error_reporting(E_ALL);
      ini_set("display_errors", 1);
    ?>
    <script src='js/jquery-3.0.0.min.js' type='text/javascript' charset='utf-8'></script>
  </head>  

  <body>

    <div class="all">
      <a href="logout.php">LOGOUTHEREPLS</a>
      <div class="maintitle">cand view job</div>
      <div class="desc">
        <a href="candprof.php">Link to profile</a>
        <br>
        <a href="dashboardtemp.php">link to dashboard</a>
        <br>
        <a href="candAllJobs.php">back to jobs</a>
        <br>maybe have search options saved when sending back<br>
        <?php 
          //quick test
          //$testid = $_SESSION['candid'];
          
          //SELECT `jobid`, `compid`, `company`, `jobtitle`, `department`, `sector`, `location`, `description`, `salary`, `dateposted`, `deadline`, `corereqs`, `additionalreqs`, `tags` FROM `jobs` WHERE 1
          //$receivedJID = $mysqli->mysql_real_escape_string($_POST['hInputJID']);
          $receivedJID = $mysqli->real_escape_string($_POST['hInputJID']);
          //echo "$receivedJID here".$_POST['hInputJID'];
          $stmt = $mysqli->prepare("SELECT `compid`, `company`, `jobtitle`, `department`, `sector`, `location`, `description`, `salary`, `dateposted`, `deadline`, `corereqs`, `additionalreqs`, `tags` FROM `jobs` WHERE `jobid`=?");
          //$stmt->bind_param("i", $receivedJID);
          $stmt->bind_param("i", $receivedJID);
          $stmt->execute();
          $stmt->bind_result($resultJCompID, $resultJCompName, $resultJTitle, $resultJCDept, $resultJSector, $resultJLoc, $resultJDesc, $resultJSalary, $resultJDatePosted, $resultJDeadline, $resultJCoreReqs, $resultJAddReqs, $resultJTags);
          $stmt->fetch();
          $stmt->close();
          //echo 'bigtest '.$bigcheck.' herepls<br>';
        ?>
        <br>
        below if full job layoutblabla
        <div id="jobFullInfo">
          <div id="jobApplied">
            <?php 
            ?>
          </div>
          <div id="jobTitleCandView">
            Job Title:
          </div>
          <div id="jobTitleCandViewData">
            php code bla 
            <?php 
              //echo $bigcheck; 
              echo $resultJTitle;
            ?>
          </div>
          
          <div id="jobCompNameCandView">
            Company Name:
          </div>
          <div id="jobCompNameCandViewData">
            php code bla
            <?php 
              echo $resultJCompName;
            ?>
          </div>
          
          <div id="jobCompDeptCandView">
            Company department:
          </div>
          <div id="jobCompDeptCandViewData">
            php code bla
            <?php 
              echo $resultJCDept;
            ?>
          </div>
          
          <div id="jobCompSectorCandView">
            Sector:
          </div>
          <div id="jobCompSectorCandViewData">
            php code bla
            <?php 
              echo $resultJSector;
            ?>
          </div>
          
          <div id="jobCompLocationCandView">
            Job Location:
          </div>
          <div id="jobCompLocationCandViewData">
            php code bla
            <?php 
              echo $resultJLoc;
            ?>
          </div>
          
          <div id="jobSalaryCandView">
            Salary:
          </div>
          <div id="jobSalaryCandViewData">
            php code bla
            <?php 
              echo $resultJSalary;
            ?>
          </div>
          
          <div id="jobDatePostedCandView">
            Date posted:
          </div>
          <div id="jobDatePostedCandViewData">
            php code bla
            <?php 
              echo $resultJDatePosted;
            ?>
          </div>
          
          <div id="jobDeadlineCandView">
            Deadline:
          </div>
          <div id="jobDeadlineCandViewData">
            php code bla
            <?php 
              echo $resultJDeadline;
            ?>
          </div>
          
          <div id="jobDescriptionCandView">
            Description:
          </div>
          <div id="jobDescriptionCandViewData">
            php code bla
            <?php 
              echo $resultJDesc;
            ?>
          </div>
          
          <div id="jobCoreReqsCandView">
            Core reqs:
          </div>
          <div id="jobCoreReqsCandViewData">
            php code bla
            <?php 
              echo $resultJCoreReqs;
            ?>
          </div>
          
          <div id="jobAddReqsCandView">
            Additional reqs:
          </div>
          <div id="jobAddReqsCandViewData">
            php code bla
            <?php 
              echo $resultJAddReqs;
            ?>
          </div>
          
          <div id="jobTagsCandView">
            Tags:
          </div>
          <div id="jobTagsCandViewData">
            php code bla
            <?php 
              echo $resultJTags;
            ?>
          </div>
          
          
        </div>
        
        
        
      </div><!--desc-->

    </div><!--all-->
  </body>

</html>