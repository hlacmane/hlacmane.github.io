<?php
  //receive form js file and email me
  $cfname = $_POST['cfname'];
  $cemail = $_POST['cemail'];
  $csubject = $_POST['csubject'];
  $cmsg = $_POST['cmsg'];
  
  $headers = 'From: '.$cemail . "\r\n" .'Reply-To: '.$cemail;
  
  $csubject2 = 'Copy of email: '.$csubject;
  $cmsg1 = $cmsg.'-------------FROM '.$cemail;
  $cmsg2 = $cmsg1.'-----------This is what you sent to Hamish Lacmane';
  //$myemail = 'contact@hlacmane.co.uk';
  $myemail = 'hamish_5@hotmail.co.uk';
  $emailcheck = $myemail && $cemail;
  if (!$emailcheck)
  {
    if (mail($myemail, $csubject, $cmsg1, $headers) && mail($cemail, $csubject2, $cmsg2, $headers))
    {
      echo "success";
    }
    else
    {
      echo "failedv1";
    }
  }
  else
  {
    echo "failedv2";
  }

  /*
  $headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
  */
?>

