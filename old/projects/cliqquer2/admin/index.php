<!DOCTYPE html>

<html>

  <head>
    <?php include 'adminheader.php'; ?>
    <title>ADMIN LOGIN</title>
    <?php 
      error_reporting(E_ALL);
      ini_set("display_errors", 1);
    ?>
  </head>  

  <body>

    <div class="all">
      <div class="maintitle">ADMIN LOGIN</div>
      <div class="desc">
        <a href="candprof.php">MAKE A USEFUL LINK PLS</a>
        
        <div id="adminloginformholder">
          <form id="adminloginform" method="post" action="logginginadmin.php">
            
            <div class="formRow">
              <div class="adminloginformleftside">
                <label class="adminloginformlabels">email:</label>
              </div>
              <div class="adminloginformrightside">
                <input class="adminlogininputs" name="email" id="adminemail" type="email"></input>
              </div>
            </div><!--end of form row-->
            
            <div class="formRow">
              <div class="adminloginformleftside">
                <label class="adminloginformlabels">Password:</label>
              </div>
              <div class="adminloginformrightside">
                <input class="adminlogininputs" type="password" name="pass" id="adminpass" required></input>
              </div>
            </div><!--end of form row-->
            
            <div class="formRow" id="loginSubmitRow">
              <input type="submit" name="Login" class="formSubmit" id="adminLogin" required></input>
            </div><!--end of form row-->
            
          </form>
        </div>
        
        <br><br><hr><br><br>
        
        <div id="adminregformholder">
          <form id="adminregform" method="post" action="regadmin.php">
            
            <div class="formRow">
              <div class="adminloginformleftside">
                <label class="adminregformlabels">email:</label>
              </div>
              <div class="adminloginformrightside">
                <input class="adminlogininputs" name="email" id="adminregemail" type="email" required></input>
              </div>
            </div><!--end of form row-->
            
            <div class="formRow">
              <div class="adminloginformleftside">
                <label class="adminloginformlabels">Password:</label>
              </div>
              <div class="adminloginformrightside">
                <input class="adminlogininputs" type="password" name="pass" id="adminregpass" required></input>
              </div>
            </div><!--end of form row-->
            
            <div class="formRow">
              <div class="adminloginformleftside">
                <label class="adminloginformlabels">Code:</label>
              </div>
              <div class="adminloginformrightside">
                <input class="adminlogininputs" type="password" name="code" id="adminregcode" required></input>
              </div>
            </div><!--end of form row-->
            
            <div class="formRow">
              <div class="adminloginformleftside">
                <label class="adminregformlabels">fname:</label>
              </div>
              <div class="adminloginformrightside">
                <input class="adminlogininputs" name="fname" id="adminregfname" required></input>
              </div>
            </div><!--end of form row-->
            
            <div class="formRow">
              <div class="adminloginformleftside">
                <label class="adminregformlabels">lname:</label>
              </div>
              <div class="adminloginformrightside">
                <input class="adminlogininputs" name="lname" id="adminreglname" required></input>
              </div>
            </div><!--end of form row-->
            
            <div class="formRow" id="loginSubmitRow">
              <input type="submit" name="Login" class="formSubmit" id="adminreg"></input>
            </div><!--end of form row-->
            
          </form>
        </div>
        
      </div><!--desc-->

    </div><!--all-->
  </body>

</html>