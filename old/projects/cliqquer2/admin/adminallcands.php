<?php
  include "checkloggedinadmin.php";
  //include "../shortfunctions.php";
?>
<!DOCTYPE html>

<html>

  <head>
    <?php include 'adminheader.php'; ?>
    <title>ADMIN ALL CANDS</title>
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
        <h1 class="text-center">ADMIN ALL CANDS</h1>
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
            <div id="allcandholder">
              <div id="adminallcandtable">
                <div class="allcandrow" id="allcandheaderrow">
                  <div class="allcandcolumnone">Email:</div>
                  <div class="allcandcolumntwo">Title:</div>
                  <div class="allcandcolumnthree">FName:</div>
                  <div class="allcandcolumnfour">Lname:</div>
                  <div class="allcandcolumnfive">Age:</div>
                  <div class="allcandcolumnsix">Gender:</div>
                  <div class="allcandcolumnseven">Location:</div>
                  <div class="allcandcolumneight">Website:</div>
                  <div class="allcandcolumnnine">Phone No.:</div>
                  <div class="allcandcolumnten">Pref Role:</div>
                  <div class="allcandcolumneleven">Pref Salary:</div>
                  <div class="allcandcolumntwelve">LinkedIn:</div>
                </div><!--end of row-->
                
                
                <?php
                  //SELECT `candidateid`, `email`, `password`, `salt`, `title`, `firstname`, `lastname`, `age`, `gender`, `location`, `website`, `phonenumber`, `prefrole`, `prefsalary`, `linkedin` FROM `candidateDetails` WHERE 1
                  //SELECT `email`, `title`, `firstname`, `lastname`, `age`, `gender`, `location`, `website`, `phonenumber`, `prefrole`, `prefsalary`, `linkedin` FROM `candidateDetails` WHERE 1
                    $stmt = $mysqli->prepare("SELECT `email`, `title`, `firstname`, `lastname`, `age`, `gender`, `location`, `website`, `phonenumber`, `prefrole`, `prefsalary`, `linkedin` FROM `candidateDetails` WHERE 1");
                    //$stmt->bind_param("i", $receivedJID);
                    $stmt->execute();
                    $stmt->bind_result($resultemail, $resulttitle, $resultfname, $resultlname, $resultage, $resultgender, $resultlocation, $resultwebsite, $resultphone, $resultprefrole, $resultprefsalary, $resultlinkedin);
                    while($stmt->fetch())
                    {
                      echo '<div class="allcandrow">
                              <div class="allcandcolumnone">'.$resultemail.'</div>
                              <div class="allcandcolumntwo">'.$resulttitle.'</div>
                              <div class="allcandcolumnthree">'.$resultfname.'</div>
                              <div class="allcandcolumnfour">'.$resultlname.'</div>
                              <div class="allcandcolumnfive">'.$resultage.'</div>
                              <div class="allcandcolumnsix">'.$resultgender.'</div>
                              <div class="allcandcolumnseven">'.$resultlocation.'</div>
                              <div class="allcandcolumneight">'.$resultwebsite.'</div>
                              <div class="allcandcolumnnine">'.$resultphone.'</div>
                              <div class="allcandcolumnten">'.$resultprefrole.'</div>
                              <div class="allcandcolumneleven">'.$resultprefsalary.'</div>
                              <div class="allcandcolumntwelve">'.$resultlinkedin.'</div>
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