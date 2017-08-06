$(document).ready( function()
{
  /*
  $('#link-list').mouseenter(function() {
    //$('#menu-li').css('display', 'none');
    $('#menu-li').hide("slow");
    //$('.li-show').css('display', 'inline-block');
    $( ".li-show" ).show("slow");
    $("li-nav").fadeTo( "slow", 1 );
    //$( ".li-show" ).css('opacity', 1);

  });

  $('#link-list').mouseleave(function() {
    //$('#menu-li').css('display', 'inline-block');
    $('#menu-li').show("slow");
    //$('.li-show').css('display', 'none');
    $( ".li-show" ).hide("slow");
    //$( ".li-show" ).css('opacity', 0.1);

  });*/
  $('#link-list').mouseenter(function() {
    //$(".li-nav").stop().fadeTo( "medium", 0.8 );
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
    //$(".li-nav").stop().fadeTo( "medium", 0.1 );
    $(".li-nav").stop().animate({
      opacity: 0.1,
    }, 750, function() {
      //completion code?
    });
    $( ".li-show" ).hide();
    $('#menu-li').show();
    return false;
  });

});
