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

  </head>
  <body>
    <div class="all"><!--container of all dives and content-->
      <div class="accbar">
	<?php include 'loggedinbar.php' ?>
      </div>
      <div class="maintitle">
	<?php include 'logo.php' ?> <b> 
	<?php
	  echo $_POST['billname'];
	  $idofbill = $_POST['billid'];
	  require 'security.php';
	  $theuserid = $_SESSION['userid'];
	  $checkuser = $db->prepare("SELECT * FROM utob WHERE billid=:bid");
	  $checkuser->bindValue(':bid', $idofbill, SQLITE3_INTEGER);
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
	    header('Location:home.php');
	  }
	?></b>
      </div>
      <div class='links'>
	<a href="home.php">Back to home</a>
      </div>
      <div class="desc">
	<div class="error"></div>
	
	 <div class='textmid'>Beneath shows, whether the bill has been paid, what the total 
	cost is and the cost per person, which is based of the size of the group and 
	split equally.</div>

	<?php
	  $bstuff1 = $db->prepare("SELECT * FROM utob WHERE billid=:bid2");
	  $bstuff1->bindValue(':bid2', $idofbill, SQLITE3_INTEGER);
	  $res3 = $bstuff1->execute();
	  $res4 = $res3->fetchArray();

	  echo "<table class='tofgdisplay'>";
	  echo "<tr><th> Total cost: </th> <th> Each cost: </th> <th> Paid: </th> <th> Created: </th> <th> Due: </th></tr>";
	  $bstuff = $db->prepare("SELECT * FROM bills WHERE billid=:bid1");
	  $bstuff->bindValue(':bid1', $idofbill, SQLITE3_INTEGER);
	  $res1 = $bstuff->execute();
	  $res2 = $res1->fetchArray();
	
	  echo "<tr> <td> " . (h($res2['totalcost']))/100 . " </td><td> " .h($res4['eachcost']). " </td><td> " .h($res2['paid']). "</td><td> " .h($res2['created']). " </td><td> " .h($res2['due']). " </td></tr>";
	  
	  echo "</table>";

	  $bstuff = $db->prepare("SELECT * FROM bills WHERE groupid=:gid2");
	  $bstuff->bindValue(':gid2', $idofgroup, SQLITE3_INTEGER);
	  $res1 = $bstuff->execute();
	  while($res2 = $res1->fetchArray())
	  {
	    echo "<tr><td><form method=post action='viewbill.php'><input type=hidden name=billid value=".h($res2['billid'])."> <input type=submit class='submitbutton' value=" .h($res2['billname']). "></td> <td> " . (h($res2['totalcost']))/100 . " </td><td> " .h($res2['paid']). " </td><td> " .h($res2['categ']). " </td><td> " .h($res2['created']). " </td><td> " .h($res2['due']). " </td></tr>";
	  }
	  echo "</table>";
	?>

	<br>
      </div>
      <?php include 'copyrightbar.php' ?>
    </div>
  </body>

</html>
