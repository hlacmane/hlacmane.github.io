<?php
  require 'sqlconnect.php';
  $check1 = $_POST['itemid'];
  $check2 = $_POST['userid'];
  $check3 = $_POST['listid'];
  //echo $check1;
  $compyes = "yes";
  $itemupdate = $db->prepare("UPDATE listitems SET doneornot=:compyes, lastediteditem=Datetime('now') WHERE listitemid=:litemid AND userid=:userid AND listid=:listid;");
  $itemupdate->bindValue(':compyes', $compyes, SQLITE3_TEXT);
  $itemupdate->bindValue(':litemid', $check1, SQLITE3_INTEGER);
  $itemupdate->bindValue(':userid', $check2, SQLITE3_INTEGER);
  $itemupdate->bindValue(':listid', $check3, SQLITE3_INTEGER);
  $results = $itemupdate->execute();

    // 	Create an associative array of the data 
  $timesend = $db->prepare("SELECT * from listitems WHERE listitemid=:litemid1 AND listid=:listid1 AND userid=:userid1");
  $timesend->bindValue(':litemid1', $check1, SQLITE3_INTEGER);
  $timesend->bindValue(':userid1', $check2, SQLITE3_INTEGER);
  $timesend->bindValue(':listid1', $check3, SQLITE3_INTEGER);
  $results2 = $timesend->execute();
  $timearray= $results2->fetchArray();
  $newtime = $timearray['lastediteditem'];
    // Turn the associative array into JSON encoded data and return it. 

  session_save_path("/tmp");
  session_start();

  require 'security.php';
  $theuserid10 = $_SESSION['userid'];

  $compno10 = "no";
  $completedyes10 = "yes";
  $idoflist10 = $check3;

  $thediv = "Click the 'done' button, when you have comlpeted the task in this list.<br>
	    maybe set colour to green if completed task, and covert to yellow/orange when not complete.<br>
	    try to move completed items below the lsit in a diffeent table????????<br>
	    to do this jsut add to where statement of previous line in code<br><br>
	    <div class='error'></div>";
  $thediv .= '<form method="post" action="postitem.php" id="additemform">';
  $thediv .= '<label>item </label><input name="list_item_1" id="theitem">';
  $thediv .= "<input type='hidden' name='userid' value='$theuserid10'>";
  $thediv .= "<input type='hidden' name='listid' value='$idoflist10'>";
  $thediv .= '<input type="submit" name="itemstosubmittonewlist">';
  $thediv .= '</form> <br>';

  $thediv .= "<table class='tableoflistitems'>";
  $thediv .= "<tr> <th> list item name: </th> <th> Completed? </th> <th> Last Modified: </th> <th> Done: </th></tr>";
    $listitemsfromlist = $db->prepare("SELECT * from listitems WHERE listid=:idoflist1 AND userid=:idofuser AND doneornot=:compno");
    $listitemsfromlist->bindValue(':idoflist1', $idoflist10, SQLITE3_INTEGER);
    $listitemsfromlist->bindValue(':idofuser', $theuserid10, SQLITE3_INTEGER);
    $listitemsfromlist->bindValue(':compno', $compno10, SQLITE3_TEXT);
    $results2 = $listitemsfromlist->execute();
    while ($itemsvar = $results2->fetchArray())
    {
      $thediv .=  "<tr class='nocompitems'> <td>" .h($itemsvar['itemtext']). "</td> <td class='updatetoyes'>" .$itemsvar['doneornot']. "</td> <td class='updatethistime'>" .h($itemsvar['lastediteditem']). "</td> <td> <input class='itembutton' type='button' data-itemid=" .$itemsvar['listitemid']. " data-userid=" .$theuserid10. " data-listid=" .$idoflist10. " id='button' value='done'></td> </tr>";
    }
    $listitemsfromlistyes = $db->prepare("SELECT * from listitems WHERE listid=:idoflistyes AND userid=:idofuseryes AND doneornot=:compyes ORDER BY listitemid DESC");
    $listitemsfromlistyes->bindValue(':idoflistyes', $idoflist10, SQLITE3_INTEGER);
    $listitemsfromlistyes->bindValue(':idofuseryes', $theuserid10, SQLITE3_INTEGER);
    $listitemsfromlistyes->bindValue(':compyes', $completedyes10, SQLITE3_TEXT);
    $results2yes = $listitemsfromlistyes->execute();
    while ($itemsvaryes = $results2yes->fetchArray())
    {
      $thediv .= "<tr class='yescompitems'> <td>" .h($itemsvaryes['itemtext']). "</td> <td>" .$itemsvaryes['doneornot']. "</td> <td>" .h($itemsvaryes['lastediteditem']). "</td> <td> <input class='itembuttondone' type='button' data-itemid=" .$itemsvaryes['listitemid']. " data-userid=" .$theuserid10. " id='button' value='done'></td> </tr>";
    }
  $thediv .= "</table><br><br>";
  $thediv .= "<br>";

  echo $thediv;

//  echo json_encode($newtime);
?>


