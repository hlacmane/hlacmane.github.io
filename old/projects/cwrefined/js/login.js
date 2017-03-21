$(document).ready( function() 
{
  
  $('#loginform').submit( function()
  {
    $('.error').empty();
    $('#username').css('background-color', '');
    $('#pass').css('background-color', '');
    var success = true;

    if($('#username').val() == "" || $('#username').val() == null)
    {
      $('#username').css('background-color', 'red');
      $('.error').append("Please enter username <br>");
      success = false;			//make false if the condition is true
    }

    if($('#pass').val() == "" || $('#pass').val() == null)
    {
      $('#pass').css('background-color', 'red');
      $('.error').append("Please enter password <br>");
      success = false;			//make false if the condition is true
    }

    return success;
      
  });

});
