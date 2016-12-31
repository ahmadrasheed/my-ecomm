<html>
   <head>
      <title>Ajax Example</title>
      
       <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="{{ URL::to('js/jquery.min.js') }}"> </script>   
     
<script src="{{ URL::to('js/bootstrap.min.js') }}"></script>
   
    <!-- // this is very importent-->
     <meta name="csrf-token" content="<?php echo csrf_token() ?>" />
  
  

  
  
  
   </head>
   
   <body>
     
     <button id="get">Get data</button>
     <button id="post">Post data</button>
     
     <p id="show"></p>
     
  
   </body>
  <script>
      
      
      var url='{{route('createAjax')}}';
			// set up jQuery with the CSRF token, or else post routes will fail
			$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
			// handlers
			function onGetClick(event)
			{
				// we're not passing any data with the get route, though you can if you want
				$.get('/ajax/get', onSuccess);
			}
			function onPostClick(event)
			{
                //alert("hello");
				// we're passing data with the post route, as this is more normal
				$.post(url, {payload:'this is the payload'}, onSuccess);
			}
			function onSuccess(data, status, xhr)
			{
				// with our success handler, we're just logging the data...
				//console.log(data, status, xhr);
				// but you can do something with it if you like - the JSON is deserialised into an object
				//console.log(String(data).toUpperCase())
                $('#show').append(data);			}
			// listeners
			$('button#get').on('click', onGetClick);
			$('button#post').on('click', onPostClick);
		</script>
</html>