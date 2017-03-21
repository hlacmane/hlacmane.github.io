<?php
  include 'checkloggedin.php';
?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <title>The todo list</title>
  </head>  

  <body>
    <div class="all">
      <div class="accbar">logged in user name here
      <?php include 'loggedinbar.php' ?></div>
      <div class="maintitle"><?php include 'logo.php' ?> <b>Account Settings</b></div>

      <div class="desc">
      settings, change passord or email or promo email pref

        <form action='settings.php'>
    <label>Username: </label><input name="username">
    <label>Password: </label><input type='password' name="user_password">	<!--can have reenter -->
    <br>
    <label>Select title: </label><select name="title">
      <option class="plschangeme" disabled selected value> -- select an option -- </option>
      <option value='Dr'>Dr</option>
      <option value='Mr'>Mr</option>
      <option value='Mrs'>Mrs</option>
      <option value='Ms'>Ms</option>
      <option value='Miss'>Miss</option>
      <option value='Other'>Other</option>
    </select>
    <br>
    <label>First Name: </label><input name="firstname">
    <br>
    <label>Last Name: </label><input name="lastname">
    <br>
    <label>E-mail: </label><input name="email">	<!--can have reenter -->
    <br>
    <label>Promotion emails? (tick box for yes, otherwise leave unticked) </label><input type='checkbox' name="promo_emails">
    <br>
    <input type='submit' name="Register">
        </form>
        <?php
          //SELECT `userid`, `shareduserid`, `username`, `password`, `title`, `firstname`, `lastname`, `email`, `promoemails`, `salt` FROM `users` WHERE 1
          //SELECT `username`, `password`, `title`, `firstname`, `lastname`, `email`, `promoemails`, `salt` FROM `users` WHERE (`userid`=?)
          //make this to change password when button clicked.
          /*
          $stmt1 = $mysql->prepare();
          $stmt1->bind_param("i", $a);
          $stmt1->execute();
          $stmt1->bind_result();
          $stmt1->fetch();
          $stmt1->close();
          */
        ?>
        <div id="currAccDetails">
          <form>
            <div class="formRow">
              <div class="formRowLeftSide">
                <label>UName (Cannot change): </label>
              </div>
              <div class="formRowRightSide">
                <input class="inputBox" name="olduname"  id="olduname" value ="<?php echo $resultuname; ?>" disabled></input>
              </div>
            </div><!-- end of form row-->
            <div class="formRow">
              <div class="formRowLeftSide">
                <label>Title (Current): </label>
              </div>
              <div class="formRowRightSide">
                <input class="inputBox" name="oldtitle"  id="oldtitle" value ="<?php echo $resulttitle; ?>" disabled></input>
              </div>
            </div><!-- end of form row-->
            
            
          </form>
        </div>
      </div>
      <?php include 'copyrightbar.php' ?>
    </div>
  </body>

</html>
<!--
  <div class="formRow">
    <div class="formRowLeftSide">
      <label>Password: </label>
    </div>
    <div class="formRowRightSide">
      <input class="inputBox" type='password' name="password1" required id="password1">
    </div>
  </div>
  -->