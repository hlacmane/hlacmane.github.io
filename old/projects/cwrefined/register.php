<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bill.css">
    <title>billsplitter</title>
    <script src='js/jquery-2.1.3.min.js'></script>
    <script src='js/register.js' type='text/javascript' charset='utf-8'></script>
  </head>  

  <body>
    <div class="all">
      <div class="accbar">
	<a href="index.php">Login</a></div>
      <div class="maintitle"><?php include 'logo.php' ?> <b>Register for Billspliter</b></div>
      <div class="links"><a href="index.php">Back to Home</a></div>
      <div class="desc">
	<div class="error"></div>
	<form method ='post' action='registration.php' id='regisform'>
	  <table class="tableoflogin">
	  <tr><td><label>Username: </label></td><td><input class='inputbox' name="username" required id='uname' maxlength='30'></td></tr>
	  <tr><td><label>Password: </label></td><td><input class='inputbox' type='password' name="password1" required id='pass1' maxlength='30'></td></tr>
	  <!--set maxlength of input tags, so that usernames or longer name wont be cut off, also say the limits-->
	  <tr><td><label>Re-enter Password: </label></td><td><input class='inputbox' type='password' name="password2"  required id='pass2' maxlength='30'></td></tr>
  <!-- check fi passwords match code -->

	  <!--tr><td><label>Select title: </label></td><td><select class='dropdownbox' name="title">
	    <option class='optcss' value='Dr'>Dr</option>
	    <option class='optcss' value='Mr'>Mr</option>
	    <option class='optcss' value='Mrs'>Mrs</option>
	    <option class='optcss' value='Ms'>Ms</option>
	    <option class='optcss' value='Miss'>Miss</option>
	    <option class='optcss' value='Other'>Other</option>
	  </select></td></tr>

	  <tr><td><label>First Name: </label></td><td><input class='inputbox' name="firstname" required></td></tr>

	  <tr><td><label>Last Name: </label></td><td><input class='inputbox' name="lastname" required></td></tr-->

	  <tr><td><label>E-mail: </label></td><td><input class='inputbox' name="email" required maxlength='50'></td></tr>	
  <!--can have reenter and get email verify code html-->
	  
	  <tr><td>
	  <label>Promotional emails? (tick box for yes, otherwise leave unticked) </label></td><td><input type='checkbox' name="promo_emails">
	  </td></tr>

	  <!--tr><td></td><td><input class="submitbutton" type='submit' name="Register"></td></tr-->
	  <!--tr><td></td><td></td></tr-->
	  </table>
	  <div class='regispgbuttons'>
	    <input class="submitbutton" type='submit' name="Register">
	    <br>
	    <br>
	    <a href="index.php">Click here to Login</a>
	  </div>
	</form>
      </div>
      <?php include 'copyrightbar.php' ?>
    </div>
  </body>

</html>