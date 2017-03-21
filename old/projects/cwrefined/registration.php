<?php
  require 'database.php';
  $db = new Database();
  $username = $_POST['username'];
  echo $username. "<br>";
  $pass1 = $_POST['password1'];
  echo $pass1. "<br>";
  $salt = sha1(time());
  echo $salt. "<br>";
  $encrypass = sha1($pass1);
  echo $encrypass. "<br>";
  $readypass = sha1($salt. "--" .$encrypass);
  echo $readypass. "<br>";
  $pass2 = $_POST['password2'];
  echo $pass2. "<br>";
  $title = $_POST['title'];
  echo $title. "<br>";
  $firstname = $_POST['firstname'];
  echo $firstname. "<br>";
  $lastname = $_POST['lastname'];
  echo $lastname. "<br>";
  $email = $_POST['email'];
  echo $email. "<br>";
  $promo = $_POST['promo_emails'];
  echo $promo. "<br>";

  if($pass1 != $pass2)
  {
    header('Location:register.php');
  }

  $stmt = $db->prepare("INSERT INTO users VALUES(:n1, :username, :encrypass, :title, :firstname, :lastname, :email, :promo, :salt);");
  $stmt->bindValue(':n1', NULL, SQLITE3_NULL);			//null 1
  $stmt->bindValue(':username', $username, SQLITE3_TEXT);	//username
  $stmt->bindValue(':encrypass', $encrypass, SQLITE3_TEXT);	//enrpyted pass
  $stmt->bindValue(':title', $title, SQLITE3_TEXT);		//title
  $stmt->bindValue(':firstname', $firstname, SQLITE3_TEXT);	//firstname
  $stmt->bindValue(':lastname', $lastname, SQLITE3_TEXT);	//lastname
  $stmt->bindValue(':email', $email, SQLITE3_TEXT);		//email
  $stmt->bindValue(':promo', $promo, SQLITE3_TEXT);		//promo
  $stmt->bindValue(':salt', $salt, SQLITE3_TEXT);		//salt
  $results = $stmt->execute();
  echo "swag0 <br>";
  session_save_path("/tmp");
  session_start();

  $regis = $db->prepare("SELECT * from users WHERE username=:username");
  $regis->bindValue(':username', $username, SQLITE3_TEXT);
  echo "swag1 <br>";
  $regis->bindValue(':userid', $userid, SQLITE3_INTEGER);
  echo "swag2 <br>";
  $regisresults = $regis->execute();
  echo "swag3 <br>";
  $autologin1 = $regisresults->fetchArray();
  echo "swag4 <br>";
  $_SESSION['userid'] = $autologin1['userid'];
  echo $_SESSION['userid'];
  echo "<br>";
  header('Location:home.php');

//userid||username|password|title|firstname|lastname|email|promoemails/salt

?>

