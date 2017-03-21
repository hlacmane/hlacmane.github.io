<?php
  include "checkloggedinadmin.php";
  //include "../shortfunctions.php";
?>
<!DOCTYPE html>

<html>

  <head>
    <?php include 'adminheader.php'; ?>
    <title>ADMIN ALL JOBS</title>
    <?php 
      error_reporting(E_ALL);
      ini_set("display_errors", 1);
    ?>
  </head>  

  <body class="nav-on-header smart-nav">
    
    <!-- nav bar -->
    <?php include 'adminpagestop.php'; ?>
    <!-- END of nav bar -->
    
    
    <!-- Page header -->
    <header class="page-header bg-img size-lg" style="background-image: url(assets/img/bg-banner1.jpg)">
      <div class="container no-shadow">
        <h1 class="text-center">ADMIN ALL JOBS</h1>
        <p class="lead text-center">nice desc pls.</p>
      </div>
    </header>
    <!-- END Page header -->


    <!-- Main container -->
    <main>
      <section class="no-padding-top bg-alt">
        <div class="container">
          <div class="row">
            
            <!-- beginning of holder -->
            <div id="adminalljobholder">
              <div id="adminalljobtable">
                <div class="adminalljobrow" id="adminalljobheaderrow">
                  <div class="alljobcolumnone">Comp Name:</div>
                  <div class="alljobcolumntwo">Job title:</div>
                  <div class="alljobcolumnthree">Department:</div>
                  <div class="alljobcolumnfour">sector:</div>
                  <div class="alljobcolumnfive">location:</div>
                  <div class="alljobcolumnsix">description:</div>
                  <div class="alljobcolumnseven">salary:</div>
                  <div class="alljobcolumneight">dateposted:</div>
                  <div class="alljobcolumnnine">deadline:</div>
                  <div class="alljobcolumnten">corereqs:</div>
                  <div class="alljobcolumneleven">additionalreqs:</div>
                  <div class="alljobcolumntwelve">tags:</div>
                </div><!--end of row-->
                
                
                <?php
                  //SELECT `jobid`, `compid`, `company`, `jobtitle`, `department`, `sector`, `location`, `description`, `salary`, `dateposted`, `deadline`, `corereqs`, `additionalreqs`, `tags` FROM `jobs` WHERE 1
                  //SELECT `company`, `jobtitle`, `department`, `sector`, `location`, `description`, `salary`, `dateposted`, `deadline`, `corereqs`, `additionalreqs`, `tags` FROM `jobs` WHERE 1
                  $stmt = $mysqli->prepare("SELECT `company`, `jobtitle`, `department`, `sector`, `location`, `description`, `salary`, `dateposted`, `deadline`, `corereqs`, `additionalreqs`, `tags` FROM `jobs` WHERE 1");
                  //$stmt->bind_param("i", $receivedJID);
                  $stmt->execute();
                  $stmt->bind_result($resultcompname, $resultjobtitle, $resultdept, $resultsector, $resultlocation, $resultjobdesc, $resultsalary, $resultdateposted, $resultdeadline, $resultcorereqs, $resultaddireqs, $resulttags);
                  while($stmt->fetch())
                  {
                    echo '<div class="allcandrow">
                            <div class="alljobcolumnone">'.$resultcompname.'</div>
                            <div class="alljobcolumntwo">'.$resultjobtitle.'</div>
                            <div class="alljobcolumnthree">'.$resultdept.'</div>
                            <div class="alljobcolumnfour">'.$resultsector.'</div>
                            <div class="alljobcolumnfive">'.$resultlocation.'</div>
                            <div class="alljobcolumnsix">'.$resultjobdesc.'</div>
                            <div class="alljobcolumnseven">'.$resultsalary.'</div>
                            <div class="alljobcolumneight">'.$resultdateposted.'</div>
                            <div class="alljobcolumnnine">'.$resultdeadline.'</div>
                            <div class="alljobcolumnten">'.$resultcorereqs.'</div>
                            <div class="alljobcolumneleven">'.$resultaddireqs.'</div>
                            <div class="alljobcolumntwelve">'.$resulttags.'</div>
                          </div>';
                  }
                  $stmt->close();
                ?>
              </div><!--end of table-->
            </div>
            <!--end of holder-->
            
          </div>
        </div>
      </section>
    </main>
    <!-- END Main container -->
    

    
    <!-- bot page admin all -->
    <?php include 'adminpagesbot.php'; ?>
    <!-- End of bot page admin all -->
    
  </body>

</html>