$(document).ready( function() 
{
  $('#contactForm').submit( function()
  {
    console.log("check1");
    event.preventDefault();
    console.log("check2");
    var fullName = $('#contFName').val();
    console.log("check3" + fullName);
    var email = $('#contEmail').val();
    var subject = $('#contSubject').val();
    var msg = $('#contMsg').val();
    console.log("check6" + msg);
    var data = {"cfname": fullName, "cemail": email, "csubject": subject, "cmsg": msg};
    $.post("contacting.php", data, function(response)
    {
      console.log("check7");
      console.log(response);
    });
    console.log("check8");
    $('#contFName').val('');
    $('#contEmail').val('');
    $('#contSubject').val('');
    $('#contMsg').val('');
    $('#contactSuccess').html('form cleared');
    console.log("check9");
    return false;
  });
});