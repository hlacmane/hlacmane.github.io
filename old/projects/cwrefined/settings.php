<?php
  include 'checkloggedin.php';
?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bill.css">
    <title>The todo list</title>
  </head>  

  <body>
    <div class="all">
      <div class="accbar">logged in user name here
      <?php include 'loggedinbar.php' ?></div>
      <div class="maintitle"><?php include 'logo.php' ?> <b>Account Settings</b></div>
      <div class='links'><a href='home.php'> Back to home</a></div>

      <form method='post' action='updateuser.php'>
	<table class='tofgdisplay'>
	<tr><td>
	<label>Select title: </label></td>
	<td><select class='inputbox' name="title">
	  <option value='Dr'>Dr</option>
	  <option value='Mr'>Mr</option>
	  <option value='Mrs'>Mrs</option>
	  <option value='Ms'>Ms</option>
	  <option value='Miss'>Miss</option>
	  <option value='Other'>Other</option>
	</select>
	</td></tr>
	<tr><td><label>First Name: </label></td><td><input maxlength='15' class='inputbox'  name="firstname" required></td></tr>
	
	<tr><td><label>Last Name: </label></td><td><input maxlength='15' class='inputbox'  name="lastname" required></td></tr>
	
	<!--label>E-mail: </label><input name="email">	<can have reenter -->
	<!--br>
	<label>Promotion emails? (tick box for yes, otherwise leave unticked) </label><input type='checkbox' name="promo_emails">
	<br-->
	</table>
	<div class='textmid'>
	  <input class='submitbutton' value='Update' type='submit' name="Update">
	</div>
      </form>
      <?php include 'copyrightbar.php' ?>
    </div>
  </body>

</html>