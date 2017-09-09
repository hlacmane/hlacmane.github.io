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

  //do this the proper efficient way after
  $('#edu-hover-1').click( function() {
    $('.overlay').toggleClass('is-open');
    $('#edu-modal-1').show();
    return false;
  });

  $('#close-edu-modal-1').click( function() {
    $('#edu-modal-1').hide();
    $('.overlay').toggleClass('is-open')

    return false;
  });

  $('#edu-hover-2').click( function() {
    $('.overlay').toggleClass('is-open');
    $('#edu-modal-2').show();
    return false;
  });

  $('#close-edu-modal-2').click( function() {
    $('#edu-modal-2').hide();
    $('.overlay').toggleClass('is-open')
    return false;
  });

  $('#edu-hover-3').click( function() {
    $('.overlay').toggleClass('is-open');
    $('#edu-modal-3').show();
    return false;
  });

  $('#close-edu-modal-3').click( function() {
    $('#edu-modal-3').hide();
    $('.overlay').toggleClass('is-open')
    return false;
  });

});
