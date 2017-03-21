<?php
  require 'sqlconnect.php';
  require 'security.php';
  session_start();
  //itemid replacing check1
  $iid = $mysqli->real_escape_string($_POST['itemid']);
  //userid replacing check2
  $uid = $mysqli->real_escape_string($_POST['userid']);
  //listid replacing check3
  $lid = $mysqli->real_escape_string($_POST['listid']);
  
  //replacing compyes
  $completedyes = "yes";
  //UPDATE `listitems` SET `doneornot`=[value-6] WHERE 1
  //UPDATE `listitems` SET `doneornot`=? WHERE `listitemid`=? AND `userid`=? AND `listid`=?
  //listitemid=:litemid AND userid=:userid AND listid=:listid
  //replacing itemupdate
  $stmt10 = $mysqli->prepare("UPDATE `listitems` SET `doneornot`=? WHERE `listitemid`=? AND `userid`=? AND `listid`=?");
  $stmt10->bind_param("siii", $completedyes, $iid, $uid, $lid);
  $stmt10->execute();
  $stmt10->close();
  
  //SELECT `lastediteditem` FROM `listitems` WHERE 1
  //listitemid=:litemid1 AND listid=:listid1 AND userid=:userid1
  //`listitemid`=? AND `listid`=? AND `userid`=?
  //SELECT `lastediteditem` FROM `listitems` WHERE `listitemid`=? AND `listid`=? AND `userid`=?
  //replacing timesend
  /*
  $stmt11 = $mysqli->prepare("SELECT `lastediteditem` FROM `listitems` WHERE `listitemid`=? AND `listid`=? AND `userid`=?");
  $stmt11->bind_param("iii", $iid, $uid, $lid);
  $stmt11->execute();
  $stmt11->bind_result($newtime);
  $stmt11->fetch();
  $stmt11->close();
  */
  //replacing theuserid10
  $theuserid2 = $_SESSION['userid'];
  //replacing compnpo10
  $completedno2 = "no";
  //used completedyes instead of $completedyes10
  
  
  $thediv = "<table class='tableoflistitems'>";
  $thediv .= "<tr> <th> list item name: </th> <th> Completed? </th> <th> Last Modified: </th> <th> Done: </th></tr>";
  
  //replacing $listitemsfromlist
  $stmt12 = $mysqli->prepare("SELECT `listitemid`, `itemtext`, `doneornot`, `lastediteditem` FROM `listitems` WHERE `listid`=? AND `userid`=? AND `doneornot`=?");
  $stmt12->bind_param("iis", $lid, $uid, $completedno2);
  $stmt12->execute();
  $stmt12->bind_result($listitemidno, $itemtextno, $doneornotno, $lasteditedno);
  while($stmt12->fetch())
  {
    $thediv.= "<tr class='nocompitems'> <td>" .h($itemtextno). "</td> <td class='updatetoyes'>" .h($doneornotno). "</td> <td class='updatethistime'>" .h($lasteditedno). "</td> <td> <input class='itembutton' type='button' data-itemid=" .h($listitemidno). " data-userid=" .$uid. " data-listid=" .$lid. " id='button' value='done'></td> </tr>";
  }
  $stmt12->close();
  
  
  //replacing $listitemsfromlistyes
  $stmt13 = $mysqli->prepare("SELECT `listitemid`, `itemtext`, `doneornot`, `lastediteditem` FROM `listitems` WHERE listid=? AND userid=? AND doneornot=? ORDER BY `listitemid`");
  $stmt13->bind_param("iis", $lid, $uid, $completedyes);
  $stmt13->execute();
  $stmt13->bind_result($listitemidyes, $itemtextyes, $doneornotyes, $lasteditedyes);
  while($stmt13->fetch())
  {
    $thediv .= "<tr class='yescompitems'> <td>" .h($itemtextyes). "</td> <td>" .h($doneornotyes). "</td> <td>" .h($lasteditedyes). "</td> <td> <input class='itembuttondone' type='button' data-itemid=" .h($listitemidyes). " data-userid=" .$uid. " id='button' value='done'></td> </tr>";
  }
  $stmt13->close();
  
  $thediv .= "</table>";

  echo $thediv;
?>