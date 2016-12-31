<html>
    <head>
       
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('js/bootstrap.min.js') }}">
    
       
       
       
       
   
   
        
    </head>



<!----------------------------------------search form ---------------------------------------- --> 
<style>
    body{
        background-color: floralwhite;
    }
    .banner{
        height: 300px;
        padding-top:5px;
        /*background: url("pattern.png");*/
        background-color:mintcream;
        
        clear: both;
        
    }
    .r-banner{
        border: 3px;
        border-color: coral;
       
        
    }
     .M-banner{
        
        
    }
     .L-banner{
        
        
    }
    
    </style>

<body>


<div class="container">
<div class="row banner">
     <img src="u-banner.png" class="img-responsive">
</div>

<br><br>
<form action="">
  First name:<br>
  <input type="text" name="firstname" value="">
  <br>
  Last name:<br>
  <input type="text" name="lastname" value="">
  <br><br>
  <input type="submit" value="Submit" id="submit">
</form> 

    <br>
    <form action="server.cgi" method="post" enctype="multipart/form-data">
  <input type="file" name="video" accept="video/*" capture>
  <input type="submit" value="Upload">
</form>

    
      <script>
    window.onload = function () {
      function updateBatteryStatus(battery) {
        /*document.querySelector('#charging').textContent = battery.charging ? 'charging' : 'not charging';
        document.querySelector('#level').textContent = battery.level;
        document.querySelector('#dischargingTime').textContent = battery.dischargingTime / 60;*/
          
      }

      navigator.getBattery().then(function(battery) {
        // Update the battery status initially when the promise resolves ...
        updateBatteryStatus(battery);

        // .. and for any subsequent updates.
        battery.onchargingchange = function () {
          updateBatteryStatus(battery);
        };

        battery.onlevelchange = function () {
          updateBatteryStatus(battery);
        };

        battery.ondischargingtimechange = function () {
          updateBatteryStatus(battery);
        };
      });
    };
  </script>

    
  <div id="charging">(charging state unknown)</div>
  <div id="level">(battery level unknown)</div>
  <div id="dischargingTime">(discharging time unknown)</div>
    
    
    
    
    
   </body>
   

  
 
 

<!--<script src="{{ URL::to('src/js/test.js') }}"></script>-->
</html>