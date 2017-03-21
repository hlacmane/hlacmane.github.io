<?php
  include 'checkloggedin.php';
?>
<!DOCTYPE html>

<html>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <title>The Todo List</title>
    <?php 
      error_reporting(E_ALL);
      ini_set("display_errors", 1);
    ?>
    <script src='js/jquery-3.0.0.min.js' type='text/javascript' charset='utf-8'></script>
  </head>  

  <body>

    <div class="all">
      <div class="accbar">
	<!--logged in user name here
       register wont show s -->
       <?php include 'loggedinbar.php' ?></div>
      <div class="maintitle"><?php include 'logo.php' ?> <b>Manage lists</b></div>
      <div class="links"> 
      <a href="createlist.php">Create List</a>
      <!--<a href="sharelist.php">Share lists</a></div>-->
      <div class="desc">      
        <?php
          require 'security.php';
          //put these loops and query shit into another file then include

          $tempid = $mysqli->real_escape_string($_SESSION['userid']);
          $allLists = $mysqli->prepare("SELECT `listid`, `listname`, `priority`, `listcategory`, `lastedited` FROM `lists` WHERE userid=?");
          $allLists->bind_param("i", $accbarid);
          //listid, listname, last edited, categ, prio
          $allLists->execute();
          $allLists->bind_result($resultlid, $resultlistname, $resultprio, $resultcateg, $resultedited);
          
          echo '<table class="tableoflists"> <tr><th>List Name: </th> <th>Date Modified: </th> <th>Category: </th> <th>Priority: </th></tr>';
          while($allLists->fetch())
          {
            echo "<tr><td><form method='post' action='pageoflist.php'><input type=hidden name =listid value =" .h(addSlashes($resultlid)). "><input type='submit' value=" .h(addSlashes($resultlistname)). " name=listname></form></td> <td>" .h(addSlashes($resultedited)). "</td> <td>" .h(addSlashes($resultcateg)). "</td> <td>" .h(addSlashes($resultprio)). "</td></tr>";//no br here
          }
          $allLists->close();
          echo '</table>';
          echo '<br>';
        ?>
      </div>

      <?php include 'copyrightbar.php' ?>

    </div>
  </body>

</html>
