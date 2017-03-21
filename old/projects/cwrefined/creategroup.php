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
    <script src='js/cgroup.js' type='text/javascript' charset='utf-8'></script>
    <!--script src='js/createlist.js' type='text/javascript' charset='utf-8'></script-->
  </head>  

  <body>
    <div class="all">
      <div class="accbar"><!--logged in user name here-->
      <?php include 'loggedinbar.php' ?></div>

      <div class="maintitle"><!--?php include 'logo.php' ?--> <b>Create a group</b></div>
      <!--?php include 'veslinks.php' ?-->
      <!--havea  back to home-->
      <div class="desc">
	<div class="error"></div>
	<form method='post' action='cgrouping.php' id='cgroup'>
	  <table class='tablecbillcgroup'>
	    <tr><td><label>Group name: </label></td><td><input class='inputbox' name="gname" id="gname" required maxlength='30'></td></tr>
	    <tr><td><label>Group password: </label></td><td><input class='inputbox' type='password' name="gpass1" id="gpass1" required maxlength='30'></td></tr>
	    <tr><td><label>Re-enter group password: </label></td><td><input class='inputbox' type='password' name="gpass2" id="gpass2" required maxlength='30'></td></tr>	    
	  </table>
	  <div class='regispgbuttons'>
	    <input class='submitbutton' type='submit' name="cgroup">
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