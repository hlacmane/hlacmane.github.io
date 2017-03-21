<?php
  include "../checkloggedincand.php";
  include "../shortfunctions.php";	
?>
<!-- cand prof template taken from resume detail -->
<!DOCTYPE html>

<html>

  <head>
    <?php include 'candheader.php'; ?>
    <title>Cliqquer 2.0 WIP MADTING</title>
    <?php 
      error_reporting(E_ALL);
      ini_set("display_errors", 1);
    ?>
	<script type="text/javascript" src="../../assets/js/candprofj.js"></script>
  </head>  

  <body class="nav-on-header smart-nav">

    <div class="all">
      <div class="maintitle">DASHBOARD TMP</div>
      <div class="desc">
        <br>
        link to jobs
        <div id="editProf"><a id="editProfLink" href="#">Click here to edit</a></div>
        havebe have js with form to over lap, or output into form default val, then have it editale when clicked.
        <br>
        <?php
          //$theuserid is var for candid
          //SELECT `email`, `title`, `firstname`, `lastname`, `age`, `gender`, `location`, `website`, `phonenumber`, `prefrole`, `prefsalary`, `linkedin` FROM `candidateDetails` WHERE 1
          //SELECT `email`, `title`, `firstname`, `lastname`, `age`, `gender`, `location`, `website`, `phonenumber`, `prefrole`, `prefsalary`, `linkedin` FROM `candidateDetails` WHERE `candidateid`=?
          $stmt1 = $mysqli->prepare("SELECT `email`, `title`, `firstname`, `lastname`, `age`, `gender`, `location`, `website`, `phonenumber`, `prefrole`, `prefsalary`, `linkedin` FROM `candidateDetails` WHERE `candidateid`=?");
          $stmt1->bind_param("i", $theuserid);
          $stmt1->execute();
          $stmt1->bind_result($resultemail, $resulttitle, $resultfname, $resultlname, $resultage, $resultgender, $resultlocation, $resultwebsite, $resultphoneno, $resultprefrole, $resultprefsalary, $resultlinkedin);
          $stmt1->fetch();
          $stmt1->close();
          
          echo '<div class="infotbl">';
            
            //row1
			
            echo '<div class="infotblrow">';
              echo '<div class="infotblrowleft">email:</div>';
              echo '<div class="infotblrowright">'.h($resultemail).'</div>';
            echo '</div>';
			
            //row1end
            //row2
			
            echo '<div class="infotblrow">';
              echo '<div class="infotblrowleft">title: </div>';
              echo '<div class="infotblrowright">'.h($resulttitle).'</div>';
            echo '</div>';
			
            //row2end
            //row3
			
            echo '<div class="infotblrow">';
              echo '<div class="infotblrowleft">fname:</div>';
              echo '<div class="infotblrowright">'.h($resultfname).'</div>';
            echo '</div>';
			
            //row3end
            //row4
			
            echo '<div class="infotblrow">';
              echo '<div class="infotblrowleft">lname:</div>';
              echo '<div class="infotblrowright">'.h($resultlname).'</div>';
            echo '</div>';
			
            //row4end
            //row5
			//start of form
			
			echo '<form method="post" id="changesForm" action="candedittingprofile.php">';
			
				echo '<div class="infotblrow">';
					echo '<div class="infotblrowleft">age - maybe get dob here:</div>';				
					echo '<input type="text" name="age" id="ageValue" value="' . h($resultage) . '" disabled>';
					echo '<div class="infotblrowright" id="ageinfo">'.h($resultage).'</div>';
				echo '</div>';
			
            //row5end
            //row6
			
				echo '<div class="infotblrow">';
					echo '<div class="infotblrowleft">gender:</div>';							
					echo '<select name="gender" id="genderValue" disabled>';	
						echo '<option value="' . h($resultgender) . '" selected>' . h($resultgender) . '</option>';
						echo '<option value="----------" disabled>----------</option>';
						echo '<option value="Other">Other</option>';					
						echo '<option value="Female">Female</option>';					
						echo '<option value="Male">Male</option>';				
					echo '</select>';				
					echo '<div class="infotblrowright" id="genderinfo">'.h($resultgender).'</div>';
				echo '</div>';
			
            //row6end
            //row7
			
				echo '<div class="infotblrow">';
					echo '<div class="infotblrowleft">location:</div>';				
					echo '<input type="text" name="location" id="locationValue" value="' . h($resultlocation) . '" disabled>';
					echo '<div class="infotblrowright" id="locationinfo">'.h($resultlocation).'</div>';
				echo '</div>';
			
            //row7end
            //row8
			
				echo '<div class="infotblrow">';
					echo '<div class="infotblrowleft">website:</div>';				
					echo '<input type="url" name="website" id="websiteValue" value="' . h($resultwebsite) . '" disabled>';
					echo '<div class="infotblrowright" id="websiteinfo">'.h($resultwebsite).'</div>';
				echo '</div>';
			
            //row8end
            //row9
			
				echo '<div class="infotblrow">';
					echo '<div class="infotblrowleft">phone no:</div>';				
					echo '<input type="tel" name="phoneno" id="phonenoValue" value="' . h($resultphoneno) . '" disabled>';
					echo '<div class="infotblrowright" id="phonenoinfo">'.h($resultphoneno).'</div>';
				echo '</div>';
			
            //row9end
            //row10
			
				echo '<div class="infotblrow">';
					echo '<div class="infotblrowleft">pref role:</div>';				
					echo '<input type="text" name="prefrole" id="prefroleValue" value="' . h($resultprefrole) . '" disabled>';
					echo '<div class="infotblrowright" id="prefroleinfo">'.h($resultprefrole).'</div>';
				echo '</div>';
			
            //row10end
            //row11
			
				echo '<div class="infotblrow">';
					echo '<div class="infotblrowleft">pref salary:</div>';			
					echo '<select id="prefsalaryValue" name="prefsalary" required disabled>';
						echo '<option class="cJobSalaryOpts" value="' . h($resultprefsalary) . '" selected>' . h($resultprefsalary) . '</option>';
						echo '<option class="cJobSalaryOpts" disabled value> -- select an option -- </option>';
						echo '<option class="cJobSalaryOpts" value="below 20,000">below 20,000</option>';
						echo '<option class="cJobSalaryOpts" value="20,000 - 25,000">20,000 - 25,000</option>';
						echo '<option class="cJobSalaryOpts" value="25,000 - 30,000">25,000 - 30,000</option>';
						echo '<option class="cJobSalaryOpts" value="30,000 - 35,000">30,000 - 35,000</option>';
						echo '<option class="cJobSalaryOpts" value="35,000 - 40,000">35,000 - 40,000</option>';
						echo '<option class="cJobSalaryOpts" value="40,000 - 45,000">40,000 - 45,000</option>';
						echo '<option class="cJobSalaryOpts" value="45,000 - 50,000">45,000 - 50,000</option>';
						echo '<option class="cJobSalaryOpts" value="50,000 - 55,000">50,000 - 55,000</option>';
						echo '<option class="cJobSalaryOpts" value="55,000 - 60,000">55,000 - 60,000</option>';
						echo '<option class="cJobSalaryOpts" value="60,000 - 65,000">60,000 - 65,000</option>';
						echo '<option class="cJobSalaryOpts" value="65,000 - 70,000">65,000 - 70,000</option>';
						echo '<option class="cJobSalaryOpts" value="70,000 - 75,000">70,000 - 75,000</option>';
						echo '<option class="cJobSalaryOpts" value="75,000 - 80,000">75,000 - 80,000</option>';
						echo '<option class="cJobSalaryOpts" value="80,000 - 85,000">80,000 - 85,000</option>';
						echo '<option class="cJobSalaryOpts" value="85,000 - 90,000">85,000 - 90,000</option>';
						echo '<option class="cJobSalaryOpts" value="90,000 - 95,000">90,000 - 95,000</option>';
						echo '<option class="cJobSalaryOpts" value="95,000 - 100,000">95,000 - 100,000</option>';
						echo '<option class="cJobSalaryOpts" value="above 100,000">above 100,000</option>';
					echo '</select>';
					echo '<div class="infotblrowright" id="prefsalaryinfo">'.h($resultprefsalary).'</div>';
				echo '</div>';
			
            //row11end
            //row12
			
				echo '<div class="infotblrow">';
					echo '<div class="infotblrowleft">linkedin:</div>';				
					echo '<input type="url" name="linkedin" id="linkedinValue" value="' . h($resultlinkedin) . '" disabled>';
					echo '<div class="infotblrowright" id="linkedininfo">'.h($resultlinkedin).'</div>';
				echo '</div><br>';
				
				echo '<input type="submit" value="Save Changes" id="savechanges" disabled>';
			
			echo '</form>';
			
			//end of form
            //row12end
            
            /*
            `email`, 
            `title`, 
            `firstname`, 
            `lastname`, 
            `age`, 
            `gender`, 
            `location`, 
            `website`, 
            `phonenumber`, 
            `prefrole`, 
            `prefsalary`, 
            `linkedin`
            */
        ?>
      </div><!-- desc -->
    </div><!-- all -->
    
    
    
    <!-- nav bar -->
    <?php include 'candpagestop.php'; ?>
    <!-- END of nav bar -->
    
    <!-- Page header -->
    <header class="page-header bg-img" style="background-image: url(assets/img/bg-banner1.jpg)">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-4">
            <img src="assets/img/avatar.jpg" alt="">
          </div>

          <div class="col-xs-12 col-sm-8 header-detail">
            <div class="hgroup">
              <h1><?php echo $resulttitle.' '.$resultfname.' '.$resultlname; ?></h1>
              <h3>Pref Role: <?php echo $resultprefrole; ?></h3>
            </div>
            <hr>
            <p class="lead">The front end  is the part that users see and interact with, includes the User Interface, the animations, and usually a bunch of logic to talk to the backend. It is the visual bit that the user interacts with. This includes the design, images, colours, buttons, forms, typography, animations and content. It’s basically everything that you as a user of the website can see.</p>

            <ul class="details cols-2">
              <li>
                <i class="fa fa-map-marker"></i>
                <span>Mountain view, CA</span>
              </li>

              <li>
                <i class="fa fa-globe"></i>
                <a href="#">mywebsite.me</a>
              </li>

              <li>
                <i class="fa fa-money"></i>
                <span>$85 / hour</span>
              </li>

              <li>
                <i class="fa fa-birthday-cake"></i>
                <span>27 years-old</span>
              </li>

              <li>
                <i class="fa fa-phone"></i>
                <span>(+1) 123 456 7890</span>
              </li>

              <li>
                <i class="fa fa-envelope"></i>
                <a href="#">hi@mywebsite.me</a>
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
            <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
          </ul>

          <div class="action-buttons">
            <a class="btn btn-gray" href="#">Download CV</a>
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


            <!-- Work item -->
            <div class="col-xs-12">
              <div class="item-block">
                <header>
                  <img src="assets/img/logo-facebook.png" alt="">
                  <div class="hgroup">
                    <h4>Facebook</h4>
                    <h5>Interface developer</h5>
                  </div>
                  <h6 class="time">Aug 2014 - Jan 2016</h6>
                </header>
                <div class="item-body">
                  <p>Responsibilities:</p>
                  <ul>
                    <li>Work as a part of a large team on a major corporate project</li>
                    <li>Responsible for all aspects of presentation layer development including developing templates using HTML, DHTML, Javascript, XML, and XSL.</li>
                    <li>Rapid-prototyping for usability studies and new business development.</li>
                    <li>Collaboration with the graphic designer on the front-end aspect of development.</li>
                    <li>Some back-end development in collaboration with senior developer.</li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- END Work item -->


            <!-- Work item -->
            <div class="col-xs-12">
              <div class="item-block">
                <header>
                  <img src="assets/img/logo-envato.png" alt="">
                  <div class="hgroup">
                    <h4>Envato</h4>
                    <h5>Quality assurance engineer</h5>
                  </div>
                  <h6 class="time">Mar 2012 - Jun 2014</h6>
                </header>
                <div class="item-body">
                  <p>Responsibilities:</p>
                  <ul>
                    <li>Software testing in a Web Applications/Mobile environment.</li>
                    <li>Software Test Plans from Business Requirement Specifications for test engineering group.</li>
                    <li>Run production tests as part of software implementation; Create, deliver and support test plans for testing group to execute.</li>
                    <li>Software testing in a Web Applications environment.</li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- END Work item -->


          </div>

        </div>
      </section>
      <!-- END Work Experience -->


      <!-- Skills -->
      <section>
        <div class="container">
          <header class="section-header">
            <span>Expertise Areas</span>
            <h2>Skills</h2>
          </header>
          
          <br>
          <ul class="skills cols-3">
            <li>
              <div>
                <span class="skill-name">HTML</span>
                <span class="skill-value">100%</span>
              </div>
              <div class="progress">
                <div class="progress-bar" style="width: 100%;"></div>
              </div>
            </li>

            <li>
              <div>
                <span class="skill-name">CSS</span>
                <span class="skill-value">95%</span>
              </div>
              <div class="progress">
                <div class="progress-bar" style="width: 95%;"></div>
              </div>
            </li>

            <li>
              <div>
                <span class="skill-name">Javascript</span>
                <span class="skill-value">80%</span>
              </div>
              <div class="progress">
                <div class="progress-bar" style="width: 80%;"></div>
              </div>
            </li>

            <li>
              <div>
                <span class="skill-name">Photoshop</span>
                <span class="skill-value">60%</span>
              </div>
              <div class="progress">
                <div class="progress-bar" style="width: 60%;"></div>
              </div>
            </li>

            <li>
              <div>
                <span class="skill-name">ReactJS</span>
                <span class="skill-value">70%</span>
              </div>
              <div class="progress">
                <div class="progress-bar" style="width: 70%;"></div>
              </div>
            </li>

            <li>
              <div>
                <span class="skill-name">Team work</span>
                <span class="skill-value">90%</span>
              </div>
              <div class="progress">
                <div class="progress-bar" style="width: 90%;"></div>
              </div>
            </li>
          </ul>

        </div>
      </section>
      <!-- END Skills -->


    </main>
    <!-- END Main container -->
    
    <!-- bot page cand all -->
    <?php include 'candpagesbot.php'; ?>
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
        </div>
      </div>
    </div>
  </body>
</html>