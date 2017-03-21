<?php
  include 'checkloggedin.php';
?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bill.css">
    <title>BillSplitter</title>
    <script src='js/jquery-2.1.3.min.js' type='text/javascript' charset='utf-8'></script>
    <!--script src='js/pageready.js' type='text/javascript' charset='utf-8'></script-->
    <!--script src='js/createlist.js' type='text/javascript' charset='utf-8'></script-->
  </head>  

  <body>
    <div class="all">
      <div class="accbar"><!--logged in user name here-->
      <?php include 'loggedinbar.php' ?></div>

      <div class="maintitle"><!--?php include 'logo.php' ?--> <b>Create a bill</b></div>
      <!--?php include 'veslinks.php' ?-->
      <!--havea  back to home-->
      <div class='links'>
	<a href="home.php">Back to home</a>
      </div>
      <div class="desc">
	<div class="error"></div>
	<form method='post' action='pageofgroup.php' id='cbill'>
	  <table class='tablecbillcgroup'>
	    <tr><td><label>Bill name: </label></td><td><input class='inputbox' name="the_new_bill" id="billname" required maxlength='30'></td></tr>
	    <tr><td><label>Category: </label></td><td><input class='inputbox' name="categlist" id="categ" maxlength='20'></td></tr>
	    <tr><td><label>Total Cost: </label></td><td><input class='inputbox' name="totalcost" id="totalcost"></td></tr>
	    <tr><td><label>Date due: </label></td><td><input class='inputbox' name="duedate" id="due"></td></tr>
	  </table>
	  <div class='regispgbuttons'>
	    <input class='submitbutton' type='submit' name="cbill">
	  </div>
	</form>
	<?php
	?>
      create a bill, talk about why group needs to be created, then send to 
a page where bill and group is created
      </div>

      <?php include 'copyrightbar.php' ?>
    </div>
  </body>

</html>
<!--
create bill and group at same time, else my concept fails
-->