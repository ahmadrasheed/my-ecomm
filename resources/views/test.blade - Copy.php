 <?php
    use App\Cart;
    use App\Category;
    use App\Product;
?>
<html>
    <head>
       
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('js/bootstrap.min.js') }}">
    
       <script type="text/javascript" src="{{ URL::to('/src/js/QR/llqrcode.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('/src/js/QR/webqr.js')}}" ></script>
       
       
       
   
   
        
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

    

    
    <br>
    
    <hr>
    

==============================================================
 <?php
echo "My first PHP script!";
  echo  QrCode::size(100)->generate(Request::url());
    
    
    $products=Product::all();
  /*  
    foreach($products as $product)
        echo  QrCode::size(100)->generate(Request::url());*/
     $path='/qrcodes/';
            $file_name='';
      foreach($products as $product){
            $file_name=$product->title.".png";
            $file_name=$path.$file_name;
            echo "<img src='" . $file_name. "'>";
        }
    
    
    
?>

===========================================================
<br> <br>









<?php

//include_once('./lib/QrReader.php');
//use App\MyApp\QRdecoder\lib\QrReader;
    
// very important to work    
include(app_path() . '\MyApp\QRdecoder\lib\QrReader.php');    
/*$dir = scandir('qrcodes');
$ignoredFiles = array(
	'.',
	'..',
	'.DS_Store'
);
foreach($dir as $file) {
    if(in_array($file, $ignoredFiles)) continue;

    print $file;
    print ' --- ';
    $qrcode = new QrReader('qrcodes/'.$file);
    print $text = $qrcode->text();
    print "<br/>";
}*/

    
/*   if(isset($QR))
  {
      
      //dd($QR->path());
        $qrcode = new QrReader($QR->path());
        $text = $qrcode->text(); //return decoded text from QR Code
      echo "<br>".$text;
  }*/
    
    

 ?>  
    
  
    
      
        
          
<form action="" method="post" enctype="multipart/form-data">
  <input type="file" name="image" accept="image/*"capture="camera">
  <br>
  <button type="submit" name="SubmitButton"value="Submit" style="width:200px;height:200px" > press</button> 
  <!--<input type="submit" name="SubmitButton" value="Upload"> only on desktop-->
  <input type="hidden" name="_token" value="{{ csrf_token() }}">  
</form>            


<?php    
if(isset($_POST['SubmitButton'])){ //check if form was submitted
//dd("yeeeeeeeees");
        // to read QR code from the specific png image
        //$qrcode = new QrReader('qrcodes/bmw.png');
        $qrcode = new QrReader($_FILES['image']['tmp_name']);
        $text = $qrcode->text(); //return decoded text from QR Code
 
        echo"<hr>sssssssssssssss ---<br><h1>".$text."</h1><br><br>"; 
    
    
    
/*$input = $_POST['qr']; //get input text
echo "Success! You entered: ".$input;*/
}    
?>

    
    
    
 
    
    </div>   
   </body>
   

  
 
 

<!--<script src="{{ URL::to('src/js/test.js') }}"></script>-->
</html>