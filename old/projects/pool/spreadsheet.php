<!DOCTYPE html>

<html>
  <head>
    <title>Warwick Sports: Pool Club - Spreadsheet</title>
    <?php include 'headstuffforall.php'; ?>
    <script>
      //var html = "<iframe id=\"gsheettest\" src=\"https://docs.google.com/spreadsheets/d/11TdHcTiWcgsBA0w0bMv-85BEiiyDLJ8gXyJAT3uWLMo/pubhtml\"></iframe>";
      /*$('#mainSection').on( "click", "#sheetrefresh", function() {
        alert( "Handler for .click() called." );
      });*/
      $('#sheetrefresh').on("click", function() {
        alert("swag");
      });
      var html = "<iframe id=\"gsheettest\" src=\"https://docs.google.com/spreadsheets/d/1_YXoA_MoS5Qn3ZWk6qzzvrR7kdk7BDBQ3GKMT3Qy3uo/pubhtml\"></iframe>";
      function myFunction() {
        //alert("I am an alert box!");
        $('#sheetcontainer').html(html);
      }
    </script>
  </head>
  
  <body>
    <div id="all">
      <!--div id="mainHeading">Warwick Sport: Pool Club - Spreadsheet</div-->
      <div id="mainHeading">Warwick Sport</div>
      <hr>
      <div id="subHeading">
        Pool Club 
        <div id="subHeadingBreaker">
          Spreadsheet
        </div> 
      </div>
      <?php include 'nav.php'; ?>
      <div id="mainSection">
        Feel free to download the Spreadsheet below and use it! (Coming Soon)<br>
        Pool exec can log into the appropriate acc and edit it live, 
        and should restore back to version it started at, at the end.<br>
        
        <!--<a id="gspreadsheet" href="https://drive.google.com/open?id=1JE32r5iihpQd3mlvFuE4JhdYSh3F6jpPIMR_M_P4kbI">Click here to access to viewable</a>-->
        <!--<a id="gspreadsheet" href="https://docs.google.com/spreadsheets/d/11TdHcTiWcgsBA0w0bMv-85BEiiyDLJ8gXyJAT3uWLMo/pubhtml">Click here to access to viewable</a>-->
        <a id="gspreadsheet" href="https://docs.google.com/spreadsheets/d/1_YXoA_MoS5Qn3ZWk6qzzvrR7kdk7BDBQ3GKMT3Qy3uo/pubhtml">Click here to access to viewable</a>
        <button id="sheetrefresh" onclick="myFunction()">Refresh the Sheet</button>
        <div id="sheetcontainer">
          <!--iframe id="gsheettest" src="https://docs.google.com/spreadsheets/d/1JE32r5iihpQd3mlvFuE4JhdYSh3F6jpPIMR_M_P4kbI/pubhtml?gid=0&amp;single=true&amp;widget=true&amp;headers=false"></iframe-->
          <!--iframe id="gsheettest" src="https://docs.google.com/spreadsheets/d/1JE32r5iihpQd3mlvFuE4JhdYSh3F6jpPIMR_M_P4kbI/pubhtml?widget=true&amp;headers=false"></iframe-->
          <!--iframe id="gsheettest" src="https://docs.google.com/spreadsheets/d/1JE32r5iihpQd3mlvFuE4JhdYSh3F6jpPIMR_M_P4kbI/pub?output=ods"></iframe-->
          <!--<iframe id="gsheettest" src="https://docs.google.com/spreadsheets/d/1JE32r5iihpQd3mlvFuE4JhdYSh3F6jpPIMR_M_P4kbI/edit?usp=sharing"></iframe>-->
          
          <!--<iframe id="gsheettest" src="https://docs.google.com/spreadsheets/d/11TdHcTiWcgsBA0w0bMv-85BEiiyDLJ8gXyJAT3uWLMo/pubhtml?widget=true&amp;headers=false"></iframe>-->
          <!--<iframe id="gsheettest" src=""></iframe>-->

          <!--           <iframe id="gsheettest" src="https://docs.google.com/spreadsheets/d/11TdHcTiWcgsBA0w0bMv-85BEiiyDLJ8gXyJAT3uWLMo/pubhtml?widget=true&amp;headers=false"></iframe>
 -->
          <iframe id="gsheettest" src="https://docs.google.com/spreadsheets/d/1_YXoA_MoS5Qn3ZWk6qzzvrR7kdk7BDBQ3GKMT3Qy3uo/pubhtml?widget=true&amp;headers=false"></iframe>
        </div>
      </div>
      <?php include 'sponsors.php'; ?>
      
    </div>
    <?php include 'footer.php'; ?> 
  </body>
  
</html>