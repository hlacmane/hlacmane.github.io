$(document).ready( function() 
{
  //main edu
  $('#uniModules').hide();
  $('#gcseALL').hide();
  
  $('#uniModExpand').click( function()
  {
    $('#uniModules').slideToggle();
  });
  
  $('#gcseExpand').click( function()
  {
    $('#gcseALL').slideToggle();
    $('#gcseIMP').slideToggle();
  });
  
});