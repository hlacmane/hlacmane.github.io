$(document).ready( function() 
{
  
  $('#joingform').submit( function()
  {
    $('.error').empty();
    $('#joingpass1').css('background-color', '');
    $('#joingpass2').css('background-color', '');
    var success = true;


    if($('#joingpass1').val() != $('#joingpass2').val())
    {
      $('#joingpass1').css('background-color', 'red');
      $('#joingpass2').css('background-color', 'red');
      $('.error').append("Please make sure the passwords match <br>");
      success = false;			//make false if the condition is true
    }
    if($('#joingpass1').val() == $('#joingpass2').val())
    {

      $('.error').append("incorrect pass?? <br>");
      success = false;			//make false if the condition is true

    }

      var newg = $('#joingname').val();
      var data = {"newg": newg};
      $.post("gupdate.php", data, function(response)
      {
	console.log("received var???????????" + response);
	$('.desc').html(response);

      });
	return false;
      
  });

});
