<?php
include '../../includes/scor.php';
?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/f13ac37978.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
</head>

<body> 
   <div class= "container background">
       <div class="row adunare">
          <div class="col-lg-12">
              <div id="scor" name="game1"></div>
              <div id="vieti"></div>
           </div>
           <div class="col-xs-5">
               <div id="numarA">aa</div>
           </div>
           <div class="col-xs-2">
               <div id="semnAdunare">+</div>
           </div>
           <div class="col-xs-5">
               <div id="numarB">bb</div>
           </div>
       </div>
       <div class="row butoane">
        <div class="col-xs-4 butn" id="but1">
            <a id="raspuns1"></a>
        </div>
        <div class="col-xs-4 butn" id="but2">
            <a id="raspuns2"></a>
        </div>
        <div class="col-xs-4 butn" id="but3">
            <a id="raspuns3"></a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div id="msg"></div>
        </div>
        <div class="col-xs-12 nextBtn">
            <a id ="refresh">next</a>
        </div>
    </div>
   </div>
    <div id="gameOver">
        <p>Game Over</p>
        <button id="tryAgain">Try again</button>
    </div>
  
    <!-- <div id="semnEgal">=</div> -->
    <script src="script.js"></script>
</body>
</html>
