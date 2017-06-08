






/*Geolocation with Ajax code*/
//alert("from geolocation"+batteryLevel);
var country;


var geocoder;
geocoder = new google.maps.Geocoder();

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
}
//Get the latitude and the longitude;
function successFunction(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    codeLatLng(lat, lng)
}

function errorFunction(){
    alert("Geocoder failed");
}

  function initialize() {

      //we put onload=initialize() in the body tag
    geocoder = new google.maps.Geocoder();


  }

  function codeLatLng(lat, lng) {

    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      console.log(results)
        if (results[1]) {
         //formatted address
         //alert(results[0].formatted_address)
        //find country name
             for (var i=0; i<results[0].address_components.length; i++) {
            for (var b=0;b<results[0].address_components[i].types.length;b++) {

            //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                if (results[0].address_components[i].types[b] == "country") {
                    //this is the object you are looking for
                    city= results[0].address_components[i];
                    break;
                }
            }
        }
        //city data
        // alert(city.short_name + " " + city.long_name)


        country=city.short_name;
        alert(country);

        //alert(city.short_name + " " + city.long_name);


            //implementing Ajax here ..................................................



        if(typeof country !== "undefined"){
            //variable exists, do what you want
            // alert("this is "+country);
            // IQ will be sent not Iraq

          // the route of the controller that will serve the ajax request
            //var url='/create';


            	// set up jQuery with the CSRF token, or else post routes will fail
			$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

            $.post(url, {payload:country}, onSuccess);





        }

            else{
                alert("else");
                    setTimeout(country, 100);
                }


         // end of Ajax implementation-----------------------------------------------------




        } else {
          alert("No results found");
             $("#gif").remove();

        }
      } else {
        alert("Geocoder failed due to: " + status);
           $("#gif").remove();
      }
    });
  }


/*
above is a google map API
*/



/*
some  ajax  functions implementation below by me
*/





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
				//$.post(url, {payload:'IQ'}, onSuccess);
			}
			function onSuccess(data, status, xhr)
			{
        // alert("from sucess ");
				// with our success handler, we're just logging the data...
				console.log(data, status, xhr);

				// but you can do something with it if you like - the JSON is deserialised into an object
				//console.log(String(data).toUpperCase())
                //$('#show').append(data[0][0]);

                if(data[0]!=null){
                //     var x='<p class="hidden"><ul><h4 style="color:Orange;"><b>Recommended by your country</b></h4></ul></p>';
               $("#title").append("Recommened by country<hr>");
                    //alert(batteryLevel);
                    $("#gif").remove();

                    // to iterate through the returned obj from the laravel controller
                    value=data;
                for(var i=0;i<value.length;i++)
                for(var j=0;j<value[i].length;j++)
                {
                  var p1="<div id='col' class='col-sm-6 col-md-4 col-lg-3 pull-left'><div class='thumbnail'><img src='";
                  var p2=value[i][j]['imagePath'];
                  var p3="'class='img-responsive'><div class='caption'><h3>";
                  var p4=value[i][j]['title'];
                  var p5="</h3> <div class='description'>";
                  var p66=value[i][j]['description'];
                  var p66=$(p66).text(); // to strip html tags
                  var p6=p66.substring(0,200);

                  var p7="</div><div class='clearfix'> <div class='price'><span class='badge-success badge'>";
                  var p8=value[i][j]['price'];
                  var p9="</span></div><div class='col-xs-6 col-sm-6' ><a href='/add-to-cart/";
                  var p10=value[i][j]['id'];
                  var p11="'class='btn btn-success pull-right' role='button'>Add to Cart</a></div><div class='col-xs-6 col-sm-6'><a href='/product-details/";
                  var p12=value[i][j]['id'];
                  var p13="'class='btn btn-warning pull-right' role='button'>details</a></div></div></div></div>";


              // var p6="";

              var product=p1+p2+p3+p4+p5+p6+p7+p8+p9+p10+p11+p12+p13;
                  //console.log(product);
               // var  html = $.parseHTML( product );

$("#geolocation").append(product);
                }
                // for(var k=0;k<data[j].length;k++)
                // alert(data[i][j]['title']);


}
            } // end of success function
			// listeners
			$('button#get').on('click', onGetClick);
			$('button#post').on('click', onPostClick);


alert(batteryLevel+"this was battery level");
// alert("hiiii");
 // end of geolocation function body

  // geolocation();
