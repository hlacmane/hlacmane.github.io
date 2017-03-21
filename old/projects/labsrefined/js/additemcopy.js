$(document).ready( function() 
{
//alert("do something");
  $('#createlist').submit( function()
  {
    $('#listname').css('background-color', '');
    $('#priority').css('background-color', '');
    $('#categ').css('background-color', '');
    $('#item1').css('background-color', '');
    $('.error').empty();
    //alert("do something");
    var swag = true;
    if($('#listname').val() == null || $('#listname').val() == "")
    {
      $('#listname').css('background-color', 'red')
      //alert("Please enter listname");
      $('.error').append("PLease enter a list name <br>");
      swag = false;
    }

    if($('#priority').val() == null || $('#priority').val() == "")
    {
      $('#priority').css('background-color', 'red')
      //alert("Please enter priority");
      $('.error').append("PLease enter a priority <br>");
      swag = false;
    }

    if($('#categ').val() == null || $('#categ').val() == "")
    {
      $('#categ').css('background-color', 'red')
      //alert("Please enter categ");
      $('.error').append("PLease enter a category <br>");
      swag = false;
    }
    
    if($('#item1').val() == null || $('#item1').val() == "")
    {
      $('#item1').css('background-color', 'red')
      //alert("Please enter item1");
      $('.error').append("PLease enter item1 <br>");
      swag = false;
    }

    return swag;
  });

});
