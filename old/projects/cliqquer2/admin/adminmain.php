<?php
  include "checkloggedinadmin.php";
  //include "../shortfunctions.php";
  //echo $_SESSION['adminid'].'<br>';
?>
<!DOCTYPE html>

<html>

  <head>
    <?php include 'adminheader.php'; ?>
    <title>ADMIN MAIN</title>
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
        <h1 class="text-center">ADMIN Dashboard</h1>
        <p class="lead text-center">nice desc pls.</p>
      </div>
    </header>
    <!-- END Page header -->


    <!-- Main container -->
    <main>
      <section class="no-padding-top bg-alt">
        <div class="container">
          <div class="row">
            
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