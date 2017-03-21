<?php
  include "../checkloggedincomp.php";
  include "../shortfunctions.php";
?>
<!DOCTYPE html>

<html>

  <head>
    <?php include 'compheader.php'; ?>
    <title>Cliqquer 2.0 WIP MADTING COMP EDIT PROF</title>
    <?php 
      error_reporting(E_ALL);
      ini_set("display_errors", 1);
    ?>	
	<script type="text/javascript" src="../../assets/js/compprofj.js"></script>
  </head>  

  <body class="nav-on-header smart-nav">

    <div class="all">
      <a href="../logout.php">LOGOUTHEREPLS</a>
      <div class="maintitle">COMP PROF PAGE</div>
      <div class="desc">      
        <a href="../dashboardtemp2.php">Link to dashboard</a>
        <br>
        <a id="editProfLink" href="#">Click here to edit</a>
        <br>
        <a href="createjob.php" id="createJob">CREATE A JOB PLS</a>
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
          
          
          echo '<div class="infotbl">';
		  
          //row1
		  
            echo '<div class="infotblrow">';
              echo '<div class="infotblrowleft">comp name: </div>';
              echo '<div class="infotblrowright">'.h($resultcname).'</div>';
            echo '</div>';
			
            //row1end
            //row2
			
            echo '<div class="infotblrow">';
              echo '<div class="infotblrowleft">email:</div>';
              echo '<div class="infotblrowright">'.h($resultemail).'</div>';
            echo '</div>';
			
            //row2end
            //row3		
			
			echo '<form method="post" id="changesForm" action="compedittingprofile.php">';			
				echo '<div class="infotblrow">';
					echo '<div class="infotblrowleft">comp reg no:</div>';					
					echo '<input type="text" name="cregno" id="cregValue" value="' . h($resultcregno) . '" disabled>';
					echo '<div class="infotblrowright">'.h($resultcregno).'</div>';
				echo '</div>';
				
            //row3end
            //row4
			
				echo '<div class="infotblrow">';
					echo '<div class="infotblrowleft">sector:</div>';					
					echo '<input type="text" name="sector" id="sectorValue" value="' . h($resultsector) . '" disabled>';
					echo '<div class="infotblrowright">'.h($resultsector).'</div>';
				echo '</div>';
				
            //row4end
            //row5
			
				echo '<div class="infotblrow">';
					echo '<div class="infotblrowleft">primary location:</div>';					
					echo '<input type="text" name="location" id="locationValue" value="' . h($resultlocation) . '" disabled>';
					echo '<div class="infotblrowright">'.h($resultlocation).'</div>';
				echo '</div>';
				
            //row5end
            //row6
			
				echo '<div class="infotblrow">';
					echo '<div class="infotblrowleft">desc:</div>';					
					echo '<input type="text" name="desc" id="descValue" value="' . h($resultdesc) . '" disabled>';
					echo '<div class="infotblrowright">'.h($resultdesc).'</div>';
				echo '</div>';
				
            //row6end
            //row7
			
				echo '<div class="infotblrow">';
					echo '<div class="infotblrowleft">website:</div>';					
					echo '<input type="url" name="website" id="websiteValue" value="' . h($resultwebsite) . '" disabled>';
					echo '<div class="infotblrowright">'.h($resultwebsite).'</div>';
				echo '</div>';
				
            //row7end
            //row8
			
				echo '<div class="infotblrow">';
					echo '<div class="infotblrowleft">contact no:</div>';					
					echo '<input type="text" name="contactno" id="contactnoValue" value="' . h($resultcontactno) . '" disabled>';
					echo '<div class="infotblrowright">'.h($resultcontactno).'</div>';
				echo '</div>';
				
            //row8end
            //row9
			
				echo '<div class="infotblrow">';
					echo '<div class="infotblrowleft">employee count:</div>';					
					echo '<input type="number" name="empcount" id="empcountValue" value="' . h($resultempcount) . '" disabled>';
					echo '<div class="infotblrowright">'.h($resultempcount).'</div>';
				echo '</div>';
				
            //row9end
            //row10
			
				echo '<div class="infotblrow">';
					echo '<div class="infotblrowleft">twitter:</div>';					
					echo '<input type="url" name="twitter" id="twitterValue" value="' . h($resulttwitter) . '" disabled>';
					echo '<div class="infotblrowright">'.h($resulttwitter).'</div>';
				echo '</div>';
				
            //row10end
            //row11
			
				echo '<div class="infotblrow">';
					echo '<div class="infotblrowleft">fb:</div>';					
					echo '<input type="url" name="fb" id="fbValue" value="' . h($resultfb) . '" disabled>';
					echo '<div class="infotblrowright">'.h($resultfb).'</div>';
				echo '</div>';
				
            //row11end
            //row12
			
				echo '<div class="infotblrow">';
					echo '<div class="infotblrowleft">linkedin:</div>';					
					echo '<input type="url" name="linkedin" id="linkedinValue" value="' . h($resultlinkedin) . '" disabled>';
					echo '<div class="infotblrowright">'.h($resultlinkedin).'</div>';
				echo '</div>';		
				
				echo '<input type="submit" value="Save Changes" id="savechanges" disabled>';	
				
			echo '</form>';	
			
			//form end
			//row12end
            
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
          echo '</div>';
          
          
          //copy and paste shit
          echo '<div class="infotbl">';
            echo '<div class="infotblrow">';
              echo '<div class="infotblrowleft"></div>';
              echo '<div class="infotblrowright"></div>';
            echo '</div>';
          echo '</div>';
          
        
        ?>
        
      </div>

    </div>
    <!-- End of all --> 

    <!-- nav bar -->
    <?php include 'comppagestop.php'; ?>
    <!-- END of nav bar -->

    <!-- Page header -->
    <header class="page-header bg-img size-lg" style="background-image: url(assets/img/bg-banner1.jpg)">
      <div class="container no-shadow">
        <h1 class="text-center">comp edit prof</h1>
        <p class="lead text-center">nice desc pls.</p>
      </div>
    </header>
    <!-- END Page header -->
    
    <main>
      <section class="no-padding-top bg-alt">
        <div class="container">
          <div class="row">
            <!-- custom edit prof -->
            <div class="login-block">
              <img src="assets/img/logo.png" alt="">
              <h1>comp edit prof - fix me pls</h1>

              <form name="compeditprof" method="post" action="php/registrationcand.php" id="comp-edit-prof-f">
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
      
      
      echo '<div class="infotbl">';
  
      //row1
  
        echo '<div class="infotblrow">';
          echo '<div class="infotblrowleft">comp name: </div>';
          echo '<div class="infotblrowright">'.h($resultcname).'</div>';
        echo '</div>';
  
        //row1end
        //row2
  
        echo '<div class="infotblrow">';
          echo '<div class="infotblrowleft">email:</div>';
          echo '<div class="infotblrowright">'.h($resultemail).'</div>';
        echo '</div>';
  
        //row2end
        //row3		
  
  echo '<form method="post" id="changesForm" action="compedittingprofile.php">';			
    echo '<div class="infotblrow">';
      echo '<div class="infotblrowleft">comp reg no:</div>';					
      echo '<input type="text" name="cregno" id="cregValue" value="' . h($resultcregno) . '" disabled>';
      echo '<div class="infotblrowright">'.h($resultcregno).'</div>';
    echo '</div>';
    
        //row3end
        //row4
  
    echo '<div class="infotblrow">';
      echo '<div class="infotblrowleft">sector:</div>';					
      echo '<input type="text" name="sector" id="sectorValue" value="' . h($resultsector) . '" disabled>';
      echo '<div class="infotblrowright">'.h($resultsector).'</div>';
    echo '</div>';
    
        //row4end
        //row5
  
    echo '<div class="infotblrow">';
      echo '<div class="infotblrowleft">primary location:</div>';					
      echo '<input type="text" name="location" id="locationValue" value="' . h($resultlocation) . '" disabled>';
      echo '<div class="infotblrowright">'.h($resultlocation).'</div>';
    echo '</div>';
    
        //row5end
        //row6
  
    echo '<div class="infotblrow">';
      echo '<div class="infotblrowleft">desc:</div>';					
      echo '<input type="text" name="desc" id="descValue" value="' . h($resultdesc) . '" disabled>';
      echo '<div class="infotblrowright">'.h($resultdesc).'</div>';
    echo '</div>';
    
        //row6end
        //row7
  
    echo '<div class="infotblrow">';
      echo '<div class="infotblrowleft">website:</div>';					
      echo '<input type="url" name="website" id="websiteValue" value="' . h($resultwebsite) . '" disabled>';
      echo '<div class="infotblrowright">'.h($resultwebsite).'</div>';
    echo '</div>';
    
        //row7end
        //row8
  
    echo '<div class="infotblrow">';
      echo '<div class="infotblrowleft">contact no:</div>';					
      echo '<input type="text" name="contactno" id="contactnoValue" value="' . h($resultcontactno) . '" disabled>';
      echo '<div class="infotblrowright">'.h($resultcontactno).'</div>';
    echo '</div>';
    
        //row8end
        //row9
  
    echo '<div class="infotblrow">';
      echo '<div class="infotblrowleft">employee count:</div>';					
      echo '<input type="number" name="empcount" id="empcountValue" value="' . h($resultempcount) . '" disabled>';
      echo '<div class="infotblrowright">'.h($resultempcount).'</div>';
    echo '</div>';
    
        //row9end
        //row10
  
    echo '<div class="infotblrow">';
      echo '<div class="infotblrowleft">twitter:</div>';					
      echo '<input type="url" name="twitter" id="twitterValue" value="' . h($resulttwitter) . '" disabled>';
      echo '<div class="infotblrowright">'.h($resulttwitter).'</div>';
    echo '</div>';
    
        //row10end
        //row11
  
    echo '<div class="infotblrow">';
      echo '<div class="infotblrowleft">fb:</div>';					
      echo '<input type="url" name="fb" id="fbValue" value="' . h($resultfb) . '" disabled>';
      echo '<div class="infotblrowright">'.h($resultfb).'</div>';
    echo '</div>';
    
        //row11end
        //row12
  
    echo '<div class="infotblrow">';
      echo '<div class="infotblrowleft">linkedin:</div>';					
      echo '<input type="url" name="linkedin" id="linkedinValue" value="' . h($resultlinkedin) . '" disabled>';
      echo '<div class="infotblrowright">'.h($resultlinkedin).'</div>';
    echo '</div>';		
    
    echo '<input type="submit" value="Save Changes" id="savechanges" disabled>';	
    
  echo '</form>';	
  
  //form end
  //row12end
        
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
      echo '</div>';
      
      
      //copy and paste shit
      echo '<div class="infotbl">';
        echo '<div class="infotblrow">';
          echo '<div class="infotblrowleft"></div>';
          echo '<div class="infotblrowright"></div>';
        echo '</div>';
      echo '</div>';
      
    
    ?>
                <!--email-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="ti-email"></i></span>
                    <input name="email1" id="email1" type="email" class="form-control" placeholder="Your email address">							 
              <span class="input-group-addon"></span>			  
                  </div>
                </div>
                
                <hr class="hr-xs">
                
                <!--reenter email-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="ti-email"></i></span>
                    <input name="email2" id="email2" type="text" class="form-control" placeholder="Re-enter your email address">			  			  
              <span class="input-group-addon"></span>
                  </div>
                </div>
                
                <hr class="hr-xs">
                
                <!--password-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="ti-unlock"></i></span>
                    <input type="password" name="password1" id="password1" class="form-control" placeholder="Choose a password">
              <span class="input-group-addon"></span>
                  </div>
                </div>
                
                <hr class="hr-xs">
                
                <!--reenter password-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="ti-unlock"></i></span>
                    <input type="password" name="password2" id="password2" class="form-control" placeholder="Re-enter password">
              <span class="input-group-addon"></span>
                  </div>
                </div>
                
                <hr class="hr-xs">
                
                <!-- title -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="ti-user"></i></span>
                    <select id="regisSelect" name="title">
                        <option class="regisOpts" disabled selected value> -- select an option -- </option>
                        <option class="regisOpts" value="Dr">Dr</option>
                        <option class="regisOpts" value="Mr">Mr</option>
                        <option class="regisOpts" value="Mrs">Mrs</option>
                        <option class="regisOpts" value="Ms">Ms</option>
                        <option class="regisOpts" value="Miss">Miss</option>
                        <option class="regisOpts" value="Other">Other</option>
                      </select>
              <span class="input-group-addon"></span>
                  </div>
                </div>
                
                <hr class="hr-xs">
                
                <!-- fname-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="ti-user"></i></span>
                    <input type="text" name="firstname" id="fname" class="form-control" placeholder="Your first name">
              <span class="input-group-addon"></span>
                  </div>
                </div>
                
                <hr class="hr-xs">
                
                <!-- lname-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="ti-user"></i></span>
                    <input type="text" name="lastname" id="lname" class="form-control" placeholder="Your last name">
              <span class="input-group-addon"></span>
                  </div>
                </div>
                
                <hr class="hr-xs">
                
                <!-- t and c -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="ti-user"></i></span>
                    <label>TERMS AND CONDITIONS FIX THIS</label>
                    <input id="candCheckBox" type='checkbox' name="promo_emails">
                  </div>
                </div>
                
                <hr class="hr-xs">
                <input class="formSubmit" id="comp-edit-prof-submit" type="submit" name="Register">
                <button class="btn btn-primary btn-block" type="submit">Sign up - change my to input box</button>

                
              </form>
            </div>
            <!-- End of custom edit prof -->

            <!-- custom reg form candidate -->
            <div class="login-block">
              <img src="assets/img/logo.png" alt="">
              <h1>Register your account - fix me pls</h1>

              <form name="candidateReg" method="post" action="php/registrationcand.php" id="candRegF">
                
                <!--email-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="ti-email"></i></span>
                    <input name="email1" id="email1" type="email" class="form-control" placeholder="Your email address">							 
              <span class="input-group-addon"></span>			  
                  </div>
                </div>
                
                <hr class="hr-xs">
                
                <!--reenter email-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="ti-email"></i></span>
                    <input name="email2" id="email2" type="text" class="form-control" placeholder="Re-enter your email address">			  			  
              <span class="input-group-addon"></span>
                  </div>
                </div>
                
                <hr class="hr-xs">
                
                <!--password-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="ti-unlock"></i></span>
                    <input type="password" name="password1" id="password1" class="form-control" placeholder="Choose a password">
              <span class="input-group-addon"></span>
                  </div>
                </div>
                
                <hr class="hr-xs">
                
                <!--reenter password-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="ti-unlock"></i></span>
                    <input type="password" name="password2" id="password2" class="form-control" placeholder="Re-enter password">
              <span class="input-group-addon"></span>
                  </div>
                </div>
                
                <hr class="hr-xs">
                
                <!-- title -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="ti-user"></i></span>
                    <select id="regisSelect" name="title">
                        <option class="regisOpts" disabled selected value> -- select an option -- </option>
                        <option class="regisOpts" value="Dr">Dr</option>
                        <option class="regisOpts" value="Mr">Mr</option>
                        <option class="regisOpts" value="Mrs">Mrs</option>
                        <option class="regisOpts" value="Ms">Ms</option>
                        <option class="regisOpts" value="Miss">Miss</option>
                        <option class="regisOpts" value="Other">Other</option>
                      </select>
              <span class="input-group-addon"></span>
                  </div>
                </div>
                
                <hr class="hr-xs">
                
                <!-- fname-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="ti-user"></i></span>
                    <input type="text" name="firstname" id="fname" class="form-control" placeholder="Your first name">
              <span class="input-group-addon"></span>
                  </div>
                </div>
                
                <hr class="hr-xs">
                
                <!-- lname-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="ti-user"></i></span>
                    <input type="text" name="lastname" id="lname" class="form-control" placeholder="Your last name">
              <span class="input-group-addon"></span>
                  </div>
                </div>
                
                <hr class="hr-xs">
                
                <!-- t and c -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="ti-user"></i></span>
                    <label>TERMS AND CONDITIONS FIX THIS</label>
                    <input id="candCheckBox" type='checkbox' name="promo_emails">
                  </div>
                </div>
                
                <hr class="hr-xs">
                <input class="formSubmit" id="candSubmit" type="submit" name="Register">
                <button class="btn btn-primary btn-block" type="submit">Sign up - change my to input box</button>

                <div class="login-footer">
                  <h6>Or register with - maybe future???</h6>
                  <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                  </ul>
                </div>
                
              </form>
            </div>
            <!-- END of custom reg form cand-->
          </div>
        </div>
      </section>
    </main>
    <!-- END Main container -->

    <!-- bot page cand all -->
    <?php include 'comppagesbot.php'; ?>
    <!-- End of bot page cand all -->
  </body>

</html>
<!--
          <div class="infotbl">
            <div class="infotblrow">
              <div class="infotblrowleft">comp name: </div>
              <div class="infotblrowright">

              </div>
            </div>
          </div>
          
          
          <div class="infotbl">
            <div class="infotblrow">
              <div class="infotblrowleft"></div>
              <div class="infotblrowright"></div>
            </div>
          </div>
          
          <div class="infotbl">
            <div class="infotblrow">
              <div class="infotblrowleft"></div>
              <div class="infotblrowright"></div>
            </div>
          </div>
        
  -->