<?php	session_start();	if(isset($_SESSION['candid'])){		header('Location: ./php/dashboardtemp.php');		die();	}elseif(isset($_SESSION['compid'])){		header('Location: ./php/dashboardtemp2.php');		die();	}?><!DOCTYPE html>
<html>

  <head>
    <?php include 'nologinheader.php';?>
    <title>Cliqquer 2.0 WIP</title>
    <!--script src='js/login.js' type='text/javascript' charset='utf-8'></script-->
    <script src='assets/js/home.js' type='text/javascript' charset='utf-8'></script>
  </head>
  
  <body class="nav-on-header smart-nav">
    <div class="all">
      <div class="maintitle">Cliqquer 2.0 WIP</div>
    </div><!--all-->
    <!-- NAV bar -->
    <?php include 'nologinpagestop.php'; ?>
    <!-- END Navigation bar -->


    <!-- Site header -->
    <header class="site-header size-lg text-center" style="background-image: url(assets/images/home-header.jpg)">
      <div class="container">
        <div class="col-xs-12">
          <div id="temphomebuttonholder">
            <a class="btn btn-outline btn-success" id="login-cand-form-show">Login in Cand</a>
            <a class="btn btn-outline btn-success" id="login-comp-form-show">Login in Comp</a>
          </div>
          <br>
          <div id="login-form-container">
            <!-- custom log in form candidate -->
            <div class="login-block" id="home-login-block-cand">
              <img src="assets/images/cliqquer_logo_alt.png" alt="">
              <h1>Candidate Login</h1>

              <form name='candLogin' method ='post' action='php/loggingincand.php' id="loginform">
                
                <!--email-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="ti-email"></i></span>
                    <input name="email" id="email" type="text" class="form-control" placeholder="Enter Your Email (username)" required>
                  </div>
                </div>
                
                <hr class="hr-xs">
                
                <!--password-->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="ti-unlock"></i></span>
                    <input type="password" name="pass" id="pass" class="form-control" placeholder="Enter your password" required>
                  </div>
                </div>
                
                <hr class="hr-xs">
                
                <input type="submit" name="Login" class="home-form-submit" id="home-cand-login" value="Login">
                <!--<button class="btn btn-primary btn-block" type="submit">Login - change my to input box</button>-->
                
              </form>
            </div>
            <!-- END of custom log in form cand -->
            
            <!-- custom reg form comp -->
            <div class="login-block" id="home-login-block-comp">
              <img src="assets/images/cliqquer_logo_alt.png" alt="">
              <h1>Company Login</h1>

              <form name='compLogin' method ='post' action='php/loggingincomp.php' id="loginform">
                <!-- email -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="ti-email"></i></span>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Your email address(username)" required>
                  </div>
                </div>
                
                <hr class="hr-xs">
                
                <!-- password -->
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="ti-unlock"></i></span>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Choose a password" required>
                  </div>
                </div>
                
                <hr class="hr-xs">
                
                <input type="submit" name="Login" class="home-form-submit" id="home-comp-login" value="Login">
                <!--<button class="btn btn-primary btn-block" type="submit">Sign up - fix </button>-->

              </form>
            </div>
            <!-- END of custom log in form comp -->
          </div>

        </div><!-- col 12 bla -->

      </div><!-- container -->
    </header>
    <!-- END Site header -->


    <!-- Main container -->
    <main>
      <!-- rand info 1 -->
      <section class="bg-alt">
        <div class="container">

          <div class="col-sm-12 col-md-6">
            <header class="section-header text-left">
              <span>Happiness and a dream career, only one click away. </span>
              <h2>We match you with the company that you belong to.</h2>
            </header>

            <p class="lead">"87% of the global workforce is disengaged by their work culture" - Richard Branson</p>
            <p>
              <strong><i>Transparent Employer Brand.</i></strong>  With Cliqquer, what you can bring to a role matters as much as your achievements. Our platform matches you with company that fits you, so you will be best you can be.
              <br><br>
              <strong><i>Control.</i></strong> Cliqquer offers you the latest and best jobs at your favourite tech companies in one place. Save time looking for vacancies and start applying now. 
              <br><br>
              <strong><i>Anonymity.</i></strong> First impressions matter. Your skills, not the looks. Cliqquer guarantees your profile is anonymous till you land an interview.
            </p>
            
            <!--
            <br><br>
            <a class="btn btn-primary" href="page-typography.html">Learn more</a>-->
          </div>

          <div class="col-sm-12 col-md-6 hidden-xs hidden-sm">
            <br>
            <img class="center-block" src="assets/images/home_img_1.jpg" alt="how it works">
          </div>

        </div>
      </section>
      <!-- END rand info 1 -->

      <!-- How it works -->
      <section>
        <div class="container">

          <div class="col-sm-12 col-md-6 hidden-xs hidden-sm">
            <br>
            <img class="center-block" src="assets/images/how_it_works.jpg" alt="how it works">
          </div>

          <div class="col-sm-12 col-md-6">
            <header class="section-header text-left">
              <span>Workflow</span>
              <h2>How it works</h2>
            </header>

            <p class="lead">some info here?</p>
            <p>
              <strong><i>Step 1.</i></strong> Create a Profile. 
              <br><br>
              <strong><i>Step 2.</i></strong> Get approved and start applying for jobs. 
              <br><br>
              <strong><i>Step 3.</i></strong> Fill in culture assessments. 
              <br><br>
              <strong><i>Step 4.</i></strong> Land an interview. 
            </p>
            
            
            <br><br>
            <a class="btn btn-primary" href="page-typography.html">Learn more</a>
          </div>

        </div>
      </section>
      <!-- END How it works -->

      <!-- How it works -->
      <section>
        <div class="container">

          <div class="col-sm-12 col-md-6">
            <header class="section-header text-left">
              <span>Workflow</span>
              <h2>How it works</h2>
            </header>

            <p class="lead">some info here?</p>
            <p>
              <strong><i>Step 1.</i></strong> Create a Profile. 
              <br><br>
              <strong><i>Step 2.</i></strong> Get approved and start applying for jobs. 
              <br><br>
              <strong><i>Step 3.</i></strong> Fill in culture assessments. 
              <br><br>
              <strong><i>Step 4.</i></strong> Land an interview. 
            </p>
            
            
            <br><br>
            <a class="btn btn-primary" href="page-typography.html">Learn more</a>
          </div>

          <div class="col-sm-12 col-md-6 hidden-xs hidden-sm">
            <br>
            <img class="center-block" src="assets/images/how_it_works.jpg" alt="how it works">
          </div>

        </div>
      </section>
      <!-- END How it works -->
<!--
< !- - How it works - - >
      <section>
        <div class="container">

          <div class="col-sm-12 col-md-6 hidden-xs hidden-sm">
            <br>
            <img class="center-block" src="assets/img/how-it-works.png" alt="how it works">
          </div>

          <div class="col-sm-12 col-md-6">
            <header class="section-header text-left">
              <span>Workflow</span>
              <h2>How it works</h2>
            </header>

            <p class="lead">Pellentesque et pulvinar orci. Suspendisse sed euismod purus. Pellentesque nunc ex, ultrices eu enim non, consectetur interdum nisl. Nam congue interdum mauris, sed ultrices augue lacinia in. Praesent turpis purus, faucibus in tempor vel, dictum ac eros.</p>
            <p>Nulla quis felis et orci luctus semper sit amet id dui. Aenean ultricies lectus nunc, vel rhoncus odio sagittis eu. Sed at felis eu tortor mattis imperdiet et sed tortor. Nullam ac porttitor arcu. Vivamus tristique elit id tempor lacinia. Donec auctor at nibh eget tincidunt. Nulla facilisi. Nunc condimentum dictum mattis.</p>
            
            
            <br><br>
            <a class="btn btn-primary" href="page-typography.html">Learn more</a>
          </div>

        </div>
      </section>
      < !- - END How it works - - >

      <!- - How it works - ->
      <section>
        <div class="container">

          <div class="col-sm-12 col-md-6">
            <header class="section-header text-left">
              <span>Workflow</span>
              <h2>How it works</h2>
            </header>

            <p class="lead">some info here?</p>
            <p>
              <strong><i>Step 1.</i></strong> Create a Profile. 
              <br><br>
              <strong><i>Step 2.</i></strong> Get approved and start applying for jobs. 
              <br><br>
              <strong><i>Step 3.</i></strong> Fill in culture assessments. 
              <br><br>
              <strong><i>Step 4.</i></strong> Land an interview. 
            </p>
            
            
            <br><br>
            <a class="btn btn-primary" href="page-typography.html">Learn more</a>
          </div>

          <div class="col-sm-12 col-md-6 hidden-xs hidden-sm">
            <br>
            <img class="center-block" src="assets/images/how_it_works.jpg" alt="how it works">
          </div>

        </div>
      </section>
      <!- - END How it works - ->

-->

      <!-- Facts - - >
      <section class="bg-img bg-repeat no-overlay section-sm" style="background-image: url(assets/img/bg-pattern.png)">
        <div class="container">
        </div>
      </section>
      < !- - END Facts -->


      <!-- Newsletter -->
      <section class="bg-img text-center" style="background-image: url(assets/img/bg-facts.jpg)">
        <div class="container">
          <h2><strong>Subscribe</strong></h2>
          <h6 class="font-alt">Get weekly top new jobs delivered to your inbox</h6>
          <br><br>
          <form class="form-subscribe" action="#">
            <div class="input-group">
              <input type="text" class="form-control input-lg" placeholder="Your eamil address">
              <span class="input-group-btn">
                <button class="btn btn-success btn-lg" type="submit">Subscribe</button>
              </span>
            </div>
          </form>
        </div>
      </section>
      <!-- END Newsletter -->


    </main>
    <!-- END Main container -->

    <!-- page footer stuff -->
    <?php include 'nologinpagesbot.php'; ?>
    <!-- END page footer stuff -->
    
  </body>
</html>
