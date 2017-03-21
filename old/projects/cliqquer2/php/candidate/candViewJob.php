<?php
  include "../checkloggedincand.php";
?>
<?php 
          //to ensure you cant randomly get to this page.
          if (!isset($_POST['hInputJID']))
          {
            if(isset($_SESSION['AppliedJID']))
            {
              $_POST['hInputJID'] = $_SESSION['AppliedJID'];
              unset($_SESSION['AppliedJID']);
              //echo $_SESSION['AppliedJID'].'thesession unset???<br>';
            }
            else
            {
              header('Location: candAllJobs.php');
              //echo 'you dont belong here pls fuck off<br><br>';
            }
          }
          //end of check
          
          
          //SELECT `jobid`, `compid`, `company`, `jobtitle`, `department`, `sector`, `location`, `description`, `salary`, `dateposted`, `deadline`, `corereqs`, `additionalreqs`, `tags` FROM `jobs` WHERE 1
          //$receivedJID = $mysqli->mysql_real_escape_string($_POST['hInputJID']);
          $initialid = $_POST['hInputJID'];
          $receivedJID = $mysqli->real_escape_string($_POST['hInputJID']);
          //echo "$receivedJID here".$_POST['hInputJID'];
          $stmt = $mysqli->prepare("SELECT `compid`, `company`, `jobtitle`, `department`, `sector`, `location`, `description`, `salary`, `dateposted`, `deadline`, `corereqs`, `additionalreqs`, `tags` FROM `jobs` WHERE `jobid`=?");
          //$stmt->bind_param("i", $receivedJID);
          $stmt->bind_param("i", $receivedJID);
          $stmt->execute();
          $stmt->bind_result($resultJCompID, $resultJCompName, $resultJTitle, $resultJCDept, $resultJSector, $resultJLoc, $resultJDesc, $resultJSalary, $resultJDatePosted, $resultJDeadline, $resultJCoreReqs, $resultJAddReqs, $resultJTags);
          $stmt->fetch();
          $stmt->close();
        ?>
<!-- template taken from job details -->
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
              <?php
            /*SELECT EXISTS(
            SELECT *
            FROM gdata_calendars
            WHERE `group` =  ? AND id = ?)
            */
            //SELECT * FROM `applicants` WHERE 1
            //SELECT EXISTS(SELECT * FROM `applicants` WHERE 1)
            //SELECT EXISTS(SELECT * FROM `applicants` WHERE (`jobID`=?) AND (`candID`=?))
            //`jobID`, `candID`
          $stmt1 = $mysqli->prepare("SELECT EXISTS(SELECT * FROM `applicants` WHERE (`jobID`=?) AND (`candID`=?))");
          $stmt1->bind_param("ii", $receivedJID, $theuserid);
          $stmt1->execute();
          $stmt1->bind_result($appliedornot);
          $stmt1->fetch();
          $stmt1->close();
          //echo $appliedornot.'appliedorno<br>';
          if ($appliedornot != 0)
          {
            echo "<br>you have already applied for this job<br>";
            
          }
          else
          {
            //echo 'put apply now button here<br>';
            echo '<form name="candToApply" id="candToApply" method="post" action="candApply.php">
              <input type="hidden" class="hiddenInputBoxes" name="hiddenInputJID" value="'.$initialid.'")>
              <input class="btn btn-success" id="candToApplySubmit" type="submit" value="Apply Now" name="candToApplySubmit">
            </form>';
          }
          ?>
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
    
    <!-- bot page cand all -->
    <?php include 'candpagesbot.php'; ?>
    <!-- End of bot page cand all -->
    
  </body>

</html>