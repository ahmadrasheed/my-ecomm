  $(document).ready(function(){

      
    $.when(
    $.getScript( "src/js/geolocation.js" ),
    $.Deferred(function( deferred ){
        $( deferred.resolve );
    })
).done(function(){

    //place your code here, the scripts are all loaded
        
        


        if(typeof country !== "undefined"){
            //variable exists, do what you want
            alert(country);
            
            	// set up jQuery with the CSRF token, or else post routes will fail
			$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
            $.post(url, {payload:'IQ'}, onSuccess);
            
            
            
            
            
        }
    
    else{
            setTimeout(country, 250);
        }
     
        
        
        
    
        
        
			// handlers
			function onGetClick(event)
			{
				// we're not passing any data with the get route, though you can if you want
				//$.get('/ajax/get', onSuccess);
			}
			function onPostClick(event)
			{
                //alert("hello");
				// we're passing data with the post route, as this is more normal
				$.post(url, {payload:'IQ'}, onSuccess);
			}
			function onSuccess(data, status, xhr)
			{
				// with our success handler, we're just logging the data...
				console.log(data, status, xhr);
				// but you can do something with it if you like - the JSON is deserialised into an object
				//console.log(String(data).toUpperCase())
                //$('#show').append(data[0][0]);	
            
            $.each( data, function( key, value ) {
              //alert( key + ": " + value['imagePath'] );
              
                //$('#row').append().attr('src')=value['imagePath'];
                
                
                var p1="<div id='col' class='col-sm-6 col-md-4 col-lg-4'><div class='thumbnail'><img src='";
                var p2=value['imagePath'];
                var p3="'class='img-responsive'><div class='caption'><h3>";
                var p4=value['title'];
                var p5="</h3> <p class='description'>";
                var p6=value['description']; 
                var p7="</p><div class='clearfix'> <div class='pull-left price'>"; 
                var p8=value['price']; 
                var p9="</div><a href='/add-to-cart/"; 
                var p10=value['id']; 
                var p11="' class='btn btn-success pull-right' role='button'>Add to Cart</a> </div> </div> </div></div>";
                    
                       
            var product=p1+p2+p3+p4+p5+p6+p7+p8+p9+p10+p11;
              var  html = $.parseHTML( product );
               
                
                
                
  var x='<div class="row"><div class="col-sm-6 col-md-4"> <div class="thumbnail"><img src="image2.jpg" alt="..." class="img-responsive"><img src="image2.jpg" alt="..." class="img-responsive"><div class="caption"><h3>camera</h3> <p class="description">oT data originates remotely, often from equipment at the edge that emits analog data in industries like energy, manufacturing and utilities. Outside the traditional data center or cloud, the edge is in the field, on a plant floor, at an oil rig or copper mine&mdash;generating business, engineering and scientific insights.</p> <div class="clearfix">  <div class="pull-left price">$607</div> <a href="http://localhost:8000/add-to-cart/6" class="btn btn-success pull-right" role="button">Add to Cart</a>  &nbsp;&nbsp;&nbsp;  <a href="http://localhost:8000/product-details/6" class="btn btn-warning pull-right" role="button">details</a> </div> </div>  </div> </div> ';
                       
   $("#row").append(product);                            
                   
                        
                  
                
                
                  
                
            });
            
            }
			// listeners
			$('button#get').on('click', onGetClick);
			$('button#post').on('click', onPostClick);
          
          
          
   
        
       
        
        
        
        
        
        
        

});
      
      
      
    });

