<!DOCTYPE html>
<html>

  <head>
    <?php include 'nologinheader.php';?>		
    <title>Cliqquer 2.0 WIP REG</title>		
    <!--script src='js/register.js' type='text/javascript' charset='utf-8'></script-->	
	<script src='assets/js/registerj.js' type='text/javascript' charset='utf-8'></script>		
  </head>  
    <body class="nav-on-header smart-nav">
    <!-- NAV bar -->
    <?php include 'nologinpagestop.php'; ?>
    <!-- END Navigation bar -->

    <!-- Site header -->
    <header class="site-header size-lg text-center" style="background-image: url(assets/images/home-header.jpg)">
      <div class="container">
        <div class="col-xs-12">

        </div><!-- col 12 bla -->

      </div><!-- container -->
    </header>
    <!-- END Site header -->

    <main>
      
      <!-- custom reg form candidate -->
      <div class="login-block regforms" id="home-login-block-cand">
        <img src="assets/images/cliqquer_logo_alt.png" alt="">
        <h1>Register as a Candidate - fix me pls</h1>

        <form name="candidateReg" method ="post" action="php/registrationcand.php" id="candRegF">
          
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
          
        </form>
      </div>
      <!-- END of custom reg form cand-->
      
      <!-- custom reg form comp -->
      <div class="login-block regforms"id="home-login-block-comp">
        <img src="assets/images/cliqquer_logo_alt.png" alt="">
        <h1>Register as a Company</h1>

        <form name="companyReg" method ="post" action="php/registrationcomp.php" id="compRegF">
          <!-- email -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-email"></i></span>
              <input type="text" class="form-control"  name="email1" id="email3" placeholder="Your email address(username)" required>
              <span class="input-group-addon"></span>
            </div>
          </div>
          
          <hr class="hr-xs">
          
          <!-- reenter email -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-email"></i></span>
              <input type="text" class="form-control"  name="email2" id="email4" placeholder="Re-enter email address" required>
			        <span class="input-group-addon"></span>
            </div>
          </div>
          
          <hr class="hr-xs">
          
          <!-- password -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-unlock"></i></span>
              <input type="password" class="form-control" name="password1" id="password3" placeholder="Choose a password" required>
              <span class="input-group-addon"></span>
            </div>
          </div>
          
          <hr class="hr-xs">
          
          <!-- renter password -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-unlock"></i></span>
              <input type="password" class="form-control" name="password2" id="password4" placeholder="Re-enter password" required>
			        <span class="input-group-addon"></span>
            </div>
          </div>
          
          <hr class="hr-xs">
          
          <!-- comp name -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-user"></i></span>
              <input type="text" class="form-control" id="compName" name="companyname" placeholder="Your Company name" required>
		      	  <span class="input-group-addon"></span>
            </div>
          </div>
          
          <hr class="hr-xs">
          
          <!-- t and c -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="ti-user"></i></span>
              <label>TERMS AND CONDITIONS FIX THIS</label>
              <input id="compCheckBox" type='checkbox' name="promo_emails">
            </div>
          </div>
          
          <hr class="hr-xs">
          
          <input class="formSubmit" id="compSubmit" type="submit" name="Register">
          
          <button class="btn btn-primary btn-block" type="submit">Sign up</button>

        </form>
      </div>
      <!-- END of custom reg form comp -->
      
      <div class="login-links">
        <p class="text-center">Already have an account? <a class="txt-brand" href="user-login.html">Login - maybe have login form here as well??</a></p>
      </div>

    </main>
    
    <!-- page footer stuff -->
    <?php include 'nologinpagesbot.php'; ?>
    <!-- END page footer stuff -->
    
  </body>

</html>