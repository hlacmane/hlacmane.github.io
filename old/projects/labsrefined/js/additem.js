$(document).ready( function() 
{
  $( "#additemform" ).on( "submit", function( event ) {

    event.preventDefault(event);
  });
  $('form').submit( function(event)
  {
    event.preventDefault();
    console.log("mercy pls");
    return false;
  });
});


  /*$('.desc').on("submit" , '#additemform' , function()
  {
    event.preventDefault();
    $('.error').empty();		//error div, cleared from last time
    $('#theitem').css('background-color', '');
    var success = true;			//default true, so if no probs, it will eb true
    if ($('#theitem').val() == "" || $('#theitem').val() == null)
    {
      $('#theitem').css('background-color', 'red');
      $('.error').append("Please enter an item <br>");
      return false;
    }
    var newitem = $('#theitem').val();
    var data = {"itext": newitem}
    $.post("itemupdate2.php", data, function(response)
    {
      console.log("swag");
      console.log("received var???????????" + response);
      $('.desc').html(response);
    });
    return false;
  });*/