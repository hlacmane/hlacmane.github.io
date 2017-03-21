<?php
  include "../checkloggedincand.php";
  include "../shortfunctions.php";
?>
<!-- template used form job list 3 -->
<!DOCTYPE html>

<html>

  <head>
    <?php include 'candheader.php'; ?>
    <!--<link href='http://fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,800%7COpen+Sans:300,400,500,600,700,800%7CMontserrat:400,700' rel='stylesheet' type='text/css'>-->
    <title>Cliqquer 2.0 WIPcand all jobs view</title>
    <?php 
      error_reporting(E_ALL);
      ini_set("display_errors", 1);
    ?>
  </head>  

  <body class="nav-on-header smart-nav bg-alt">
    
    <!-- nav bar -->
    <?php include 'candpagestop.php'; ?>
    <!-- END of nav bar -->
    
    <!-- Page header -->
    <header class="page-header bg-img" style="background-image: url(../../assets/images/all-jobs-header.jpg);">
      <div class="container page-name">
        <h1 class="text-center">Browse jobs</h1>
        <p class="lead text-center">Use following search box to find jobs that fits you better</p>
      </div>

      <div class="container">
        
        <form action="#">

          <div class="row">
            
            <div class="form-group col-xs-12 col-sm-4">
              <input type="text" class="form-control" placeholder="Keyword: job title, skills, or company">
            </div>

            <div class="form-group col-xs-12 col-sm-4">
              <input type="text" class="form-control" placeholder="Location: city, state or zip">
            </div>

            <div class="form-group col-xs-12 col-sm-4">
              <select class="form-control selectpicker" multiple>
                <option selected>All categories</option>
                <option>Developer</option>
                <option>Designer</option>
                <option>Customer service</option>
                <option>Finance</option>
                <option>Healthcare</option>
                <option>Sale</option>
                <option>Marketing</option>
                <option>Information technology</option>
                <option>Others</option>
              </select>
            </div>


            <div class="form-group col-xs-12 col-sm-4">
              <h6>Contract</h6>
              <div class="checkall-group">
                <div class="checkbox">
                  <input type="checkbox" id="contract1" name="contract" checked>
                  <label for="contract1">All types</label>
                </div>

                <div class="checkbox">
                  <input type="checkbox" id="contract2" name="contract">
                  <label for="contract2">Full-time <small>(354)</small></label>
                </div>

                <div class="checkbox">
                  <input type="checkbox" id="contract4" name="contract">
                  <label for="contract4">Internship <small>(169)</small></label>
                </div>

                <div class="checkbox">
                  <input type="checkbox" id="contract5" name="contract">
                  <label for="contract5">Freelance <small>(480)</small></label>
                </div>
              </div>
            </div>
            
            
            <div class="form-group col-xs-12 col-sm-4">
              <h6>Hourly rate</h6>
              <div class="checkall-group">
                <div class="checkbox">
                  <input type="checkbox" id="rate1" name="rate" checked>
                  <label for="rate1">All rates</label>
                </div>

                <div class="checkbox">
                  <input type="checkbox" id="rate2" name="rate">
                  <label for="rate2">$0 - $50 <small>(364)</small></label>
                </div>

                <div class="checkbox">
                  <input type="checkbox" id="rate3" name="rate">
                  <label for="rate3">$50 - $100 <small>(684)</small></label>
                </div>

              </div>
            </div>


            <div class="form-group col-xs-12 col-sm-4">
              <h6>Academic degree</h6>
              <div class="checkall-group">
                <div class="checkbox">
                  <input type="checkbox" id="degree1" name="degree" checked>
                  <label for="degree1">All degrees</label>
                </div>

                <div class="checkbox">
                  <input type="checkbox" id="degree3" name="degree">
                  <label for="degree3">Bachelor's degree <small>(569)</small></label>
                </div>

              </div>
            </div>

          </div>

          <div class="button-group">
            <div class="action-buttons">
              <button class="btn btn-primary">Apply filter</button>
            </div>
          </div>

        </form>
        

      </div>

    </header>
    <!-- END Page header -->


    <!-- Main container -->
    <main>
      <section class="no-padding-top bg-alt">
        <div class="container">
          <div class="row item-blocks-connected">

            <div class="col-xs-12">
              <br>
              <h5>We found <strong>357</strong> matches, you're watching <i>10</i> to <i>20</i> COME BACK TO THIS</h5>
              <br>
            </div>

            <!-- Job item -->
            <div class="col-xs-12">
              <a class="item-block" href="job-detail.html">
                <header>
                  <img src="assets/img/logo-google.jpg" alt="">
                  <div class="hgroup">
                    <h4>Senior front-end developer</h4>
                    <h5>Google</h5>
                  </div>
                  <div class="header-meta">
                    <span class="location">Menlo park, CA</span>
                    <span class="label label-success">Full-time</span>
                  </div>
                </header>
              </a>
            </div>
            <!-- END Job item -->
            
            
            <?php
            //make a div table instead of normal table
            
            //SELECT `jobid`, `company`, `jobtitle`, `department`, `sector`, `location`, `salary`, `dateposted`, `deadline` FROM `jobs`
            //when echoing out, after 1 it is not id, so correct the echo
            
            $stmt = $mysqli->prepare("SELECT `jobid`, `company`, `jobtitle`, `department`, `sector`, `location`, `salary`, `dateposted`, `deadline` FROM `jobs`");
            $stmt->execute();
            $stmt->bind_result($resultJID, $resultCName, $resultJTitle, $resultCDept, $resultJSector, $resultJLoc,  $resultJSalary, $resultJDatePosted, $resultJDeadline);
            
            while($stmt->fetch())
            {
              //$test1 = new DateTime($resultJDatePosted);
              $test2 = new DateTime($resultJDeadline);
              $database_date = date_format($test2, 'Y-m-d');
              $today_date = new DateTime();
              $today_date = date_format($today_date, 'Y-m-d');
              //echo strtotime($today_date)."todays date<br>";
              $difference = strtotime($today_date) - strtotime($database_date);
              /*
              echo $difference;
              echo "breakline pls<br>";
              echo $difference<0;
              echo "plsbr<br>";
              */
              //$dteDiff  = $test1>diff($test2); 
              //echo $dteDiff->format("%H:%I:%S"); 
              if ($difference < 0)
              {
                //echo $resultJDatePosted < $resultJDeadline;
              echo '
              <!-- Job item -->
            <div class="col-xs-12">
              <a class="item-block" href="job-detail.html">
                <form method="post" class="jTitles" action="candViewJob.php">
                  <input type="hidden" class="hiddenInputJID" name="hInputJID" value="'.h($resultJID).'">
                  <button class="testbutton" type="submit" name="theJTitle">
                    <header>
                      <img src="assets/img/logo-microsoft.jpg" alt="">
                      <div class="hgroup">
                        <h4>'.h($resultJTitle).'</h4>
                        <h5>'.h($resultCName).'</h5>
                      </div>
                      <div class="header-meta">
                        <span class="location">'.h($resultJLoc).'</span>
                        <span class="label label-success">Remote</span>
                      </div>
                    </header>
                  </button>
                </form>
              </a>
            </div>
            <!-- END Job item -->';
              $somediv= 
                '<div class="jobTableRow" id="JobtblDataRow">
                  <div class="tblColumn" id="dataJobTitle">
                    <form method="post" class="jTitles" action="candViewJob.php">
                      <input type="hidden" class="hiddenInputJID" name="hInputJID" value="'.h($resultJID).'">
                      <input class="jTitlesSubmit" type="submit" value="'.h($resultJTitle).'" name="theJTitle">
                    </form>
                  </div>
                  <div class="tblColumn" id="dataJobCName">
                    '.h($resultCName).'
                  </div>
                  <div class="tblColumn" id="dataJobCDept">
                    '.h($resultCDept).'
                  </div>
                  <div class="tblColumn" id="dataJobCSector">
                    '.h($resultJSector).'
                  </div>
                  <div class="tblColumn" id="dataJobLocation">
                    '.h($resultJLoc).'
                  </div>
                  <div class="tblColumn" id="dataJobSalary">
                    '.h($resultJSalary).'
                  </div>
                  <div class="tblColumn" id="dataJobDatePosted">
                    '.h($resultJDatePosted).'
                  </div>
                  <div class="tblColumn" id="dataJobDeadline">
                    '.h($resultJDeadline).'
                  </div>
                </div><!--table data row end-->';
                }
            }
            
            $stmt->close();
          ?>
            
            
          </div>


          <!-- Page navigation -->
          <nav class="text-center">
            <ul class="pagination">
              <li>
                <a href="#" aria-label="Previous">
                  <i class="ti-angle-left"></i>
                </a>
              </li>
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li>
                <a href="#" aria-label="Next">
                  <i class="ti-angle-right"></i>
                </a>
              </li>
            </ul>
          </nav>
          <!-- END Page navigation -->

        </div>
      </section>
    </main>
    <!-- END Main container -->
    
    <!-- bot page cand all -->
    <?php include 'candpagesbot.php'; ?>
    <!-- End of bot page cand all -->
    
  </body>
  
</html>