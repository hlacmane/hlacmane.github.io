$(document).ready( function() 
{
  var qcount = 2;
  var qcount2 = 3;
  //above values are jsut incase, recheck later if can be removed and initialised later
  
  //9 qids below because max size of the used answeers is 9 for 10 questions.
  var qid1;
  var qid2;
  var qid3;
  var qid4;
  var qid5;
  var qid6;
  var qid7;
  var qid8;
  var qid9;
  
  $('#someInfo2').hide();
  
  //select box on change for culture question 1
  $('#cJobCultSelect1').on('change', function() 
  {
    /*
    ddisable this box, 
    get appropriate set of answers
    */
    //console.log($(this).val());
    qid1 = $(this).val();
    $(this).prop('disabled', true);
    var data = {qid: qid1};
    //console.log(data);
    //Ajax call with qid for set of answers
    $.post("culqformrowa.php", data, function(response)
    {
      //console.log("hi" + response);
      $('#1a').append(response);
      $('#cJobCultAnsSelect1a').attr('name', 'cultQA1');
    });
    //$('#cJobCultAnsSelect1').prop('disabled', false);
  });
  
  /*
  on change of answer select box, disable it and 
  get the next question without the used question
  */
  $('#1a').on('change', '#cJobCultAnsSelect1a', function() 
  {
    $(this).prop('disabled', true);
    qid1 = $('#cJobCultSelect1').val();
    var data = {qid1: qid1};
    $.post("cjobq2.php", data, function(response)
    {
      $('#2q').html(response);
    });
  });
  
  /*
  when answer of 2 is selecte,
  repeat what is done in question one but wiht nested binding to parents, 
  otherwise it is not possible to bind the appropriate event to the respective box.
  */
  $('#2q').on('change', '#cJobCultSelect2', function() 
  {
    $(this).prop('disabled', true);
    qid1 = $(this).val();
    var data = {qid: qid1};
    $.post("culqformrowa.php", data, function(response)
    {
      $('#2a').html(response);
      $('#2a').children('.formRowRightSide').children('#cJobCultAnsSelect1a').attr('id', 'cJobCultAnsSelect2a');
      $('#cJobCultAnsSelect2a').attr('name', 'cultQA2');
      //console.log("qcount2why" + qcount2);
    });
  });
  
  $('#2a').on('change', '#cJobCultAnsSelect2a', function()
  {
    qcount = 2;
    getthenextq();
    $('#3q').on('change', '#cJobCultSelect3', function()
    {
      qcount2 = 3;
      gettheqans();
      $('#3a').on('change', '#cJobCultAnsSelect3a', function()
      {
        qcount = 3;
        getthenextq();
        $('#4q').on('change', '#cJobCultSelect4', function()
        {
          qcount2 = 4;
          gettheqans();
          $('#4a').on('change', '#cJobCultAnsSelect4a', function()
          {
            qcount = 4;
            getthenextq();
            $('#someInfo2').show();
            $('#5q').on('change', '#cJobCultSelect5', function()
            {
              qcount2 = 5;
              gettheqans();
              $('#5a').on('change', '#cJobCultAnsSelect5a', function()
              {
                qcount = 5;
                getthenextq();
                $('#6q').on('change', '#cJobCultSelect6', function()
                {
                  qcount2 = 6;
                  gettheqans();
                  $('#6a').on('change', '#cJobCultAnsSelect6a', function()
                  {
                    qcount = 6;
                    getthenextq();
                    $('#7q').on('change', '#cJobCultSelect7', function()
                    {
                      qcount2 = 7;
                      gettheqans();
                      $('#7a').on('change', '#cJobCultAnsSelect7a', function()
                      {
                        qcount = 7;
                        getthenextq();
                        $('#8q').on('change', '#cJobCultSelect8', function()
                        {
                          qcount2 = 8;
                          gettheqans();
                          $('#8a').on('change', '#cJobCultAnsSelect8a', function()
                          {
                            qcount = 8;
                            getthenextq();
                            $('#9q').on('change', '#cJobCultSelect9', function()
                            {
                              qcount2 = 9;
                              gettheqans();
                              $('#9a').on('change', '#cJobCultAnsSelect9a', function()
                              {
                                qcount = 9;
                                getthenextq();
                                $('#10q').on('change', '#cJobCultSelect10', function()
                                {
                                  qcount2 = 10;
                                  gettheqans();
                                  $('#10a').on('change', '#cJobCultAnsSelect10a', function()
                                  {
                                    qcount = 10;
                                    //getthenextq();
                                    $(this).prop('disabled', true);
                                    alert("finished pls?");
                                    var data = {why: "hi"}
                                    
                                    $.post("cjobsubmit.php", data, function(response)
                                    {
                                      $('#cjobSubmitRow').append(response);
                                      alert("finished pls2?");
                                    });

                                    var formData;
                                    /*$('#cJobF').on('submit', function()
                                    */
                                    $('#cJobF').on('submit', function()
                                    {
                                      event.preventDefault();
                                      var cjobTitle, cjobDept, sector, locationa, cjobDesc, salary, cjobDeadline, cjobCoreReqs, cjobAddReqs, tags;
                                      var qaid1, qaid2, qaid3, qaid4, qaid5, qaid6, qaid7, qaid8, qaid9, qaid10;
                                      cjobTitle = $('#cjobTitle').val();
                                      cjobDept = $('#cjobDept').val();
                                      sector = $('#sector').val();
                                      locationa = $('#location').val();
                                      cjobDesc = $('#cjobDesc').val();
                                      salary = $('#salarySelect').val();
                                      cjobDeadline = $('#cjobDeadline').val();
                                      cjobCoreReqs = $('#cjobCoreReqs').val();
                                      cjobAddReqs = $('#cjobAddReqs').val();
                                      tags = $('#tags').val();

                                      qid1 = $('#cJobCultSelect1').val();
                                      qaid1 = $('#cJobCultAnsSelect1a').val();
                                      qid2 = $('#cJobCultSelect2').val();
                                      qaid2 = $('#cJobCultAnsSelect2a').val();
                                      qid3 = $('#cJobCultSelect3').val();
                                      qaid3 = $('#cJobCultAnsSelect3a').val();
                                      qid4 = $('#cJobCultSelect4').val();
                                      qaid4 = $('#cJobCultAnsSelect4a').val();
                                      qid5 = $('#cJobCultSelect5').val();
                                      qaid5 = $('#cJobCultAnsSelect5a').val();
                                      qid6 = $('#cJobCultSelect6').val();
                                      qaid6 = $('#cJobCultAnsSelect6a').val();
                                      qid7 = $('#cJobCultSelect7').val();
                                      qaid7 = $('#cJobCultAnsSelect7a').val();
                                      qid8 = $('#cJobCultSelect8').val();
                                      qaid8 = $('#cJobCultAnsSelect8a').val();
                                      qid9 = $('#cJobCultSelect9').val();
                                      qaid9 = $('#cJobCultAnsSelect9a').val();
                                      qid10 = $('#cJobCultSelect10').val();
                                      qaid10 = $('#cJobCultAnsSelect10a').val();
                                      
                                      formData = {cjobTitle: cjobTitle, cjobDept: cjobDept, sector: sector, location: locationa, cjobDesc: cjobDesc, salary: salary, cjobDeadline: cjobDeadline, cjobCoreReqs: cjobCoreReqs, cjobAddReqs: cjobAddReqs, tags: tags, cultQ1: qid1, cultQ2: qid2, cultQ3: qid3, cultQ4: qid4, cultQ5: qid5, cultQ6: qid6, cultQ7: qid7, cultQ8: qid8, cultQ9: qid9, cultQ10: qid10, cultQA1: qaid1, cultQA2: qaid2, cultQA3: qaid3, cultQA4: qaid4, cultQA5: qaid5, cultQA6: qaid6, cultQA7: qaid7, cultQA8: qaid8, cultQA9: qaid9, cultQA10: qaid10};
                                      
                                      $.post("creatingjob.php", formData, function(response)
                                      {
                                        $('#bigtesting').append(response);
                                        location.href = "http://hlacmane.co.uk/projects/cliqquer2/php/company/mycompjobs.php";
                                      });
                                      
                                    });
                                  });
                                });
                              });
                            });
                          });
                        });
                      });
                    });
                  });
                });
              });
            });
          });
        });
      });       
    });          
  });
  
  //function to get set fo answers per question to avoid repitition of code.
  function gettheqans()
  {
    //$(this).prop('disabled', true);
    $('#cJobCultSelect'+qcount2).prop('disabled', true);
    //qid1 = $(this).val();
    var theqid = $('#cJobCultSelect'+qcount2).val();
    var data = {qid: theqid};
    $.post("culqformrowa.php", data, function(response)
    {
      $('#'+qcount2+'a').html(response);
      $('#'+qcount2+'a').children('.formRowRightSide').children('#cJobCultAnsSelect1a').attr('id', 'cJobCultAnsSelect'+qcount2+'a');
      $('#cJobCultAnsSelect'+qcount2+'a').attr('name', 'cultQA'+qcount2);
      //console.log("qcount2" + qcount2);
      qcount2++;
      //console.log("qcount2incrementes" + qcount2);
    });
  }
  
  //function to get next question to avoid repitition of code.
  function getthenextq()
  {
    //$(this).prop('disabled', true);
    $('#cJobCultAnsSelect'+qcount+'a').prop('disabled', true);
    var newcount = 0;
    while (newcount <= qcount)
    {
      switch (newcount)
      {
        case 1: qid1 = $('#cJobCultSelect1').val();
          break;
        case 2: qid2 = $('#cJobCultSelect2').val();
          break;
        case 3: qid3 = $('#cJobCultSelect3').val();
          break;
        case 4: qid4 = $('#cJobCultSelect4').val();
          break;
        case 5: qid5 = $('#cJobCultSelect5').val();
          break;
        case 6: qid6 = $('#cJobCultSelect6').val();
          break;
        case 7: qid7 = $('#cJobCultSelect7').val();
          break;
        case 8: qid8 = $('#cJobCultSelect8').val();
          break;
        case 9: qid9 = $('#cJobCultSelect9').val();
          break;
      }
      newcount++;
    }//end of while
    
    var data;
    switch (qcount)
    {
      case 1: data = {qid1: qid1};
        break;
      case 2: data = {qid1: qid1, qid2: qid2};
        break;
      case 3: data = {qid1: qid1, qid2: qid2, qid3: qid3};
        break;
      case 4: data = {qid1: qid1, qid2: qid2, qid3: qid3, qid4: qid4};
        break;
      case 5: data = {qid1: qid1, qid2: qid2, qid3: qid3, qid4: qid4, qid5: qid5};
        break;
      case 6: data = {qid1: qid1, qid2: qid2, qid3: qid3, qid4: qid4, qid5: qid5, qid6: qid6};
        break;
      case 7: data = {qid1: qid1, qid2: qid2, qid3: qid3, qid4: qid4, qid5: qid5, qid6: qid6, qid7: qid7};
        break;
      case 8: data = {qid1: qid1, qid2: qid2, qid3: qid3, qid4: qid4, qid5: qid5, qid6: qid6, qid7: qid7, qid8: qid8};
        break;
      case 9: data = {qid1: qid1, qid2: qid2, qid3: qid3, qid4: qid4, qid5: qid5, qid6: qid6, qid7: qid7, qid8: qid8, qid9: qid9};
        break;
    }
    //console.log("qcount beforeinc"+qcount);
    qcount++;
    //console.log("qcount afterinc"+qcount);
    if (qcount == 11)
    {
      return false;
    }
    $.post("cjobq2.php", data, function(response)
    {
      $('#'+qcount+'q').html(response);
      $('#'+qcount+'q').children('.formRowRightSide').children('#cJobCultSelect2').attr('id', 'cJobCultSelect'+qcount);
      $('#'+qcount+'q').children('.formRowRightSide').children('#cJobCultSelect'+qcount).attr('name', 'cultQ'+qcount);
    });
  }
  
});