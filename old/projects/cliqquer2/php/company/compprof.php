<?php
  include "../checkloggedincomp.php";
  include "../shortfunctions.php";
?>
<!-- cand prof template taken from resume detail -->
<!DOCTYPE html>

<html>

  <head>
    <?php include 'compheader.php'; ?>
    <title>Cliqquer 2.0 WIP MADTING COMP PROF</title>
    <?php 
      error_reporting(E_ALL);
      ini_set("display_errors", 1);
    ?>
    <!--
      <script type="text/javascript" src="../../assets/js/compprofj.js"></script>
    -->
  </head>  

  <body class="nav-on-header smart-nav">
    
    <!-- nav bar -->
    <?php include 'comppagestop.php'; ?>
    <!-- END of nav bar -->
    
    <?php
      //$thecompid is var for compid
      //SELECT `companyid`, `email`, `companyName`, `compregno`, `sector`, `location`, `description`, `website`, `contactno`, `employeecount`, `twitter`, `facebook`, `linkedin` FROM `companyDetails` WHERE 1
      //SELECT `companyid`, `email`, `companyName`, `compregno`, `sector`, `location`, `description`, `website`, `contactno`, `employeecount`, `twitter`, `facebook`, `linkedin` FROM `companyDetails` WHERE `companyid`=?
      $stmt1 = $mysqli->prepare("SELECT `email`, `companyName`, `compregno`, `sector`, `location`, `description`, `website`, `contactno`, `employeecount`, `twitter`, `facebook`, `linkedin` FROM `companyDetails` WHERE `companyid`=?");
      $stmt1->bind_param("i", $thecompid);
      $stmt1->execute();
      $stmt1->bind_result($resultemail, $resultcname, $resultcregno, $resultsector, $resultlocation, $resultdesc, $resultwebsite, $resultcontactno, $resultempcount, $resulttwitter, $resultfb, $resultlinkedin);
      $stmt1->fetch();
      $stmt1->close();

      /*
                `email`, 
                `companyName`, 
                `compregno`, 
                `sector`, 
                `location`, 
                `description`, 
                `website`, 
                `contactno`, 
                `employeecount`, 
                `twitter`, 
                `facebook`, 
                `linkedin` 
      */
    ?>
    
    <!-- Page header -->
    <header class="page-header bg-img" style="background-image: url(assets/img/bg-banner1.jpg)">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-4">
            <img src="assets/img/avatar.jpg" alt="">
          </div>
<?php
// to help put vars in correct places
//$resultemail, $resultcname, $resultcregno, 
//$resultsector, $resultlocation, $resultdesc, 
//$resultwebsite, $resultcontactno, $resultempcount, 
//$resulttwitter, $resultfb, $resultlinkedin
?>
          <div class="col-xs-12 col-sm-8 header-detail">
            <div class="hgroup">
              <h1><?php echo $resultcname; ?></h1>
              <h3>Pref Role: <?php echo ''; ?></h3>
            </div>
            <hr>
            <p class="lead">
              <?php echo $resultdesc; ?>
            </p>

            <ul class="details cols-2">
              <li>
                <i class="fa fa-map-marker"></i>
                <span><?php echo $resultlocation; ?></span>
              </li>

              <li>
                <i class="fa fa-globe"></i>
                <a href="<?php echo $resultwebsite; ?>"><?php echo $resultwebsite; ?></a>
              </li>

              <li>
                <i class="fa fa-money"></i>
                <span>Pref salary: <?php echo ''; ?></span>
              </li>

              <li>
                <i class="fa fa-birthday-cake"></i>
                <span>27 years-old</span>
              </li>

              <li>
                <i class="fa fa-phone"></i>
                <span><?php echo $resultcontactno; ?></span>
              </li>

              <li>
                <i class="fa fa-envelope"></i>
                <a href="#"><?php echo $resultemail; ?></a>
              </li>
            </ul>

            <div class="tag-list">
              <span>HTML5</span>
              <span>CSS3</span>
              <span>Bootstrap</span>
              <span>ReactJS</span>
              <span>SASS / LESS</span>
              <span>Grunt / Gulp</span>
              <span>Wordpress</span>
            </div>
          </div>
        </div>

        <div class="button-group">
          <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
          </ul>

          <div class="action-buttons">
            <a class="btn btn-success" href="compeditprof.php">Edit</a>
            <a class="btn btn-success" data-toggle="modal" data-target="#modal-contact" href="#">Contact me</a>
          </div>
        </div>
      </div>
    </header>
    <!-- END Page header -->


    <!-- Main container -->
    <main>


      <!-- Education -->
      <section>
        <div class="container">

          <header class="section-header">
            <span>Latest degrees</span>
            <h2>Education</h2>
          </header>
          
          <div class="row">
            <div class="col-xs-12">
              <div class="item-block">
                <header>
                  <img src="assets/img/logo-mit.png" alt="">
                  <div class="hgroup">
                    <h4>Master <small>Computer Science</small></h4>
                    <h5>Massachusetts Institute of Technology</h5>
                  </div>
                  <h6 class="time">2012 - 2014</h6>
                </header>
                <div class="item-body">
                  <p>The Massachusetts Institute of Technology (MIT) is a private research university in Cambridge, Massachusetts. Founded in 1861 in response to the increasing industrialization of the United States, MIT adopted a European polytechnic university model and stressed laboratory instruction in applied science and engineering.</p>
                </div>
              </div>
            </div>

            <div class="col-xs-12">
              <div class="item-block">
                <header>
                  <img src="assets/img/logo-berkeley.png" alt="">
                  <div class="hgroup">
                    <h4>Bachelor <small>Computer Science</small></h4>
                    <h5>University of California, Berkeley</h5>
                  </div>
                  <h6 class="time">2008 - 2012</h6>
                </header>
                <div class="item-body">
                  <p>The University of California, Berkeley is a public research university located in Berkeley, California. It is the flagship campus of the University of California system, one of three parts in the state's public higher education plan, which also includes the California State University system and the California Community Colleges System.</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>
      <!-- END Education -->


      <!-- Work Experience -->
      <section class="bg-alt">
        <div class="container">
          <header class="section-header">
            <span>Past positions</span>
            <h2>Work Experience</h2>
          </header>
          
          <div class="row">

            <!-- Work item -->
            <div class="col-xs-12">
              <div class="item-block">
                <header>
                  <img src="assets/img/logo-google.jpg" alt="">
                  <div class="hgroup">
                    <h4>Google</h4>
                    <h5>Senior front-end developer</h5>
                  </div>
                  <h6 class="time">Jan 2016 - Present</h6>
                </header>
                <div class="item-body">
                  <p>Responsibilities:</p>
                  <ul>
                    <li>Developed front-end for world-class online social viewing video and chat platform using xHTML, CSS, ActionScript 2-3, Javascript, and XML.</li>
                    <li>Developed built-in chat application into Flash video player in ActionScript 3.</li>
                    <li>Built and developed sites for ABC Family properties such as Gilmore Girls, The Middleman, Secret Life of an American Teenager, Greek, and Kyle XY. </li>
                    <li>Translate designs into responsive web interfaces </li>
                    <li>Collaboration with the graphic designer on the front-end aspect of development. </li>
                    <li>Cross-platform cross-browser development. </li>
                    <li>Some back-end development in collaboration with senior developer.</li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- END Work item -->





          </div>

        </div>
      </section>
      <!-- END Work Experience -->

    </main>
    <!-- END Main container -->
    
    <!-- bot page cand all -->
    <?php include 'comppagesbot.php'; ?>
    <!-- End of bot page cand all -->
    
    <!-- Contact modal -->
    <div class="modal fade" id="modal-contact" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true">&times;</span>
            </button>
            <h5 class="modal-title" id="myModalLabel">Send message</h5>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="subject" class="control-label">Subject</label>
                <input type="text" class="form-control" id="subject">
              </div>
              <div class="form-group">
                <label for="message-text" class="control-label">Message</label>
                <textarea class="form-control" id="message-text"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-gray" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Send</button>
          </div>
        </div><!-- modal content -->
      </div><!-- modal dialog -->
    </div><!-- modal fade -->
    
  </body>

</html>