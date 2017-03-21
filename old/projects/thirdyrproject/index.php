<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="in dev mode">
    <meta name="keywords" content="Third year project testing">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <style type="text/css" media="screen">

    #editor {
      width: 100%;
      height: 300px;;
      margin: 0;
      position: relative;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
    }
  </style>
    <title>Third Yr Project</title>
    <script src="js/jquery-3.0.0.min.js" type="text/javascript" charset="utf-8"></script>
        <!--script src='js/login.js' type='text/javascript' charset='utf-8'></script-->

  </head>
  <body>
    <div id="all">
      <div id="header">
        <div id="logo"><!--logo<br>
          site being developed--></div>
        <!-- logo to be two lines wrth -->
        <div id="nameNbuttons">
          <div id="nameTitle"><a class="paypalmeFam" href="https://www.paypal.me/HamishLacmane/4.20">Hamish B Lacmane</a></div>
          <!-- buttons under name -->
          <div id="buttons">
            <div class="mButton" id="bAbout">About Me</div>
            <div class="mButton" id="bSkills"> Skills </div>
            <div class="mButton" id="bProjects">Projects</div>
            <div class="mButton" id="bInterests">Interests</div>
            <div class="mButton" id="bContact">Contact</div>
          </div>
        </div>

      </div><!-- header -->

      <div id="outer-test-container">
        <div id="left-side-test" class="both-sides">editor below?
          <pre id="editor">
            function foo(items) 
            {
              var i;
              for (i = 0; i &lt; items.length; i++) 
              {
                alert("Ace Rocks " + items[i]);
              }
            }
          </pre>

          <script src="ace-builds-master/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
          <script>
              var editor = ace.edit("editor");
              editor.setTheme("ace/theme/twilight");
              editor.session.setMode("ace/mode/javascript");
          </script>
        </div>
        <div id="right-side-test" class="both-sides">Maybe compiler and screen?</div>
      </div>

      <div id="footer">	&copy; Copyright to Hamish Lacmane</div>
    </div>
  </body>
</html>
<?php
//<div class="mainRow">c</div>
?>