$(document).ready( function() 
{
  /*$('#additemform').submit( function(event)
  {
    alert("hello");
    event.preventDefault();
  });*/
  $('.desc').on("submit", '#additemform', function()
  {
    event.preventDefault();
    $('.error').empty();
    $('#theitem').css('background-color', '');
    
    if ($('#theitem').val() == "" || $('#theitem').val() == null)
    {
      $('#theitem').css('background-color', 'red');
      $('.error').append("Please enter an item <br>");
      return false;
    }
    
    var newitem = $('#theitem').val();
    var listid = $('#addlid').val();
    var data = {"itext": newitem, "listid":listid};
    console.log(data);
    
    $.post("newitemupdate.php", data, function(response)
    {
      console.log(response);
      $('#replaceajax').html(response);
      
    });
    $('#theitem').val('');
    console.log("area5");
    return false;
  });
});