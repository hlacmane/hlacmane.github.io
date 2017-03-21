$(document).ready( function() 
{

  $('#regisform').submit( function()
  {

    $('.error').empty();
    var success = true;
    $('#uname').css('background-color', '');
    $('#pass1').css('background-color', '');
    $('#pass2').css('background-color', '');

    if($('#uname').val() == null || $('#uname').val() == "")
    {
      $('#uname').css('background-color', 'red');
      $('.error').append("Please enter username <br>");;
      success = false;
      
    }

    if($('#pass1').val() != $('#pass2').val())
    {
      $('#pass1').css('background-color', 'red');
      $('#pass2').css('background-color', 'red');
      //alert("The passwords you have entered do not match. Please correct this");
      $('.error').append("Please make sure the passwords match <br>");
      success = false;
    }


    //use for all other fields
    return success;
  });

});
