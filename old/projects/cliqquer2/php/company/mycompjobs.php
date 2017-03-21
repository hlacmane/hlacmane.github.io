<?php
  include "../checkloggedincomp.php";
  include "../shortfunctions.php";
?>
<!-- template used form job list 3 -->
<!DOCTYPE html>

<html>

  <head>
    <?php include 'compheader.php'; ?>
    <title>Cliqquer 2.0 WIP MADTING</title>
    <?php 
      error_reporting(E_ALL);
      ini_set("display_errors", 1);
    ?>
  </head>  

  <body class="nav-on-header smart-nav bg-alt">
    
    <!-- nav bar -->
    <?php include 'comppagestop.php'; ?>
    <!-- END of nav bar -->
    
        <!-- Page header -->
    <header class="page-header bg-img" style="background-image: url(assets/img/bg-banner1.jpg);">
      <div class="container page-name">
        <h1 class="text-center">Browse MY compjobs</h1>
        <p class="lead text-center">Use following search box to find jobs that fits you better<br>
          make active job count display, and pother stuff per ideas<br>
        make clickable jobs as well, whole row?
        </p>
      </div>

      <div class="container">
        <div class="row">
          <h1>FUTURE SEARCH BAR?</h1>
        </div>
        <!--
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
        -->
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
                  <img src="assets/img/logo-linkedin.png" alt="">
                  <div class="hgroup">
                    <h4>Software Engineer (Entry or Senior)</h4>
                    <h5>Linkedin <span class="label label-warning">Part-time</span></h5>
                  </div>
                  <time datetime="2016-03-10 20:00">8 hours ago</time>
                </header>

                <div class="item-body">
                  <p>The Special Programs Department II is seeking to hire a Computer Scientist to augment our software development team. Members of the software development team are expected to follow established software engineering principles to methodically deliver mission application software.</p>
                </div>

                <footer>
                  <ul class="details cols-3">
                    <li>
                      <i class="fa fa-map-marker"></i>
                      <span>Livermore, CA</span>
                    </li>

                    <li>
                      <i class="fa fa-money"></i>
                      <span>$60,000 - $75,000 / year</span>
                    </li>

                    <li>
                      <i class="fa fa-certificate"></i>
                      <span>Master or Bachelor</span>
                    </li>
                  </ul>
                </footer>
              </a>
            </div>
            <!-- END Job item -->
            
            
            <?php
            //make a div table instead of normal table
            
            //SELECT `jobid`, `compid`, `department`, `location`, `salary`, `dateposted`, `deadline` FROM `jobs` WHERE 1
            //SELECT `jobid`, `compid`, `department`, `location`, `salary`, `dateposted`, `deadline` FROM `jobs` WHERE `compid`=? AND `company`=?
            $thecompname = $_SESSION['compname'];
            $stmt = $mysqli->prepare("SELECT `jobid`, `compid`, `jobtitle`, `department`, `location`, `salary`, `dateposted`, `deadline` FROM `jobs` WHERE `compid`=? AND `company`=?");
            $stmt->bind_param("is", $thecompid, $thecompname);
            $stmt->execute();
            $stmt->bind_result($resultJID, $resultCID, $resultJTitle, $resultCDept, $resultJLoc, $resultJSalary, $resultJDatePosted, $resultJDeadline);
            
            while($stmt->fetch())
            {
              echo '
                <!-- Job item -->
                <div class="col-xs-12">
                  <a class="item-block" href="job-detail.html">
                    <form method="post" class="jTitlesComp" action="compViewJob.php">
                      <input type="hidden" class="hiddenInputJID" name="hInputJID" value="'.h($resultJID).'">
                      <button class="testbutton2" type="submit" name="theJTitle">
                        <header>
                          <img src="assets/img/logo-linkedin.png" alt="">
                          <div class="hgroup">
                            <h4>'.h($resultJTitle).'</h4>
                            <h5>'.h($thecompname).' <span class="label label-warning">Part-time</span></h5>
                          </div>
                          <time datetime="2016-03-10 20:00">8 hours ago-make deadline?</time>
                        </header>

                        <div class="item-body">
                          <p>pls change me</p>
                        </div>

                        <footer>
                          <ul class="details cols-3">
                            <li>
                              <i class="fa fa-map-marker"></i>
                              <span>'.h($resultJLoc).'</span>
                            </li>

                            <li>
                              <i class="fa fa-money"></i>
                              <span>'.h($resultJSalary).'</span>
                            </li>

                            <li>
                              <i class="fa fa-certificate"></i>
                              <span>Master or Bachelor</span>
                            </li>
                          </ul>
                        </footer>
                      </button>
                    </form>
                  </a>
                </div>
                <!-- END Job item -->';
                
              $somediv2= '
                <!-- Job item -->
                <div class="col-xs-12">
                  <a class="item-block" href="job-detail.html">
                  <form method="post" class="jTitlesComp" action="compViewJob.php">
                      <input type="hidden" class="hiddenInputJID" name="hInputJID" value="'.h($resultJID).'">
                      <button class="testbutton" type="submit" name="theJTitle">
                        <header>
                          <img src="assets/img/logo-google.jpg" alt="">
                          <div class="hgroup">
                            <h4>'.h($resultJTitle).'</h4>
                            <h5>Google</h5>
                          </div>
                          <div class="header-meta">
                            <span class="location">'.h($resultJLoc).'</span>
                            <span class="label label-success">Full-time</span>
                          </div>
                        </header>
                      </button>
                    </form>
                  </a>
                </div>
                <!-- END Job item -->
                ';
              $somediv = 
                '<div class="jobTableRow" id="JobtblDataRow">
                  <div class="tblColumn" id="dataJobTitle">
                    '.h($resultJTitle).'
                    <form method="post" class="jTitlesComp" action="compViewJob.php">
                      <input type="hidden" class="hiddenInputJID" name="hInputJID" value="'.h($resultJID).'">
                      <input class="jTitlesSubmit" type="submit" value="'.h($resultJTitle).'" name="theJTitle">
                    </form>
                  </div>
                  <div class="tblColumn" id="headingJobCDept">
                    '.h($resultCDept).'
                  </div>
                  <div class="tblColumn" id="headingJobLocation">
                    '.h($resultJLoc).'
                  </div>
                  <div class="tblColumn" id="headingJobSalary">
                    '.h($resultJSalary).'
                  </div>
                  <div class="tblColumn" id="headingJobDatePosted">
                    '.h($resultJDatePosted).'
                  </div>
                  <div class="tblColumn" id="headingJobDeadline">
                    '.h($resultJDeadline).'
                  </div>
                  <div class="tblColumn" id="headingJobCountApp">
                    NUMBERHEREPLS
                  </div>
                </div><!--table heading row end-->';
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
    <?php include 'comppagesbot.php'; ?>
    <!-- End of bot page cand all -->
  </body>

</html>