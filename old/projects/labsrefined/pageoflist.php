<?php
  include 'checkloggedin.php';
?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <title>The todo list</title>
    <!-- javascript part, can add php error thign below    todojs and additem-->
    <script src='js/jquery-3.0.0.min.js' type='text/javascript' charset='utf-8'>></script>
    <!--script src='js/doneornot.js' type='text/javascript' charset='utf-8'></script-->
    <script src='js/newitem.js' type='text/javascript' charset='utf-8'></script>
    <script src='js/donenotdone2.js' type='text/javascript' charset='utf-8'></script>
  </head>
  <body>
    <div class="all"><!--container of all dives and content-->
      <div class="accbar">
	     <?php include 'loggedinbar.php' ?>
      </div>
      <div class="maintitle">
        <?php include 'logo.php' ?> <b> 
        <?php
        
          //echo $_POST['listname'];
          $idoflist = $mysqli->real_escape_string($_POST['listid']);
          $_SESSION['listid'] = $mysqli->real_escape_string($idoflist);
          require 'security.php';
          $theuserid = $mysqli->real_escape_string($_SESSION['userid']);
          /*
          $checkuser = $db->prepare("SELECT * FROM lists WHERE listid=:listid");
          $checkuser->bindValue(':listid', $idoflist, SQLITE3_INTEGER);
          $results1 = $checkuser->execute();
          $checkuser2 = $results1->fetchArray();
          $confirmuser = $checkuser2['userid'];
          */
          
          //SELECT `userid` FROM `lists` WHERE 1
          $stmt1 = $mysqli->prepare("SELECT `userid` FROM `lists` WHERE listid=?");
          $stmt1->bind_param("i", $idoflist);
          $stmt1->execute();
          $stmt1->bind_result($confirmuser);
          $stmt1->fetch();
          $stmt1->close();
          if($theuserid != $confirmuser)
          {
            echo "This list does not belong to you, stop trying to abuse the system.<br>";
            echo '<a href="managelist.php">Back to manage lists</a>';
            exit();
            header('Location:managelist.php');
          }
          echo htmlspecialchars(addSlashes($_POST['listname']));
          $compno = $mysqli->real_escape_string("no");
          $completedyes = $mysqli->real_escape_string("yes");
        ?></b>
      </div>
      <?php include 'veslinks.php' ?>  
      <div class="desc">
        Click the 'done' button, when you have comlpeted the task in this list.<br>
        maybe set colour to green if completed task, and covert to yellow/orange when not complete.<br>
        try to move completed items below the list in a diffeent table????????<br>
        to do this just add to where statement of previous line in code<br><br>
        <div class="error"></div>
        <?php
          //add item here
          //echo '<form method="post" action="postitem.php" id="additemform">';
          echo '<form id="additemform" class="additemform" method="post" action="pageoflist.php">';
          echo '<label>item </label><input name="listitem1" id="theitem">';
          echo "<input type='hidden' name='userid' value='$theuserid' id='adduid'>";
          echo "<input type='hidden' name='listid' value='$idoflist' id='addlid'>";
          echo '<input type="submit" name="itemstosubmittonewlist">';
          echo '</form> <br>';
          
          echo "<div id='replaceajax'>";
          echo "<table class='tableoflistitems'>";
          echo "<tr> <th> list item name: </th> <th> Completed? </th> <th> Last Modified: </th> <th> Done: </th></tr>";

          //SELECT `listitemid`, `itemtext`, `doneornot`, `lastediteditem` FROM `listitems` WHERE 1
          
          $stmt2 = $mysqli->prepare("SELECT `listitemid`, `itemtext`, `doneornot`, `lastediteditem` FROM `listitems` WHERE (`listid`=?) AND (`userid`=?) AND (`doneornot`=?) ORDER BY `lastediteditem` DESC");
          $stmt2->bind_param("iis", $idoflist, $theuserid, $compno);
          $stmt2->execute();
          $stmt2->bind_result($listitemidno, $itemtextno, $doneornotno, $lasteditedno);
          while($stmt2->fetch())
          {
            echo "<tr class='nocompitems'> <td>" .h($itemtextno). "</td> <td class='updatetoyes'>" .h($doneornotno). "</td> <td class='updatethistime'>" .h($lasteditedno). "</td> <td> <input class='itembutton' type='button' data-itemid=" .h($listitemidno). " data-userid=" .$theuserid. " data-listid=" .$idoflist. " id='button' value='done'></td> </tr>";
          }
          $stmt2->close();
          
       
          $stmt3 = $mysqli->prepare("SELECT `listitemid`, `itemtext`, `doneornot`, `lastediteditem` FROM `listitems` WHERE (`listid`=?) AND (`userid`=?) AND (`doneornot`=?) ORDER BY `lastediteditem` DESC");
          $stmt3->bind_param("iis", $idoflist, $theuserid, $completedyes);
          $stmt3->execute();
          $stmt3->bind_result($listitemidyes, $itemtextyes, $doneornotyes, $lasteditedyes);
          while($stmt3->fetch())
          {
            echo "<tr class='yescompitems'> <td>" .h($itemtextyes). "</td> <td>" .h($doneornotyes). "</td> <td>" .h($lasteditedyes). "</td> <td> <input class='itembuttondone' type='button' data-itemid=" .h($listitemidyes). " data-userid=" .$theuserid. " id='button' value='done'></td> </tr>";
          }
          $stmt3->close();

          echo "</table></div>";
        ?>
        <br>
      </div>
      <?php include 'copyrightbar.php' ?>
    </div>
  </body>

</html>
<!--label>Promotion emails? (tick box for yes, otherwise leave unticked) </label>
<input type='checkbox' name="promo_emails"-->
