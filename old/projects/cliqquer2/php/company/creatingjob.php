<?php
  require "../../sqlconnect.php";
  session_start();
  
  /*
  ------------------------------------------------------------
  
  For initial Job info
  */
  //var_dump($_POST);
  $compid = $mysqli->real_escape_string($_SESSION['compid']);
  $compname = $mysqli->real_escape_string($_SESSION['compname']);
  $jobtitle = $mysqli->real_escape_string($_POST['cjobTitle']);
  $department = $mysqli->real_escape_string($_POST['cjobDept']);
  $sector = $mysqli->real_escape_string($_POST['sector']);
  $jlocation = $mysqli->real_escape_string($_POST['location']);
  $jdescription = $mysqli->real_escape_string($_POST['cjobDesc']);
  $jsalary = $mysqli->real_escape_string($_POST['salary']);
  //make dateposted submission date and date formats....
  //$jdateposted = $mysqli->real_escape_string($_POST['dateposted']);
  
  $now = new DateTime();
  $jdateposted = $now->format('Y-m-d H:i:s');
  //echo $now->format('Y-m-d H:i:s');    // MySQL datetime format
  
  $jdeadline = $mysqli->real_escape_string($_POST['cjobDeadline']);
  $jcorereqs = $mysqli->real_escape_string($_POST['cjobCoreReqs']);
  $jaddreqs = $mysqli->real_escape_string($_POST['cjobAddReqs']);
  $jtags = $mysqli->real_escape_string($_POST['tags']);
  /*
  End of initial job info
  
  ------------------------------------------------------------
  
  For Job cult q's & ans
  
  */
  $cqid1 = $mysqli->real_escape_string($_POST['cultQ1']);
  $cqid2 = $mysqli->real_escape_string($_POST['cultQ2']);
  $cqid3 = $mysqli->real_escape_string($_POST['cultQ3']);
  $cqid4 = $mysqli->real_escape_string($_POST['cultQ4']);
  $cqid5 = $mysqli->real_escape_string($_POST['cultQ5']);
  $cqid6 = $mysqli->real_escape_string($_POST['cultQ6']);
  $cqid7 = $mysqli->real_escape_string($_POST['cultQ7']);
  $cqid8 = $mysqli->real_escape_string($_POST['cultQ8']);
  $cqid9 = $mysqli->real_escape_string($_POST['cultQ9']);
  $cqid10 = $mysqli->real_escape_string($_POST['cultQ10']);
  $cqaid1 = $mysqli->real_escape_string($_POST['cultQA1']);
  $cqaid2 = $mysqli->real_escape_string($_POST['cultQA2']);
  $cqaid3 = $mysqli->real_escape_string($_POST['cultQA3']);
  $cqaid4 = $mysqli->real_escape_string($_POST['cultQA4']);
  $cqaid5 = $mysqli->real_escape_string($_POST['cultQA5']);
  $cqaid6 = $mysqli->real_escape_string($_POST['cultQA6']);
  $cqaid7 = $mysqli->real_escape_string($_POST['cultQA7']);
  $cqaid8 = $mysqli->real_escape_string($_POST['cultQA8']);
  $cqaid9 = $mysqli->real_escape_string($_POST['cultQA9']);
  $cqaid10 = $mysqli->real_escape_string($_POST['cultQA10']);

  
  //Insert for initial job info
  //INSERT INTO `jobs`(`company`, `department`, `sector`, `location`, `description`, `salary`, `dateposted`, `deadline`, `corereqs`, `additionalreqs`, `tags`) VALUES (?,?,?,?,?,?,?,?,?,?,?)
  $stmt = $mysqli->prepare("INSERT INTO `jobs`(`compid`, `company`, `jobtitle`, `department`, `sector`, `location`, `description`, `salary`, `dateposted`, `deadline`, `corereqs`, `additionalreqs`, `tags`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
  $stmt->bind_param("issssssssssss", $compid, $compname, $jobtitle, $department, $sector, $jlocation, $jdescription, $jsalary, $jdateposted, $jdeadline, $jcorereqs, $jaddreqs, $jtags);
  $stmt->execute();
  $stmt->close();
  
  //get job id for next insert statement
  //SELECT `jobid`, `compid`, `company`, `jobtitle`, `department`, `sector`, `location`, `description`, `salary`, `dateposted`, `deadline`, `corereqs`, `additionalreqs`, `tags` FROM `jobs` WHERE 1
  //SELECT `jobid` FROM `jobs` WHERE (`compid`=?) AND (`company`=?) AND (`jobtitle`=?) AND (`department`=?) AND (`sector`=?) AND (`location`=?) AND (`description`=?) AND (`salary`=?) AND (`dateposted`=?) AND (`deadline`=?) AND (`corereqs`=?) AND (`additionalreqs`=?) AND (`tags`=?)
  $stmt1 = $mysqli->prepare("SELECT `jobid` FROM `jobs` WHERE (`compid`=?) AND (`company`=?) AND (`jobtitle`=?) AND (`department`=?) AND (`sector`=?) AND (`location`=?) AND (`description`=?) AND (`salary`=?) AND (`dateposted`=?) AND (`deadline`=?) AND (`corereqs`=?) AND (`additionalreqs`=?) AND (`tags`=?)");
  $stmt1->bind_param("issssssssssss", $compid, $compname, $jobtitle, $department, $sector, $jlocation, $jdescription, $jsalary, $jdateposted, $jdeadline, $jcorereqs, $jaddreqs, $jtags);
  $stmt1->execute();
  $stmt1->bind_result($newjobid);
  $stmt1->fetch();
  $stmt1->close();
  //echo "newjobid".$newjobid."<br>";
  
  //Insert for Job cult q's
  //INSERT INTO `	jobPrefCulture`(`jobID`, `companyID`, `QID1`, `AID1`, `QID2`, `AID2`, `QID3`, `AID3`, `QID4`, `AID4`, `QID5`, `AID5`, `QID6`, `AID6`, `QID7`, `AID7`, `QID8`, `AID8`, `QID9`, `AID9`, `QID10`, `AID10`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18],[value-19],[value-20],[value-21],[value-22])
  //INSERT INTO `	jobPrefCulture`(`jobID`, `companyID`, `QID1`, `AID1`, `QID2`, `AID2`, `QID3`, `AID3`, `QID4`, `AID4`, `QID5`, `AID5`, `QID6`, `AID6`, `QID7`, `AID7`, `QID8`, `AID8`, `QID9`, `AID9`, `QID10`, `AID10`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
  //INSERT INTO `jobPrefCulture`(`jobID`, `companyID`, `QID1`, `AID1`, `QID2`, `AID2`, `QID3`, `AID3`, `QID4`, `AID4`, `QID5`, `AID5`, `QID6`, `AID6`, `QID7`, `AID7`, `QID8`, `AID8`, `QID9`, `AID9`, `QID10`, `AID10`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
  $stmt2 = $mysqli->prepare("INSERT INTO `jobPrefCulture`(`jobID`, `companyID`, `QID1`, `AID1`, `QID2`, `AID2`, `QID3`, `AID3`, `QID4`, `AID4`, `QID5`, `AID5`, `QID6`, `AID6`, `QID7`, `AID7`, `QID8`, `AID8`, `QID9`, `AID9`, `QID10`, `AID10`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
  $stmt2->bind_param("iiiiiiiiiiiiiiiiiiiiii", $newjobid, $compid, $cqid1, $cqaid1, $cqid2, $cqaid2, $cqid3, $cqaid3, $cqid4, $cqaid4, $cqid5, $cqaid5, $cqid6, $cqaid6, $cqid7, $cqaid7, $cqid8, $cqaid8, $cqid9, $cqaid9, $cqid10, $cqaid10);
  $stmt2->execute();
  $stmt2->close();
  
  
  echo "Done";
  $mysqli->close();
  //header('Location: mycompjobs.php');
  die();
?>