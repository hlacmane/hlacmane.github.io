$(document).ready( function()
{
  $('#link-list').mouseenter(function() {
    $(".li-nav").stop().animate({
      opacity: 1,
    }, 750, function() {
      //completion code?
    });
    $('#menu-li').hide();
    $( ".li-show" ).show();
    return false;
  });

  $('#link-list').mouseleave(function() {
    $(".li-nav").stop().animate({
      opacity: 0.1,
    }, 750, function() {
      //completion code?
    });
    $( ".li-show" ).hide();
    $('#menu-li').show();
    return false;
  });

  $('#name-paypal').mouseenter(function() {
    //$( "#landing" ).toggleClass( "row-diff" );
    $( "body" ).toggleClass( "body-2" );
    return false;
  });

  $('#name-paypal').mouseleave(function() {
    //$( "#landing" ).toggleClass( "row-diff" );
    $( "body" ).toggleClass( "body-2" );
    return false;
  });

});
