$(document).ready( function() 
{
  //$('#aboutMeRow').hide();
  $('#skillsRow').hide();
  $('#projectsRow').hide();
  $('#interestsRow').hide();
  $('#contactRow').hide();
  //remove this line
  $('#todoRow').hide();
  var aboutToggle = true;
  var skillsToggle = false;
  var projectsToggle = false;
  var interestsToggle = false;
  var contactToggle = false;
  //add unique case for different scenarios possible
  //method maybe?
  $('#bAbout').click( function()
  {
    if (!aboutToggle)
    {
      $('#aboutMeRow').slideToggle();
      aboutToggle = true;
      
      if (skillsToggle)
      {
        $('#skillsRow').slideToggle();
        skillsToggle = false;
      }
      else if (projectsToggle)
      {
        $('#projectsRow').slideToggle();
        projectsToggle = false;
      }
      else if (interestsToggle)
      {
        $('#interestsRow').slideToggle();
        interestsToggle = false;
      }
      else if (contactToggle)
      {
        $('#contactRow').slideToggle();
        contactToggle = false;
      }
      
    }
  });
  
  $('#bSkills').click( function()
  {
    if (!skillsToggle)
    {
      $('#skillsRow').slideToggle();
      skillsToggle = true;
      
      if (aboutToggle)
      {
        $('#aboutMeRow').slideToggle();
        aboutToggle = false;
      }
      else if (projectsToggle)
      {
        $('#projectsRow').slideToggle();
        projectsToggle = false;
      }
      else if (interestsToggle)
      {
        $('#interestsRow').slideToggle();
        interestsToggle = false;
      }
      else if (contactToggle)
      {
        $('#contactRow').slideToggle();
        contactToggle = false;
      }
    }
  });
  
  $('#bProjects').click( function()
  {
    if (!projectsToggle)
    {
      $('#projectsRow').slideToggle();
      projectsToggle = true;
      
      if (aboutToggle)
      {
        $('#aboutMeRow').slideToggle();
        aboutToggle = false;
      }
      else if (skillsToggle)
      {
        $('#skillsRow').slideToggle();
        skillsToggle = false;
      }
      else if (interestsToggle)
      {
        $('#interestsRow').slideToggle();
        interestsToggle = false;
      }
      else if (contactToggle)
      {
        $('#contactRow').slideToggle();
        contactToggle = false;
      }
    }
  });
  
  $('#bInterests').click( function()
  {
    if (!interestsToggle)
    {
      $('#interestsRow').slideToggle();
      interestsToggle = true;
      
      if (aboutToggle)
      {
        $('#aboutMeRow').slideToggle();
        aboutToggle = false;
      }
      else if (skillsToggle)
      {
        $('#skillsRow').slideToggle();
        skillsToggle = false;
      }
      else if (projectsToggle)
      {
        $('#projectsRow').slideToggle();
        projectsToggle = false;
      }
      else if (contactToggle)
      {
        $('#contactRow').slideToggle();
        contactToggle = false;
      }
    }
  });
  
  $('#bContact').click( function()
  {
    if (!contactToggle)
    {
      $('#contactRow').slideToggle();
      contactToggle = true;
      
      if (aboutToggle)
      {
        $('#aboutMeRow').slideToggle();
        aboutToggle = false;
      }
      else if (skillsToggle)
      {
        $('#skillsRow').slideToggle();
        skillsToggle = false;
      }
      else if (projectsToggle)
      {
        $('#projectsRow').slideToggle();
        projectsToggle = false;
      }
      else if (interestsToggle)
      {
        $('#interestsRow').slideToggle();
        interestsToggle = false;
      }
    }
  });
});