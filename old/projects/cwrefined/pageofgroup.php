<?php
  include 'checkloggedin.php';
?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bill.css">
    <title>The todo list</title>
    <script src='js/jquery-2.1.3.min.js' type='text/javascript' charset='utf-8'>></script>
    <script src='js/jgroup.js' type='text/javascript' charset='utf-8'>></script>
  </head>
  <body>
    <div class="all"><!--container of all dives and content-->
      <div class="accbar">
	<?php include 'loggedinbar.php' ?>
      </div>
      <div class="maintitle">
	<?php include 'logo.php' ?> <b> 
	<?php
	  echo $_POST['groupname'];
	  $idofgroup = $_POST['groupid'];
	  require 'security.php';
	  $theuserid = $_SESSION['userid'];
	  $checkuser = $db->prepare("SELECT * FROM utog WHERE gid=:gid");
	  $checkuser->bindValue(':gid', $idofgroup, SQLITE3_INTEGER);
	  $results1 = $checkuser->execute();
	  while($checkuser2 = $results1->fetchArray())
	  {
	    if($checkuser2['userid'] == $theuserid)
	    {
	      break;
	    }
	  }
	  if($checkuser2['userid'] != $theuserid)
	  {
	    echo "you fake mother fucker";
	    header('Location:home.php');
	  }
	?></b>
      </div>
      <!--?php include 'veslinks.php' ?--> 
      <div class='links'>
	<a href="home.php">Back to home</a>
      </div>
      <div class="desc">
	<div class="error"></div>
	<form method='post' action='cbill.php' id='cbill'>
	  <table class='tablecbillcgroup'>
	    <tr><td><label>Bill name: </label></td><td><input class='inputbox' name="the_new_bill" id="billname" required maxlength='30'></td></tr>
	    <tr><td><label>Category: </label></td><td><input class='inputbox' name="bcateg" id="categ" maxlength='20'></td></tr>
	    <tr><td><label>Total Cost: (£) </label></td><td><input class='inputbox' type="number" min='0' step="0.01" name="totalcost" id="totalcost"></td></tr>
	    <tr><td><label>Date due: </label></td><td><input type='datetime-local' class='inputbox' name="duedate" id="due"></td></tr>
	  </table>
	  <div class='regispgbuttons'>
	    <input type='hidden' name='gid' value='<?php echo $idofgroup; ?>'>
	    <input class='submitbutton' type='submit' name="cbill">
	  </div>
	</form>


	<?php

	  echo "<div class='textmid'>The people in your group are listen below.<br></div>";
	  echo "<table class='tofgdisplay'>";
	  echo "<tr> <th> Username: </th> </tr>";
	  $gppl = $db->prepare("SELECT * FROM utog WHERE gid=:gid1");
	  $gppl->bindValue(':gid1', $idofgroup, SQLITE3_INTEGER);
	  $gppl1 = $gppl->execute();

	  while ($gppl2 = $gppl1->fetchArray())
	  {
	    echo "<tr><td>" .h($gppl2['username']). "</td> </tr>";
	  }
	  echo "</table><br>";
	  echo "<div class='textmid'>The bills for your group are displayed below.</div>";
//paid, categ, created ,due
	  echo "<table class='tofgdisplay'>";
	  echo "<tr> <th> Billname: </th> <th> Total cost: </th> <th> Paid: </th> <th> Category: </th> <th> Created: </th> <th> Due: </th></tr>";
	  $bstuff = $db->prepare("SELECT * FROM bills WHERE groupid=:gid2");
	  $bstuff->bindValue(':gid2', $idofgroup, SQLITE3_INTEGER);
	  $res1 = $bstuff->execute();
	  while($res2 = $res1->fetchArray())
	  {
	    echo "<tr><td><form method=post action='viewbill.php'><input type=hidden name=billid value=".$res2['billid']."> <input name='billname' type=submit class='submitbutton' value=" .$res2['billname']. "></td> <td> " . (h($res2['totalcost']))/100 . " </td><td> " .h($res2['paid']). " </td><td> " .h($res2['categ']). " </td><td> " .h($res2['created']). " </td><td> " .h($res2['due']). " </td></tr>";
	  }
	  echo "</table>";
	?>

	<br>
      </div>
      <?php include 'copyrightbar.php' ?>
    </div>
  </body>

</html>
