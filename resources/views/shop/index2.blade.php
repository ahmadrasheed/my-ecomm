@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection
@section('content')
@include('partials.carousel')
<!----------------------------------------search form ---------------------------------------- --> 




<form action="">
  First name:<br>
  <input type="text" name="firstname" value="Mickey">
  <br>
  Last name:<br>
  <input type="text" name="lastname" value="Mouse">
  <br><br>
  <input type="submit" value="Submit" id="submit">
</form> 

 
  
   
   <!--recommending products for the logged in user--------------------------------------------->
@if(!empty($recommended_items))    
<p><ul><h4 style="color:Orange;"><b>Recommended for you</b></h4></ul></p>
        
        <div class="row">
            @foreach($recommended_items as $item)
               
               @foreach($item as $product)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{ $product->imagePath }}" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3>{{ $product->title }}</h3>
                            <p class="description">{{ $product->description }}</p>
                            <div class="clearfix">
                                <div class="pull-left price">${{ $product->price }}</div>
                                <a href="{{ route('product.addToCart', ['id' => $product->id]) }}"
                                   class="btn btn-success pull-right" role="button">Add to Cart</a>
                                   &nbsp;&nbsp;&nbsp;
                                   <a href="{{ route('product.details', ['id' => $product->id]) }}"
                                   class="btn btn-warning pull-right" role="button">details</a>
                            </div>
                        </div>
                    </div>
                        
                </div>
                @endforeach
            @endforeach
        </div>
    
  @endif
    
    <div id="div1">
        
        
    </div>
<hr>


   
@endsection

@section('scripts')

<script>
var url='{{route('ajax')}}';

 $.ajax({
                method:'POST',
                url:url,
                data:{name:country}
            })
            .done(function(msg){
                  //$('#div1').text(msg['name']);
                  alert(msg['name']);
                  });
                
    
    
    
 // alert(url);  

</script>


<script src="{{ URL::to('src/js/test.js') }}"></script>
@endsection