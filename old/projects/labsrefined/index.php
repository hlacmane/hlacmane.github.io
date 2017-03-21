<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <title>The Todo List</title>
    <script src='js/jquery-3.0.0.min.js' type='text/javascript' charset='utf-8'></script>
    <script src='js/login.js' type='text/javascript' charset='utf-8'></script>
  </head>

  <body>
    <?php
      require 'database.php';
      $db = new Database();
    ?>

    <div class="all">
      <div class="accbar"><a href="register.php">Register</a></div>
      <div class="maintitle"><?php include 'logo.php' ?><b> Todo list<b></div>
      <div class="links"></div>
      <div class="desc">
        <div class="error"></div>

        <div class="allForms" id="formLogin">
          <form name='test1' method ='post' action='authenticate.php' id="loginform">
            <div class="formRow">
              <div class="formRowLeftSide">
                <label class="formLabels">Username: </label>
              </div>
              <div class="formRowRightSide">
                <input class="inputBox" name="username" id="username">
              </div>
            </div>
            <div class="formRow">
              <div class="formRowLeftSide">
                <label class="formLabels">Password: </label>
              </div>
              <div class="formRowRightSide">
                <input class="inputBox" type='password' name="pass" id="pass">	
              </div>
            </div>
            <div class="formRow" id="loginSubmitRow">
              <input type='submit' name="Login" class="formSubmit" id="homeLogin">
            </div>
          </form>
        </div>
        <div class="generalRow">
          <a id="registerHome" href="register.php">Click here to Register</a>
        </div>
      </div>
      <br>
      <div class="biglogo">
        <img src="./images/logo.jpg" alt="ToDo" style="width: 50em; height: 50em">
      </div>
      <?php include 'copyrightbar.php' ?>
    </div>
  </body>
<!-- change all titles in headrs ot match respective pages, managelsits could ghave its own php for veslinks maybe-->
<!-- php switch for login done
makes the test list php????
edit list to php done
view list to php done
share list to php done
managelist to php done
register to php done
redirect to php done
settings to php done
login to php done
index to php done

add a help page???????????????????????

have somethign for list shared with you by other users
pass it to a new php file per link, and according to id of list put items there.
then on the page, wait for id to display correct list
add list thing to manage lsit page as well, or it becomes pointless?????????
name edit lsit to create/edit
add prority header to lists
maybe put all php whiel loops in php file then include.
add category to lists?????????????????????????????
delete todo.db and remake with new schema
need to change list item table to have a done or not done coloumn
check fi list names can be creatig a pop up on page or new page si necassary
-->
</html>
