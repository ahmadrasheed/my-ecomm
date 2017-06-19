<html>

<head>

    <meta name="csrf-token" content="<?php echo csrf_token() ?>" /> <!--for ajax call-->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(URL::to('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::to('css/bootstrap-theme.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::to('js/bootstrap.min.js')); ?>">

        <script type="text/javascript" src="<?php echo e(URL::to('/src/js/QR/llqrcode.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(URL::to('/src/js/QR/webqr.js')); ?>" ></script>
        <script src="<?php echo e(URL::to('js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(URL::to('js/bootstrap.min.js')); ?>"></script>


<style type="text/css">
body{
   /* width:100%;
    text-align:center;*/
}
#qrfile{
   /* width:320px;
    height:240px;
}*/
#qr-canvas{
    display:none;
}
#outdiv
{
    /*width:320px;
    height:240px;*/
}
#result{
   /* border: solid;
    border-width: 1px 1px 1px 1px;
    padding:20px;
    width:37.3%;*/
}
#imghelp{
   /* position:relative;*/
/*    left:0px;
    top:-160px;
    z-index:100;
    font:18px arial,sans-serif;
    background:#f0f0f0;
    margin-left:35px;
    margin-right:35px;
    padding-top:10px;
    padding-bottom:10px;*/
    /*border-radius:20px;*/
}
p.helptext{
    /*margin-top:54px;
    font:18px arial,sans-serif;*/
}
p.helptext2{
   /* margin-top:100px;
    font:18px arial,sans-serif;*/
}
</style>


  </head>



<body id="body" onload="load(); setimg();">

<div class="container">
    <div class="row">
      <div class="text-center">
       <div class="col-xs-12 ">
                <h2><p>لمعرفة تفاصيل كاملة عن هذا المنتج</p></h2>
                <h3><p><a href="/QR-scan" class="btn btn-link btn-block">قم بالتقاط صورة لهذا الكود المطبوع على المنتج</a></p></h3>

                <hr>
        </div>
        </div>
    </div>
    <div class="row text-center">

        <div class="col-xs-12 ">




                <div id="main">
                <div id="mainbody">
                <div id="outdiv">
                </div>
                <div id="result"></div>


                </div></div>
                <canvas id="qr-canvas" width="1000" height="300"> </canvas> <!--Canvas to draw image -->


                <div id="ahmad"></div><hr>
                <div class="row clearfix ">
                  <a href="/QR-scan" class="btn btn-success btn-block">Go Back again... </a><br><br>
                </div>

            </div>

      </div>
</div>



<script>
$(document).ready(function(){
   var url2="/getQR";
            $('#result').bind("DOMSubtreeModified",function(){
                var v=$(this).find('b').text(); // the value of QR after decoding
                alert($(this).find('b').text());
                $('#main').hide();
                $('#qr-canvas').hide();

            $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            $.post(url2, {payload:v}, onSuccess);


                $("#ahmad").append("<p><h2>"+v+"<h2></p>");
        });



    // to edit the css of some html element, these element I have no control of them, it made by js by the
    // developer, that 's why I change it's css by jQeury.
    $("#imghelp input").addClass("btn btn-danger btn-block");
    $("#imghelp input").css({"height": '50px',"font-size":'16px',"text-align":'center',"padding":'10px'});
    $("#out-canvas").css({"width": '200px', "height": '100px'});
    $('#imghelp').html($('#imghelp').html().replace('Select a file','<b>Take a photo</b>'));



        //$("p:first").addClass("intro note");

});
</script>


<script>


    function onSuccess(data, status, xhr)
			{

				// with our success handler, we're just logging the data...
				console.log(data, status, xhr);
				// but you can do something with it if you like - the JSON is deserialised into an object
				//console.log(String(data).toUpperCase())
                //$('#show').append(data[0][0]);

                if(data[0]!=null){
                    var x='<p class="hidden"><ul><h4 style="color:Orange;"><b>All details about this product</b></h4></ul></p>';
                $("#ahmad").append(x);
                    //alert(batteryLevel);
                   // $("#gif").remove();





                //alert("yes i'm here");
              /*  $("#gif").remove(); */

                // to iterate through the returned obj from the laravel controller
            $.each( data, function( key, value ) {
              //alert( key + ": " + value[key]['imagePath'] );

                //$('#row').append().attr('src')=value['imagePath'];

                var row="<div class='row'>";
                var p1="<div id='col' class='col-sm-6 col-md-4 col-lg-4'><div class='thumbnail'><img src='";
                var p2=data[key]['imagePath'];
                var p2=data[key]['imagePath'];
                //alert("image path is:"+p2);
                var p3="'class='img-responsive'><div class='caption'><h3>";
                var p4=data[key]['title'];
                var p5="</h3> <p class='description'>";
                var p6=data[key]['description'];
                var p7="</p><div class='clearfix'> <div class='pull-left price'>";
                var p8=data[key]['price'];
                var p9="</div><a href='/add-to-cart/";
                var p10=data[key]['id'];
                var p11="' class='btn btn-success pull-right' role='button'>Add to Cart</a> </div> </div> </div></div>";
                var row2="</div>";


            var product=row+p1+p2+p3+p4+p5+p6+p7+p8+p9+p10+p11+row2;

                console.log(product);
             // var  html = $.parseHTML( product );



 // just spare template we can remove it.
  var x='<div class="row"><div class="col-sm-6 col-md-4"> <div class="thumbnail"><img src="image2.jpg" alt="..." class="img-responsive"><img src="image2.jpg" alt="..." class="img-responsive"><div class="caption"><h3>camera</h3> <p class="description">oT data originates remotely, often from equipment at the edge that emits analog data in industries like energy, manufacturing and utilities. Outside the traditional data center or cloud, the edge is in the field, on a plant floor, at an oil rig or copper mine&mdash;generating business, engineering and scientific insights.</p> <div class="clearfix">  <div class="pull-left price">$607</div> <a href="http://localhost:8000/add-to-cart/6" class="btn btn-success pull-right" role="button">Add to Cart</a>  &nbsp;&nbsp;&nbsp;  <a href="http://localhost:8000/product-details/6" class="btn btn-warning pull-right" role="button">details</a> </div> </div>  </div> </div> ';




   $("#ahmad").append(product);


 }); // end of each

 }// end of if

       else {
                alert("sorry, no prudct found! try again");

       }
           }// end of success


    </script>


</body>
</html>
