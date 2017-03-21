<?php
  include "checkloggedinadmin.php";
  //include "../shortfunctions.php";
?>
<!DOCTYPE html>

<html>

  <head>
    <?php include 'adminheader.php'; ?>
    <title>ADMIN ALL COMP</title>
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
        <h1 class="text-center">ADMIN ALL COMPS</h1>
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
            <div id="allcompholder">
              <div id="adminallcomptable">
                <div class="allcomprow" id="allcompheaderrow">
                  <div class="allcompcolumnone">Email:</div>
                  <div class="allcompcolumntwo">companyName:</div>
                  <div class="allcompcolumnthree">compregno:</div>
                  <div class="allcompcolumnfour">sector:</div>
                  <div class="allcompcolumnfive">location:</div>
                  <div class="allcompcolumnsix">description:</div>
                  <div class="allcompcolumnseven">website:</div>
                  <div class="allcompcolumneight">contactno:</div>
                  <div class="allcompcolumnnine">employeecount:</div>
                  <div class="allcompcolumnten">twitter:</div>
                  <div class="allcompcolumneleven">facebook:</div>
                  <div class="allcompcolumntwelve">linkedin:</div>
                </div><!--end of row-->
                
                
                <?php
                  //SELECT `companyid`, `email`, `password`, `salt`, `companyName`, `compregno`, `sector`, `location`, `description`, `website`, `contactno`, `employeecount`, `twitter`, `facebook`, `linkedin` FROM `companyDetails` WHERE 1
                  //SELECT `email`, `companyName`, `compregno`, `sector`, `location`, `description`, `website`, `contactno`, `employeecount`, `twitter`, `facebook`, `linkedin` FROM `companyDetails` WHERE 1
                  $stmt = $mysqli->prepare("SELECT `email`, `companyName`, `compregno`, `sector`, `location`, `description`, `website`, `contactno`, `employeecount`, `twitter`, `facebook`, `linkedin` FROM `companyDetails` WHERE 1");
                  //$stmt->bind_param("i", $receivedJID);
                  $stmt->execute();
                  $stmt->bind_result($resultemail, $resultcompname, $resultcompregno, $resultsector, $resultlocation, $resultdesc, $resultwebsite, $resultphone, $resultempcount, $resulttwitter, $resultfb, $resultlinkedin);
                  while($stmt->fetch())
                  {
                    echo '<div class="allcandrow">
                            <div class="allcompcolumnone">'.$resultemail.'</div>
                            <div class="allcompcolumntwo">'.$resultcompname.'</div>
                            <div class="allcompcolumnthree">'.$resultcompregno.'</div>
                            <div class="allcompcolumnfour">'.$resultsector.'</div>
                            <div class="allcompcolumnfive">'.$resultlocation.'</div>
                            <div class="allcompcolumnsix">'.$resultdesc.'</div>
                            <div class="allcompcolumnseven">'.$resultwebsite.'</div>
                            <div class="allcompcolumneight">'.$resultphone.'</div>
                            <div class="allcompcolumnnine">'.$resultempcount.'</div>
                            <div class="allcompcolumnten">'.$resulttwitter.'</div>
                            <div class="allcompcolumneleven">'.$resultfb.'</div>
                            <div class="allcompcolumntwelve">'.$resultlinkedin.'</div>
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