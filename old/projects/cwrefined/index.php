<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bill.css">
    <title>Billsplitter</title>
    <script src='js/jquery-2.1.3.min.js'></script>
    <script src='js/login.js' type='text/javascript' charset='utf-8'></script>
    <?php 
      error_reporting(E_ALL);
      ini_set("display_errors", 1);
    ?>
    
  </head>

  <body>
    <?php
      require 'database.php';
      $db = new Database();
    ?>

    <div class="all">
      <div class="accbar">
      <a href="register.php">Register</a></div>
      <div class="maintitle"><?php include 'logo.php' ?> BILLsplitter ---</div>
      <div class="links">
      <!-- dunno if this is needed now-->
      </div>
      <div class="desc">
	Please enter your Username and Password to goto your homepage of Bills.<br>
	<div class="error"></div>
	<form method ='post' action='authenticate.php' id='loginform'>
	  <table class='tableoflogin'>
	  <tr><td>
	  <label>Username: </label></td>
	  <td><input class='inputbox' name="username" id='username'></td></tr>
	  <tr><td><label>Password: </label></td><td><input class='inputbox' type='password' name="pass" id='pass'><td></tr>	
	  <!-- save password -->
	  <!--tr><td></td><td><input class="submitbutton" type='submit' value="Login"></td></tr>
	</form-->
	</table>
	<div class="regispgbuttons">
	  <input class="submitbutton" type='submit' value="Login">

	  </form>
	  <br><br>
	  <!--table class="tableoflogin">
	  <tr><a href="register.php">Click here to Register</a></tr>
	  </table-->
	  If you do not have an account,<br><br>
	  <a href="register.php">Click here to Register</a>
	</div>
      </div>
      <?php include 'copyrightbar.php' ?>
    </div>
  </body>
<!-- maybe save to cookies, colour to set page to, add a few colour schemes
e bill spliter
flame splitter
bill seperattor
bill divider

currency

reigster page
registration.php
authenticate.php
home page for bills????
create bill???????
settings
share to group??????????

1
2
3
4
5
6-
6
7
8


-->
</html>
