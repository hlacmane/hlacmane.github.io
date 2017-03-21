<?php
  require 'sqlconnect.php';
  require 'security.php';
  session_start();
  echo "test1";
  $check2 = $_SESSION['userid'];
  $check3 = $mysqli->real_escape_string($_SESSION['listid']);
  $itemtext = $mysqli->real_escape_string($_POST['itext')];
  $compno10 = "no";
  $theuserid10 = $_SESSION['userid'];


  $done = "no";
  $completedyes10 = "yes";
  $idoflist10 = $check3;
  $stmt5 = $mysqli->prepare("INSERT INTO `listitems`( `userid`, `listid`, `itemtext`, `doneornot`) VALUES (?,?,?,?)");
  $stmt5->bind_param("iiss", $theuserid10, $idoflist10, $itemtext, $done);
  $stmt5->execute();
  $stmt5->close();

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
    
  $stmt6 = $mysqli->prepare("SELECT `listitemid`, `itemtext`, `doneornot`, `lastediteditem` FROM `listitems` WHERE `listid`=? AND `userid`=? AND `doneornot`=?");
  $stmt6->bind_param("iis", $idoflist10, $theuserid10, $compno);
  $stmt6->execute();
  $stmt6->bind_result($listitemidno, $itemtextno, $doneornotno, $lasteditedno);
  while($stmt6->fetch())
  {
    $thediv.= "<tr class='nocompitems'> <td>" .h($itemtextno). "</td> <td class='updatetoyes'>" .h($doneornotno). "</td> <td class='updatethistime'>" .h($lasteditedno). "</td> <td> <input class='itembutton' type='button' data-itemid=" .h($listitemidno). " data-userid=" .$theuserid10. " data-listid=" .$idoflist10. " id='button' value='done'></td> </tr>";
  }
  $stmt6->close();
  

  $stmt7 = $mysqli->prepare("SELECT `listitemid`, `itemtext`, `doneornot`, `lastediteditem` FROM `listitems` WHERE listid=? AND userid=? AND doneornot=? ORDER BY `listitemid`");
  $stmt7->bind_param("iis", $idoflist10, $theuserid10, $completedyes10);
  $stmt7->execute();
  $stmt7->bind_result($listitemidyes, $itemtextyes, $doneornotyes, $lasteditedyes);
  while($stmt7->fetch())
  {
    $thediv .= "<tr class='yescompitems'> <td>" .h($itemtextyes). "</td> <td>" .h($doneornotyes). "</td> <td>" .h($lasteditedyes). "</td> <td> <input class='itembuttondone' type='button' data-itemid=" .h($listitemidyes). " data-userid=" .$theuserid10. " id='button' value='done'></td> </tr>";
  }
  $stmt7->close();
    
    
  $thediv .= "</table><br><br>";
  $thediv .= "<br>";

  echo $thediv;

//  echo json_encode($newtime);
?>


