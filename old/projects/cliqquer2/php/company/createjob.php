<?php
  include "../checkloggedincomp.php";
  include "../shortfunctions.php";
?>
<!DOCTYPE html>

<html>

  <head>
    <?php include 'compheader.php'; ?>
    <title>Cliqquer 2.0 WIP MADTING COMP ADD JOB</title>
    <?php 
      error_reporting(E_ALL);
      ini_set("display_errors", 1);
    ?>
    
    <link href="../../assets/vendors/summernote/summernote.css" rel="stylesheet">
        
    <script src='../../assets/js/compCultQChoices.js' type='text/javascript' charset='utf-8'></script>
  </head>  

  <body  class="nav-on-header smart-nav">
    
    <!-- nav bar -->
    <?php include 'comppagestop.php'; ?>
    <!-- END of nav bar -->
          <form name="cJobF" method ="post" action="creatingjob.php" id="cJobF">
    <!-- Page header -->
    <header class="page-header">
      <div class="container page-name">
        <h1 class="text-center">Add a new job</h1>
        <p class="lead text-center">Create a new vacancy for your company and put it online.</p>
      </div>
      
        <div class="container">
          
          
          <div class="row">
            <div class="form-group col-xs-12 col-sm-6">
              <input type="text" class="form-control input-lg" name="cjobTitle" id="cjobTitle" required placeholder="Job title, e.g. Front-end developer">
            </div>
            
            <div class="form-group col-xs-12 col-sm-6">
              <input type="text" class="form-control input-lg" name="cjobDept" id="cjobDept" required placeholder="Department">
            </div>
            
            <div class="form-group col-xs-12 col-sm-6">
              <input type="text" class="form-control input-lg" name="sector" id="sector" required placeholder="Sector">
            </div>
            
            <div class="form-group col-xs-12 col-sm-6">
              <input type="text" class="form-control input-lg" name="tags" id="tags" required placeholder="Tags">
            </div>
            
            
            <div class="form-group col-xs-12">
              <textarea class="form-control" rows="3" name="cjobDesc" id="cjobDesc" required placeholder="Short description"></textarea>
            </div>

            <div class="form-group col-xs-12">
              <input type="text" class="form-control" placeholder="Application URL">
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
              <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input type="text" class="form-control" name="location" id="location" required placeholder="Location, e.g. Melon Park, CA">
              </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
              <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                <select class="form-control selectpicker">
                  <option>Full time</option>
                  <option>Part time</option>
                  <option>Internship</option>
                  <option>Freelance</option>
                  <option>Remote</option>
                </select>
              </div>
            </div>

            <div class="form-group col-xs-12 col-sm-6 col-md-4">
              <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                <!--<input type="text" class="form-control" placeholder="Salary">-->
                <select class="form-control selectpicker" id="salarySelect" name="salary" required>
                  <option class="cJobSalaryOpts" disabled selected value> -- select an option -- </option>
                  <option class="cJobSalaryOpts" value="below 20,000">below 20,000</option>
                  <option class="cJobSalaryOpts" value="20,000 - 25,000">20,000 - 25,000</option>
                  <option class="cJobSalaryOpts" value="25,000 - 30,000">25,000 - 30,000</option>
                  <option class="cJobSalaryOpts" value="30,000 - 35,000">30,000 - 35,000</option>
                  <option class="cJobSalaryOpts" value="35,000 - 40,000">35,000 - 40,000</option>
                  <option class="cJobSalaryOpts" value="40,000 - 45,000">40,000 - 45,000</option>
                  <option class="cJobSalaryOpts" value="45,000 - 50,000">45,000 - 50,000</option>
                  <option class="cJobSalaryOpts" value="50,000 - 55,000">50,000 - 55,000</option>
                  <option class="cJobSalaryOpts" value="55,000 - 60,000">55,000 - 60,000</option>
                  <option class="cJobSalaryOpts" value="60,000 - 65,000">60,000 - 65,000</option>
                  <option class="cJobSalaryOpts" value="65,000 - 70,000">65,000 - 70,000</option>
                  <option class="cJobSalaryOpts" value="70,000 - 75,000">70,000 - 75,000</option>
                  <option class="cJobSalaryOpts" value="75,000 - 80,000">75,000 - 80,000</option>
                  <option class="cJobSalaryOpts" value="80,000 - 85,000">80,000 - 85,000</option>
                  <option class="cJobSalaryOpts" value="85,000 - 90,000">85,000 - 90,000</option>
                  <option class="cJobSalaryOpts" value="90,000 - 95,000">90,000 - 95,000</option>
                  <option class="cJobSalaryOpts" value="95,000 - 100,000">95,000 - 100,000</option>
                  <option class="cJobSalaryOpts" value="above 100,000">above 100,000</option>
                </select>
              </div>
            </div>
            
            
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
              <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                <input type="text" class="form-control" placeholder="Working hours, e.g. 40">
                <span class="input-group-addon">hours / week</span>
              </div>
            </div>
            
            
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
              <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="fa fa-certificate"></i></span>
                <select class="form-control selectpicker" multiple>
                  <option>Postdoc</option>
                  <option>Ph.D.</option>
                  <option>Master</option>
                  <option selected>Bachelor</option>
                </select>
              </div>
            </div>
            
            <div class="form-group col-xs-12 col-sm-6 col-md-4">
              <div class="input-group">
              <span class="input-group-addon">Deadline:</span>
              <input type="date" class="form-control" name="cjobDeadline" id="cjobDeadline" min=
                <?php 
                $now = new DateTime();
                echo $now->format('Y-m-d');
                ?> required placeholder="Deadline">
              </div>
            </div>
            
          </div><!-- End of row -->

          <div class="button-group">
            <div class="action-buttons">
              <div class="upload-button">
                <button class="btn btn-block btn-primary">Choose a cover image</button>
                <input id="cover_img_file" type="file">
              </div>
            </div>
          </div>
          
      </div><!-- End of container -->
    </header>
    <!-- END Page header -->
    
    <!-- Main container -->
    <main>
      
        <!-- Job detail -->
        <section>
          <div class="container">

            <header class="section-header">
              <span>Description</span>
              <h2>Job detail</h2>
              <p>bla-Write about your company, job description, skills required, benefits, etc.</p>
            </header>

            
        <div class="allforms" id="cJobForm">
          
              <div class="formRowLeftSide">
                <label class="cjobLabel">corereqs: </label>
              </div>
              <div class="formRowRightSide">
                <input class="form-control" name="cjobCoreReqs" id="cjobCoreReqs" required>
              </div>


              <div class="formRowLeftSide">
                <label class="cjobLabel">addreqs: </label>
              </div>
              <div class="formRowRightSide">
                <input class="form-control" name="cjobAddReqs" id="cjobAddReqs" required>
              </div>

            
            <div id="someInfo">
              First 5 questions are competency based
            </div>
            <div id="1">
              <div class="formRow" id="1q">
                <div class="formRowLeftSide">
                  <label class="cjobLabel">Select a culture Q: </label>
                </div>
                <div class="formRowRightSide">
                  <select class="cJobCQ" id="cJobCultSelect1" name="cultQ1" required>
                    <?php
                      $stmt = $mysqli->prepare("SELECT `cqid`, `category`, `question`, `countofans` FROM `cultureQuestions` WHERE (`type`='Competency')");
                      //bind param
                      $stmt->execute();
                      $stmt->bind_result($resultCQID, $resultCateg, $resultQuestion, $resultCofA);
                      //while fetch
                      echo '<option class="cJobSalaryOpts" disabled selected value> -- select an option -- </option>';
                      while ($stmt->fetch())
                      {
                        echo '<option class="cultQOpts" value="'.$resultCQID.'">'. $resultQuestion .'</option>';
                      }
                      $stmt->close();
                    ?>
                  </select>
                </div>
              </div>
              
              <div class="formRow" id="1a"></div>
            </div>
            
            <div id="2">
              <div class="formRow" id="2q"></div>
              <div class="formRow" id="2a"></div>
            </div>
            <div id="3">
              <div class="formRow" id="3q"></div>
              <div class="formRow" id="3a"></div>
            </div>
            <div id="4">
              <div class="formRow" id="4q"></div>
              <div class="formRow" id="4a"></div>
            </div>
            <div id="someInfo2">
              The next 5 questions are self bla based
            </div>
            <div id="5">
              <div class="formRow" id="5q"></div>
              <div class="formRow" id="5a"></div>
            </div>
            <div id="6">
              <div class="formRow" id="6q"></div>
              <div class="formRow" id="6a"></div>
            </div>
            <div id="7">
              <div class="formRow" id="7q"></div>
              <div class="formRow" id="7a"></div>
            </div>
            <div id="8">
              <div class="formRow" id="8q"></div>
              <div class="formRow" id="8a"></div>
            </div>
            <div id="9">
              <div class="formRow" id="9q"></div>
              <div class="formRow" id="9a"></div>
            </div>
            <div id="10">
              <div class="formRow" id="10q"></div>
              <div class="formRow" id="10a"></div>
            </div>
            <!--?php include 'culqformrow.php'; ?-->
            
            <div id="bigtesting">maddswagger</div>
            <div class="formRow"  id="cjobSubmitRow">
              <!--input class="formSubmit" id="cjobSubmit" type="submit" name="createJobSubmit"></input-->
            </div>
          </form>
        <!--
          `jobid`, 
          `company`, 
          `department`, 
          `sector`, 
          `location`, 
          `description`, 
          `salary`, 
          `dateposted`,
          `deadline`, 
          `corereqs`, 
          `additionalreqs`, 
          `tags` 
        -->
        </div><!--allForms-->

          </div>
        </section>
        <!-- END Job detail -->
        
        
    </main>
    <!-- END Main container -->
    
    <!-- bot page comp all -->
    <?php include 'comppagesbot.php'; ?>
    <!-- End of bot page comp all -->
    
  </body>

</html>