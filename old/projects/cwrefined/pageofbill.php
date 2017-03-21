<?php
  include 'checkloggedin.php';
?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <title>The todo list</title>
    <?php 
      error_reporting(E_ALL);
      ini_set("display_errors", 1);
    ?>
  </head>
  <body>
    <div class="all">
      <div class="accbar">
	<!--logged in user name here-->
	<?php include 'loggedinbar.php' ?>
      </div>
      <div class="maintitle">
	<?php include 'logo.php' ?> <b> 
	<?php
	  echo $_POST['listname'];
	?></b>
      </div>
      <?php //include 'veslinks.php' ?>  
      <div class="desc">
	<?php
//	  require 'security.php';
//use javascript ???????????????????
	  //add item here
	  echo '<form method="post" action="#">';
	  echo '<label>item </label><input name="list_item_1">';
	  echo "<input type='hidden' name='userid' value='$theuserid'>";
	  echo '<input type="submit" name="itemstosubmittonewlist">';
	  echo '</form>';
	?>
	<br><br>
	add a save button, edit it, share here as well. alllow done to be on 
	pages apart from share?????????
	The list you have made are displayed below, simply click the name to view the list.<br></div>
      <br>

      <?php include 'copyrightbar.php' ?>
    </div>
  </body>

</html>
