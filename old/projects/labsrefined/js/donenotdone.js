$(document).ready( function() 
{
  $('.desc').on("click", ".itembutton", function()
  {
    //prevent default?
    //received array
    var recarray = $(this);
    console.log("array?");
    
    alert(recarray);
    
    //recevied item id
    var itemid;
    itemid = recarray[0].dataset.itemid;
    console.log("itemid = "+ itemid);
    
    var userid;
    userid = recarray[0].dataset.userid;
    console.log("userid = " + userid);
    
    var listid;
    listid = recarray[0].dataset.listid;
    
    var data = {"itemid": itemid,"userid": userid, "listid": listid};
    console.log("the data");
    console.log(data);
    $.post("newitemdone.php", data, function(response)
    {
      console.log("checker in post");
      console.log(response);
      $('#replaceajax').html(response);
    });
  });
});