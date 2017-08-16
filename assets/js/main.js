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

  // $('#name-paypal').mouseenter(function() {
  //   $("#landing").stop().animate({
  //     "background-color": "white",
  //   }, 750, function() {
  //     //completion code?
  //   });
  //
  //   return false;
  // });
  // $('#name-paypal').mouseleave(function() {
  //   $("#landing").stop().animate({
  //     "background-color": "#222",
  //   }, 750, function() {
  //     //completion code?
  //   });
  //
  //   return false;
  // });

  // $('#name-paypal').hover(
  //
  //   function(){
  //       $('body').animate({'background-color': 'white'},400);
  //   },
  //   function(){
  //       $('body').animate({'background-color': '#222'},400);
  //   }
  // );

  $('#name-paypal').mouseenter(function() {
    // $( "body" ).toggleClass( "body-2" );
    // $(".body-2").stop().animate({
    //   opacity: 1,
    // }, 300, function() {
    //   //completion code?
    // });
    // $(".body-1").stop().animate({
    //     "background-color": "#FFF",
    //   }, 750, function() {
    //     //completion code?
    // });
    $( "#landing" ).toggleClass( "row-diff" );
    // $(".row-diff").stop().animate({
    //   opacity: 1,
    // }, 1000, function() {
    //   //completion code?
    // });
    // $('#landing').find('*').css('opacity', '1');
    return false;
  });
  $('#name-paypal').mouseleave(function() {

    // $(".body-2").stop().animate({
    //   opacity: 0.1,
    // }, 300, function() {
    //   //completion code?
    // });
    // $( "body" ).toggleClass( "body-2" );

    // $(".body-1").stop().animate({
    //     "background-color": "#222",
    //   }, 750, function() {
    //     //completion code?
    // });


    // $(".row-diff").stop().animate({
    //   opacity: 0,
    // }, 1000, function() {
    //   //completion code?
    //   $( "#landing" ).toggleClass( "row-diff" );
    //   $('#landing').css('opacity', '');
    //   $('#landing').find('*').css('opacity', '1');
    // });
    $( "#landing" ).toggleClass( "row-diff" );



    return false;
  });

  function bgChange(x) {
    document.body.style.background = x;
  }


});
