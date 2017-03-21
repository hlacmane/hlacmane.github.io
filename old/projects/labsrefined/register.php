<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <title>The Todo List</title>
    <script src='js/jquery-3.0.0.min.js' type='text/javascript' charset='utf-8'></script>
    <script src='js/register.js' type='text/javascript' charset='utf-8'></script>
  </head>  

  <body>
    <div class="all">
      <div class="accbar"><a href="index.php">Login</a></div>
      <div class="maintitle"><?php include 'logo.php' ?> <b>Register Form</b></div>
      <div class="links"><a href="index.php">Back to Home</a></div>
      <div class="errors"></div>
      <div class="desc">
        <div class="error"></div>
        <div class="allforms">
          <form name="form" method ='post' action='registration.php' id='regisform'>
            <div class="formRow">
              <div class="formRowLeftSide">
                <label>Username: </label>
              </div>
              <div class="formRowRightSide">
                <input class="inputBox" name="username" id='username'><!-- required-->
              </div>
            </div>
            <div class="formRow">
              <div class="formRowLeftSide">
                <label>Password: </label>
              </div>
              <div class="formRowRightSide">
                <input class="inputBox" type='password' name="password1" required id="password1">	<!--can have reenter -->
              </div>
            </div>
            <div class="formRow">
              <div class="formRowLeftSide">
                <label>Re-enter Password: </label>
              </div>
              <div class="formRowRightSide">
                <input class="inputBox" type='password' name="password2" required id="password2"><!-- check fi passwords match code -->
              </div>
            </div>
            <div class="formRow">
              <div class="formRowLeftSide">
                <label>Select title: </label>
              </div>
              <div class="formRowRightSide">
                <select id="regisSelect" name="title">
                  <option class="plschangeme" disabled selected value> -- select an option -- </option>
                  <option class="regisOpts" value='Dr'>Dr</option>
                  <option class="regisOpts" value='Mr'>Mr</option>
                  <option class="regisOpts" value='Mrs'>Mrs</option>
                  <option class="regisOpts" value='Ms'>Ms</option>
                  <option class="regisOpts" value='Miss'>Miss</option>
                  <option class="regisOpts" value='Other'>Other</option>
                </select>
              </div>
            </div>
            <div class="formRow">
              <div class="formRowLeftSide">
                <label>First Name: </label>
              </div>
              <div class="formRowRightSide">
                <input class="inputBox" name="firstname" required>
              </div>
            </div>
            <div class="formRow">
              <div class="formRowLeftSide">
                <label>Last Name: </label>
              </div>
              <div class="formRowRightSide">
                <input class="inputBox" name="lastname" required>
              </div>
            </div>
            <div class="formRow">
              <div class="formRowLeftSide">
                <label>E-mail: </label>
              </div>
              <div class="formRowRightSide">
                <input class="inputBox" name="email" required>	<!--can have reenter and get email verify code html-->
              </div>
            </div>
            <div class="formRow">
              <div class="formRowLeftSide" id="registerPromo">
                <label>Promotion emails? (tick box for yes, otherwise leave unticked) </label>
              </div>
              <div class="formRowRightSide">
                <input class="inputBox" id="regisCheckBox" type='checkbox' name="promo_emails">
              </div>
            </div>
            <br>
            <div class="formRow"  id="regisSubmitRow">
              <input class="formSubmit" id="regisSubmit" type='submit' name="Register">
            </div>
          </form>
        </div><!--allForms-->
        <div class="generalRow" id="regisGenRow">
          <a href="index.php">Click here to Login</a>
        </div>
    
      </div><!--desc-->

      <?php include 'copyrightbar.php' ?>
    </div>
  </body>

</html>