$(document).ready( function() 
{

  $('#regisform').submit( function()
  {

    $('.error').empty();
    var success = true;
    $('#username').css('background-color', '');
    $('#password1').css('background-color', '');
    $('#password2').css('background-color', '');

    if($('#password1').val() != $('#password2').val())
    {
      $('#password1').css('background-color', 'red')
      $('#password2').css('background-color', 'red')
      //alert("The passwords you have entered do not match. Please correct this");
      $('.error').append("Please make sure the passwords match <br>");
      success = false;
    }

    if($('#username').val() == null || $('#username').val() == "")
    {
      $('#username').css('background-color', 'red')
      success = false;
      $('.error').append("Please enter username <br>");
    }
    //use for all other fields
    return success;
  });

});
