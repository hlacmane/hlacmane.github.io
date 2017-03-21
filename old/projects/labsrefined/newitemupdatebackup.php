<?php
  include 'checkloggedin.php';
?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <title>The todo list</title>
    <script src='js/jquery-3.0.0.min.js' type='text/javascript' charset='utf-8'></script>
    <!--script src='js/pageready.js' type='text/javascript' charset='utf-8'></script-->
    <script src='js/createlist.js' type='text/javascript' charset='utf-8'></script>
  </head>  

  <body>
    <div class="all">
      <div class="accbar"><!--logged in user name here-->
      <?php include 'loggedinbar.php' ?></div>

      <div class="maintitle"><?php include 'logo.php' ?> <b>Create list</b></div>
      <?php include 'veslinks.php' ?>
      <div class="desc">
        <div class="error"></div>
        <form method='post' action='postlist.php' id="createlist">
          <label>The list name</label><input name="the_new_list" id="listname"><br>
          <label>Category: </label><input name="categlist" id="categ"><br>
          <label>Priority: </label><input name="priolist" id="priority"><br>
          <label>item1: </label><input name="list_item_1" id="item1"><br>
          <input type='submit' name="itemstosubmittonewlist">
        </form>

        create a list
      </div>

      <?php include 'copyrightbar.php' ?>
    </div>
  </body>

</html>
