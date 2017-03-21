$(document).ready( function () {

  $('#home-login-block-cand').hide();
  $('#home-login-block-comp').hide();
  var candlogformhidden = true;
  var complogformhidden = true;

  $('#login-cand-form-show').click( function()
  {
    alert('testing7');
    
    if (candlogformhidden & complogformhidden)
    {
      candlogformhidden = false;
    }
    else if (candlogformhidden & !complogformhidden)
    {
      $('#home-login-block-comp').slideToggle();
      complogformhidden = true;
      candlogformhidden = false;
    }
    else
    {
      candlogformhidden = true;
    }
    $('#home-login-block-cand').slideToggle();
  });

  $('#login-comp-form-show').click( function()
  {
    alert('testing8');
    if (candlogformhidden & complogformhidden)
    {
      complogformhidden = false;
    }
    else if (!candlogformhidden & complogformhidden)
    {
      $('#home-login-block-cand').slideToggle();
      candlogformhidden = true;
      complogformhidden = false;
    }
    else
    {
      complogformhidden = true;
    }

    $('#home-login-block-comp').slideToggle();
  });
})