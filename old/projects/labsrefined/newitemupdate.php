<?php
  require 'sqlconnect.php';
  require 'security.php';
  session_start();
  //replacing check2
  $sessuid = $_SESSION['userid'];
  //replacing check2
//  echo $sessuid;
  $sesslid = $mysqli->real_escape_string($_POST['listid']);
//  echo $sesslid;
  $itemtext = $mysqli->real_escape_string($_POST['itext']);
  //echo $itemtext;
  //replacing compno and done
  $completedno = "no";
  
  //replacing theuserid10
  $theuserid2 = $_SESSION['userid'];
  
  $completedyes = "yes";
  //replacing idoflist10
  $idoflist2 = $sesslid;
  $stmt5 = $mysqli->prepare("INSERT INTO `listitems`( `userid`, `listid`, `itemtext`, `doneornot`) VALUES (?,?,?,?)");
  $stmt5->bind_param("iiss", $theuserid2, $idoflist2, $itemtext, $completedno);
  $stmt5->execute();
  $stmt5->close();
  
//  echo "done";
  
  $thediv = "<table class='tableoflistitems'>";
  $thediv .= "<tr> <th> list item name: </th> <th> Completed? </th> <th> Last Modified: </th> <th> Done: </th></tr>";
  
  $stmt6 = $mysqli->prepare("SELECT `listitemid`, `itemtext`, `doneornot`, `lastediteditem` FROM `listitems` WHERE `listid`=? AND `userid`=? AND `doneornot`=?");
  $stmt6->bind_param("iis", $idoflist2, $theuserid2, $completedno);
  $stmt6->execute();
  $stmt6->bind_result($listitemidno, $itemtextno, $doneornotno, $lasteditedno);
  while($stmt6->fetch())
  {
    $thediv.= "<tr class='nocompitems'> <td>" .h($itemtextno). "</td> <td class='updatetoyes'>" .h($doneornotno). "</td> <td class='updatethistime'>" .h($lasteditedno). "</td> <td> <input class='itembutton' type='button' data-itemid=" .h($listitemidno). " data-userid=" .$theuserid2. " data-listid=" .$idoflist2. " id='button' value='done'></td> </tr>";
  }
  $stmt6->close();
  
  $stmt7 = $mysqli->prepare("SELECT `listitemid`, `itemtext`, `doneornot`, `lastediteditem` FROM `listitems` WHERE listid=? AND userid=? AND doneornot=? ORDER BY `listitemid`");
  $stmt7->bind_param("iis", $idoflist2, $theuserid2, $completedyes);
  $stmt7->execute();
  $stmt7->bind_result($listitemidyes, $itemtextyes, $doneornotyes, $lasteditedyes);
  while($stmt7->fetch())
  {
    $thediv .= "<tr class='yescompitems'> <td>" .h($itemtextyes). "</td> <td>" .h($doneornotyes). "</td> <td>" .h($lasteditedyes). "</td> <td> <input class='itembuttondone' type='button' data-itemid=" .h($listitemidyes). " data-userid=" .$theuserid2. " id='button' value='done'></td> </tr>";
  }
  $stmt7->close();
  
  $thediv .= "</table>";

  echo $thediv;
?>