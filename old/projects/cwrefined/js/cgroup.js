$(document).ready( function() 
{

  $('#cgroup').submit( function()
  {

    $('.error').empty();
    var success = true;
    $('#gname').css('background-color', '');
    $('#gpass1').css('background-color', '');
    $('#gpass2').css('background-color', '');

    if($('#gname').val() == null || $('#gname').val() == "")
    {
      $('#gname').css('background-color', 'red');
      $('.error').append("Please enter username <br>");;
      success = false;
    }

    if($('#gpass1').val() != $('#gpass2').val())
    {
      $('#gpass1').css('background-color', 'red');
      $('#gpass2').css('background-color', 'red');
      //alert("The passwords you have entered do not match. Please correct this");
      $('.error').append("Please make sure the passwords match <br>");
      success = false;
    }

    //use for all other fields
    return success;

  });

});
